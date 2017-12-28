<?php 

namespace SSOBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SSOAuthEventListener
{
	private $container;
	private $ssoClient;
	private $ssoAuth;
	private $cors;
	private $authExceptionService;

	public function __construct(Container $container) 
	{
		$this->container = $container;
		$this->cors = $container->getParameter('cors');
	}

	public function onKernelRequest(GetResponseEvent $event)
    {	
        if ($event->getRequestType() !== HttpKernel::MASTER_REQUEST) {
            return;
        }
        $session = $event->getRequest()->getSession();
        if(!$session->isStarted()){
            $session->start();
        }
        
        $this->loadServices();

        $allowAccess = $this->authExceptionService
        					->allowUnauthorizedAccess(
        						$_SERVER['REMOTE_ADDR'], 
        						$event->getRequest()->get('_route')
        					);
        if ($allowAccess || $this->ssoAuth->isLoggedIn()) {
        	return;
        }

        $logger = $this->container->get('logger');
        
        try {
	  		$token = $this->ssoAuth->getAuthCookieValue();
	  		if ($token) {
	  			$data = $this->ssoClient->getUserData($token);
	  			if ($data['status'] && $this->ssoAuth->authenticate($data['userdata'])) {
	  				return;
	  			}
	  		} 
	  		throw new \Exception('Não foi possível realizar a autenticação');
  		} catch (\Exception $e) {
        	$logger = $this->container->get('logger');
            $logger->error($e->getMessage());
            $logger->error($e->getTraceAsString());
            $this->setRedirectToLoginResponse($event);
        }
    }

	private function loadServices()
	{
		$this->authExceptionService = $this->container->get('SSOBundle.authExceptions');
		$this->ssoClient 			= $this->container->get('SSOBundle.client');
		$this->ssoAuth   			= $this->container->get('SSOBundle.auth');
	}

	private function setRedirectToLoginResponse($event)
	{	$request = Request::createFromGlobals();
		if ($request->isXmlHttpRequest() ) {
			$data = array("msg" => "Você precisa estar logado para realizar esta ação");
			$response = new JsonResponse($data, 403);
		} else {
			$response = new RedirectResponse('https://redecolaborativa.vogeltelecom.com', 302);
		}
		$event->setResponse($response);	
	}


    public function onKernelResponse(FilterResponseEvent $event)
    {
        $logger = $this->container->get('logger');
        $logger->info('onKernelResponse', array( new \DateTime() ) );
        // if (!$event->isMasterRequest()) {
        //        return;
        // }

        if (isset($this->cors['allowed_origin']) && !empty($this->cors['allowed_origin'])) {
            $response = $event->getResponse();
            $response->headers->set('Access-Control-Allow-Origin', $this->cors['allowed_origin']);
             $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, OPTIONS');
             $response->headers->set('Access-Control-Allow-Credentials', 'true');

            if (isset($this->cors['allowed_headers']) && ! empty($this->cors['allowed_headers'])) {
                $response->headers->set('Access-Control-Allow-Headers', implode(',', $this->cors['allowed_headers']));
            }
        }
    }
} 