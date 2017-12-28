<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plantao
 */
class Plantao
{
    /**
     * @var integer
     */
    private $uid;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $fone;

    /**
     * @var string
     */
    private $sms;

    /**
     * @var string
     */
    private $plantao;


    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Plantao
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Plantao
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Plantao
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
     * Set fone
     *
     * @param string $fone
     * @return Plantao
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get fone
     *
     * @return string 
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set sms
     *
     * @param string $sms
     * @return Plantao
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return string 
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set plantao
     *
     * @param string $plantao
     * @return Plantao
     */
    public function setPlantao($plantao)
    {
        $this->plantao = $plantao;

        return $this;
    }

    /**
     * Get plantao
     *
     * @return string 
     */
    public function getPlantao()
    {
        return $this->plantao;
    }
}
