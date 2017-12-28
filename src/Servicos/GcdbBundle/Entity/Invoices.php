<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 */
class Invoices
{
    /**
     * @var integer
     */
    private $invoiceid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $datebilled;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $nota;

    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var integer
     */
    private $telecom;


    /**
     * Get invoiceid
     *
     * @return integer 
     */
    public function getInvoiceid()
    {
        return $this->invoiceid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Invoices
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
     * Set description
     *
     * @param string $description
     * @return Invoices
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
     * Set datebilled
     *
     * @param \DateTime $datebilled
     * @return Invoices
     */
    public function setDatebilled($datebilled)
    {
        $this->datebilled = $datebilled;

        return $this;
    }

    /**
     * Get datebilled
     *
     * @return \DateTime 
     */
    public function getDatebilled()
    {
        return $this->datebilled;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Invoices
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
     * Set email
     *
     * @param string $email
     * @return Invoices
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Invoices
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set accountid
     *
     * @param integer $accountid
     * @return Invoices
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
     * Set telecom
     *
     * @param integer $telecom
     * @return Invoices
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
}
