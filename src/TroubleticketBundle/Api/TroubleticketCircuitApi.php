<?php

namespace TroubleticketBundle\Api;

use Exception;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Class para obtenção dos dados da Api de circuitos do Sistec
 */
class TroubleticketCircuitApi extends SistechApi
{
    /**
     * {@inheritDoc}
     */
    protected $url_path = 'circuito';

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
    public function get($limit = null,$offset = 0,$cid = null,$designador = null,$circ = null, $active = false, $searchClient = null)
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
                    'designador' => $designador,
                    'circ' => $circ,
                    'ativos' => $active,
                    'pesquisaCliente' => $searchClient
                )
            );

        } catch (Exception $e) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {

            throw new TroubleticketBundleException('Não foi possível obter dados de circuitos!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O resultado da consulta de circuitos foi inválido!');
        }

        return $response_json_decode->resources;
    }

    /**
     * Get All pages
     *
     * @param array $params  Conditions to get circuits
     * @param array $options
     * @access public
     * @return array
     */
    public function getAll(array $params, array $options = array())
    {
        $defaultOptions = array(
            'limit' => 50,
        );
        $options = array_merge($defaultOptions, $options);

        // force to prevent user definitions
        $options['offset'] = 0;

        $data = $this->getPage($params, $options);
        $total = $data->resources->total;

        $result = $data->resources->circuito;

        $offset = $options['limit'];
        while ($offset < $total) {
            $options['offset'] = $offset;
            $data = $this->getPage($params, $options);
            $result = array_merge($result, $data->resources->circuito);

            $offset += $options['limit'];
        }

        return $result;

    }

    /**
     * Obtem uma página de resultados da api
     *
     * @param array $params
     * @param array $options
     * @access protected
     * @return \StdClass
     */
    protected function getPage(array $params, array $options)
    {
        $params = array_merge($params, $options);

        try {
            $response = $this->doRequest(
                $this->getUrlBase() . $this->getUrlPath(),
                'GET',
                $params
            );

        } catch (Exception $e) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {

            throw new TroubleticketBundleException('Não foi possível obter dados de circuitos!');
        }

        $data = json_decode($response->getContent());
        if (is_null($data)) {
            throw new TroubleticketBundleException('O resultado da consulta de circuitos foi inválido!');
        }

        return $data;

    }

    /**
     * {@inheritDoc}
     */
    protected function getOriginalPath()
    {
        return 'circuito';
    }
}
