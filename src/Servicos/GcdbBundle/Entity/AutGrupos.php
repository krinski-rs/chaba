<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutGrupos
 */
class AutGrupos
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autUsuariosHasGrupos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autPermissoesGrupos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autUsuariosHasGrupos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->autPermissoesGrupos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return AutGrupos
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
     * Add autUsuariosHasGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos
     * @return AutGrupos
     */
    public function addAutUsuariosHasGrupo(\Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos)
    {
        $this->autUsuariosHasGrupos[] = $autUsuariosHasGrupos;

        return $this;
    }

    /**
     * Remove autUsuariosHasGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos
     */
    public function removeAutUsuariosHasGrupo(\Servicos\GcdbBundle\Entity\AutUsuariosHasGrupos $autUsuariosHasGrupos)
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

    /**
     * Add autPermissoesGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutPermissoesGrupos $autPermissoesGrupos
     * @return AutGrupos
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
}
