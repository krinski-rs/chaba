<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorDepartamento
 */
class RhColaboradorDepartamento
{
    /**
     * @var integer
     */
    private $idColaboradorDepartamento;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $boss;

    /**
     * @var boolean $aprovadorSa
     */
    private $aprovadorSa;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;

    /**
     * @var \Servicos\RhBundle\Entity\RhDepartamento
     */
    private $idDepartamento;


    /**
     * @var \Servicos\RhBundle\Entity\RhDepartamento
     */
    private $idDepartamentoAsc;


    /**
     * Get idColaboradorDepartamento
     *
     * @return integer 
     */
    public function getIdColaboradorDepartamento()
    {
        return $this->idColaboradorDepartamento;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorDepartamento
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set boss
     *
     * @param boolean $boss
     * @return RhColaboradorDepartamento
     */
    public function setBoss($boss)
    {
        $this->boss = $boss;

        return $this;
    }

    /**
     * Get boss
     *
     * @return boolean 
     */
    public function getBoss()
    {
        return $this->boss;
    }

    /**
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhColaboradorDepartamento
     */
    public function setIdColaborador(\Servicos\RhBundle\Entity\RhColaborador $idColaborador = null)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return \Servicos\RhBundle\Entity\RhColaborador 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set idDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhDepartamento $idDepartamento
     * @return RhColaboradorDepartamento
     */
    public function setIdDepartamento(\Servicos\RhBundle\Entity\RhDepartamento $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \Servicos\RhBundle\Entity\RhDepartamento 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

     /**
     * Set aprovadorSa
     *
     * @param boolean $aprovadorSa
     * @return RhColaboradorDepartamento
     */
    public function setAprovadorSa($aprovadorSa)
    {
        $this->aprovadorSa = $aprovadorSa;
        return $this;
    }

    /**
     * Get aprovadorSa
     *
     * @return boolean
     */
    public function getAprovadorSa()
    {
        return $this->aprovadorSa;
    }


    /**
     * Set idDepartamentoAsc
     *
     * @param \Servicos\RhBundle\Entity\RhDepartamento $idDepartamento
     * @return RhColaboradorDepartamento
     */
    public function setIdDepartamentoAsc(\Servicos\RhBundle\Entity\RhDepartamento $idDepartamentoAsc = null)
    {
        $this->idDepartamentoAsc = $idDepartamentoAsc;

        return $this;
    }

    /**
     * Get idDepartamentoAsc
     *
     * @return \Servicos\RhBundle\Entity\RhDepartamento
     */
    public function getIdDepartamentoAsc()
    {
        return $this->idDepartamentoAsc;
    }
}
