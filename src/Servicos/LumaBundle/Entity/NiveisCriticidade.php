<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NiveisCriticidade
 */
class NiveisCriticidade
{
    /**
     * @var boolean
     */
    private $id;

    /**
     * @var string
     */
    private $nivel;

    /**
     * @var integer
     */
    private $tIniCom;

    /**
     * @var integer
     */
    private $tResCom;

    /**
     * @var integer
     */
    private $tIniExt;

    /**
     * @var integer
     */
    private $tResExt;

    /**
     * @var integer
     */
    private $status;


    /**
     * Get id
     *
     * @return boolean 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     * @return NiveisCriticidade
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set tIniCom
     *
     * @param integer $tIniCom
     * @return NiveisCriticidade
     */
    public function setTIniCom($tIniCom)
    {
        $this->tIniCom = $tIniCom;

        return $this;
    }

    /**
     * Get tIniCom
     *
     * @return integer 
     */
    public function getTIniCom()
    {
        return $this->tIniCom;
    }

    /**
     * Set tResCom
     *
     * @param integer $tResCom
     * @return NiveisCriticidade
     */
    public function setTResCom($tResCom)
    {
        $this->tResCom = $tResCom;

        return $this;
    }

    /**
     * Get tResCom
     *
     * @return integer 
     */
    public function getTResCom()
    {
        return $this->tResCom;
    }

    /**
     * Set tIniExt
     *
     * @param integer $tIniExt
     * @return NiveisCriticidade
     */
    public function setTIniExt($tIniExt)
    {
        $this->tIniExt = $tIniExt;

        return $this;
    }

    /**
     * Get tIniExt
     *
     * @return integer 
     */
    public function getTIniExt()
    {
        return $this->tIniExt;
    }

    /**
     * Set tResExt
     *
     * @param integer $tResExt
     * @return NiveisCriticidade
     */
    public function setTResExt($tResExt)
    {
        $this->tResExt = $tResExt;

        return $this;
    }

    /**
     * Get tResExt
     *
     * @return integer 
     */
    public function getTResExt()
    {
        return $this->tResExt;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return NiveisCriticidade
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
