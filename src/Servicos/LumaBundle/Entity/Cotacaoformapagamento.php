<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaoformapagamento
 */
class Cotacaoformapagamento
{
    /**
     * @var integer
     */
    private $cotaformpagaCodigoid;

    /**
     * @var string
     */
    private $cotaformpagaForma;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;


    /**
     * Get cotaformpagaCodigoid
     *
     * @return integer 
     */
    public function getCotaformpagaCodigoid()
    {
        return $this->cotaformpagaCodigoid;
    }

    /**
     * Set cotaformpagaForma
     *
     * @param string $cotaformpagaForma
     * @return Cotacaoformapagamento
     */
    public function setCotaformpagaForma($cotaformpagaForma)
    {
        $this->cotaformpagaForma = $cotaformpagaForma;

        return $this;
    }

    /**
     * Get cotaformpagaForma
     *
     * @return string 
     */
    public function getCotaformpagaForma()
    {
        return $this->cotaformpagaForma;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return Cotacaoformapagamento
     */
    public function setCotaCodigoid(\Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid = null)
    {
        $this->cotaCodigoid = $cotaCodigoid;

        return $this;
    }

    /**
     * Get cotaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacao 
     */
    public function getCotaCodigoid()
    {
        return $this->cotaCodigoid;
    }
    /**
     * @var \Servicos\LumaBundle\Entity\CondicaoPagamento
     */
    private $idCondicaoPagamento;


    /**
     * Set idCondicaoPagamento
     *
     * @param \Servicos\LumaBundle\Entity\CondicaoPagamento $idCondicaoPagamento
     * @return Cotacaoformapagamento
     */
    public function setIdCondicaoPagamento(\Servicos\LumaBundle\Entity\CondicaoPagamento $idCondicaoPagamento = null)
    {
        $this->idCondicaoPagamento = $idCondicaoPagamento;

        return $this;
    }

    /**
     * Get idCondicaoPagamento
     *
     * @return \Servicos\LumaBundle\Entity\CondicaoPagamento 
     */
    public function getIdCondicaoPagamento()
    {
        return $this->idCondicaoPagamento;
    }
}
