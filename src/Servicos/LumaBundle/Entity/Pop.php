<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pop
 */
class Pop
{
    /**
     * @var integer
     */
    private $idPop;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $regionalResponsavel;

    /**
     * @var string
     */
    private $compartilhado;

    /**
     * @var string
     */
    private $processoAcesso;

    /**
     * @var string
     */
    private $contatoFaltaLuz;

    /**
     * @var string
     */
    private $anatelRegistro;

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
    private $gerador;

    /**
     * @var string
     */
    private $cag;

    /**
     * @var string
     */
    private $ativo;

    /**
     * @var string
     */
    private $ramal;

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
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $idPopLocalizacao;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $idBaterias;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $idConsumo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $idEstruturaFisica;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $idConcessionaria;

    public function __construct()
    {
        $this->idPopLocalizacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idBaterias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idConsumo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idEstruturaFisica = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idConcessionaria = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idPop
     *
     * @return integer 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Pop
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set regionalResponsavel
     *
     * @param string $regionalResponsavel
     * @return Pop
     */
    public function setRegionalResponsavel($regionalResponsavel)
    {
        $this->regionalResponsavel = $regionalResponsavel;

        return $this;
    }

    /**
     * Get regionalResponsavel
     *
     * @return string 
     */
    public function getRegionalResponsavel()
    {
        return $this->regionalResponsavel;
    }

    /**
     * Set compartilhado
     *
     * @param string $compartilhado
     * @return Pop
     */
    public function setCompartilhado($compartilhado)
    {
        $this->compartilhado = $compartilhado;

        return $this;
    }

    /**
     * Get compartilhado
     *
     * @return string 
     */
    public function getCompartilhado()
    {
        return $this->compartilhado;
    }

    /**
     * Set processoAcesso
     *
     * @param string $processoAcesso
     * @return Pop
     */
    public function setProcessoAcesso($processoAcesso)
    {
        $this->processoAcesso = $processoAcesso;

        return $this;
    }

    /**
     * Get processoAcesso
     *
     * @return string 
     */
    public function getProcessoAcesso()
    {
        return $this->processoAcesso;
    }

    /**
     * Set contatoFaltaLuz
     *
     * @param string $contatoFaltaLuz
     * @return Pop
     */
    public function setContatoFaltaLuz($contatoFaltaLuz)
    {
        $this->contatoFaltaLuz = $contatoFaltaLuz;

        return $this;
    }

    /**
     * Get contatoFaltaLuz
     *
     * @return string 
     */
    public function getContatoFaltaLuz()
    {
        return $this->contatoFaltaLuz;
    }

    /**
     * Set anatelRegistro
     *
     * @param string $anatelRegistro
     * @return Pop
     */
    public function setAnatelRegistro($anatelRegistro)
    {
        $this->anatelRegistro = $anatelRegistro;

        return $this;
    }

    /**
     * Get anatelRegistro
     *
     * @return string 
     */
    public function getAnatelRegistro()
    {
        return $this->anatelRegistro;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Pop
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
     * @return Pop
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
     * @return Pop
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
     * Set gerador
     *
     * @param string $gerador
     * @return Pop
     */
    public function setGerador($gerador)
    {
        $this->gerador = $gerador;

        return $this;
    }

    /**
     * Get gerador
     *
     * @return string 
     */
    public function getGerador()
    {
        return $this->gerador;
    }

    /**
     * Set cag
     *
     * @param string $cag
     * @return Pop
     */
    public function setCag($cag)
    {
        $this->cag = $cag;

        return $this;
    }

    /**
     * Get cag
     *
     * @return string 
     */
    public function getCag()
    {
        return $this->cag;
    }

    /**
     * Set ativo
     *
     * @param string $ativo
     * @return Pop
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return string 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set ramal
     *
     * @param string $ramal
     * @return Pop
     */
    public function setRamal($ramal)
    {
        $this->ramal = $ramal;

        return $this;
    }

    /**
     * Get ramal
     *
     * @return string 
     */
    public function getRamal()
    {
        return $this->ramal;
    }

    /**
     * Set usuarioAprovador
     *
     * @param string $usuarioAprovador
     * @return Pop
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
     * @return Pop
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
     * @return Pop
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
     * Add idPopLocalizacao
     *
     * @param Luma\Entity\Poprelacaolocalizacao $idPopLocalizacao
     * @return Pop
     */
    public function addPoprelacaolocalizacao(Poprelacaolocalizacao $idPopLocalizacao)
    {
        $this->idPopLocalizacao[] = $idPopLocalizacao;
        return $this;
    }

    /**
     * Get idPopLocalizacao
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdPopLocalizacao()
    {
        return $this->idPopLocalizacao;
    }

    /**
     * Add idBaterias
     *
     * @param Luma\Entity\Popbateria $idBaterias
     * @return Pop
     */
    public function addPopbateria(Popbateria $idBaterias)
    {
        $this->idBaterias[] = $idBaterias;
        return $this;
    }

    /**
     * Get idBaterias
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdBaterias()
    {
        return $this->idBaterias;
    }

    /**
     * Add idConsumo
     *
     * @param Luma\Entity\Popconsumo $idConsumo
     * @return Pop
     */
    public function addPopconsumo(Popconsumo $idConsumo)
    {
        $this->idConsumo[] = $idConsumo;
        return $this;
    }

    /**
     * Get idConsumo
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdConsumo()
    {
        return $this->idConsumo;
    }

    /**
     * Add idEstruturaFisica
     *
     * @param Luma\Entity\Popestruturafisica $idEstruturaFisica
     * @return Pop
     */
    public function addPopestruturafisica(Popestruturafisica $idEstruturaFisica)
    {
        $this->idEstruturaFisica[] = $idEstruturaFisica;
        return $this;
    }

    /**
     * Get idEstruturaFisica
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdEstruturaFisica()
    {
        return $this->idEstruturaFisica;
    }

    /**
     * Add idConcessionaria
     *
     * @param Luma\Entity\Popconcessionaria $idConcessionaria
     * @return Pop
     */
    public function addPopconcessionaria(Popconcessionaria $idConcessionaria)
    {
        $this->idConcessionaria[] = $idConcessionaria;
        return $this;
    }

    /**
     * Get idConcessionaria
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdConcessionaria()
    {
        return $this->idConcessionaria;
    }
}
