<?php
namespace TroubleticketBundle\Api;

use TroubleticketBundle\Exception\TroubleticketBundleException;

/*
 * 
 */
class IntegracaoToaApi extends ToaApi
{
	
	public function createActivity(array $params)
	{
		
		try{
			$response = $this->doRequest($this->getUrlBase(),'POST',$params);
		}catch (TroubleticketBundleException $ex){
			$response = $ex->getMessage();
		}
		if(empty($response) || !($response->getStatusCode() == 201 || $response->getStatusCode() == 200) ){
			$this->log('error', 'Falha na comunicação com o TOA. <br/>Url chamada: '
					.$this->getUrlBase()
					.'Parâmetros passados: '.json_encode($params)
					.'<br/>Corpo da resposta: '
					.$response->getContent());
			throw new TroubleticketBundleException('Não foi possível abrir o SubCaso.'.$response);
		}

		return $response;
	}
	
	public function getRegionalInfo($url,$params)
	{
		try{
		    $response = $this->doRequest($url,'GET',$params);
		}catch(TroubleticketBundleException $ex){
			if(empty($response) || $response->getStatusCode() != 200){
					$this->log('error', 'Falha na comunicação com o TOA. <br/>Url chamada: '
							.$this->getUrlBase()
							.'Parâmetros passados: '.json_encode($params)
							.'<br/>Corpo da resposta: '
							.$response->getContent());
					throw new TroubleticketBundleException('Não foi possível abrir o SubCaso.'.$ex->getMessage());
			}
		}
		
		return $response;
	}		
	
}