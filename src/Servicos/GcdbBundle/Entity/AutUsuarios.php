<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutUsuarios
 */
class AutUsuarios
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $ativo;

    /**
     * @var boolean
     */
    private $canal;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autPermissoes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autUsuariosHasGrupos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autPermissoes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->autUsuariosHasGrupos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return AutUsuarios
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return AutUsuarios
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return AutUsuarios
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
     * Set ativo
     *
     * @param integer $ativo
     * @return AutUsuarios
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set canal
     *
     * @param boolean canal
     * @return AutUsuarios
     */
    public function setCanal($canal)
    {
        $this->canal = $canal;

        return $this;
    }

    /**
     * Get canal
     *
     * @return boolean 
     */
    public function getCanal()
    {
        return $this->canal;
    }

    /**
     * Add autPermissoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes
     * @return AutUsuarios
     */
    public function addAutPermissoes(\Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes)
    {
        $this->autPermissoes[] = $autPermissoes;

        return $this;
    }

    /**
     * Remove autPermissoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes
     */
    public function removeAutPermissoes(\Servicos\GcdbBundle\Entity\AutPermissoes $autPermissoes)
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

    /**
     * Add autUsuariosHasGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos
     * @return AutUsuarios
     */
    public function addAutUsuariosHasGrupos(\Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos)
    {
        $this->autUsuariosHasGrupos[] = $autUsuariosHasGrupos;

        return $this;
    }

    /**
     * Remove autUsuariosHasGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos
     */
    public function removeAutUsuariosHasGrupos(\Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos)
    {
        $this->autUsuariosHasGrupos->removeElement($autUsuariosHasGrupos);
    }

    /**
     * Get autUsuariosHasGrupos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutUsuariosHasGrupos()
    {
        return $this->autUsuariosHasGrupos;
    }

    public function getFullName()
    {
        return $this->getNome();
    }
}
