<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadLigacaoC2u
 */
class TempCadLigacaoC2u
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadCidId;

    /**
     * @var integer
     */
    private $cadUsersId2;

    /**
     * @var \DateTime
     */
    private $dtInicio;

    /**
     * @var \DateTime
     */
    private $dtFim;


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
     * Set cadCidId
     *
     * @param integer $cadCidId
     * @return TempCadLigacaoC2u
     */
    public function setCadCidId($cadCidId)
    {
        $this->cadCidId = $cadCidId;

        return $this;
    }

    /**
     * Get cadCidId
     *
     * @return integer 
     */
    public function getCadCidId()
    {
        return $this->cadCidId;
    }

    /**
     * Set cadUsersId2
     *
     * @param integer $cadUsersId2
     * @return TempCadLigacaoC2u
     */
    public function setCadUsersId2($cadUsersId2)
    {
        $this->cadUsersId2 = $cadUsersId2;

        return $this;
    }

    /**
     * Get cadUsersId2
     *
     * @return integer 
     */
    public function getCadUsersId2()
    {
        return $this->cadUsersId2;
    }

    /**
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return TempCadLigacaoC2u
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return TempCadLigacaoC2u
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }
}
