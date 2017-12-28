<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadUsersTelefone
 */
class TempCadUsersTelefone
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadUsersId;

    /**
     * @var integer
     */
    private $admTiposTelefoneId;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cadUsersId
     *
     * @param integer $cadUsersId
     * @return TempCadUsersTelefone
     */
    public function setCadUsersId($cadUsersId)
    {
        $this->cadUsersId = $cadUsersId;

        return $this;
    }

    /**
     * Get cadUsersId
     *
     * @return integer 
     */
    public function getCadUsersId()
    {
        return $this->cadUsersId;
    }

    /**
     * Set admTiposTelefoneId
     *
     * @param integer $admTiposTelefoneId
     * @return TempCadUsersTelefone
     */
    public function setAdmTiposTelefoneId($admTiposTelefoneId)
    {
        $this->admTiposTelefoneId = $admTiposTelefoneId;

        return $this;
    }

    /**
     * Get admTiposTelefoneId
     *
     * @return integer 
     */
    public function getAdmTiposTelefoneId()
    {
        return $this->admTiposTelefoneId;
    }

    /**
     * Set ddi
     *
     * @param integer $ddi
     * @return TempCadUsersTelefone
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
     * @return TempCadUsersTelefone
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
     * @return TempCadUsersTelefone
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
     * @return TempCadUsersTelefone
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
     * @return TempCadUsersTelefone
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
     * @return TempCadUsersTelefone
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
}
