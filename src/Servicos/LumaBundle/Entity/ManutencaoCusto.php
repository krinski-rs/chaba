<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoCusto
 */
class ManutencaoCusto
{
    /**
     * @var integer
     */
    private $custCodigoid;

    /**
     * @var \DateTime
     */
    private $dataNf;

    /**
     * @var \DateTime
     */
    private $dataGarantia;

    /**
     * @var integer
     */
    private $numeroNf;

    /**
     * @var \Servicos\LumaBundle\Entity\ViaturaBaixa
     */
    private $viatBaixaid;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoFormapag
     */
    private $formpagCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoStatus
     */
    private $statusCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoTipo
     */
    private $tipoCodigoid;


    /**
     * Get custCodigoid
     *
     * @return integer 
     */
    public function getCustCodigoid()
    {
        return $this->custCodigoid;
    }

    /**
     * Set dataNf
     *
     * @param \DateTime $dataNf
     * @return ManutencaoCusto
     */
    public function setDataNf($dataNf)
    {
        $this->dataNf = $dataNf;

        return $this;
    }

    /**
     * Get dataNf
     *
     * @return \DateTime 
     */
    public function getDataNf()
    {
        return $this->dataNf;
    }

    /**
     * Set dataGarantia
     *
     * @param \DateTime $dataGarantia
     * @return ManutencaoCusto
     */
    public function setDataGarantia($dataGarantia)
    {
        $this->dataGarantia = $dataGarantia;

        return $this;
    }

    /**
     * Get dataGarantia
     *
     * @return \DateTime 
     */
    public function getDataGarantia()
    {
        return $this->dataGarantia;
    }

    /**
     * Set numeroNf
     *
     * @param integer $numeroNf
     * @return ManutencaoCusto
     */
    public function setNumeroNf($numeroNf)
    {
        $this->numeroNf = $numeroNf;

        return $this;
    }

    /**
     * Get numeroNf
     *
     * @return integer 
     */
    public function getNumeroNf()
    {
        return $this->numeroNf;
    }

    /**
     * Set viatBaixaid
     *
     * @param \Servicos\LumaBundle\Entity\ViaturaBaixa $viatBaixaid
     * @return ManutencaoCusto
     */
    public function setViatBaixaid(\Servicos\LumaBundle\Entity\ViaturaBaixa $viatBaixaid = null)
    {
        $this->viatBaixaid = $viatBaixaid;

        return $this;
    }

    /**
     * Get viatBaixaid
     *
     * @return \Servicos\LumaBundle\Entity\ViaturaBaixa 
     */
    public function getViatBaixaid()
    {
        return $this->viatBaixaid;
    }

    /**
     * Set formpagCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoFormapag $formpagCodigoid
     * @return ManutencaoCusto
     */
    public function setFormpagCodigoid(\Servicos\LumaBundle\Entity\ManutencaoFormapag $formpagCodigoid = null)
    {
        $this->formpagCodigoid = $formpagCodigoid;

        return $this;
    }

    /**
     * Get formpagCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoFormapag 
     */
    public function getFormpagCodigoid()
    {
        return $this->formpagCodigoid;
    }

    /**
     * Set statusCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoStatus $statusCodigoid
     * @return ManutencaoCusto
     */
    public function setStatusCodigoid(\Servicos\LumaBundle\Entity\ManutencaoStatus $statusCodigoid = null)
    {
        $this->statusCodigoid = $statusCodigoid;

        return $this;
    }

    /**
     * Get statusCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoStatus 
     */
    public function getStatusCodigoid()
    {
        return $this->statusCodigoid;
    }

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoTipo $tipoCodigoid
     * @return ManutencaoCusto
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\ManutencaoTipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoTipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }
}
