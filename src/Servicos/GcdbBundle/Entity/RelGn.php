<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelGn
 */
class RelGn
{
    /**
     * @var integer
     */
    private $gnid;

    /**
     * @var \DateTime
     */
    private $delegado;

    /**
     * @var \DateTime
     */
    private $revogado;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $customerid;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $usuarioid;


    /**
     * Get gnid
     *
     * @return integer 
     */
    public function getGnid()
    {
        return $this->gnid;
    }

    /**
     * Set delegado
     *
     * @param \DateTime $delegado
     * @return RelGn
     */
    public function setDelegado($delegado)
    {
        $this->delegado = $delegado;

        return $this;
    }

    /**
     * Get delegado
     *
     * @return \DateTime 
     */
    public function getDelegado()
    {
        return $this->delegado;
    }

    /**
     * Set revogado
     *
     * @param \DateTime $revogado
     * @return RelGn
     */
    public function setRevogado($revogado)
    {
        $this->revogado = $revogado;

        return $this;
    }

    /**
     * Get revogado
     *
     * @return \DateTime 
     */
    public function getRevogado()
    {
        return $this->revogado;
    }

    /**
     * Set customerid
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $customerid
     * @return RelGn
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

    /**
     * Set usuarioid
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $usuarioid
     * @return RelGn
     */
    public function setUsuarioid(\Servicos\GcdbBundle\Entity\AutUsuarios $usuarioid = null)
    {
        $this->usuarioid = $usuarioid;

        return $this;
    }

    /**
     * Get usuarioid
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }
}
