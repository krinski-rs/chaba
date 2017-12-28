<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Upgradevalor
 */
class Upgradevalor
{
    /**
     * @var integer
     */
    private $upgrvaloCodigoid;

    /**
     * @var string
     */
    private $upgrvaloValor;

    /**
     * @var string
     */
    private $upgrValorsemdesconto;

    /**
     * @var string
     */
    private $upgrValorsemimposto;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Moeda
     */
    private $moedCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Natureza
     */
    private $natuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Periodicidade
     */
    private $periCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Upgrade
     */
    private $upgrCodigoid;


    /**
     * Get upgrvaloCodigoid
     *
     * @return integer 
     */
    public function getUpgrvaloCodigoid()
    {
        return $this->upgrvaloCodigoid;
    }

    /**
     * Set upgrvaloValor
     *
     * @param string $upgrvaloValor
     * @return Upgradevalor
     */
    public function setUpgrvaloValor($upgrvaloValor)
    {
        $this->upgrvaloValor = $upgrvaloValor;

        return $this;
    }

    /**
     * Get upgrvaloValor
     *
     * @return string 
     */
    public function getUpgrvaloValor()
    {
        return $this->upgrvaloValor;
    }

    /**
     * Set upgrValorsemdesconto
     *
     * @param string $upgrValorsemdesconto
     * @return Upgradevalor
     */
    public function setUpgrValorsemdesconto($upgrValorsemdesconto)
    {
        $this->upgrValorsemdesconto = $upgrValorsemdesconto;

        return $this;
    }

    /**
     * Get upgrValorsemdesconto
     *
     * @return string 
     */
    public function getUpgrValorsemdesconto()
    {
        return $this->upgrValorsemdesconto;
    }

    /**
     * Set upgrValorsemimposto
     *
     * @param string $upgrValorsemimposto
     * @return Upgradevalor
     */
    public function setUpgrValorsemimposto($upgrValorsemimposto)
    {
        $this->upgrValorsemimposto = $upgrValorsemimposto;

        return $this;
    }

    /**
     * Get upgrValorsemimposto
     *
     * @return string 
     */
    public function getUpgrValorsemimposto()
    {
        return $this->upgrValorsemimposto;
    }

    /**
     * Set moedCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Moeda $moedCodigoid
     * @return Upgradevalor
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
     * @return Upgradevalor
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
     * Set periCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Periodicidade $periCodigoid
     * @return Upgradevalor
     */
    public function setPeriCodigoid(\Servicos\FinanceiroBundle\Entity\Periodicidade $periCodigoid = null)
    {
        $this->periCodigoid = $periCodigoid;

        return $this;
    }

    /**
     * Get periCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Periodicidade 
     */
    public function getPeriCodigoid()
    {
        return $this->periCodigoid;
    }

    /**
     * Set upgrCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgrade $upgrCodigoid
     * @return Upgradevalor
     */
    public function setUpgrCodigoid(\Servicos\FinanceiroBundle\Entity\Upgrade $upgrCodigoid = null)
    {
        $this->upgrCodigoid = $upgrCodigoid;

        return $this;
    }

    /**
     * Get upgrCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Upgrade 
     */
    public function getUpgrCodigoid()
    {
        return $this->upgrCodigoid;
    }
}
