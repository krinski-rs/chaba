<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accessblockhistory
 */
class Accessblockhistory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $customerid;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $data;

    /**
     * @var boolean
     */
    private $block;

    /**
     * @var \DateTime
     */
    private $datalib;


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
     * Set customerid
     *
     * @param string $customerid
     * @return Accessblockhistory
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return string 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Accessblockhistory
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Accessblockhistory
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set block
     *
     * @param boolean $block
     * @return Accessblockhistory
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return boolean 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set datalib
     *
     * @param \DateTime $datalib
     * @return Accessblockhistory
     */
    public function setDatalib($datalib)
    {
        $this->datalib = $datalib;

        return $this;
    }

    /**
     * Get datalib
     *
     * @return \DateTime 
     */
    public function getDatalib()
    {
        return $this->datalib;
    }
}
