<?php

namespace TroubleticketBundle\Service;

use Symfony\Component\Yaml\Parser;

/**
 * Serviço para realizar a verificação de quem pode realizar determinada operação sobre determinado recurso
 *
 * Exemplo de uso:
 *     $permissions = new Permissions($session, $container)
 *     $permissions->isAllowed($resource, $action);
 */
class Permissions
{

    /**
     * Índice do id do usuário na sessão
     */
    const USERID_INDEX = 'usr_codigoid';

    /**
     * Índice da lista de grupos na sessão
     */
    const GROUPS_INDEX = 'employee_group_list';

    /**
     * Conjunto de permissões seguindo a seguinte estrutura:
     *     array(
     *         'resource1' => array(
     *             'action1' => array( grupo1, grupo2 ),
     *             'action2' => array( grupo2, grupo34 )
     *         ),
     *         'resource2' => array(
     *             'action1' => array( grupo5, grupo1 ),
     *         ),
     *     )
     *
     * @var array
     * @access private
     */
    private $permissions;

    /**
     * Conjunto de permissões para qualquer usuário logado, seguindo a seguinte estrutura:
     *     array(
     *         'resource1' => array(
     *             'action1', 'action2'
     *         ),
     *         'resource2' => array(
     *             'action5', 'action8'
     *         ),
     *     )
     *
     * @var array
     * @access private
     */
    private $permissionsWhiteList;


    /**
     * Symfony Service Container
     *
     * @var mixed
     * @access private
     */
    private $container;

    /**
     * Construtor
     *
     * @param mixed $session
     * @param mixed $container
     * @access public
     */
    public function __construct($session,$container)
    {
        $this->setSession($session);
        $this->setContainer($container);

        $parser = new Parser();

        //todo permitir que o arquivo seja configurável
        $permissions = __DIR__.'/../Resources/config/Permissions/permissions.yaml';
        $permissions = $parser->parse(file_get_contents($permissions));
        $this->setPermissions($permissions);

        //todo permitir que o arquivo seja configurável
        $permissionsWhiteList = __DIR__.'/../Resources/config/Permissions/permissions_green_list.yaml';
        $permissionsWhiteList = $parser->parse(file_get_contents($permissionsWhiteList));
        $this->setPermissionsWhiteList($permissionsWhiteList);
    }

    /**
     * Define o container de serviços do symfony
     *
     * @param mixed $container
     * @access public
     * @return $this
     */
    public function setContainer($container) {
        $this->container = $container;

        return $this;
    }

    /**
     * Obtem o container de serviços do symfony
     *
     * @access public
     * @return mixed
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * Define o conjunto de permissões do sistema
     *
     * @param array $permissions
     * @access public
     * @todo validar a estrutura de permissões para evitar erros
     * @return $this
     */
    public function setPermissions(array $permissions) {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Obtem o conjunto de permissões do sistema
     *
     * @access public
     * @return array
     */
    public function getPermissions() {
        return (array)$this->permissions;
    }

    /**
     * Define o conjunto de permissões para qualquer usuário logado
     *
     * @param array $permissionsWhiteList
     * @access public
     * @todo validar a estrutura de permissões para evitar erros
     * @return $this
     */
    public function setPermissionsWhiteList(array $permissionsWhiteList) {
        $this->permissionsWhiteList = $permissionsWhiteList;

        return $this;
    }

    /**
     * Obtem o conjunto de permissões para qualquer usuário logado
     *
     * @access public
     * @return array
     */
    public function getPermissionsWhiteList() {
        return (array)$this->permissionsWhiteList;
    }

    /**
     * Define o objeto de sessão
     *
     * @param mixed $session
     * @access public
     * @return $this
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Obtem o objeto de sessão
     *
     * @access public
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Verifica se o usuário logado possui permissão para executar determinada ação sobre determinado recurso
     *
     * @param string $resource Identificador do recurso
     * @param string $action   Ação a ser realizada
     * @access public
     * @return boolean
     */
    public function isAllowed($resource, $action)
    {
        $userId = $this->getUserId();
        
        // se usuário não está logado não tem nenhuma permissão
        if (is_null($userId)) {
            return false;
        }

        // ações da white list são sempre permitidas
        if ($this->inWhiteList($resource, $action)) {
            return true;
        }

        $groups = $this->getUserGroups($userId);
        $allowedGroups = $this->getAllowedGroups($resource, $action);

        foreach ($groups as $group) {
            if (in_array($group, $allowedGroups)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Obtem a lista de grupos que podem executar uma determinada ação sobre um determinado recurso
     *
     * @param string $resource
     * @param mixed $action
     * @access protected
     * @return array
     */
    protected function getAllowedGroups($resource, $action)
    {
        $permissions = $this->getPermissions();
        $result = isset($permissions[$resource]) ? $permissions[$resource] : array();
        return isset($result[$action]) ? (array)$result[$action] : array();
    }

    /**
     * Obtem os grupos do usuário logado
     *
     * Verifica se existem grupos na sessão, caso contrário ou se o usuário foi alterado busca os grupos através da api
     * do Sistech
     *
     * @param int $userId
     * @access protected
     * @return array
     */
    protected function getUserGroups($userId)
    {
        $session = $this->getSession();
        $troubleticketUserId = $session->get(self::USERID_INDEX);
        $groups = (array)$session->get(self::GROUPS_INDEX);

        // houve alteração do usuário ou os grupos não estão na sessão?
        if ($troubleticketUserId != $userId || empty($groups)) {
            $session->set(self::USERID_INDEX, $userId);

            $api = $this->getContainer()->get('troubleticket.colaborador_api');
            $api->setUrlPath(sprintf('%s/%s', $api->getUrlPath(), $userId));
            $employee = $api->get();

            $groups = array();
            if (isset($employee->grupos) && !empty($employee->grupos)) {
                foreach ($employee->grupos as $group) {
                    $groups[] = $group->idGrupo;
                }
            }
            $session->set(self::GROUPS_INDEX, $groups);
        }

        return $groups;
    }

    /**
     * Verifica se a ação a ser realizada sobre um determinado recurso está na White List
     *
     * @param string $resource Recurso a ser realizada a ação
     * @param string $action   Ação a ser realizada sobre o recurso
     * @access protected
     * @return bool
     */
    protected function inWhiteList($resource, $action)
    {
        $permissions = $this->getPermissionsWhiteList();
        $permissions = isset($permissions[$resource]) ? $permissions[$resource] : array();
        foreach ($permissions as $permission) {
            if ($permission == $action) {
                return true;
            }
        }

        return false;
    }


    /**
     * Obtem o identificador do usuário logado no sistech
     *
     * @access protected
     * @return int | null
     */
    protected function getUserId()
    {
//         echo "<pre>";
//         print_r($_SESSION);
        $session = isset($_SESSION) ? $_SESSION : array();
        return isset($session[self::USERID_INDEX]) ? (int)$session[self::USERID_INDEX] : null;
    }
}
