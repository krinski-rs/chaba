<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmSwitchsPortas
 */
class AdmSwitchsPortas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $portId;

    /**
     * @var integer
     */
    private $idSwitchs;

    /**
     * @var integer
     */
    private $idAccount;

    /**
     * @var string
     */
    private $blocoIp;

    /**
     * @var string
     */
    private $natMask;

    /**
     * @var string
     */
    private $interfaceNome;

    /**
     * @var string
     */
    private $interfaceDesc;

    /**
     * @var \DateTime
     */
    private $dtAtiva;

    /**
     * @var \DateTime
     */
    private $dtDesativa;


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
     * Set portId
     *
     * @param integer $portId
     * @return AdmSwitchsPortas
     */
    public function setPortId($portId)
    {
        $this->portId = $portId;

        return $this;
    }

    /**
     * Get portId
     *
     * @return integer 
     */
    public function getPortId()
    {
        return $this->portId;
    }

    /**
     * Set idSwitchs
     *
     * @param integer $idSwitchs
     * @return AdmSwitchsPortas
     */
    public function setIdSwitchs($idSwitchs)
    {
        $this->idSwitchs = $idSwitchs;

        return $this;
    }

    /**
     * Get idSwitchs
     *
     * @return integer 
     */
    public function getIdSwitchs()
    {
        return $this->idSwitchs;
    }

    /**
     * Set idAccount
     *
     * @param integer $idAccount
     * @return AdmSwitchsPortas
     */
    public function setIdAccount($idAccount)
    {
        $this->idAccount = $idAccount;

        return $this;
    }

    /**
     * Get idAccount
     *
     * @return integer 
     */
    public function getIdAccount()
    {
        return $this->idAccount;
    }

    /**
     * Set blocoIp
     *
     * @param string $blocoIp
     * @return AdmSwitchsPortas
     */
    public function setBlocoIp($blocoIp)
    {
        $this->blocoIp = $blocoIp;

        return $this;
    }

    /**
     * Get blocoIp
     *
     * @return string 
     */
    public function getBlocoIp()
    {
        return $this->blocoIp;
    }

    /**
     * Set natMask
     *
     * @param string $natMask
     * @return AdmSwitchsPortas
     */
    public function setNatMask($natMask)
    {
        $this->natMask = $natMask;

        return $this;
    }

    /**
     * Get natMask
     *
     * @return string 
     */
    public function getNatMask()
    {
        return $this->natMask;
    }

    /**
     * Set interfaceNome
     *
     * @param string $interfaceNome
     * @return AdmSwitchsPortas
     */
    public function setInterfaceNome($interfaceNome)
    {
        $this->interfaceNome = $interfaceNome;

        return $this;
    }

    /**
     * Get interfaceNome
     *
     * @return string 
     */
    public function getInterfaceNome()
    {
        return $this->interfaceNome;
    }

    /**
     * Set interfaceDesc
     *
     * @param string $interfaceDesc
     * @return AdmSwitchsPortas
     */
    public function setInterfaceDesc($interfaceDesc)
    {
        $this->interfaceDesc = $interfaceDesc;

        return $this;
    }

    /**
     * Get interfaceDesc
     *
     * @return string 
     */
    public function getInterfaceDesc()
    {
        return $this->interfaceDesc;
    }

    /**
     * Set dtAtiva
     *
     * @param \DateTime $dtAtiva
     * @return AdmSwitchsPortas
     */
    public function setDtAtiva($dtAtiva)
    {
        $this->dtAtiva = $dtAtiva;

        return $this;
    }

    /**
     * Get dtAtiva
     *
     * @return \DateTime 
     */
    public function getDtAtiva()
    {
        return $this->dtAtiva;
    }

    /**
     * Set dtDesativa
     *
     * @param \DateTime $dtDesativa
     * @return AdmSwitchsPortas
     */
    public function setDtDesativa($dtDesativa)
    {
        $this->dtDesativa = $dtDesativa;

        return $this;
    }

    /**
     * Get dtDesativa
     *
     * @return \DateTime 
     */
    public function getDtDesativa()
    {
        return $this->dtDesativa;
    }
}
