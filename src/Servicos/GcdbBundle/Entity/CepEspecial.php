<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepEspecial
 */
class CepEspecial
{
    /**
     * @var integer
     */
    private $idcepespecial;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var integer
     */
    private $idlocalidades;

    /**
     * @var integer
     */
    private $idlogradouros;

    /**
     * @var integer
     */
    private $idbairros;

    /**
     * @var string
     */
    private $cliente;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $endereco;


    /**
     * Get idcepespecial
     *
     * @return integer 
     */
    public function getIdcepespecial()
    {
        return $this->idcepespecial;
    }

    /**
     * Set uf
     *
     * @param string $uf
     * @return CepEspecial
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
     * @return CepEspecial
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
     * Set idlogradouros
     *
     * @param integer $idlogradouros
     * @return CepEspecial
     */
    public function setIdlogradouros($idlogradouros)
    {
        $this->idlogradouros = $idlogradouros;

        return $this;
    }

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
     * Set idbairros
     *
     * @param integer $idbairros
     * @return CepEspecial
     */
    public function setIdbairros($idbairros)
    {
        $this->idbairros = $idbairros;

        return $this;
    }

    /**
     * Get idbairros
     *
     * @return integer 
     */
    public function getIdbairros()
    {
        return $this->idbairros;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     * @return CepEspecial
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return CepEspecial
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
     * Set endereco
     *
     * @param string $endereco
     * @return CepEspecial
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }
}
