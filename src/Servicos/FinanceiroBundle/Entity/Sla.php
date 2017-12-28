<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sla
 */
class Sla
{
    /**
     * @var integer
     */
    private $slaCodigoid;

    /**
     * @var string
     */
    private $slaNome;

    /**
     * @var \DateTime
     */
    private $slaDatainc;

    /**
     * @var \DateTime
     */
    private $slaDatafim;

    /**
     * @var string
     */
    private $slaDisponibilidade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contrato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slanivel;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Sla
     */
    private $slaProximocodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contrato = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slanivel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get slaCodigoid
     *
     * @return integer 
     */
    public function getSlaCodigoid()
    {
        return $this->slaCodigoid;
    }

    /**
     * Set slaNome
     *
     * @param string $slaNome
     * @return Sla
     */
    public function setSlaNome($slaNome)
    {
        $this->slaNome = $slaNome;

        return $this;
    }

    /**
     * Get slaNome
     *
     * @return string 
     */
    public function getSlaNome()
    {
        return $this->slaNome;
    }

    /**
     * Set slaDatainc
     *
     * @param \DateTime $slaDatainc
     * @return Sla
     */
    public function setSlaDatainc($slaDatainc)
    {
        $this->slaDatainc = $slaDatainc;

        return $this;
    }

    /**
     * Get slaDatainc
     *
     * @return \DateTime 
     */
    public function getSlaDatainc()
    {
        return $this->slaDatainc;
    }

    /**
     * Set slaDatafim
     *
     * @param \DateTime $slaDatafim
     * @return Sla
     */
    public function setSlaDatafim($slaDatafim)
    {
        $this->slaDatafim = $slaDatafim;

        return $this;
    }

    /**
     * Get slaDatafim
     *
     * @return \DateTime 
     */
    public function getSlaDatafim()
    {
        return $this->slaDatafim;
    }

    /**
     * Set slaDisponibilidade
     *
     * @param string $slaDisponibilidade
     * @return Sla
     */
    public function setSlaDisponibilidade($slaDisponibilidade)
    {
        $this->slaDisponibilidade = $slaDisponibilidade;

        return $this;
    }

    /**
     * Get slaDisponibilidade
     *
     * @return string 
     */
    public function getSlaDisponibilidade()
    {
        return $this->slaDisponibilidade;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Sla
     */
    public function addContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato[] = $contrato;

        return $this;
    }

    /**
     * Remove contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     */
    public function removeContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato->removeElement($contrato);
    }

    /**
     * Get contrato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Add slanivel
     *
     * @param \Servicos\FinanceiroBundle\Entity\Slanivel $slanivel
     * @return Sla
     */
    public function addSlanivel(\Servicos\FinanceiroBundle\Entity\Slanivel $slanivel)
    {
        $this->slanivel[] = $slanivel;

        return $this;
    }

    /**
     * Remove slanivel
     *
     * @param \Servicos\FinanceiroBundle\Entity\Slanivel $slanivel
     */
    public function removeSlanivel(\Servicos\FinanceiroBundle\Entity\Slanivel $slanivel)
    {
        $this->slanivel->removeElement($slanivel);
    }

    /**
     * Get slanivel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlanivel()
    {
        return $this->slanivel;
    }

    /**
     * Set slaProximocodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Sla $slaProximocodigoid
     * @return Sla
     */
    public function setSlaProximocodigoid(\Servicos\FinanceiroBundle\Entity\Sla $slaProximocodigoid = null)
    {
        $this->slaProximocodigoid = $slaProximocodigoid;

        return $this;
    }

    /**
     * Get slaProximocodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Sla 
     */
    public function getSlaProximocodigoid()
    {
        return $this->slaProximocodigoid;
    }
}
