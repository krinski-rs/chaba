<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaCadUserUltilizador
 */
class ViaturaCadUserUltilizador
{
    /**
     * @var integer
     */
    private $viatCadUserUltilizadorid;

    /**
     * @var integer
     */
    private $cadUserId;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viatCadUserUltilizadorid
     *
     * @return integer 
     */
    public function getViatCadUserUltilizadorid()
    {
        return $this->viatCadUserUltilizadorid;
    }

    /**
     * Set cadUserId
     *
     * @param integer $cadUserId
     * @return ViaturaCadUserUltilizador
     */
    public function setCadUserId($cadUserId)
    {
        $this->cadUserId = $cadUserId;

        return $this;
    }

    /**
     * Get cadUserId
     *
     * @return integer 
     */
    public function getCadUserId()
    {
        return $this->cadUserId;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return ViaturaCadUserUltilizador
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return ViaturaCadUserUltilizador
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaCadUserUltilizador
     */
    public function setViaturaid(\Servicos\LumaBundle\Entity\Viatura $viaturaid = null)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }
}
