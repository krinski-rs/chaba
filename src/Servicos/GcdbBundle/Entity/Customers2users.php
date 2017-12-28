<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers2users
 */
class Customers2users
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dataAbertura;

    /**
     * @var integer
     */
    private $alqtIcms;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $idUsers;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $idCustomers;


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
     * Set dataAbertura
     *
     * @param \DateTime $dataAbertura
     * @return Customers2users
     */
    public function setDataAbertura($dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    /**
     * Get dataAbertura
     *
     * @return \DateTime 
     */
    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    /**
     * Set alqtIcms
     *
     * @param integer $alqtIcms
     * @return Customers2users
     */
    public function setAlqtIcms($alqtIcms)
    {
        $this->alqtIcms = $alqtIcms;

        return $this;
    }

    /**
     * Get alqtIcms
     *
     * @return integer 
     */
    public function getAlqtIcms()
    {
        return $this->alqtIcms;
    }

    /**
     * Set idUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $idUsers
     * @return Customers2users
     */
    public function setIdUsers(\Servicos\GcdbBundle\Entity\CadUsers $idUsers = null)
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * Get idUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    /**
     * Set idCustomers
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $idCustomers
     * @return Customers2users
     */
    public function setIdCustomers(\Servicos\GcdbBundle\Entity\Customers $idCustomers = null)
    {
        $this->idCustomers = $idCustomers;

        return $this;
    }

    /**
     * Get idCustomers
     *
     * @return \Servicos\GcdbBundle\Entity\Customers 
     */
    public function getIdCustomers()
    {
        return $this->idCustomers;
    }
}
