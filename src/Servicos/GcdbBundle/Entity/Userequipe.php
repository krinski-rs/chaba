<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userequipe
 */
class Userequipe
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $tipo;

    /**
     * @var integer
     */
    private $fkUserid;

    /**
     * @var integer
     */
    private $fkEquipeid;

    /**
     * @var \DateTime
     */
    private $dataAdd;

    /**
     * @var \DateTime
     */
    private $dataRem;


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
     * Set tipo
     *
     * @param boolean $tipo
     * @return Userequipe
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return boolean 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fkUserid
     *
     * @param integer $fkUserid
     * @return Userequipe
     */
    public function setFkUserid($fkUserid)
    {
        $this->fkUserid = $fkUserid;

        return $this;
    }

    /**
     * Get fkUserid
     *
     * @return integer 
     */
    public function getFkUserid()
    {
        return $this->fkUserid;
    }

    /**
     * Set fkEquipeid
     *
     * @param integer $fkEquipeid
     * @return Userequipe
     */
    public function setFkEquipeid($fkEquipeid)
    {
        $this->fkEquipeid = $fkEquipeid;

        return $this;
    }

    /**
     * Get fkEquipeid
     *
     * @return integer 
     */
    public function getFkEquipeid()
    {
        return $this->fkEquipeid;
    }

    /**
     * Set dataAdd
     *
     * @param \DateTime $dataAdd
     * @return Userequipe
     */
    public function setDataAdd($dataAdd)
    {
        $this->dataAdd = $dataAdd;

        return $this;
    }

    /**
     * Get dataAdd
     *
     * @return \DateTime 
     */
    public function getDataAdd()
    {
        return $this->dataAdd;
    }

    /**
     * Set dataRem
     *
     * @param \DateTime $dataRem
     * @return Userequipe
     */
    public function setDataRem($dataRem)
    {
        $this->dataRem = $dataRem;

        return $this;
    }

    /**
     * Get dataRem
     *
     * @return \DateTime 
     */
    public function getDataRem()
    {
        return $this->dataRem;
    }
}
