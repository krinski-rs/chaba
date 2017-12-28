<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recebimento
 */
class Recebimento
{
    /**
     * @var integer
     */
    private $receCodigoid;

    /**
     * @var \DateTime
     */
    private $receDatainc;

    /**
     * @var string
     */
    private $receValor;

    /**
     * @var string
     */
    private $receValormulta;

    /**
     * @var string
     */
    private $receValorjuros;

    /**
     * @var \DateTime
     */
    private $receDatarecebido;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Fatura
     */
    private $fatuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Lotebancario
     */
    private $lotebancCodigoid;


    /**
     * Get receCodigoid
     *
     * @return integer 
     */
    public function getReceCodigoid()
    {
        return $this->receCodigoid;
    }

    /**
     * Set receDatainc
     *
     * @param \DateTime $receDatainc
     * @return Recebimento
     */
    public function setReceDatainc($receDatainc)
    {
        $this->receDatainc = $receDatainc;

        return $this;
    }

    /**
     * Get receDatainc
     *
     * @return \DateTime 
     */
    public function getReceDatainc()
    {
        return $this->receDatainc;
    }

    /**
     * Set receValor
     *
     * @param string $receValor
     * @return Recebimento
     */
    public function setReceValor($receValor)
    {
        $this->receValor = $receValor;

        return $this;
    }

    /**
     * Get receValor
     *
     * @return string 
     */
    public function getReceValor()
    {
        return $this->receValor;
    }

    /**
     * Set receValormulta
     *
     * @param string $receValormulta
     * @return Recebimento
     */
    public function setReceValormulta($receValormulta)
    {
        $this->receValormulta = $receValormulta;

        return $this;
    }

    /**
     * Get receValormulta
     *
     * @return string 
     */
    public function getReceValormulta()
    {
        return $this->receValormulta;
    }

    /**
     * Set receValorjuros
     *
     * @param string $receValorjuros
     * @return Recebimento
     */
    public function setReceValorjuros($receValorjuros)
    {
        $this->receValorjuros = $receValorjuros;

        return $this;
    }

    /**
     * Get receValorjuros
     *
     * @return string 
     */
    public function getReceValorjuros()
    {
        return $this->receValorjuros;
    }

    /**
     * Set receDatarecebido
     *
     * @param \DateTime $receDatarecebido
     * @return Recebimento
     */
    public function setReceDatarecebido($receDatarecebido)
    {
        $this->receDatarecebido = $receDatarecebido;

        return $this;
    }

    /**
     * Get receDatarecebido
     *
     * @return \DateTime 
     */
    public function getReceDatarecebido()
    {
        return $this->receDatarecebido;
    }

    /**
     * Set fatuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid
     * @return Recebimento
     */
    public function setFatuCodigoid(\Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid = null)
    {
        $this->fatuCodigoid = $fatuCodigoid;

        return $this;
    }

    /**
     * Get fatuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Fatura 
     */
    public function getFatuCodigoid()
    {
        return $this->fatuCodigoid;
    }

    /**
     * Set lotebancCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Lotebancario $lotebancCodigoid
     * @return Recebimento
     */
    public function setLotebancCodigoid(\Servicos\FinanceiroBundle\Entity\Lotebancario $lotebancCodigoid = null)
    {
        $this->lotebancCodigoid = $lotebancCodigoid;

        return $this;
    }

    /**
     * Get lotebancCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Lotebancario 
     */
    public function getLotebancCodigoid()
    {
        return $this->lotebancCodigoid;
    }
}
