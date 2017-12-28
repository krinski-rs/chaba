<?php

namespace TroubleticketBundle\Api;

use \Exception as Exception;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Classe que realiza a comunicação com a api de clientes do Sistech
 */
class TroubleticketClientApi extends SistechApi
{
    /**
     * {@inheritDoc}
     */
    protected $url_path = 'cliente';


    /**
     * Obtem os dados de clientes
     *
     * @param int $limit
     * @param int $offset
     * @param mixed $cid
     * @param mixed $razao
     * @param mixed $client
     * @access public
     * @return \StdClass
     */
    public function get($limit = null, $offset = 0, $cid = null, $razao = null,$client = null)
    {
        $get_limit_base = $this->getLimit();

        if (empty($limit)) {
            if (!empty($get_limit_base)) {
                $limit = $get_limit_base;

            }
        }

        try {
            $response = $this->doRequest(
                $this->getUrlBase() . $this->getUrlPath(),
                'GET',
                array(
                    'limit' => $limit,
                    'offset' => $offset,
                    'cid' => $cid,
                    'razao' => $razao,
                    'cliente' => $client,
                )
            );

        } catch (Exception $error) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {
            throw new TroubleticketBundleException('Não foi possível obter os dados de clientes!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O retorno da consultar de clientes foi inválido!');
        }

        return $response_json_decode->resources;
    }

    /**
     * {@inheritDoc}
     */
    protected function getOriginalPath()
    {
        return 'cliente';
    }
}
