<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaBaixa
 */
class ViaturaBaixa
{
    /**
     * @var integer
     */
    private $viatBaixaid;

    /**
     * @var integer
     */
    private $viaturaid;

    /**
     * @var integer
     */
    private $baixaCadUsuarioid;

    /**
     * @var string
     */
    private $baixaMotivo;

    /**
     * @var integer
     */
    private $baixaDestinoSistechid;

    /**
     * @var \DateTime
     */
    private $baixaDatainc;

    /**
     * @var \DateTime
     */
    private $baixaDataPrevista;

    /**
     * @var \DateTime
     */
    private $baixaDatafim;

    /**
     * @var boolean
     */
    private $baixaPermanente;

    /**
     * @var string
     */
    private $observacaoRetorno;

    /**
     * @var integer
     */
    private $baixaRetornoUsuarioid;


    /**
     * Get viatBaixaid
     *
     * @return integer 
     */
    public function getViatBaixaid()
    {
        return $this->viatBaixaid;
    }

    /**
     * Set viaturaid
     *
     * @param integer $viaturaid
     * @return ViaturaBaixa
     */
    public function setViaturaid($viaturaid)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return integer 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }

    /**
     * Set baixaCadUsuarioid
     *
     * @param integer $baixaCadUsuarioid
     * @return ViaturaBaixa
     */
    public function setBaixaCadUsuarioid($baixaCadUsuarioid)
    {
        $this->baixaCadUsuarioid = $baixaCadUsuarioid;

        return $this;
    }

    /**
     * Get baixaCadUsuarioid
     *
     * @return integer 
     */
    public function getBaixaCadUsuarioid()
    {
        return $this->baixaCadUsuarioid;
    }

    /**
     * Set baixaMotivo
     *
     * @param string $baixaMotivo
     * @return ViaturaBaixa
     */
    public function setBaixaMotivo($baixaMotivo)
    {
        $this->baixaMotivo = $baixaMotivo;

        return $this;
    }

    /**
     * Get baixaMotivo
     *
     * @return string 
     */
    public function getBaixaMotivo()
    {
        return $this->baixaMotivo;
    }

    /**
     * Set baixaDestinoSistechid
     *
     * @param integer $baixaDestinoSistechid
     * @return ViaturaBaixa
     */
    public function setBaixaDestinoSistechid($baixaDestinoSistechid)
    {
        $this->baixaDestinoSistechid = $baixaDestinoSistechid;

        return $this;
    }

    /**
     * Get baixaDestinoSistechid
     *
     * @return integer 
     */
    public function getBaixaDestinoSistechid()
    {
        return $this->baixaDestinoSistechid;
    }

    /**
     * Set baixaDatainc
     *
     * @param \DateTime $baixaDatainc
     * @return ViaturaBaixa
     */
    public function setBaixaDatainc($baixaDatainc)
    {
        $this->baixaDatainc = $baixaDatainc;

        return $this;
    }

    /**
     * Get baixaDatainc
     *
     * @return \DateTime 
     */
    public function getBaixaDatainc()
    {
        return $this->baixaDatainc;
    }

    /**
     * Set baixaDataPrevista
     *
     * @param \DateTime $baixaDataPrevista
     * @return ViaturaBaixa
     */
    public function setBaixaDataPrevista($baixaDataPrevista)
    {
        $this->baixaDataPrevista = $baixaDataPrevista;

        return $this;
    }

    /**
     * Get baixaDataPrevista
     *
     * @return \DateTime 
     */
    public function getBaixaDataPrevista()
    {
        return $this->baixaDataPrevista;
    }

    /**
     * Set baixaDatafim
     *
     * @param \DateTime $baixaDatafim
     * @return ViaturaBaixa
     */
    public function setBaixaDatafim($baixaDatafim)
    {
        $this->baixaDatafim = $baixaDatafim;

        return $this;
    }

    /**
     * Get baixaDatafim
     *
     * @return \DateTime 
     */
    public function getBaixaDatafim()
    {
        return $this->baixaDatafim;
    }

    /**
     * Set baixaPermanente
     *
     * @param boolean $baixaPermanente
     * @return ViaturaBaixa
     */
    public function setBaixaPermanente($baixaPermanente)
    {
        $this->baixaPermanente = $baixaPermanente;

        return $this;
    }

    /**
     * Get baixaPermanente
     *
     * @return boolean 
     */
    public function getBaixaPermanente()
    {
        return $this->baixaPermanente;
    }

    /**
     * Set observacaoRetorno
     *
     * @param string $observacaoRetorno
     * @return ViaturaBaixa
     */
    public function setObservacaoRetorno($observacaoRetorno)
    {
        $this->observacaoRetorno = $observacaoRetorno;

        return $this;
    }

    /**
     * Get observacaoRetorno
     *
     * @return string 
     */
    public function getObservacaoRetorno()
    {
        return $this->observacaoRetorno;
    }

    /**
     * Set baixaRetornoUsuarioid
     *
     * @param integer $baixaRetornoUsuarioid
     * @return ViaturaBaixa
     */
    public function setBaixaRetornoUsuarioid($baixaRetornoUsuarioid)
    {
        $this->baixaRetornoUsuarioid = $baixaRetornoUsuarioid;

        return $this;
    }

    /**
     * Get baixaRetornoUsuarioid
     *
     * @return integer 
     */
    public function getBaixaRetornoUsuarioid()
    {
        return $this->baixaRetornoUsuarioid;
    }
}
