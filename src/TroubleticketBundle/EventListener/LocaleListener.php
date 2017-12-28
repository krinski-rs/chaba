<?php

namespace TroubleticketBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Classe para forçar o locale para pt_BR
 */
class LocaleListener
{
    /**
     * Método que força o locale para todas as requisições
     *
     * @param GetResponseEvent $event
     * @access public
     * @return null
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $locale = 'pt_BR';
        $request = $event->getRequest();

        // some logic to determine the $locale
        $request->setLocale($locale);
    }
}
