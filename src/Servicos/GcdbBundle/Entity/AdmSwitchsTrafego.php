<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmSwitchsTrafego
 */
class AdmSwitchsTrafego
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idPorta;

    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @var integer
     */
    private $trIn;

    /**
     * @var integer
     */
    private $trOut;

    /**
     * @var integer
     */
    private $mediaTrIn;

    /**
     * @var integer
     */
    private $mediaTrOut;


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
     * Set idPorta
     *
     * @param integer $idPorta
     * @return AdmSwitchsTrafego
     */
    public function setIdPorta($idPorta)
    {
        $this->idPorta = $idPorta;

        return $this;
    }

    /**
     * Get idPorta
     *
     * @return integer 
     */
    public function getIdPorta()
    {
        return $this->idPorta;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return AdmSwitchsTrafego
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set trIn
     *
     * @param integer $trIn
     * @return AdmSwitchsTrafego
     */
    public function setTrIn($trIn)
    {
        $this->trIn = $trIn;

        return $this;
    }

    /**
     * Get trIn
     *
     * @return integer 
     */
    public function getTrIn()
    {
        return $this->trIn;
    }

    /**
     * Set trOut
     *
     * @param integer $trOut
     * @return AdmSwitchsTrafego
     */
    public function setTrOut($trOut)
    {
        $this->trOut = $trOut;

        return $this;
    }

    /**
     * Get trOut
     *
     * @return integer 
     */
    public function getTrOut()
    {
        return $this->trOut;
    }

    /**
     * Set mediaTrIn
     *
     * @param integer $mediaTrIn
     * @return AdmSwitchsTrafego
     */
    public function setMediaTrIn($mediaTrIn)
    {
        $this->mediaTrIn = $mediaTrIn;

        return $this;
    }

    /**
     * Get mediaTrIn
     *
     * @return integer 
     */
    public function getMediaTrIn()
    {
        return $this->mediaTrIn;
    }

    /**
     * Set mediaTrOut
     *
     * @param integer $mediaTrOut
     * @return AdmSwitchsTrafego
     */
    public function setMediaTrOut($mediaTrOut)
    {
        $this->mediaTrOut = $mediaTrOut;

        return $this;
    }

    /**
     * Get mediaTrOut
     *
     * @return integer 
     */
    public function getMediaTrOut()
    {
        return $this->mediaTrOut;
    }
}
