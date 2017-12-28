<?php

namespace Servicos\IntegracaoProtheusBundle\Tests\Controller;

use  Servicos\IntegracaoProtheusBundle\Service\Ordem\OrdemServiceList;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Application;

class DefaultControllerTest extends WebTestCase
{
	protected $client;
    protected $em;
    protected $service;

    /**
     * PHP UNIT SETUP FOR MEMORY USAGE
     * @SuppressWarnings(PHPMD.UnusedLocalVariable) crawler set instance for test.
     */
    public function setUp()
    {
        $this->client = static::createClient(array(
            'environment' => 'test',
        ),
            array(
                'HTTP_HOST' => 'host.tst',
                'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0',
            ));

        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }

    public function testIntegraFornecedoresProtheus()
    {
        $arrayParam = array(
            'status' => array(1,2,3),
            'where' => array('status' => array(1,3))
        );
        $t = static::$kernel->getContainer()->get('statusMovimentacaoList');
        $result = $t->countStatus($arrayParam);
        var_dump($result);
        $this->assertEquals(4, 4);
    }
    
    // public function testIntegraFornecedoresProtheus()
    // {
    //     $cnpj = array(56505464000104,02507787000108);
    //     $t = static::$kernel->getContainer()->get('integrarPedidoCompra');
    //     $result = $t->getFornecedoresPorCNPJ($cnpj);
    //     $this->assertEquals(4, 4);
    // }

    // /**
    //  * @expectedException Exception
    //  */
    // public function testIntegraFornecedoresProtheusException()
    // {
    //     $t = static::$kernel->getContainer()->get('integrarPedidoCompra');
    //     $result = $t->getFornecedoresPorCNPJ();
    //     $this->assertEquals(4, 3);
    // }

}
