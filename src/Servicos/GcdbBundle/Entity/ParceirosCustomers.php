<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParceirosCustomers
 */
class ParceirosCustomers
{
    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var integer
     */
    private $usuarioid;

    /**
     * @var integer
     */
    private $comissaoid;


    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return ParceirosCustomers
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
     * Set usuarioid
     *
     * @param integer $usuarioid
     * @return ParceirosCustomers
     */
    public function setUsuarioid($usuarioid)
    {
        $this->usuarioid = $usuarioid;

        return $this;
    }

    /**
     * Get usuarioid
     *
     * @return integer 
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Set comissaoid
     *
     * @param integer $comissaoid
     * @return ParceirosCustomers
     */
    public function setComissaoid($comissaoid)
    {
        $this->comissaoid = $comissaoid;

        return $this;
    }

    /**
     * Get comissaoid
     *
     * @return integer 
     */
    public function getComissaoid()
    {
        return $this->comissaoid;
    }
}
