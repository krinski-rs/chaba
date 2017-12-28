<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documentos
 */
class Documentos
{
    /**
     * @var integer
     */
    private $documentoid;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $conteudo;

    /**
     * @var \DateTime
     */
    private $criacao;

    /**
     * @var integer
     */
    private $visitas;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\GcdbBundle\Entity\CategoriaDocumentos
     */
    private $categoriaid;


    /**
     * Get documentoid
     *
     * @return integer 
     */
    public function getDocumentoid()
    {
        return $this->documentoid;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Documentos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set conteudo
     *
     * @param string $conteudo
     * @return Documentos
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get conteudo
     *
     * @return string 
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set criacao
     *
     * @param \DateTime $criacao
     * @return Documentos
     */
    public function setCriacao($criacao)
    {
        $this->criacao = $criacao;

        return $this;
    }

    /**
     * Get criacao
     *
     * @return \DateTime 
     */
    public function getCriacao()
    {
        return $this->criacao;
    }

    /**
     * Set visitas
     *
     * @param integer $visitas
     * @return Documentos
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;

        return $this;
    }

    /**
     * Get visitas
     *
     * @return integer 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Documentos
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set categoriaid
     *
     * @param \Servicos\GcdbBundle\Entity\CategoriaDocumentos $categoriaid
     * @return Documentos
     */
    public function setCategoriaid(\Servicos\GcdbBundle\Entity\CategoriaDocumentos $categoriaid = null)
    {
        $this->categoriaid = $categoriaid;

        return $this;
    }

    /**
     * Get categoriaid
     *
     * @return \Servicos\GcdbBundle\Entity\CategoriaDocumentos 
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }
}
