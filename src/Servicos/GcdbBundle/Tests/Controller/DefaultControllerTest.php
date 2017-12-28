<?php

namespace Servicos\GcdbBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

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

/*
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }*/

    public function testIndex()
    {
        $caduser_list = static::$kernel->getContainer()->get('caduser_list');

        $repo = $caduser_list->getCadUserName(array(209,1691));


        var_dump($repo);

    }


}
