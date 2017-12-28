<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accesshistory
 */
class Accesshistory
{
    /**
     * @var string
     */
    private $sid;

    /**
     * @var string
     */
    private $data;

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
    private $tipo;


    /**
     * Set sid
     *
     * @param string $sid
     * @return Accesshistory
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid
     *
     * @return string 
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Accesshistory
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
     * Set customerid
     *
     * @param string $customerid
     * @return Accesshistory
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
     * @return Accesshistory
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
     * Set tipo
     *
     * @param string $tipo
     * @return Accesshistory
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
