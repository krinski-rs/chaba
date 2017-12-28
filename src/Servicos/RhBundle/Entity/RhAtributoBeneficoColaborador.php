<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhAtributoBeneficoColaborador
 */
class RhAtributoBeneficoColaborador
{
    /**
     * @var integer
     */
    private $idAtributoBeneficoColaborador;

    /**
     * @var integer
     */
    private $idColaboradorBeneficio;

    /**
     * @var integer
     */
    private $idBeneficioAtributo;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var string
     */
    private $valorDecimal;

    /**
     * @var \DateTime
     */
    private $valorData;


    /**
     * Get idAtributoBeneficoColaborador
     *
     * @return integer 
     */
    public function getIdAtributoBeneficoColaborador()
    {
        return $this->idAtributoBeneficoColaborador;
    }

    /**
     * Set idColaboradorBeneficio
     *
     * @param integer $idColaboradorBeneficio
     * @return RhAtributoBeneficoColaborador
     */
    public function setIdColaboradorBeneficio($idColaboradorBeneficio)
    {
        $this->idColaboradorBeneficio = $idColaboradorBeneficio;

        return $this;
    }

    /**
     * Get idColaboradorBeneficio
     *
     * @return integer 
     */
    public function getIdColaboradorBeneficio()
    {
        return $this->idColaboradorBeneficio;
    }

    /**
     * Set idBeneficioAtributo
     *
     * @param integer $idBeneficioAtributo
     * @return RhAtributoBeneficoColaborador
     */
    public function setIdBeneficioAtributo($idBeneficioAtributo)
    {
        $this->idBeneficioAtributo = $idBeneficioAtributo;

        return $this;
    }

    /**
     * Get idBeneficioAtributo
     *
     * @return integer 
     */
    public function getIdBeneficioAtributo()
    {
        return $this->idBeneficioAtributo;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return RhAtributoBeneficoColaborador
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set valorDecimal
     *
     * @param string $valorDecimal
     * @return RhAtributoBeneficoColaborador
     */
    public function setValorDecimal($valorDecimal)
    {
        $this->valorDecimal = $valorDecimal;

        return $this;
    }

    /**
     * Get valorDecimal
     *
     * @return string 
     */
    public function getValorDecimal()
    {
        return $this->valorDecimal;
    }

    /**
     * Set valorData
     *
     * @param \DateTime $valorData
     * @return RhAtributoBeneficoColaborador
     */
    public function setValorData($valorData)
    {
        $this->valorData = $valorData;

        return $this;
    }

    /**
     * Get valorData
     *
     * @return \DateTime 
     */
    public function getValorData()
    {
        return $this->valorData;
    }
}
