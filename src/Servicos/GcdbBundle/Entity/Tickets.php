<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 */
class Tickets
{
    /**
     * @var integer
     */
    private $ticketid;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $opendate;

    /**
     * @var \DateTime
     */
    private $opentime;

    /**
     * @var \DateTime
     */
    private $closedate;

    /**
     * @var \DateTime
     */
    private $closetime;

    /**
     * @var string
     */
    private $opener;

    /**
     * @var string
     */
    private $solicitante;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $closer;

    /**
     * @var integer
     */
    private $categoriaid;

    /**
     * @var \DateTime
     */
    private $fechado;

    /**
     * @var \DateTime
     */
    private $aberto;

    /**
     * @var string
     */
    private $metodo;

    /**
     * @var \Servicos\GcdbBundle\Entity\NiveisCriticidade
     */
    private $nivel;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $customerid;


    /**
     * Get ticketid
     *
     * @return integer 
     */
    public function getTicketid()
    {
        return $this->ticketid;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Tickets
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Tickets
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Tickets
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set opendate
     *
     * @param \DateTime $opendate
     * @return Tickets
     */
    public function setOpendate($opendate)
    {
        $this->opendate = $opendate;

        return $this;
    }

    /**
     * Get opendate
     *
     * @return \DateTime 
     */
    public function getOpendate()
    {
        return $this->opendate;
    }

    /**
     * Set opentime
     *
     * @param \DateTime $opentime
     * @return Tickets
     */
    public function setOpentime($opentime)
    {
        $this->opentime = $opentime;

        return $this;
    }

    /**
     * Get opentime
     *
     * @return \DateTime 
     */
    public function getOpentime()
    {
        return $this->opentime;
    }

    /**
     * Set closedate
     *
     * @param \DateTime $closedate
     * @return Tickets
     */
    public function setClosedate($closedate)
    {
        $this->closedate = $closedate;

        return $this;
    }

    /**
     * Get closedate
     *
     * @return \DateTime 
     */
    public function getClosedate()
    {
        return $this->closedate;
    }

    /**
     * Set closetime
     *
     * @param \DateTime $closetime
     * @return Tickets
     */
    public function setClosetime($closetime)
    {
        $this->closetime = $closetime;

        return $this;
    }

    /**
     * Get closetime
     *
     * @return \DateTime 
     */
    public function getClosetime()
    {
        return $this->closetime;
    }

    /**
     * Set opener
     *
     * @param string $opener
     * @return Tickets
     */
    public function setOpener($opener)
    {
        $this->opener = $opener;

        return $this;
    }

    /**
     * Get opener
     *
     * @return string 
     */
    public function getOpener()
    {
        return $this->opener;
    }

    /**
     * Set solicitante
     *
     * @param string $solicitante
     * @return Tickets
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Get solicitante
     *
     * @return string 
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Tickets
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
     * Set closer
     *
     * @param string $closer
     * @return Tickets
     */
    public function setCloser($closer)
    {
        $this->closer = $closer;

        return $this;
    }

    /**
     * Get closer
     *
     * @return string 
     */
    public function getCloser()
    {
        return $this->closer;
    }

    /**
     * Set categoriaid
     *
     * @param integer $categoriaid
     * @return Tickets
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;

        return $this;
    }

    /**
     * Get categoriaid
     *
     * @return integer 
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * Set fechado
     *
     * @param \DateTime $fechado
     * @return Tickets
     */
    public function setFechado($fechado)
    {
        $this->fechado = $fechado;

        return $this;
    }

    /**
     * Get fechado
     *
     * @return \DateTime 
     */
    public function getFechado()
    {
        return $this->fechado;
    }

    /**
     * Set aberto
     *
     * @param \DateTime $aberto
     * @return Tickets
     */
    public function setAberto($aberto)
    {
        $this->aberto = $aberto;

        return $this;
    }

    /**
     * Get aberto
     *
     * @return \DateTime 
     */
    public function getAberto()
    {
        return $this->aberto;
    }

    /**
     * Set metodo
     *
     * @param string $metodo
     * @return Tickets
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo
     *
     * @return string 
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set nivel
     *
     * @param \Servicos\GcdbBundle\Entity\NiveisCriticidade $nivel
     * @return Tickets
     */
    public function setNivel(\Servicos\GcdbBundle\Entity\NiveisCriticidade $nivel = null)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return \Servicos\GcdbBundle\Entity\NiveisCriticidade 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set customerid
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $customerid
     * @return Tickets
     */
    public function setCustomerid(\Servicos\GcdbBundle\Entity\Customers $customerid = null)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return \Servicos\GcdbBundle\Entity\Customers 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }
}
