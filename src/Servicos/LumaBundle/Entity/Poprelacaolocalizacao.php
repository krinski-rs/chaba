<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poprelacaolocalizacao
 */
class Poprelacaolocalizacao
{
    /**
     * @var integer
     */
    private $idPopLocalizacao;

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
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;

    /**
     * @var \Servicos\LumaBundle\Entity\Poplocalizacao
     */
    private $idLocalizacao;

    /**
     * @var \Servicos\LumaBundle\Entity\Poptipolocalizacao
     */
    private $idTipo;


    /**
     * Get idPopLocalizacao
     *
     * @return integer 
     */
    public function getIdPopLocalizacao()
    {
        return $this->idPopLocalizacao;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Poprelacaolocalizacao
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
     * @return Poprelacaolocalizacao
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
     * @return Poprelacaolocalizacao
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
     * @return Poprelacaolocalizacao
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
     * @return Poprelacaolocalizacao
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
     * @return Poprelacaolocalizacao
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
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return Poprelacaolocalizacao
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
     * Set idLocalizacao
     *
     * @param \Servicos\LumaBundle\Entity\Poplocalizacao $idLocalizacao
     * @return Poprelacaolocalizacao
     */
    public function setIdLocalizacao(\Servicos\LumaBundle\Entity\Poplocalizacao $idLocalizacao = null)
    {
        $this->idLocalizacao = $idLocalizacao;

        return $this;
    }

    /**
     * Get idLocalizacao
     *
     * @return \Servicos\LumaBundle\Entity\Poplocalizacao 
     */
    public function getIdLocalizacao()
    {
        return $this->idLocalizacao;
    }

    /**
     * Set idTipo
     *
     * @param \Servicos\LumaBundle\Entity\Poptipolocalizacao $idTipo
     * @return Poprelacaolocalizacao
     */
    public function setIdTipo(\Servicos\LumaBundle\Entity\Poptipolocalizacao $idTipo = null)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return \Servicos\LumaBundle\Entity\Poptipolocalizacao 
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }
}
