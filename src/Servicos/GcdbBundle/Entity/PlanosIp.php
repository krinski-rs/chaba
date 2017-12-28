<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosIp
 */
class PlanosIp
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $servidor;

    /**
     * @var string
     */
    private $tipo;


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
     * Set accountid
     *
     * @param integer $accountid
     * @return PlanosIp
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
     * Set ip
     *
     * @param string $ip
     * @return PlanosIp
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
     * Set servidor
     *
     * @param string $servidor
     * @return PlanosIp
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
     * Set tipo
     *
     * @param string $tipo
     * @return PlanosIp
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
