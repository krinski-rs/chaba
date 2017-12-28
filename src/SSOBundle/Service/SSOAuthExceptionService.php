<?php

namespace SSOBundle\Service;

use Symfony\Component\DependencyInjection\Container;

class SSOAuthExceptionService 
{

	private $container;
	private $exceptionsConfig;

	public function __construct(Container $container) 
	{
		$this->container = $container;
		$vogelConfig = $container->getParameter("vogel_sso");
		$this->exceptionsConfig = $vogelConfig['auth_exceptions'];
	}

	public function allowUnauthorizedAccess($ip, $route)
	{
		$routes = $this->getIpRoutes($ip);
		if ($routes) {
			if (is_array($routes)) {
				return in_array($route, $routes);
			} else {
				return (($routes == '*') || ($routes == $route));
			}
		}
		return false;
	}

	public function getIpRoutes($ip)
	{
		foreach ($this->exceptionsConfig as $sytem) {
			if (in_array($ip, $sytem['ips'])) {
				return $sytem['routes'];
			}
		}
		return false;
	}

}
