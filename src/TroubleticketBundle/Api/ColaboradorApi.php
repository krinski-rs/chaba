<?php

namespace TroubleticketBundle\Api;

use \Exception as Exception;
use TroubleticketBundle\Exception\TroubleticketBundleException;

/**
 * Classe para obtenção de dados da Api de colaboradores do Sistech
 */
class ColaboradorApi extends SistechApi
{
    /**
     * {@inheritDoc}
     */
    protected $url_path = 'colaborador';


    /**
     * Obtem os dados de colabores
     *
     * @param int $limit
     * @param int $offset
     * @param string $username
     * @param string $nome
     * @param mixed $colaborador
     * @param mixed $departamento
     * @param integer ativo
     * @access public
     * @return \StdClass
     */
    public function get($limit = null,$offset = 0,$username = null,$nome = null,$colaborador = null, $departamento = null, $ativo = null) {
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
                    'username' => $username,
                    'nome' => $nome,
                    'colaborador' => $colaborador,
                    'departamento' => $departamento,
                    'ativo' => $ativo
                )
            );

        } catch (\Exception $e) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {

            throw new TroubleticketBundleException('Ocorreu um erro ao obter os dados de colaboradores!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O retorno da consulta de colaboradores foi inválido!');
        }

        return $response_json_decode->resources;
    }

    /**
     * Obtem uma lista de colaboradores através de seus ID's
     *
     * @param array $ids
     * @access public
     * @return \StdClass
     */
    public function getByIds(array $ids)
    {
        try {
            $response = $this->doRequest(
                $this->getUrlBase() . $this->getUrlPath(),
                'GET',
                array(
                    'colaborador' => json_encode(array_values($ids)),
                )
            );
        } catch (\Exception $e) {
            $response = null;
        }

        if (empty($response) || $response->getStatusCode() != 200) {
            throw new TroubleticketBundleException('Ocorreu um erro ao obter os dados de colaboradores!');
        }

        $response_json_decode = json_decode($response->getContent());
        if (is_null($response_json_decode)) {
            throw new TroubleticketBundleException('O retorno da consulta de colaboradores foi inválido!');
        }
        return $response_json_decode->resources;
    }

    /**
     * {@inheritDoc}
     */
    protected function getOriginalPath()
    {
        return 'colaborador';
    }
}
