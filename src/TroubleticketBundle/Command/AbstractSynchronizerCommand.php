<?php

namespace TroubleticketBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Abstração para comandos de sincronização
 *
 * @category Class
 * @package  Command
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
abstract class AbstractSynchronizerCommand extends ContainerAwareCommand
{

    /**
     * Obtem o alias do objeto de sincronização
     *
     * @abstract
     * @access protected
     * @return string
     */
    abstract protected function getAlias();

    /**
     * Cria uma nova entidade com base nos valores passados
     *
     * @param \StdObj $data Dados recebidos da API
     * @abstract
     * @access protected
     * @return mixed
     */
    abstract protected function createEntity($data);

    /**
     * Obtem o objeto de acesso a api
     *
     * @abstract
     * @access protected
     * @return \TroubleticketBundle\API\SistechAPI
     */
    abstract protected function getApi();

    /**
     * Método responsável por devolver a lista de registros a serem inseridos
     *
     * Tem a responsabilidade de pegar os dados da API e devolver somente a lista de
     * registros a serem inseridos
     *
     * @param \StdObj $response
     * @abstract
     * @access protected
     * @return \StdObj
     */
    abstract protected function parseResponse($response);


    /**
     * Obtem a query para realizar a remoção de registros com base nos ids obtidos
     * através da api
     *
     * @param array $ids
     * @abstract
     * @access protected
     * @return mixed
     */
    abstract protected function getRemoveQuery(array $ids);

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $class = get_class($this);
        $names = explode('\\', $class);
        $name = end($names);
        $name = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $name)), '_');
        $name = preg_replace('/_command$/', '', $name);

        $this->setName("troubleticket:$name")
            ->setDescription(
                "Sincroniza os {$this->getAlias()} de todos os sistemas Vogel com o ".
                'TroubleTicket'
            );
    }

    /**
     * Obtem o limite de itens por página
     *
     * @access protected
     * @return int
     */
    protected function getLimitPerPage()
    {
        $config = $this->getContainer()->getParameter('troubleticket_sistech_api');

        $limit = 200;
        if (isset($config['limit']) && intval($config['limit']) > 0) {
            $limit = (int)$config['limit'];
        }

        return $limit;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        $this->writeMessage('info', "Realizando o download de {$this->getAlias()}");

        $api = $this->getApi();

        // variavéis de controle
        $offset = 0;
        $total = null;
        $page = 1;
        $limit = $this->getLimitPerPage();

        while ($offset < $total || is_null($total)) {
            $this->writeMessage('info', 'Obtendo a página: ' . $page++);
            $response = $api->get($limit, $offset);
            $data = $this->parseResponse($response);
            $this->persist($data);
            if (is_null($total)) {
                $total = $response->total;
            }
            $offset += $limit;
        }
    }

    /**
     * Realiza a persitência dos registros
     *
     * @param \StdObj data Registros obtidos através da API
     * @access protected
     * @return null
     */
    protected function persist($data)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $connection = $manager->getConnection();

        $connection->beginTransaction();

        try {
            $ids = array();
            if (empty($data)) {
                throw new \Exception("{$this->getAlias()} inválidos");
            }

            foreach($data as $element) {
                $entity = $this->createEntity($element);
                $ids[] = $entity->getId();

                $this->writeMessage(
                    'debug',
                    sprintf(
                        'Inserindo registro id: %d', $entity->getId()
                    )
                );

                $manager->persist($entity);
            }

            // remove todos os registros que foram obitidos, para não ter que
            // verificar quais devem ser atualizados e quais devem ser inseridos
            $query = $this->getRemoveQuery($ids);
            $query->execute();

            // realiza a execução das inserções em massa, deve ser executado sempre
            // após o delete para que os registros não sejam removidos
            $manager->flush();
            $manager->clear();

            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
            $this->writeMessage('err', $e->getMessage());
            throw $e;
        }

    }

    /**
     * Escreve mensagens nos logs e na saída padrão
     *
     * @param string $level   Nível de log
     * @param string $message Mensagem a ser escrita
     * @access protected
     * @return null
     */
    protected function writeMessage($level, $message)
    {
        $logger = $this->getContainer()->get('logger');
        $logger->$level($message);
        $this->output->writeln(sprintf('[%s] %s', strtoupper($level), $message));
    }
}
