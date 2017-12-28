<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepLogradouros
 */
class CepLogradouros
{
    /**
     * @var integer
     */
    private $idlogradouros;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var integer
     */
    private $idlocalidades;

    /**
     * @var string
     */
    private $logradouro;

    /**
     * @var integer
     */
    private $idbairrosinicial;

    /**
     * @var integer
     */
    private $idbairrosfinal;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $cepespecial;


    /**
     * Get idlogradouros
     *
     * @return integer 
     */
    public function getIdlogradouros()
    {
        return $this->idlogradouros;
    }

    /**
     * Set uf
     *
     * @param string $uf
     * @return CepLogradouros
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string 
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set idlocalidades
     *
     * @param integer $idlocalidades
     * @return CepLogradouros
     */
    public function setIdlocalidades($idlocalidades)
    {
        $this->idlocalidades = $idlocalidades;

        return $this;
    }

    /**
     * Get idlocalidades
     *
     * @return integer 
     */
    public function getIdlocalidades()
    {
        return $this->idlocalidades;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     * @return CepLogradouros
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro
     *
     * @return string 
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set idbairrosinicial
     *
     * @param integer $idbairrosinicial
     * @return CepLogradouros
     */
    public function setIdbairrosinicial($idbairrosinicial)
    {
        $this->idbairrosinicial = $idbairrosinicial;

        return $this;
    }

    /**
     * Get idbairrosinicial
     *
     * @return integer 
     */
    public function getIdbairrosinicial()
    {
        return $this->idbairrosinicial;
    }

    /**
     * Set idbairrosfinal
     *
     * @param integer $idbairrosfinal
     * @return CepLogradouros
     */
    public function setIdbairrosfinal($idbairrosfinal)
    {
        $this->idbairrosfinal = $idbairrosfinal;

        return $this;
    }

    /**
     * Get idbairrosfinal
     *
     * @return integer 
     */
    public function getIdbairrosfinal()
    {
        return $this->idbairrosfinal;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return CepLogradouros
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return CepLogradouros
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return CepLogradouros
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
     * Set status
     *
     * @param string $status
     * @return CepLogradouros
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set cepespecial
     *
     * @param string $cepespecial
     * @return CepLogradouros
     */
    public function setCepespecial($cepespecial)
    {
        $this->cepespecial = $cepespecial;

        return $this;
    }

    /**
     * Get cepespecial
     *
     * @return string 
     */
    public function getCepespecial()
    {
        return $this->cepespecial;
    }
}
