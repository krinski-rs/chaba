<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cancelamento
 */
class Cancelamento
{
    /**
     * @var integer
     */
    private $cancCodigoid;

    /**
     * @var integer
     */
    private $usrCodigoid;

    /**
     * @var \DateTime
     */
    private $cancDatasolicitacao;

    /**
     * @var \DateTime
     */
    private $cancDatacancelado;

    /**
     * @var boolean
     */
    private $cancCumpriraviso;

    /**
     * @var \DateTime
     */
    private $cancDatainc;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get cancCodigoid
     *
     * @return integer 
     */
    public function getCancCodigoid()
    {
        return $this->cancCodigoid;
    }

    /**
     * Set usrCodigoid
     *
     * @param integer $usrCodigoid
     * @return Cancelamento
     */
    public function setUsrCodigoid($usrCodigoid)
    {
        $this->usrCodigoid = $usrCodigoid;

        return $this;
    }

    /**
     * Get usrCodigoid
     *
     * @return integer 
     */
    public function getUsrCodigoid()
    {
        return $this->usrCodigoid;
    }

    /**
     * Set cancDatasolicitacao
     *
     * @param \DateTime $cancDatasolicitacao
     * @return Cancelamento
     */
    public function setCancDatasolicitacao($cancDatasolicitacao)
    {
        $this->cancDatasolicitacao = $cancDatasolicitacao;

        return $this;
    }

    /**
     * Get cancDatasolicitacao
     *
     * @return \DateTime 
     */
    public function getCancDatasolicitacao()
    {
        return $this->cancDatasolicitacao;
    }

    /**
     * Set cancDatacancelado
     *
     * @param \DateTime $cancDatacancelado
     * @return Cancelamento
     */
    public function setCancDatacancelado($cancDatacancelado)
    {
        $this->cancDatacancelado = $cancDatacancelado;

        return $this;
    }

    /**
     * Get cancDatacancelado
     *
     * @return \DateTime 
     */
    public function getCancDatacancelado()
    {
        return $this->cancDatacancelado;
    }

    /**
     * Set cancCumpriraviso
     *
     * @param boolean $cancCumpriraviso
     * @return Cancelamento
     */
    public function setCancCumpriraviso($cancCumpriraviso)
    {
        $this->cancCumpriraviso = $cancCumpriraviso;

        return $this;
    }

    /**
     * Get cancCumpriraviso
     *
     * @return boolean 
     */
    public function getCancCumpriraviso()
    {
        return $this->cancCumpriraviso;
    }

    /**
     * Set cancDatainc
     *
     * @param \DateTime $cancDatainc
     * @return Cancelamento
     */
    public function setCancDatainc($cancDatainc)
    {
        $this->cancDatainc = $cancDatainc;

        return $this;
    }

    /**
     * Get cancDatainc
     *
     * @return \DateTime 
     */
    public function getCancDatainc()
    {
        return $this->cancDatainc;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Cancelamento
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }
}
