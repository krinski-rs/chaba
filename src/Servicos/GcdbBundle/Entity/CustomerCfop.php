<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerCfop
 */
class CustomerCfop
{
    /**
     * @var string
     */
    private $cfop;

    /**
     * @var integer
     */
    private $customerid;


    /**
     * Set cfop
     *
     * @param string $cfop
     * @return CustomerCfop
     */
    public function setCfop($cfop)
    {
        $this->cfop = $cfop;

        return $this;
    }

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
     * Set customerid
     *
     * @param integer $customerid
     * @return CustomerCfop
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
}
