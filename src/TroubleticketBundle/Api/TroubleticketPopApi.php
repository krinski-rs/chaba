<?php

namespace TroubleticketBundle\Api;

use \Exception as Exception;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Classe que realiza a comunicação com a api de pop do Sistech
 */
class TroubleticketPopApi extends SistechApi
{
    /**
     * {@inheritDoc}
     */
    protected $url_path = 'pop';


    /**
     * Obtem os dados de pop
     *
     * @param int $limit
     * @param int $offset
     * @param mixed $id
     * @access public
     * @return \StdClass
     */
    public function get($limit = null, $offset = 0, $id = null)
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
                    'id' => $id,
                )
            );

        } catch (Exception $error) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {
            throw new TroubleticketBundleException('Não foi possível obter os dados de pop!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O retorno da consultar de pop foi inválido!');
        }

        return $response_json_decode->resources;
    }

    /**
     * {@inheritDoc}
     */
    protected function getOriginalPath()
    {
        return 'pop';
    }
}
