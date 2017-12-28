<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosEmailAtivacao
 */
class PlanosEmailAtivacao
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
    private $email;

    /**
     * @var string
     */
    private $modelo;


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
     * @return PlanosEmailAtivacao
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
     * Set email
     *
     * @param string $email
     * @return PlanosEmailAtivacao
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
     * Set modelo
     *
     * @param string $modelo
     * @return PlanosEmailAtivacao
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
