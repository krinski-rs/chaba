<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vendasagentes
 */
class Vendasagentes
{
    /**
     * @var integer
     */
    private $vendaid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var integer
     */
    private $agenteid;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $comissao;

    /**
     * @var integer
     */
    private $pago;

    /**
     * @var \DateTime
     */
    private $datapago;


    /**
     * Get vendaid
     *
     * @return integer 
     */
    public function getVendaid()
    {
        return $this->vendaid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Vendasagentes
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
     * Set agenteid
     *
     * @param integer $agenteid
     * @return Vendasagentes
     */
    public function setAgenteid($agenteid)
    {
        $this->agenteid = $agenteid;

        return $this;
    }

    /**
     * Get agenteid
     *
     * @return integer 
     */
    public function getAgenteid()
    {
        return $this->agenteid;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Vendasagentes
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

    /**
     * Set comissao
     *
     * @param string $comissao
     * @return Vendasagentes
     */
    public function setComissao($comissao)
    {
        $this->comissao = $comissao;

        return $this;
    }

    /**
     * Get comissao
     *
     * @return string 
     */
    public function getComissao()
    {
        return $this->comissao;
    }

    /**
     * Set pago
     *
     * @param integer $pago
     * @return Vendasagentes
     */
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return integer 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set datapago
     *
     * @param \DateTime $datapago
     * @return Vendasagentes
     */
    public function setDatapago($datapago)
    {
        $this->datapago = $datapago;

        return $this;
    }

    /**
     * Get datapago
     *
     * @return \DateTime 
     */
    public function getDatapago()
    {
        return $this->datapago;
    }
}
