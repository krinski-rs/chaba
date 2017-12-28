<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fatura
 */
class Fatura
{
    /**
     * @var integer
     */
    private $fatuCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $fatuDatainc;

    /**
     * @var \DateTime
     */
    private $fatuDatavencimento;

    /**
     * @var string
     */
    private $fatuValor;

    /**
     * @var integer
     */
    private $fatuNsr;

    /**
     * @var boolean
     */
    private $fatuEmitido;

    /**
     * @var \DateTime
     */
    private $fatuDatade;

    /**
     * @var \DateTime
     */
    private $fatuDataate;

    /**
     * @var string
     */
    private $fatuExcedente;

    /**
     * @var string
     */
    private $fatuConsumido;

    /**
     * @var string
     */
    private $fatuCodigobarra;

    /**
     * @var string
     */
    private $fatuLinhadigitavel;

    /**
     * @var string
     */
    private $fatuNossonumero;

    /**
     * @var string
     */
    private $fatuValorjuros;

    /**
     * @var string
     */
    private $fatuValormulta;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Arquivoremessa
     */
    private $arquremeCodigoid;


    /**
     * Get fatuCodigoid
     *
     * @return integer 
     */
    public function getFatuCodigoid()
    {
        return $this->fatuCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Fatura
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set fatuDatainc
     *
     * @param \DateTime $fatuDatainc
     * @return Fatura
     */
    public function setFatuDatainc($fatuDatainc)
    {
        $this->fatuDatainc = $fatuDatainc;

        return $this;
    }

    /**
     * Get fatuDatainc
     *
     * @return \DateTime 
     */
    public function getFatuDatainc()
    {
        return $this->fatuDatainc;
    }

    /**
     * Set fatuDatavencimento
     *
     * @param \DateTime $fatuDatavencimento
     * @return Fatura
     */
    public function setFatuDatavencimento($fatuDatavencimento)
    {
        $this->fatuDatavencimento = $fatuDatavencimento;

        return $this;
    }

    /**
     * Get fatuDatavencimento
     *
     * @return \DateTime 
     */
    public function getFatuDatavencimento()
    {
        return $this->fatuDatavencimento;
    }

    /**
     * Set fatuValor
     *
     * @param string $fatuValor
     * @return Fatura
     */
    public function setFatuValor($fatuValor)
    {
        $this->fatuValor = $fatuValor;

        return $this;
    }

    /**
     * Get fatuValor
     *
     * @return string 
     */
    public function getFatuValor()
    {
        return $this->fatuValor;
    }

    /**
     * Set fatuNsr
     *
     * @param integer $fatuNsr
     * @return Fatura
     */
    public function setFatuNsr($fatuNsr)
    {
        $this->fatuNsr = $fatuNsr;

        return $this;
    }

    /**
     * Get fatuNsr
     *
     * @return integer 
     */
    public function getFatuNsr()
    {
        return $this->fatuNsr;
    }

    /**
     * Set fatuEmitido
     *
     * @param boolean $fatuEmitido
     * @return Fatura
     */
    public function setFatuEmitido($fatuEmitido)
    {
        $this->fatuEmitido = $fatuEmitido;

        return $this;
    }

    /**
     * Get fatuEmitido
     *
     * @return boolean 
     */
    public function getFatuEmitido()
    {
        return $this->fatuEmitido;
    }

    /**
     * Set fatuDatade
     *
     * @param \DateTime $fatuDatade
     * @return Fatura
     */
    public function setFatuDatade($fatuDatade)
    {
        $this->fatuDatade = $fatuDatade;

        return $this;
    }

    /**
     * Get fatuDatade
     *
     * @return \DateTime 
     */
    public function getFatuDatade()
    {
        return $this->fatuDatade;
    }

    /**
     * Set fatuDataate
     *
     * @param \DateTime $fatuDataate
     * @return Fatura
     */
    public function setFatuDataate($fatuDataate)
    {
        $this->fatuDataate = $fatuDataate;

        return $this;
    }

    /**
     * Get fatuDataate
     *
     * @return \DateTime 
     */
    public function getFatuDataate()
    {
        return $this->fatuDataate;
    }

    /**
     * Set fatuExcedente
     *
     * @param string $fatuExcedente
     * @return Fatura
     */
    public function setFatuExcedente($fatuExcedente)
    {
        $this->fatuExcedente = $fatuExcedente;

        return $this;
    }

    /**
     * Get fatuExcedente
     *
     * @return string 
     */
    public function getFatuExcedente()
    {
        return $this->fatuExcedente;
    }

    /**
     * Set fatuConsumido
     *
     * @param string $fatuConsumido
     * @return Fatura
     */
    public function setFatuConsumido($fatuConsumido)
    {
        $this->fatuConsumido = $fatuConsumido;

        return $this;
    }

    /**
     * Get fatuConsumido
     *
     * @return string 
     */
    public function getFatuConsumido()
    {
        return $this->fatuConsumido;
    }

    /**
     * Set fatuCodigobarra
     *
     * @param string $fatuCodigobarra
     * @return Fatura
     */
    public function setFatuCodigobarra($fatuCodigobarra)
    {
        $this->fatuCodigobarra = $fatuCodigobarra;

        return $this;
    }

    /**
     * Get fatuCodigobarra
     *
     * @return string 
     */
    public function getFatuCodigobarra()
    {
        return $this->fatuCodigobarra;
    }

    /**
     * Set fatuLinhadigitavel
     *
     * @param string $fatuLinhadigitavel
     * @return Fatura
     */
    public function setFatuLinhadigitavel($fatuLinhadigitavel)
    {
        $this->fatuLinhadigitavel = $fatuLinhadigitavel;

        return $this;
    }

    /**
     * Get fatuLinhadigitavel
     *
     * @return string 
     */
    public function getFatuLinhadigitavel()
    {
        return $this->fatuLinhadigitavel;
    }

    /**
     * Set fatuNossonumero
     *
     * @param string $fatuNossonumero
     * @return Fatura
     */
    public function setFatuNossonumero($fatuNossonumero)
    {
        $this->fatuNossonumero = $fatuNossonumero;

        return $this;
    }

    /**
     * Get fatuNossonumero
     *
     * @return string 
     */
    public function getFatuNossonumero()
    {
        return $this->fatuNossonumero;
    }

    /**
     * Set fatuValorjuros
     *
     * @param string $fatuValorjuros
     * @return Fatura
     */
    public function setFatuValorjuros($fatuValorjuros)
    {
        $this->fatuValorjuros = $fatuValorjuros;

        return $this;
    }

    /**
     * Get fatuValorjuros
     *
     * @return string 
     */
    public function getFatuValorjuros()
    {
        return $this->fatuValorjuros;
    }

    /**
     * Set fatuValormulta
     *
     * @param string $fatuValormulta
     * @return Fatura
     */
    public function setFatuValormulta($fatuValormulta)
    {
        $this->fatuValormulta = $fatuValormulta;

        return $this;
    }

    /**
     * Get fatuValormulta
     *
     * @return string 
     */
    public function getFatuValormulta()
    {
        return $this->fatuValormulta;
    }

    /**
     * Set arquremeCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Arquivoremessa $arquremeCodigoid
     * @return Fatura
     */
    public function setArquremeCodigoid(\Servicos\FinanceiroBundle\Entity\Arquivoremessa $arquremeCodigoid = null)
    {
        $this->arquremeCodigoid = $arquremeCodigoid;

        return $this;
    }

    /**
     * Get arquremeCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Arquivoremessa 
     */
    public function getArquremeCodigoid()
    {
        return $this->arquremeCodigoid;
    }
}
