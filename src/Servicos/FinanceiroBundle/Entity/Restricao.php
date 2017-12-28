<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restricao
 */
class Restricao
{
    /**
     * @var integer
     */
    private $restCodigoid;

    /**
     * @var boolean
     */
    private $restContratardeterceiro;

    /**
     * @var boolean
     */
    private $restDivulgaramarca;

    /**
     * @var boolean
     */
    private $restMudarmeiotransmicao;

    /**
     * @var boolean
     */
    private $restTransferirdireitos;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get restCodigoid
     *
     * @return integer 
     */
    public function getRestCodigoid()
    {
        return $this->restCodigoid;
    }

    /**
     * Set restContratardeterceiro
     *
     * @param boolean $restContratardeterceiro
     * @return Restricao
     */
    public function setRestContratardeterceiro($restContratardeterceiro)
    {
        $this->restContratardeterceiro = $restContratardeterceiro;

        return $this;
    }

    /**
     * Get restContratardeterceiro
     *
     * @return boolean 
     */
    public function getRestContratardeterceiro()
    {
        return $this->restContratardeterceiro;
    }

    /**
     * Set restDivulgaramarca
     *
     * @param boolean $restDivulgaramarca
     * @return Restricao
     */
    public function setRestDivulgaramarca($restDivulgaramarca)
    {
        $this->restDivulgaramarca = $restDivulgaramarca;

        return $this;
    }

    /**
     * Get restDivulgaramarca
     *
     * @return boolean 
     */
    public function getRestDivulgaramarca()
    {
        return $this->restDivulgaramarca;
    }

    /**
     * Set restMudarmeiotransmicao
     *
     * @param boolean $restMudarmeiotransmicao
     * @return Restricao
     */
    public function setRestMudarmeiotransmicao($restMudarmeiotransmicao)
    {
        $this->restMudarmeiotransmicao = $restMudarmeiotransmicao;

        return $this;
    }

    /**
     * Get restMudarmeiotransmicao
     *
     * @return boolean 
     */
    public function getRestMudarmeiotransmicao()
    {
        return $this->restMudarmeiotransmicao;
    }

    /**
     * Set restTransferirdireitos
     *
     * @param boolean $restTransferirdireitos
     * @return Restricao
     */
    public function setRestTransferirdireitos($restTransferirdireitos)
    {
        $this->restTransferirdireitos = $restTransferirdireitos;

        return $this;
    }

    /**
     * Get restTransferirdireitos
     *
     * @return boolean 
     */
    public function getRestTransferirdireitos()
    {
        return $this->restTransferirdireitos;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Restricao
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
}
