<?php

namespace TroubleticketBundle\Api;

use Exception;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Class para obtenção dos dados da Api de informações de circuitos do Sistech
 */
class TroubleticketCircuitInfoApi extends SistechApi
{
    /**
     * {@inheritDoc}
     */
    protected $url_path = 'circuito/info';

    /**
     * Obtem os dados de circuitos
     *
     * @param int $limit
     * @param int $offset
     * @param mixed $cid
     * @param mixed $designador
     * @param mixed $circ
     * @access public
     * @return \StdClass
     */
    public function get($circuitId)
    {
        try {
            $response = $this->doRequest(
                $this->getUrlBase() . $this->getUrlPath().'/'.$circuitId,
                'GET'
            );

        } catch (Exception $e) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {
            throw new TroubleticketBundleException('Não foi possível obter as informações do circuitos!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O resultado da consulta de informações de circuitos foi inválido!');
        }

        return $response_json_decode;
    }

    /**
     * {@inheritDoc}
     */
    protected function getOriginalPath()
    {
        return 'circuito/info';
    }
}
