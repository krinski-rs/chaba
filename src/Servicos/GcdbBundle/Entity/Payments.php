<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payments
 */
class Payments
{
    /**
     * @var integer
     */
    private $paymentid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var \DateTime
     */
    private $datepaid;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $number;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var integer
     */
    private $refinv;


    /**
     * Get paymentid
     *
     * @return integer 
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Payments
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
     * Set datepaid
     *
     * @param \DateTime $datepaid
     * @return Payments
     */
    public function setDatepaid($datepaid)
    {
        $this->datepaid = $datepaid;

        return $this;
    }

    /**
     * Get datepaid
     *
     * @return \DateTime 
     */
    public function getDatepaid()
    {
        return $this->datepaid;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Payments
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return Payments
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Payments
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set refinv
     *
     * @param integer $refinv
     * @return Payments
     */
    public function setRefinv($refinv)
    {
        $this->refinv = $refinv;

        return $this;
    }

    /**
     * Get refinv
     *
     * @return integer 
     */
    public function getRefinv()
    {
        return $this->refinv;
    }
}
