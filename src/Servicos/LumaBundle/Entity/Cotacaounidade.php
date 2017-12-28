<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaounidade
 */
class Cotacaounidade
{
    /**
     * @var integer
     */
    private $cotaunidCodigoid;

    /**
     * @var \DateTime
     */
    private $cotaunidDatainc;

    /**
     * @var string
     */
    private $cotaunidHash;

    /**
     * @var integer
     */
    private $cotaunidValidade;

    /**
     * @var string
     */
    private $cotaunidFrete;

    /**
     * @var string
     */
    private $cotaunidTipofrete;

    /**
     * @var integer
     */
    private $cotaunidPrazodeentrega;

    /**
     * @var string
     */
    private $cotaunidInseridopor;

    /**
     * @var string
     */
    private $cotaunidComentario;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get cotaunidCodigoid
     *
     * @return integer 
     */
    public function getCotaunidCodigoid()
    {
        return $this->cotaunidCodigoid;
    }

    /**
     * Set cotaunidDatainc
     *
     * @param \DateTime $cotaunidDatainc
     * @return Cotacaounidade
     */
    public function setCotaunidDatainc($cotaunidDatainc)
    {
        $this->cotaunidDatainc = $cotaunidDatainc;

        return $this;
    }

    /**
     * Get cotaunidDatainc
     *
     * @return \DateTime 
     */
    public function getCotaunidDatainc()
    {
        return $this->cotaunidDatainc;
    }

    /**
     * Set cotaunidHash
     *
     * @param string $cotaunidHash
     * @return Cotacaounidade
     */
    public function setCotaunidHash($cotaunidHash)
    {
        $this->cotaunidHash = $cotaunidHash;

        return $this;
    }

    /**
     * Get cotaunidHash
     *
     * @return string 
     */
    public function getCotaunidHash()
    {
        return $this->cotaunidHash;
    }

    /**
     * Set cotaunidValidade
     *
     * @param integer $cotaunidValidade
     * @return Cotacaounidade
     */
    public function setCotaunidValidade($cotaunidValidade)
    {
        $this->cotaunidValidade = $cotaunidValidade;

        return $this;
    }

    /**
     * Get cotaunidValidade
     *
     * @return integer 
     */
    public function getCotaunidValidade()
    {
        return $this->cotaunidValidade;
    }

    /**
     * Set cotaunidFrete
     *
     * @param string $cotaunidFrete
     * @return Cotacaounidade
     */
    public function setCotaunidFrete($cotaunidFrete)
    {
        $this->cotaunidFrete = $cotaunidFrete;

        return $this;
    }

    /**
     * Get cotaunidFrete
     *
     * @return string 
     */
    public function getCotaunidFrete()
    {
        return $this->cotaunidFrete;
    }

    /**
     * Set cotaunidTipofrete
     *
     * @param string $cotaunidTipofrete
     * @return Cotacaounidade
     */
    public function setCotaunidTipofrete($cotaunidTipofrete)
    {
        $this->cotaunidTipofrete = $cotaunidTipofrete;

        return $this;
    }

    /**
     * Get cotaunidTipofrete
     *
     * @return string 
     */
    public function getCotaunidTipofrete()
    {
        return $this->cotaunidTipofrete;
    }

    /**
     * Set cotaunidPrazodeentrega
     *
     * @param integer $cotaunidPrazodeentrega
     * @return Cotacaounidade
     */
    public function setCotaunidPrazodeentrega($cotaunidPrazodeentrega)
    {
        $this->cotaunidPrazodeentrega = $cotaunidPrazodeentrega;

        return $this;
    }

    /**
     * Get cotaunidPrazodeentrega
     *
     * @return integer 
     */
    public function getCotaunidPrazodeentrega()
    {
        return $this->cotaunidPrazodeentrega;
    }

    /**
     * Set cotaunidInseridopor
     *
     * @param string $cotaunidInseridopor
     * @return Cotacaounidade
     */
    public function setCotaunidInseridopor($cotaunidInseridopor)
    {
        $this->cotaunidInseridopor = $cotaunidInseridopor;

        return $this;
    }

    /**
     * Get cotaunidInseridopor
     *
     * @return string 
     */
    public function getCotaunidInseridopor()
    {
        return $this->cotaunidInseridopor;
    }

    /**
     * Set cotaunidComentario
     *
     * @param string $cotaunidComentario
     * @return Cotacaounidade
     */
    public function setCotaunidComentario($cotaunidComentario)
    {
        $this->cotaunidComentario = $cotaunidComentario;

        return $this;
    }

    /**
     * Get cotaunidComentario
     *
     * @return string 
     */
    public function getCotaunidComentario()
    {
        return $this->cotaunidComentario;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return Cotacaounidade
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
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Cotacaounidade
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
}
