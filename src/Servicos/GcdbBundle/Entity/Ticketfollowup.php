<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticketfollowup
 */
class Ticketfollowup
{
    /**
     * @var integer
     */
    private $uid;

    /**
     * @var string
     */
    private $autor;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $mensagem;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var \Servicos\GcdbBundle\Entity\Tickets
     */
    private $ticketid;


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
     * Set autor
     *
     * @param string $autor
     * @return Ticketfollowup
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Ticketfollowup
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
     * Set mensagem
     *
     * @param string $mensagem
     * @return Ticketfollowup
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get mensagem
     *
     * @return string 
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Ticketfollowup
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Ticketfollowup
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
     * @return Ticketfollowup
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

    /**
     * Set ticketid
     *
     * @param \Servicos\GcdbBundle\Entity\Tickets $ticketid
     * @return Ticketfollowup
     */
    public function setTicketid(\Servicos\GcdbBundle\Entity\Tickets $ticketid = null)
    {
        $this->ticketid = $ticketid;

        return $this;
    }

    /**
     * Get ticketid
     *
     * @return \Servicos\GcdbBundle\Entity\Tickets 
     */
    public function getTicketid()
    {
        return $this->ticketid;
    }
}
