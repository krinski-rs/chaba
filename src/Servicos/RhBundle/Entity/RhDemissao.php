<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDemissao
 */
class RhDemissao
{
    /**
     * @var integer
     */
    private $idDemissao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataDemissao;

    /**
     * @var boolean
     */
    private $pendencia;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;


    /**
     * Get idDemissao
     *
     * @return integer 
     */
    public function getIdDemissao()
    {
        return $this->idDemissao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhDemissao
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhDemissao
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
     * Set dataDemissao
     *
     * @param \DateTime $dataDemissao
     * @return RhDemissao
     */
    public function setDataDemissao($dataDemissao)
    {
        $this->dataDemissao = $dataDemissao;

        return $this;
    }

    /**
     * Get dataDemissao
     *
     * @return \DateTime 
     */
    public function getDataDemissao()
    {
        return $this->dataDemissao;
    }

    /**
     * Set pendencia
     *
     * @param boolean $pendencia
     * @return RhDemissao
     */
    public function setPendencia($pendencia)
    {
        $this->pendencia = $pendencia;

        return $this;
    }

    /**
     * Get pendencia
     *
     * @return boolean 
     */
    public function getPendencia()
    {
        return $this->pendencia;
    }

    /**
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhDemissao
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
