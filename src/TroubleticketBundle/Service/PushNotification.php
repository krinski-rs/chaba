<?php

namespace TroubleticketBundle\Service;

use Exception;
use DateTime;

use TroubleticketBundle\Entity;
use TroubleticketBundle\Twig;
use TroubleticketBundle\Exception\TroubleticketBundleException;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Id\SequenceGenerator;
use Doctrine\ORM\Tools\Pagination\Paginator;

use Symfony\Component\Yaml\Parser;

use Servicos\LumaBundle;
use Servicos\LumaBundle\Entity as EntitiesLuma;

/**
 * Serviço de envio de push notifications
 */
class PushNotification
{
    /**
     * Objeto do doctrine
     *
     * @var mixed
     * @access protected
     */
    protected $doctrine;

    /**
     * Container do Symfony
     *
     * @var mixed
     * @access protected
     */
    protected $container;

    /**
     * Reports Constructor
     *
     * @param Registry $doctrine
     * @access public
     */
    public function __construct(Registry $doctrine, $container)
    {
        $this->doctrine = $doctrine;
        $this->container = $container;
    }

    /**
     * Get Doctrine
     *
     * @access private
     * @return Registry
     */
    private function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * Envia a push notification através da API do fcm
     * @param  array $data dados a serem enviados na notificação
     * @return obj   $result retorno da chamada
     */
    public function send($data)
    {
        if(!$this->container->hasParameter('troubleticket.FIREBASE_ACCESS_KEY')) {
            throw new Exception("Não foi possível encontrar parametro 'troubleticket.FIREBASE_ACCESS_KEY'");
        }

        if(!$this->container->hasParameter('troubleticket.FCM_PATH')) {
            throw new Exception("Não foi possível encontrar parametro 'troubleticket.FCM_PATH'");
        }

        $manager = $this->getDoctrine()->getManager('default');
        $devices = $manager->getRepository('ServicosGcdbBundle:Devices')->listDeviceIDs($data['cid']);
        if(empty($devices)){
            return;
        }

        foreach ($devices as $key => $value) {
            $arrayDevices[] = $value['deviceID'];
        }

        $headers = array
        (
            'Authorization: key=' . $this->container->getParameter('troubleticket.FIREBASE_ACCESS_KEY'),
            'Content-Type: application/json'
        );

        $fields = array(
            'notification' => array(
                'title'        => $data['title'],
                'body'         => $data['body'],
                "click_action" => "FCM_PLUGIN_ACTIVITY",
                'icon'         => 'appicon',
            ),
            'data' => $data['data'],
            'registration_ids' => $arrayDevices,
            'priority'         => 'high'
        );
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $this->container->getParameter('troubleticket.FCM_PATH'));
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}
