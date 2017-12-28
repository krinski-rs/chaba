<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratovalor
 */
class Contratovalor
{
    /**
     * @var integer
     */
    private $contvaloCodigoid;

    /**
     * @var \DateTime
     */
    private $contvaloDatainic;

    /**
     * @var \DateTime
     */
    private $contvaloDatafim;

    /**
     * @var string
     */
    private $contvaloValor;

    /**
     * @var string
     */
    private $contvaloValorsemdesconto;

    /**
     * @var string
     */
    private $contvaloValorsemimposto;

    /**
     * @var string
     */
    private $contvaloSva;

    /**
     * @var string
     */
    private $contvaloScm;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    private $contvaloProximocodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    private $contvaloAnteriorcodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Moeda
     */
    private $moedCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Natureza
     */
    private $natuCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratovalorDiscriminacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $periodicidade;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratovalorDiscriminacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->periodicidade = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Get contvaloCodigoid
     *
     * @return integer
     */
    public function getContvaloCodigoid()
    {
        return $this->contvaloCodigoid;
    }

    /**
     * Set contvaloDatainic
     *
     * @param \DateTime $contvaloDatainic
     * @return Contratovalor
     */
    public function setContvaloDatainic($contvaloDatainic)
    {
        $this->contvaloDatainic = $contvaloDatainic;

        return $this;
    }

    /**
     * Get contvaloDatainic
     *
     * @return \DateTime
     */
    public function getContvaloDatainic()
    {
        return $this->contvaloDatainic;
    }

    /**
     * Set contvaloDatafim
     *
     * @param \DateTime $contvaloDatafim
     * @return Contratovalor
     */
    public function setContvaloDatafim($contvaloDatafim)
    {
        $this->contvaloDatafim = $contvaloDatafim;

        return $this;
    }

    /**
     * Get contvaloDatafim
     *
     * @return \DateTime
     */
    public function getContvaloDatafim()
    {
        return $this->contvaloDatafim;
    }

    /**
     * Set contvaloValor
     *
     * @param string $contvaloValor
     * @return Contratovalor
     */
    public function setContvaloValor($contvaloValor)
    {
        $this->contvaloValor = $contvaloValor;

        return $this;
    }

    /**
     * Get contvaloValor
     *
     * @return string
     */
    public function getContvaloValor()
    {
        return $this->contvaloValor;
    }

    /**
     * Set contvaloValorsemdesconto
     *
     * @param string $contvaloValorsemdesconto
     * @return Contratovalor
     */
    public function setContvaloValorsemdesconto($contvaloValorsemdesconto)
    {
        $this->contvaloValorsemdesconto = $contvaloValorsemdesconto;

        return $this;
    }

    /**
     * Get contvaloValorsemdesconto
     *
     * @return string
     */
    public function getContvaloValorsemdesconto()
    {
        return $this->contvaloValorsemdesconto;
    }

    /**
     * Set contvaloValorsemimposto
     *
     * @param string $contvaloValorsemimposto
     * @return Contratovalor
     */
    public function setContvaloValorsemimposto($contvaloValorsemimposto)
    {
        $this->contvaloValorsemimposto = $contvaloValorsemimposto;

        return $this;
    }

    /**
     * Get contvaloValorsemimposto
     *
     * @return string
     */
    public function getContvaloValorsemimposto()
    {
        return $this->contvaloValorsemimposto;
    }

    /**
     * Set contvaloSva
     *
     * @param string $contvaloSva
     * @return Contratovalor
     */
    public function setContvaloSva($contvaloSva)
    {
        $this->contvaloSva = $contvaloSva;

        return $this;
    }

    /**
     * Get contvaloSva
     *
     * @return string
     */
    public function getContvaloSva()
    {
        return $this->contvaloSva;
    }

    /**
     * Set contvaloScm
     *
     * @param string $contvaloScm
     * @return Contratovalor
     */
    public function setContvaloScm($contvaloScm)
    {
        $this->contvaloScm = $contvaloScm;

        return $this;
    }

    /**
     * Get contvaloScm
     *
     * @return string
     */
    public function getContvaloScm()
    {
        return $this->contvaloScm;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratovalor
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set contvaloProximocodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloProximocodigoid
     * @return Contratovalor
     */
    public function setContvaloProximocodigoid(\Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloProximocodigoid = null)
    {
        $this->contvaloProximocodigoid = $contvaloProximocodigoid;

        return $this;
    }

    /**
     * Get contvaloProximocodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    public function getContvaloProximocodigoid()
    {
        return $this->contvaloProximocodigoid;
    }

    /**
     * Set contvaloAnteriorcodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloAnteriorcodigoid
     * @return Contratovalor
     */
    public function setContvaloAnteriorcodigoid(\Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloAnteriorcodigoid = null)
    {
        $this->contvaloAnteriorcodigoid = $contvaloAnteriorcodigoid;

        return $this;
    }

    /**
     * Get contvaloAnteriorcodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    public function getContvaloAnteriorcodigoid()
    {
        return $this->contvaloAnteriorcodigoid;
    }

    /**
     * Set moedCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Moeda $moedCodigoid
     * @return Contratovalor
     */
    public function setMoedCodigoid(\Servicos\FinanceiroBundle\Entity\Moeda $moedCodigoid = null)
    {
        $this->moedCodigoid = $moedCodigoid;

        return $this;
    }

    /**
     * Get moedCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Moeda
     */
    public function getMoedCodigoid()
    {
        return $this->moedCodigoid;
    }

    /**
     * Set natuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Natureza $natuCodigoid
     * @return Contratovalor
     */
    public function setNatuCodigoid(\Servicos\FinanceiroBundle\Entity\Natureza $natuCodigoid = null)
    {
        $this->natuCodigoid = $natuCodigoid;

        return $this;
    }

    /**
     * Get natuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Natureza
     */
    public function getNatuCodigoid()
    {
        return $this->natuCodigoid;
    }

    /**
     * Add contratovalorDiscriminacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\ContratovalorDiscriminacao $contratovalorDiscriminacao
     * @return Contratovalor
     */
    public function addContratovalorDiscriminacao(\Servicos\FinanceiroBundle\Entity\ContratovalorDiscriminacao $contratovalorDiscriminacao)
    {
        $this->contratovalorDiscriminacao[] = $contratovalorDiscriminacao;

        return $this;
    }

    /**
     * Remove contratovalorDiscriminacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\ContratovalorDiscriminacao $contratovalorDiscriminacao
     */
    public function removeContratovalorDiscriminacao(\Servicos\FinanceiroBundle\Entity\ContratovalorDiscriminacao $contratovalorDiscriminacao)
    {
        $this->contratovalorDiscriminacao->removeElement($contratovalorDiscriminacao);
    }

    /**
     * Get discriminacao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratovalorDiscriminacao()
    {
        return $this->contratovalorDiscriminacao;
    }

    /**
     * Add periodicidade
     *
     * @param \Servicos\FinanceiroBundle\Entity\Periodicidade $periodicidade
     * @return Contratovalor
     */
    public function addPeriodicidade(\Servicos\FinanceiroBundle\Entity\Periodicidade $periodicidade)
    {
        $this->periodicidade[] = $periodicidade;

        return $this;
    }

    /**
     * Remove periodicidade
     *
     * @param \Servicos\FinanceiroBundle\Entity\Periodicidade $periodicidade
     */
    public function removePeriodicidade(\Servicos\FinanceiroBundle\Entity\Periodicidade $periodicidade)
    {
        $this->periodicidade->removeElement($periodicidade);
    }

    /**
     * Get periodicidade
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeriodicidade()
    {
        return $this->periodicidade;
    }
}
