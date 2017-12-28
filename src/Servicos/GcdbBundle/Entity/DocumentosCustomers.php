<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentosCustomers
 */
class DocumentosCustomers
{
    /**
     * @var integer
     */
    private $associaid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var integer
     */
    private $categoriaid;


    /**
     * Get associaid
     *
     * @return integer 
     */
    public function getAssociaid()
    {
        return $this->associaid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return DocumentosCustomers
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set categoriaid
     *
     * @param integer $categoriaid
     * @return DocumentosCustomers
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
}
