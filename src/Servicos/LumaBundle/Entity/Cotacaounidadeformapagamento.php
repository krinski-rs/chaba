<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaounidadeformapagamento
 */
class Cotacaounidadeformapagamento
{
    /**
     * @var integer
     */
    private $cotaunidformpagaCodigoid;

    /**
     * @var string
     */
    private $cotaunidformpagaForma;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacaounidade
     */
    private $cotaunidCodigoid;


    /**
     * Get cotaunidformpagaCodigoid
     *
     * @return integer 
     */
    public function getCotaunidformpagaCodigoid()
    {
        return $this->cotaunidformpagaCodigoid;
    }

    /**
     * Set cotaunidformpagaForma
     *
     * @param string $cotaunidformpagaForma
     * @return Cotacaounidadeformapagamento
     */
    public function setCotaunidformpagaForma($cotaunidformpagaForma)
    {
        $this->cotaunidformpagaForma = $cotaunidformpagaForma;

        return $this;
    }

    /**
     * Get cotaunidformpagaForma
     *
     * @return string 
     */
    public function getCotaunidformpagaForma()
    {
        return $this->cotaunidformpagaForma;
    }

    /**
     * Set cotaunidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacaounidade $cotaunidCodigoid
     * @return Cotacaounidadeformapagamento
     */
    public function setCotaunidCodigoid(\Servicos\LumaBundle\Entity\Cotacaounidade $cotaunidCodigoid = null)
    {
        $this->cotaunidCodigoid = $cotaunidCodigoid;

        return $this;
    }

    /**
     * Get cotaunidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacaounidade 
     */
    public function getCotaunidCodigoid()
    {
        return $this->cotaunidCodigoid;
    }
    /**
     * @var \Servicos\LumaBundle\Entity\CondicaoPagamento
     */
    private $idCondicaoPagamento;


    /**
     * Set idCondicaoPagamento
     *
     * @param \Servicos\LumaBundle\Entity\CondicaoPagamento $idCondicaoPagamento
     * @return Cotacaounidadeformapagamento
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
