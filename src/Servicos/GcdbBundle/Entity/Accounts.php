<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accounts
 */
class Accounts
{
    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $dateopened;

    /**
     * @var \DateTime
     */
    private $dateclosed;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $charged;

    /**
     * @var string
     */
    private $servidor;

    /**
     * @var string
     */
    private $plano;

    /**
     * @var string
     */
    private $dominio;

    /**
     * @var string
     */
    private $moeda;

    /**
     * @var integer
     */
    private $servicoid;

    /**
     * @var string
     */
    private $template;

    /**
     * @var integer
     */
    private $accountidOld;

    /**
     * @var integer
     */
    private $maxPortas;


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
     * Set customerid
     *
     * @param integer $customerid
     * @return Accounts
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
     * Set username
     *
     * @param string $username
     * @return Accounts
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Accounts
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Accounts
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
     * Set dateopened
     *
     * @param \DateTime $dateopened
     * @return Accounts
     */
    public function setDateopened($dateopened)
    {
        $this->dateopened = $dateopened;

        return $this;
    }

    /**
     * Get dateopened
     *
     * @return \DateTime 
     */
    public function getDateopened()
    {
        return $this->dateopened;
    }

    /**
     * Set dateclosed
     *
     * @param \DateTime $dateclosed
     * @return Accounts
     */
    public function setDateclosed($dateclosed)
    {
        $this->dateclosed = $dateclosed;

        return $this;
    }

    /**
     * Get dateclosed
     *
     * @return \DateTime 
     */
    public function getDateclosed()
    {
        return $this->dateclosed;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Accounts
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Accounts
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set charged
     *
     * @param string $charged
     * @return Accounts
     */
    public function setCharged($charged)
    {
        $this->charged = $charged;

        return $this;
    }

    /**
     * Get charged
     *
     * @return string 
     */
    public function getCharged()
    {
        return $this->charged;
    }

    /**
     * Set servidor
     *
     * @param string $servidor
     * @return Accounts
     */
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;

        return $this;
    }

    /**
     * Get servidor
     *
     * @return string 
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * Set plano
     *
     * @param string $plano
     * @return Accounts
     */
    public function setPlano($plano)
    {
        $this->plano = $plano;

        return $this;
    }

    /**
     * Get plano
     *
     * @return string 
     */
    public function getPlano()
    {
        return $this->plano;
    }

    /**
     * Set dominio
     *
     * @param string $dominio
     * @return Accounts
     */
    public function setDominio($dominio)
    {
        $this->dominio = $dominio;

        return $this;
    }

    /**
     * Get dominio
     *
     * @return string 
     */
    public function getDominio()
    {
        return $this->dominio;
    }

    /**
     * Set moeda
     *
     * @param string $moeda
     * @return Accounts
     */
    public function setMoeda($moeda)
    {
        $this->moeda = $moeda;

        return $this;
    }

    /**
     * Get moeda
     *
     * @return string 
     */
    public function getMoeda()
    {
        return $this->moeda;
    }

    /**
     * Set servicoid
     *
     * @param integer $servicoid
     * @return Accounts
     */
    public function setServicoid($servicoid)
    {
        $this->servicoid = $servicoid;

        return $this;
    }

    /**
     * Get servicoid
     *
     * @return integer 
     */
    public function getServicoid()
    {
        return $this->servicoid;
    }

    /**
     * Set template
     *
     * @param string $template
     * @return Accounts
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set accountidOld
     *
     * @param integer $accountidOld
     * @return Accounts
     */
    public function setAccountidOld($accountidOld)
    {
        $this->accountidOld = $accountidOld;

        return $this;
    }

    /**
     * Get accountidOld
     *
     * @return integer 
     */
    public function getAccountidOld()
    {
        return $this->accountidOld;
    }

    /**
     * Set maxPortas
     *
     * @param integer $maxPortas
     * @return Accounts
     */
    public function setMaxPortas($maxPortas)
    {
        $this->maxPortas = $maxPortas;

        return $this;
    }

    /**
     * Get maxPortas
     *
     * @return integer 
     */
    public function getMaxPortas()
    {
        return $this->maxPortas;
    }
}
