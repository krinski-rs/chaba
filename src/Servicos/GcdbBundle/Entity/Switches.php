<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Switches
 */
class Switches
{
    /**
     * @var integer
     */
    private $switchid;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $local;

    /**
     * @var string
     */
    private $runpath;


    /**
     * Get switchid
     *
     * @return integer 
     */
    public function getSwitchid()
    {
        return $this->switchid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Switches
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
     * Set descricao
     *
     * @param string $descricao
     * @return Switches
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return Switches
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set runpath
     *
     * @param string $runpath
     * @return Switches
     */
    public function setRunpath($runpath)
    {
        $this->runpath = $runpath;

        return $this;
    }

    /**
     * Get runpath
     *
     * @return string 
     */
    public function getRunpath()
    {
        return $this->runpath;
    }
}
