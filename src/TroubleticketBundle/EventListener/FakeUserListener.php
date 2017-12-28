<?php

namespace TroubleticketBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

use TroubleticketBundle\Service;

/**
 * Classe para permitir o desenvolvimento, pois existe uma dependencia de uma sessão que este módulo não tem
 * conhecimento
 */
class FakeUserListener
{
    /**
     * Método que realiza o tratamento de usuários FAKE quando passado atributo fake_user na requisição
     *
     * Exemplo: ba/fila?fake_user=gerente
     *
     * @param GetResponseEvent $event
     * @access public
     * @return null
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $user = $request->get('fake_user');
        $session = $request->getSession();

        switch ($user) {
            case 'sn1':
                $_SESSION['usr_codigoid'] = 455;
                break;
            case 'sn2':
                $_SESSION['usr_codigoid'] = 324;
                break;
            case 'gerente_noc':
                $_SESSION['usr_codigoid'] = 332;
                break;
            case 'supervisor_noc':
                $_SESSION['usr_codigoid'] = 456;
                break;
             case 'tecnico_coc':
                $_SESSION['usr_codigoid'] = 471;
                break;
              case 'supervisor_coc':
                $_SESSION['usr_codigoid'] = 474;
                break;
        }
    }
}
