<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devices
 */
class Devices
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $so;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var string
     */
    private $deviceID;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $customer;


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
     * Set token
     *
     * @param string $token
     * @return Devices
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set so
     *
     * @param string $so
     * @return Devices
     */
    public function setSo($so)
    {
        $this->so = $so;

        return $this;
    }

    /**
     * Get so
     *
     * @return string 
     */
    public function getSo()
    {
        return $this->so;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Devices
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set customer
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $customer
     * @return Devices
     */
    public function setCustomer(\Servicos\GcdbBundle\Entity\Customers $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Servicos\GcdbBundle\Entity\Customers 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
    
    /**
     * Set deviceID
     *
     * @param string $deviceID
     * @return Devices
     */
    public function setDeviceID($deviceID)
    {
        $this->deviceID = $deviceID;

        return $this;
    }

    /**
     * Get deviceID
     *
     * @return string 
     */
    public function getDeviceID()
    {
        return $this->deviceID;
    }
}
