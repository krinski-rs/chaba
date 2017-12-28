<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodicidade
 */
class Periodicidade
{
    /**
     * @var integer
     */
    private $periCodigoid;

    /**
     * @var integer
     */
    private $periPeriodicidadefatura;

    /**
     * @var integer
     */
    private $periPeriodicidadenota;

    /**
     * @var integer
     */
    private $periParcelasfatura;

    /**
     * @var integer
     */
    private $periParcelasnota;

    /**
     * @var integer
     */
    private $periVencimento;

    /**
     * @var \DateTime
     */
    private $periDatainc;

    /**
     * @var boolean
     */
    private $periAposassinatura;

    /**
     * @var integer
     */
    private $periPospago;

    /**
     * @var integer
     */
    private $periNumeroparcelas;

    /**
     * @var integer
     */
    private $periCarenciadias;

    /**
     * @var integer
     */
    private $periCarenciames;

    /**
     * @var \DateTime
     */
    private $periCarenciadatafixa;

    /**
     * @var \DateTime
     */
    private $periVencimentodatafixa;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    private $contvaloCodigoid;


    /**
     * Get periCodigoid
     *
     * @return integer 
     */
    public function getPeriCodigoid()
    {
        return $this->periCodigoid;
    }

    /**
     * Set periPeriodicidadefatura
     *
     * @param integer $periPeriodicidadefatura
     * @return Periodicidade
     */
    public function setPeriPeriodicidadefatura($periPeriodicidadefatura)
    {
        $this->periPeriodicidadefatura = $periPeriodicidadefatura;

        return $this;
    }

    /**
     * Get periPeriodicidadefatura
     *
     * @return integer 
     */
    public function getPeriPeriodicidadefatura()
    {
        return $this->periPeriodicidadefatura;
    }

    /**
     * Set periPeriodicidadenota
     *
     * @param integer $periPeriodicidadenota
     * @return Periodicidade
     */
    public function setPeriPeriodicidadenota($periPeriodicidadenota)
    {
        $this->periPeriodicidadenota = $periPeriodicidadenota;

        return $this;
    }

    /**
     * Get periPeriodicidadenota
     *
     * @return integer 
     */
    public function getPeriPeriodicidadenota()
    {
        return $this->periPeriodicidadenota;
    }

    /**
     * Set periParcelasfatura
     *
     * @param integer $periParcelasfatura
     * @return Periodicidade
     */
    public function setPeriParcelasfatura($periParcelasfatura)
    {
        $this->periParcelasfatura = $periParcelasfatura;

        return $this;
    }

    /**
     * Get periParcelasfatura
     *
     * @return integer 
     */
    public function getPeriParcelasfatura()
    {
        return $this->periParcelasfatura;
    }

    /**
     * Set periParcelasnota
     *
     * @param integer $periParcelasnota
     * @return Periodicidade
     */
    public function setPeriParcelasnota($periParcelasnota)
    {
        $this->periParcelasnota = $periParcelasnota;

        return $this;
    }

    /**
     * Get periParcelasnota
     *
     * @return integer 
     */
    public function getPeriParcelasnota()
    {
        return $this->periParcelasnota;
    }

    /**
     * Set periVencimento
     *
     * @param integer $periVencimento
     * @return Periodicidade
     */
    public function setPeriVencimento($periVencimento)
    {
        $this->periVencimento = $periVencimento;

        return $this;
    }

    /**
     * Get periVencimento
     *
     * @return integer 
     */
    public function getPeriVencimento()
    {
        return $this->periVencimento;
    }

    /**
     * Set periDatainc
     *
     * @param \DateTime $periDatainc
     * @return Periodicidade
     */
    public function setPeriDatainc($periDatainc)
    {
        $this->periDatainc = $periDatainc;

        return $this;
    }

    /**
     * Get periDatainc
     *
     * @return \DateTime 
     */
    public function getPeriDatainc()
    {
        return $this->periDatainc;
    }

    /**
     * Set periAposassinatura
     *
     * @param boolean $periAposassinatura
     * @return Periodicidade
     */
    public function setPeriAposassinatura($periAposassinatura)
    {
        $this->periAposassinatura = $periAposassinatura;

        return $this;
    }

    /**
     * Get periAposassinatura
     *
     * @return boolean 
     */
    public function getPeriAposassinatura()
    {
        return $this->periAposassinatura;
    }

    /**
     * Set periPospago
     *
     * @param integer $periPospago
     * @return Periodicidade
     */
    public function setPeriPospago($periPospago)
    {
        $this->periPospago = $periPospago;

        return $this;
    }

    /**
     * Get periPospago
     *
     * @return integer 
     */
    public function getPeriPospago()
    {
        return $this->periPospago;
    }

    /**
     * Set periNumeroparcelas
     *
     * @param integer $periNumeroparcelas
     * @return Periodicidade
     */
    public function setPeriNumeroparcelas($periNumeroparcelas)
    {
        $this->periNumeroparcelas = $periNumeroparcelas;

        return $this;
    }

    /**
     * Get periNumeroparcelas
     *
     * @return integer 
     */
    public function getPeriNumeroparcelas()
    {
        return $this->periNumeroparcelas;
    }

    /**
     * Set periCarenciadias
     *
     * @param integer $periCarenciadias
     * @return Periodicidade
     */
    public function setPeriCarenciadias($periCarenciadias)
    {
        $this->periCarenciadias = $periCarenciadias;

        return $this;
    }

    /**
     * Get periCarenciadias
     *
     * @return integer 
     */
    public function getPeriCarenciadias()
    {
        return $this->periCarenciadias;
    }

    /**
     * Set periCarenciames
     *
     * @param integer $periCarenciames
     * @return Periodicidade
     */
    public function setPeriCarenciames($periCarenciames)
    {
        $this->periCarenciames = $periCarenciames;

        return $this;
    }

    /**
     * Get periCarenciames
     *
     * @return integer 
     */
    public function getPeriCarenciames()
    {
        return $this->periCarenciames;
    }

    /**
     * Set periCarenciadatafixa
     *
     * @param \DateTime $periCarenciadatafixa
     * @return Periodicidade
     */
    public function setPeriCarenciadatafixa($periCarenciadatafixa)
    {
        $this->periCarenciadatafixa = $periCarenciadatafixa;

        return $this;
    }

    /**
     * Get periCarenciadatafixa
     *
     * @return \DateTime 
     */
    public function getPeriCarenciadatafixa()
    {
        return $this->periCarenciadatafixa;
    }

    /**
     * Set periVencimentodatafixa
     *
     * @param \DateTime $periVencimentodatafixa
     * @return Periodicidade
     */
    public function setPeriVencimentodatafixa($periVencimentodatafixa)
    {
        $this->periVencimentodatafixa = $periVencimentodatafixa;

        return $this;
    }

    /**
     * Get periVencimentodatafixa
     *
     * @return \DateTime 
     */
    public function getPeriVencimentodatafixa()
    {
        return $this->periVencimentodatafixa;
    }

    /**
     * Set contvaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloCodigoid
     * @return Periodicidade
     */
    public function setContvaloCodigoid(\Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloCodigoid = null)
    {
        $this->contvaloCodigoid = $contvaloCodigoid;

        return $this;
    }

    /**
     * Get contvaloCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contratovalor 
     */
    public function getContvaloCodigoid()
    {
        return $this->contvaloCodigoid;
    }
}
