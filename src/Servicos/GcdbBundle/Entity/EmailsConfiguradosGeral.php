<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailsConfiguradosGeral
 */
class EmailsConfiguradosGeral
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $proposito;

    /**
     * @var string
     */
    private $tituloEmail;

    /**
     * @var string
     */
    private $email;


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
     * Set proposito
     *
     * @param string $proposito
     * @return EmailsConfiguradosGeral
     */
    public function setProposito($proposito)
    {
        $this->proposito = $proposito;

        return $this;
    }

    /**
     * Get proposito
     *
     * @return string 
     */
    public function getProposito()
    {
        return $this->proposito;
    }

    /**
     * Set tituloEmail
     *
     * @param string $tituloEmail
     * @return EmailsConfiguradosGeral
     */
    public function setTituloEmail($tituloEmail)
    {
        $this->tituloEmail = $tituloEmail;

        return $this;
    }

    /**
     * Get tituloEmail
     *
     * @return string 
     */
    public function getTituloEmail()
    {
        return $this->tituloEmail;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return EmailsConfiguradosGeral
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
}
