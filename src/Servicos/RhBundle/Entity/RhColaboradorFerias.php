<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorFerias
 */
class RhColaboradorFerias
{
    /**
     * @var integer
     */
    private $idColaboradorFerias;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataFinal;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;


    /**
     * Get idColaboradorFerias
     *
     * @return integer 
     */
    public function getIdColaboradorFerias()
    {
        return $this->idColaboradorFerias;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorFerias
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
     * Set dataInicial
     *
     * @param \DateTime $dataInicial
     * @return RhColaboradorFerias
     */
    public function setDataInicial($dataInicial)
    {
        $this->dataInicial = $dataInicial;

        return $this;
    }

    /**
     * Get dataInicial
     *
     * @return \DateTime 
     */
    public function getDataInicial()
    {
        return $this->dataInicial;
    }

    /**
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return RhColaboradorFerias
     */
    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;

        return $this;
    }

    /**
     * Get dataFinal
     *
     * @return \DateTime 
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorFerias
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhColaboradorFerias
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
}
