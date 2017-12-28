<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersTelefone
 */
class CadUsersTelefone
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $ddi;

    /**
     * @var string
     */
    private $ddd;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var integer
     */
    private $ramal;

    /**
     * @var boolean
     */
    private $principal;

    /**
     * @var boolean
     */
    private $emergencia;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoTelefone
     */
    private $admTiposTelefone;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;


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
     * Set ddi
     *
     * @param integer $ddi
     * @return CadUsersTelefone
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;

        return $this;
    }

    /**
     * Get ddi
     *
     * @return integer 
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * Set ddd
     *
     * @param string $ddd
     * @return CadUsersTelefone
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;

        return $this;
    }

    /**
     * Get ddd
     *
     * @return string 
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return CadUsersTelefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set ramal
     *
     * @param integer $ramal
     * @return CadUsersTelefone
     */
    public function setRamal($ramal)
    {
        $this->ramal = $ramal;

        return $this;
    }

    /**
     * Get ramal
     *
     * @return integer 
     */
    public function getRamal()
    {
        return $this->ramal;
    }

    /**
     * Set principal
     *
     * @param boolean $principal
     * @return CadUsersTelefone
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean 
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set emergencia
     *
     * @param boolean $emergencia
     * @return CadUsersTelefone
     */
    public function setEmergencia($emergencia)
    {
        $this->emergencia = $emergencia;

        return $this;
    }

    /**
     * Get emergencia
     *
     * @return boolean 
     */
    public function getEmergencia()
    {
        return $this->emergencia;
    }

    /**
     * Set admTiposTelefone
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoTelefone $admTiposTelefone
     * @return CadUsersTelefone
     */
    public function setAdmTiposTelefone(\Servicos\GcdbBundle\Entity\AdmTipoTelefone $admTiposTelefone = null)
    {
        $this->admTiposTelefone = $admTiposTelefone;

        return $this;
    }

    /**
     * Get admTiposTelefone
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoTelefone 
     */
    public function getAdmTiposTelefone()
    {
        return $this->admTiposTelefone;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return CadUsersTelefone
     */
    public function setCadUsers(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers = null)
    {
        $this->cadUsers = $cadUsers;

        return $this;
    }

    /**
     * Get cadUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers()
    {
        return $this->cadUsers;
    }
}
