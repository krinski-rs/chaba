<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cfop
 */
class Cfop
{
    /**
     * @var string
     */
    private $cfop;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $telecom;

    /**
     * @var integer
     */
    private $ufLocal;


    /**
     * Get cfop
     *
     * @return string 
     */
    public function getCfop()
    {
        return $this->cfop;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Cfop
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set telecom
     *
     * @param integer $telecom
     * @return Cfop
     */
    public function setTelecom($telecom)
    {
        $this->telecom = $telecom;

        return $this;
    }

    /**
     * Get telecom
     *
     * @return integer 
     */
    public function getTelecom()
    {
        return $this->telecom;
    }

    /**
     * Set ufLocal
     *
     * @param integer $ufLocal
     * @return Cfop
     */
    public function setUfLocal($ufLocal)
    {
        $this->ufLocal = $ufLocal;

        return $this;
    }

    /**
     * Get ufLocal
     *
     * @return integer 
     */
    public function getUfLocal()
    {
        return $this->ufLocal;
    }
}
