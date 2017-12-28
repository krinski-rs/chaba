<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorFilial
 */
class RhColaboradorFilial
{
    /**
     * @var integer
     */
    private $idColaboradorFilial;

    /**
     * @var integer
     */
    private $sistechCodigoid;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataPrevista;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var string
     */
    private $motivoEdicao;


    /**
     * Get idColaboradorFilial
     *
     * @return integer 
     */
    public function getIdColaboradorFilial()
    {
        return $this->idColaboradorFilial;
    }

    /**
     * Set sistechCodigoid
     *
     * @param integer $sistechCodigoid
     * @return RhColaboradorFilial
     */
    public function setSistechCodigoid($sistechCodigoid)
    {
        $this->sistechCodigoid = $sistechCodigoid;

        return $this;
    }

    /**
     * Get sistechCodigoid
     *
     * @return integer 
     */
    public function getSistechCodigoid()
    {
        return $this->sistechCodigoid;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhColaboradorFilial
     */
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return integer 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhColaboradorFilial
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
     * Set dataPrevista
     *
     * @param \DateTime $dataPrevista
     * @return RhColaboradorFilial
     */
    public function setDataPrevista($dataPrevista)
    {
        $this->dataPrevista = $dataPrevista;

        return $this;
    }

    /**
     * Get dataPrevista
     *
     * @return \DateTime 
     */
    public function getDataPrevista()
    {
        return $this->dataPrevista;
    }

    /**
     * Set dataInicial
     *
     * @param \DateTime $dataInicial
     * @return RhColaboradorFilial
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorFilial
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
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return RhColaboradorFilial
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorFilial
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhColaboradorFilial
     */
    public function setRegistranteEdicao($registranteEdicao)
    {
        $this->registranteEdicao = $registranteEdicao;

        return $this;
    }

    /**
     * Get registranteEdicao
     *
     * @return integer 
     */
    public function getRegistranteEdicao()
    {
        return $this->registranteEdicao;
    }

    /**
     * Set motivoEdicao
     *
     * @param string $motivoEdicao
     * @return RhColaboradorFilial
     */
    public function setMotivoEdicao($motivoEdicao)
    {
        $this->motivoEdicao = $motivoEdicao;

        return $this;
    }

    /**
     * Get motivoEdicao
     *
     * @return string 
     */
    public function getMotivoEdicao()
    {
        return $this->motivoEdicao;
    }
}
