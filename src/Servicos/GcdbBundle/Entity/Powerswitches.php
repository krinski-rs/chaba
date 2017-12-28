<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Powerswitches
 */
class Powerswitches
{
    /**
     * @var integer
     */
    private $powerswitchid;

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
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var integer
     */
    private $numportas;


    /**
     * Get powerswitchid
     *
     * @return integer 
     */
    public function getPowerswitchid()
    {
        return $this->powerswitchid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Powerswitches
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
     * @return Powerswitches
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
     * @return Powerswitches
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
     * @return Powerswitches
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

    /**
     * Set login
     *
     * @param string $login
     * @return Powerswitches
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Powerswitches
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set numportas
     *
     * @param integer $numportas
     * @return Powerswitches
     */
    public function setNumportas($numportas)
    {
        $this->numportas = $numportas;

        return $this;
    }

    /**
     * Get numportas
     *
     * @return integer 
     */
    public function getNumportas()
    {
        return $this->numportas;
    }
}
