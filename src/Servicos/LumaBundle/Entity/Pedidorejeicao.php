<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidorejeicao
 */
class Pedidorejeicao
{
    /**
     * @var integer
     */
    private $pedirejeCodigoid;

    /**
     * @var string
     */
    private $pedirejeJustificativa;

    /**
     * @var boolean
     */
    private $pedirejeAceito;

    /**
     * @var integer
     */
    private $autUsuarioinc;

    /**
     * @var \DateTime
     */
    private $pedirejeDatainc;

    /**
     * @var integer
     */
    private $autUsuarioresp;

    /**
     * @var \DateTime
     */
    private $pedirejeDataresp;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedido
     */
    private $pediCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidoresposta
     */
    private $pedirespCodigoid;


    /**
     * Get pedirejeCodigoid
     *
     * @return integer 
     */
    public function getPedirejeCodigoid()
    {
        return $this->pedirejeCodigoid;
    }

    /**
     * Set pedirejeJustificativa
     *
     * @param string $pedirejeJustificativa
     * @return Pedidorejeicao
     */
    public function setPedirejeJustificativa($pedirejeJustificativa)
    {
        $this->pedirejeJustificativa = $pedirejeJustificativa;

        return $this;
    }

    /**
     * Get pedirejeJustificativa
     *
     * @return string 
     */
    public function getPedirejeJustificativa()
    {
        return $this->pedirejeJustificativa;
    }

    /**
     * Set pedirejeAceito
     *
     * @param boolean $pedirejeAceito
     * @return Pedidorejeicao
     */
    public function setPedirejeAceito($pedirejeAceito)
    {
        $this->pedirejeAceito = $pedirejeAceito;

        return $this;
    }

    /**
     * Get pedirejeAceito
     *
     * @return boolean 
     */
    public function getPedirejeAceito()
    {
        return $this->pedirejeAceito;
    }

    /**
     * Set autUsuarioinc
     *
     * @param integer $autUsuarioinc
     * @return Pedidorejeicao
     */
    public function setAutUsuarioinc($autUsuarioinc)
    {
        $this->autUsuarioinc = $autUsuarioinc;

        return $this;
    }

    /**
     * Get autUsuarioinc
     *
     * @return integer 
     */
    public function getAutUsuarioinc()
    {
        return $this->autUsuarioinc;
    }

    /**
     * Set pedirejeDatainc
     *
     * @param \DateTime $pedirejeDatainc
     * @return Pedidorejeicao
     */
    public function setPedirejeDatainc($pedirejeDatainc)
    {
        $this->pedirejeDatainc = $pedirejeDatainc;

        return $this;
    }

    /**
     * Get pedirejeDatainc
     *
     * @return \DateTime 
     */
    public function getPedirejeDatainc()
    {
        return $this->pedirejeDatainc;
    }

    /**
     * Set autUsuarioresp
     *
     * @param integer $autUsuarioresp
     * @return Pedidorejeicao
     */
    public function setAutUsuarioresp($autUsuarioresp)
    {
        $this->autUsuarioresp = $autUsuarioresp;

        return $this;
    }

    /**
     * Get autUsuarioresp
     *
     * @return integer 
     */
    public function getAutUsuarioresp()
    {
        return $this->autUsuarioresp;
    }

    /**
     * Set pedirejeDataresp
     *
     * @param \DateTime $pedirejeDataresp
     * @return Pedidorejeicao
     */
    public function setPedirejeDataresp($pedirejeDataresp)
    {
        $this->pedirejeDataresp = $pedirejeDataresp;

        return $this;
    }

    /**
     * Get pedirejeDataresp
     *
     * @return \DateTime 
     */
    public function getPedirejeDataresp()
    {
        return $this->pedirejeDataresp;
    }

    /**
     * Set pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     * @return Pedidorejeicao
     */
    public function setPediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid = null)
    {
        $this->pediCodigoid = $pediCodigoid;

        return $this;
    }

    /**
     * Get pediCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedido 
     */
    public function getPediCodigoid()
    {
        return $this->pediCodigoid;
    }

    /**
     * Set pedirespCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidoresposta $pedirespCodigoid
     * @return Pedidorejeicao
     */
    public function setPedirespCodigoid(\Servicos\LumaBundle\Entity\Pedidoresposta $pedirespCodigoid = null)
    {
        $this->pedirespCodigoid = $pedirespCodigoid;

        return $this;
    }

    /**
     * Get pedirespCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedidoresposta 
     */
    public function getPedirespCodigoid()
    {
        return $this->pedirespCodigoid;
    }
}
