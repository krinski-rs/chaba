<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParceirosAccounts
 */
class ParceirosAccounts
{
    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var integer
     */
    private $usuarioid;

    /**
     * @var integer
     */
    private $comissaoid;


    /**
     * Set accountid
     *
     * @param integer $accountid
     * @return ParceirosAccounts
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return integer 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }

    /**
     * Set usuarioid
     *
     * @param integer $usuarioid
     * @return ParceirosAccounts
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
     * @return ParceirosAccounts
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
