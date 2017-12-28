<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historicoacesso
 */
class Historicoacesso
{
    /**
     * @var integer
     */
    private $histaceCodigoid;

    /**
     * @var boolean
     */
    private $histaceTipo;

    /**
     * @var \DateTime
     */
    private $histaceDatainc;

    /**
     * @var string
     */
    private $histaceSessao;

    /**
     * @var string
     */
    private $histaceIp;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $customerid;


    /**
     * Get histaceCodigoid
     *
     * @return integer 
     */
    public function getHistaceCodigoid()
    {
        return $this->histaceCodigoid;
    }

    /**
     * Set histaceTipo
     *
     * @param boolean $histaceTipo
     * @return Historicoacesso
     */
    public function setHistaceTipo($histaceTipo)
    {
        $this->histaceTipo = $histaceTipo;

        return $this;
    }

    /**
     * Get histaceTipo
     *
     * @return boolean 
     */
    public function getHistaceTipo()
    {
        return $this->histaceTipo;
    }

    /**
     * Set histaceDatainc
     *
     * @param \DateTime $histaceDatainc
     * @return Historicoacesso
     */
    public function setHistaceDatainc($histaceDatainc)
    {
        $this->histaceDatainc = $histaceDatainc;

        return $this;
    }

    /**
     * Get histaceDatainc
     *
     * @return \DateTime 
     */
    public function getHistaceDatainc()
    {
        return $this->histaceDatainc;
    }

    /**
     * Set histaceSessao
     *
     * @param string $histaceSessao
     * @return Historicoacesso
     */
    public function setHistaceSessao($histaceSessao)
    {
        $this->histaceSessao = $histaceSessao;

        return $this;
    }

    /**
     * Get histaceSessao
     *
     * @return string 
     */
    public function getHistaceSessao()
    {
        return $this->histaceSessao;
    }

    /**
     * Set histaceIp
     *
     * @param string $histaceIp
     * @return Historicoacesso
     */
    public function setHistaceIp($histaceIp)
    {
        $this->histaceIp = $histaceIp;

        return $this;
    }

    /**
     * Get histaceIp
     *
     * @return string 
     */
    public function getHistaceIp()
    {
        return $this->histaceIp;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return Historicoacesso
     */
    public function setCadUsers(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers = null)
    {
        $this->cadUsers = $cadUsers;

        return $this;
    }

    /**
     * Get cadUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers()
    {
        return $this->cadUsers;
    }

    /**
     * Set customerid
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $customerid
     * @return Historicoacesso
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
