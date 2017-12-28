<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipeto
 */
class Equipeto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $equipepai;

    /**
     * @var integer
     */
    private $equipefilho;

    /**
     * @var boolean
     */
    private $ativo;


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
     * Set equipepai
     *
     * @param integer $equipepai
     * @return Equipeto
     */
    public function setEquipepai($equipepai)
    {
        $this->equipepai = $equipepai;

        return $this;
    }

    /**
     * Get equipepai
     *
     * @return integer 
     */
    public function getEquipepai()
    {
        return $this->equipepai;
    }

    /**
     * Set equipefilho
     *
     * @param integer $equipefilho
     * @return Equipeto
     */
    public function setEquipefilho($equipefilho)
    {
        $this->equipefilho = $equipefilho;

        return $this;
    }

    /**
     * Get equipefilho
     *
     * @return integer 
     */
    public function getEquipefilho()
    {
        return $this->equipefilho;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Equipeto
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
}
