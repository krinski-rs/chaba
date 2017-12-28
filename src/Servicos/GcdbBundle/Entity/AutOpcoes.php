<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutOpcoes
 */
class AutOpcoes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var boolean
     */
    private $visivel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autPermissoesGrupos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autPermissoes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autPermissoesGrupos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->autPermissoes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return AutOpcoes
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
     * Set descricao
     *
     * @param string $descricao
     * @return AutOpcoes
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
     * Set visivel
     *
     * @param boolean $visivel
     * @return AutOpcoes
     */
    public function setVisivel($visivel)
    {
        $this->visivel = $visivel;

        return $this;
    }

    /**
     * Get visivel
     *
     * @return boolean 
     */
    public function getVisivel()
    {
        return $this->visivel;
    }

    /**
     * Add autPermissoesGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoesGrupos $autPermissoesGrupos
     * @return AutOpcoes
     */
    public function addAutPermissoesGrupo(\Servicos\GcdbBundle\Entity\AutPermissoesGrupos $autPermissoesGrupos)
    {
        $this->autPermissoesGrupos[] = $autPermissoesGrupos;

        return $this;
    }

    /**
     * Remove autPermissoesGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoesGrupos $autPermissoesGrupos
     */
    public function removeAutPermissoesGrupo(\Servicos\GcdbBundle\Entity\AutPermissoesGrupos $autPermissoesGrupos)
    {
        $this->autPermissoesGrupos->removeElement($autPermissoesGrupos);
    }

    /**
     * Get autPermissoesGrupos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutPermissoesGrupos()
    {
        return $this->autPermissoesGrupos;
    }

    /**
     * Add autPermissoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes
     * @return AutOpcoes
     */
    public function addAutPermisso(\Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes)
    {
        $this->autPermissoes[] = $autPermissoes;

        return $this;
    }

    /**
     * Remove autPermissoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes
     */
    public function removeAutPermisso(\Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes)
    {
        $this->autPermissoes->removeElement($autPermissoes);
    }

    /**
     * Get autPermissoes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutPermissoes()
    {
        return $this->autPermissoes;
    }
}
