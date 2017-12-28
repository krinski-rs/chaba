<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popestruturafisica
 */
class Popestruturafisica
{
    /**
     * @var integer
     */
    private $idEstruturaFisica;

    /**
     * @var string
     */
    private $altura;

    /**
     * @var integer
     */
    private $andares;

    /**
     * @var string
     */
    private $abordagemfo;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $usuarioAprovador;

    /**
     * @var string
     */
    private $observacaoAprovador;

    /**
     * @var \DateTime
     */
    private $dataAprovador;

    /**
     * @var integer
     */
    private $feedEnergia;

    /**
     * @var integer
     */
    private $biometria;

    /**
     * @var integer
     */
    private $chavesAcesso;

    /**
     * @var integer
     */
    private $alcanceRadio;

    /**
     * @var integer
     */
    private $possuiRadio;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;

    /**
     * @var \Servicos\LumaBundle\Entity\Poptiporf
     */
    private $idTipoRf;

    /**
     * @var \Servicos\LumaBundle\Entity\Poptipoabrigo
     */
    private $idTipoAbrigo;


    /**
     * Get idEstruturaFisica
     *
     * @return integer 
     */
    public function getIdEstruturaFisica()
    {
        return $this->idEstruturaFisica;
    }

    /**
     * Set altura
     *
     * @param string $altura
     * @return Popestruturafisica
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get altura
     *
     * @return string 
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set andares
     *
     * @param integer $andares
     * @return Popestruturafisica
     */
    public function setAndares($andares)
    {
        $this->andares = $andares;

        return $this;
    }

    /**
     * Get andares
     *
     * @return integer 
     */
    public function getAndares()
    {
        return $this->andares;
    }

    /**
     * Set abordagemfo
     *
     * @param string $abordagemfo
     * @return Popestruturafisica
     */
    public function setAbordagemfo($abordagemfo)
    {
        $this->abordagemfo = $abordagemfo;

        return $this;
    }

    /**
     * Get abordagemfo
     *
     * @return string 
     */
    public function getAbordagemfo()
    {
        return $this->abordagemfo;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Popestruturafisica
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Popestruturafisica
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
     * Set usuario
     *
     * @param string $usuario
     * @return Popestruturafisica
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set usuarioAprovador
     *
     * @param string $usuarioAprovador
     * @return Popestruturafisica
     */
    public function setUsuarioAprovador($usuarioAprovador)
    {
        $this->usuarioAprovador = $usuarioAprovador;

        return $this;
    }

    /**
     * Get usuarioAprovador
     *
     * @return string 
     */
    public function getUsuarioAprovador()
    {
        return $this->usuarioAprovador;
    }

    /**
     * Set observacaoAprovador
     *
     * @param string $observacaoAprovador
     * @return Popestruturafisica
     */
    public function setObservacaoAprovador($observacaoAprovador)
    {
        $this->observacaoAprovador = $observacaoAprovador;

        return $this;
    }

    /**
     * Get observacaoAprovador
     *
     * @return string 
     */
    public function getObservacaoAprovador()
    {
        return $this->observacaoAprovador;
    }

    /**
     * Set dataAprovador
     *
     * @param \DateTime $dataAprovador
     * @return Popestruturafisica
     */
    public function setDataAprovador($dataAprovador)
    {
        $this->dataAprovador = $dataAprovador;

        return $this;
    }

    /**
     * Get dataAprovador
     *
     * @return \DateTime 
     */
    public function getDataAprovador()
    {
        return $this->dataAprovador;
    }

    /**
     * Set feedEnergia
     *
     * @param integer $feedEnergia
     * @return Popestruturafisica
     */
    public function setFeedEnergia($feedEnergia)
    {
        $this->feedEnergia = $feedEnergia;

        return $this;
    }

    /**
     * Get feedEnergia
     *
     * @return integer 
     */
    public function getFeedEnergia()
    {
        return $this->feedEnergia;
    }

    /**
     * Set biometria
     *
     * @param integer $biometria
     * @return Popestruturafisica
     */
    public function setBiometria($biometria)
    {
        $this->biometria = $biometria;

        return $this;
    }

    /**
     * Get biometria
     *
     * @return integer 
     */
    public function getBiometria()
    {
        return $this->biometria;
    }

    /**
     * Set chavesAcesso
     *
     * @param integer $chavesAcesso
     * @return Popestruturafisica
     */
    public function setChavesAcesso($chavesAcesso)
    {
        $this->chavesAcesso = $chavesAcesso;

        return $this;
    }

    /**
     * Get chavesAcesso
     *
     * @return integer 
     */
    public function getChavesAcesso()
    {
        return $this->chavesAcesso;
    }

    /**
     * Set alcanceRadio
     *
     * @param integer $alcanceRadio
     * @return Popestruturafisica
     */
    public function setAlcanceRadio($alcanceRadio)
    {
        $this->alcanceRadio = $alcanceRadio;

        return $this;
    }

    /**
     * Get alcanceRadio
     *
     * @return integer 
     */
    public function getAlcanceRadio()
    {
        return $this->alcanceRadio;
    }

    /**
     * Set possuiRadio
     *
     * @param integer $possuiRadio
     * @return Popestruturafisica
     */
    public function setPossuiRadio($possuiRadio)
    {
        $this->possuiRadio = $possuiRadio;

        return $this;
    }

    /**
     * Get possuiRadio
     *
     * @return integer 
     */
    public function getPossuiRadio()
    {
        return $this->possuiRadio;
    }

    /**
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return Popestruturafisica
     */
    public function setIdPop(\Servicos\LumaBundle\Entity\Pop $idPop = null)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return \Servicos\LumaBundle\Entity\Pop 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }

    /**
     * Set idTipoRf
     *
     * @param \Servicos\LumaBundle\Entity\Poptiporf $idTipoRf
     * @return Popestruturafisica
     */
    public function setIdTipoRf(\Servicos\LumaBundle\Entity\Poptiporf $idTipoRf = null)
    {
        $this->idTipoRf = $idTipoRf;

        return $this;
    }

    /**
     * Get idTipoRf
     *
     * @return \Servicos\LumaBundle\Entity\Poptiporf 
     */
    public function getIdTipoRf()
    {
        return $this->idTipoRf;
    }

    /**
     * Set idTipoAbrigo
     *
     * @param \Servicos\LumaBundle\Entity\Poptipoabrigo $idTipoAbrigo
     * @return Popestruturafisica
     */
    public function setIdTipoAbrigo(\Servicos\LumaBundle\Entity\Poptipoabrigo $idTipoAbrigo = null)
    {
        $this->idTipoAbrigo = $idTipoAbrigo;

        return $this;
    }

    /**
     * Get idTipoAbrigo
     *
     * @return \Servicos\LumaBundle\Entity\Poptipoabrigo 
     */
    public function getIdTipoAbrigo()
    {
        return $this->idTipoAbrigo;
    }
}
