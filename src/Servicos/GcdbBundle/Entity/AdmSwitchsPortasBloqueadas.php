<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmSwitchsPortasBloqueadas
 */
class AdmSwitchsPortasBloqueadas
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
    private $idSwitch;

    /**
     * @var \DateTime
     */
    private $dataBloqueio;

    /**
     * @var \DateTime
     */
    private $dataDesbloqueio;

    /**
     * @var string
     */
    private $quemDesbloqueou;


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
     * @return AdmSwitchsPortasBloqueadas
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
     * Set idSwitch
     *
     * @param integer $idSwitch
     * @return AdmSwitchsPortasBloqueadas
     */
    public function setIdSwitch($idSwitch)
    {
        $this->idSwitch = $idSwitch;

        return $this;
    }

    /**
     * Get idSwitch
     *
     * @return integer 
     */
    public function getIdSwitch()
    {
        return $this->idSwitch;
    }

    /**
     * Set dataBloqueio
     *
     * @param \DateTime $dataBloqueio
     * @return AdmSwitchsPortasBloqueadas
     */
    public function setDataBloqueio($dataBloqueio)
    {
        $this->dataBloqueio = $dataBloqueio;

        return $this;
    }

    /**
     * Get dataBloqueio
     *
     * @return \DateTime 
     */
    public function getDataBloqueio()
    {
        return $this->dataBloqueio;
    }

    /**
     * Set dataDesbloqueio
     *
     * @param \DateTime $dataDesbloqueio
     * @return AdmSwitchsPortasBloqueadas
     */
    public function setDataDesbloqueio($dataDesbloqueio)
    {
        $this->dataDesbloqueio = $dataDesbloqueio;

        return $this;
    }

    /**
     * Get dataDesbloqueio
     *
     * @return \DateTime 
     */
    public function getDataDesbloqueio()
    {
        return $this->dataDesbloqueio;
    }

    /**
     * Set quemDesbloqueou
     *
     * @param string $quemDesbloqueou
     * @return AdmSwitchsPortasBloqueadas
     */
    public function setQuemDesbloqueou($quemDesbloqueou)
    {
        $this->quemDesbloqueou = $quemDesbloqueou;

        return $this;
    }

    /**
     * Get quemDesbloqueou
     *
     * @return string 
     */
    public function getQuemDesbloqueou()
    {
        return $this->quemDesbloqueou;
    }
}
