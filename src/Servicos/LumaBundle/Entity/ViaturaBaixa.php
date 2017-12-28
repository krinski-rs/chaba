<?php

namespace Servicos\LumaBundle\Entity;

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
     * @var string
     */
    private $baixaValor;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $baixaTipo;

    /**
     * @var \Servicos\LumaBundle\Entity\ViaturaQuilometragem
     */
    private $quilometragemRetorno;

    /**
     * @var \Servicos\LumaBundle\Entity\ViaturaQuilometragem
     */
    private $quilometragemSaida;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


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

    /**
     * Set baixaValor
     *
     * @param string $baixaValor
     * @return ViaturaBaixa
     */
    public function setBaixaValor($baixaValor)
    {
        $this->baixaValor = $baixaValor;

        return $this;
    }

    /**
     * Get baixaValor
     *
     * @return string 
     */
    public function getBaixaValor()
    {
        return $this->baixaValor;
    }

    /**
     * Set baixaTipo
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $baixaTipo
     * @return ViaturaBaixa
     */
    public function setBaixaTipo(\Servicos\LumaBundle\Entity\Tipo $baixaTipo = null)
    {
        $this->baixaTipo = $baixaTipo;

        return $this;
    }

    /**
     * Get baixaTipo
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getBaixaTipo()
    {
        return $this->baixaTipo;
    }

    /**
     * Set quilometragemRetorno
     *
     * @param \Servicos\LumaBundle\Entity\ViaturaQuilometragem $quilometragemRetorno
     * @return ViaturaBaixa
     */
    public function setQuilometragemRetorno(\Servicos\LumaBundle\Entity\ViaturaQuilometragem $quilometragemRetorno = null)
    {
        $this->quilometragemRetorno = $quilometragemRetorno;

        return $this;
    }

    /**
     * Get quilometragemRetorno
     *
     * @return \Servicos\LumaBundle\Entity\ViaturaQuilometragem 
     */
    public function getQuilometragemRetorno()
    {
        return $this->quilometragemRetorno;
    }

    /**
     * Set quilometragemSaida
     *
     * @param \Servicos\LumaBundle\Entity\ViaturaQuilometragem $quilometragemSaida
     * @return ViaturaBaixa
     */
    public function setQuilometragemSaida(\Servicos\LumaBundle\Entity\ViaturaQuilometragem $quilometragemSaida = null)
    {
        $this->quilometragemSaida = $quilometragemSaida;

        return $this;
    }

    /**
     * Get quilometragemSaida
     *
     * @return \Servicos\LumaBundle\Entity\ViaturaQuilometragem 
     */
    public function getQuilometragemSaida()
    {
        return $this->quilometragemSaida;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaBaixa
     */
    public function setViaturaid(\Servicos\LumaBundle\Entity\Viatura $viaturaid = null)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }
}
