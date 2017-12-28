<?php

namespace SSOBundle\Service;

use Symfony\Component\DependencyInjection\Container;

class SSOClientService
{

	private $endpoint;
	private $port;
	private $cookieName;
	private $client;
	private $appKey;
	private $authVersion;

	public function __construct(Container $container)
	{
		$data = $container->getParameter('vogel_sso');
		$this->endpoint = $data['endpoints']['userdata'];
		$this->port = $data['port'];
		$this->cookieName = $data['cookie_name'];
		$this->appKey = $data['appKey'];
		$this->authVersion = $data['authVersion'];
	}

	public function getUserData($cookieValue)
	{
		return $this->initClient($cookieValue)
				    ->sendRequest();
	}


	private function initClient($cookieValue)
	{
		$headers = array(
			'cookie: '.$this->cookieName.'='.$cookieValue,
			'AppKey: '.$this->appKey
		);
		$this->client = curl_init();
		curl_setopt($this->client, CURLOPT_URL, $this->endpoint);
		curl_setopt($this->client, CURLOPT_PORT, $this->port);
		curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
		$cookieHeader = 'cookie: '.$this->cookieName.'='.$cookieValue;
		$headers = $this->getHeaders();
		$headers[] = $cookieHeader;

		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($this->client, CURLOPT_TIMEOUT, 30);
		return $this;
	}

	private function getHeaders()
	{
		$headers = array();
		$headers[] = 'AppKey: '.$this->appKey;
		$headers[] = 'AuthVersion: '.$this->authVersion;
		return $headers;
	}

	private function sendRequest()
	{
		$response = curl_exec($this->client);
		$httpCode = curl_getinfo($this->client, CURLINFO_HTTP_CODE);
		$this->closeClient();
		return $this->parseResponse($response, $httpCode);
	}

	private function parseResponse($response, $status)
	{
		$data = array();
		$response = json_decode($response, true);
		if ($status == 0 || empty($response)) {
			$data['status'] = false;
			$data['msg'] = "Ocorreu um erro inesperado ao tentar conectar com o servidor";
		} else if ($status == 200) {
			$data['status'] = 1;
			$data['userdata'] = $response;
		} else {
			$data['status'] = 0;
			$data = array_merge($data, $response);
		}
		return $data;
	}

	private function closeClient()
	{
		curl_close($this->client);
	}
}
