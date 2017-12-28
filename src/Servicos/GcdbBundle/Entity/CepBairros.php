<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepBairros
 */
class CepBairros
{
    /**
     * @var integer
     */
    private $idbairros;

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
    private $bairro;


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
     * Set uf
     *
     * @param string $uf
     * @return CepBairros
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
     * @return CepBairros
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
     * Set bairro
     *
     * @param string $bairro
     * @return CepBairros
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }
}
