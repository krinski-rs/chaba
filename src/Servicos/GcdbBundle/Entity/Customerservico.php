<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customerservico
 */
class Customerservico
{
    /**
     * @var integer
     */
    private $custservCodigoid;

    /**
     * @var integer
     */
    private $idservico;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var boolean
     */
    private $custservAtivo;

    /**
     * @var \DateTime
     */
    private $custservDatainc;


    /**
     * Get custservCodigoid
     *
     * @return integer 
     */
    public function getCustservCodigoid()
    {
        return $this->custservCodigoid;
    }

    /**
     * Set idservico
     *
     * @param integer $idservico
     * @return Customerservico
     */
    public function setIdservico($idservico)
    {
        $this->idservico = $idservico;

        return $this;
    }

    /**
     * Get idservico
     *
     * @return integer 
     */
    public function getIdservico()
    {
        return $this->idservico;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Customerservico
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
     * Set custservAtivo
     *
     * @param boolean $custservAtivo
     * @return Customerservico
     */
    public function setCustservAtivo($custservAtivo)
    {
        $this->custservAtivo = $custservAtivo;

        return $this;
    }

    /**
     * Get custservAtivo
     *
     * @return boolean 
     */
    public function getCustservAtivo()
    {
        return $this->custservAtivo;
    }

    /**
     * Set custservDatainc
     *
     * @param \DateTime $custservDatainc
     * @return Customerservico
     */
    public function setCustservDatainc($custservDatainc)
    {
        $this->custservDatainc = $custservDatainc;

        return $this;
    }

    /**
     * Get custservDatainc
     *
     * @return \DateTime 
     */
    public function getCustservDatainc()
    {
        return $this->custservDatainc;
    }
}
