<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impressora
 */
class Impressora
{
    /**
     * @var integer
     */
    private $impressoraId;

    /**
     * @var integer
     */
    private $unidCodigoid;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $fila;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var string
     */
    private $localizacao;


    /**
     * Get impressoraId
     *
     * @return integer 
     */
    public function getImpressoraId()
    {
        return $this->impressoraId;
    }

    /**
     * Set unidCodigoid
     *
     * @param integer $unidCodigoid
     * @return Impressora
     */
    public function setUnidCodigoid($unidCodigoid)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return integer 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Impressora
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Impressora
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Impressora
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fila
     *
     * @param string $fila
     * @return Impressora
     */
    public function setFila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get fila
     *
     * @return string 
     */
    public function getFila()
    {
        return $this->fila;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Impressora
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Impressora
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set localizacao
     *
     * @param string $localizacao
     * @return Impressora
     */
    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;

        return $this;
    }

    /**
     * Get localizacao
     *
     * @return string 
     */
    public function getLocalizacao()
    {
        return $this->localizacao;
    }
}
