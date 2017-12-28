<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccesshistoryUser
 */
class AccesshistoryUser
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
    private $cpf;

    /**
     * @var string
     */
    private $userid;

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
     * @return AccesshistoryUser
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
     * @return AccesshistoryUser
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
     * Set cpf
     *
     * @param string $cpf
     * @return AccesshistoryUser
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set userid
     *
     * @param string $userid
     * @return AccesshistoryUser
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return AccesshistoryUser
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
     * @return AccesshistoryUser
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
