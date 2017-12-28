<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SwitchesPortas
 */
class SwitchesPortas
{
    /**
     * @var integer
     */
    private $portaid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var integer
     */
    private $switchid;

    /**
     * @var integer
     */
    private $porta;

    /**
     * @var string
     */
    private $local;


    /**
     * Get portaid
     *
     * @return integer 
     */
    public function getPortaid()
    {
        return $this->portaid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return SwitchesPortas
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set switchid
     *
     * @param integer $switchid
     * @return SwitchesPortas
     */
    public function setSwitchid($switchid)
    {
        $this->switchid = $switchid;

        return $this;
    }

    /**
     * Get switchid
     *
     * @return integer 
     */
    public function getSwitchid()
    {
        return $this->switchid;
    }

    /**
     * Set porta
     *
     * @param integer $porta
     * @return SwitchesPortas
     */
    public function setPorta($porta)
    {
        $this->porta = $porta;

        return $this;
    }

    /**
     * Get porta
     *
     * @return integer 
     */
    public function getPorta()
    {
        return $this->porta;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return SwitchesPortas
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string 
     */
    public function getLocal()
    {
        return $this->local;
    }
}
