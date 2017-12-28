<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacaovencimento
 */
class Notificacaovencimento
{
    /**
     * @var integer
     */
    private $notvencCodigoid;

    /**
     * @var \DateTime
     */
    private $notvencDatainc;

    /**
     * @var integer
     */
    private $notvencUsuacodigoid;

    /**
     * @var \DateTime
     */
    private $notvencDataconfirmacao;

    /**
     * @var string
     */
    private $notvencDescricaoconfirmacao;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get notvencCodigoid
     *
     * @return integer 
     */
    public function getNotvencCodigoid()
    {
        return $this->notvencCodigoid;
    }

    /**
     * Set notvencDatainc
     *
     * @param \DateTime $notvencDatainc
     * @return Notificacaovencimento
     */
    public function setNotvencDatainc($notvencDatainc)
    {
        $this->notvencDatainc = $notvencDatainc;

        return $this;
    }

    /**
     * Get notvencDatainc
     *
     * @return \DateTime 
     */
    public function getNotvencDatainc()
    {
        return $this->notvencDatainc;
    }

    /**
     * Set notvencUsuacodigoid
     *
     * @param integer $notvencUsuacodigoid
     * @return Notificacaovencimento
     */
    public function setNotvencUsuacodigoid($notvencUsuacodigoid)
    {
        $this->notvencUsuacodigoid = $notvencUsuacodigoid;

        return $this;
    }

    /**
     * Get notvencUsuacodigoid
     *
     * @return integer 
     */
    public function getNotvencUsuacodigoid()
    {
        return $this->notvencUsuacodigoid;
    }

    /**
     * Set notvencDataconfirmacao
     *
     * @param \DateTime $notvencDataconfirmacao
     * @return Notificacaovencimento
     */
    public function setNotvencDataconfirmacao($notvencDataconfirmacao)
    {
        $this->notvencDataconfirmacao = $notvencDataconfirmacao;

        return $this;
    }

    /**
     * Get notvencDataconfirmacao
     *
     * @return \DateTime 
     */
    public function getNotvencDataconfirmacao()
    {
        return $this->notvencDataconfirmacao;
    }

    /**
     * Set notvencDescricaoconfirmacao
     *
     * @param string $notvencDescricaoconfirmacao
     * @return Notificacaovencimento
     */
    public function setNotvencDescricaoconfirmacao($notvencDescricaoconfirmacao)
    {
        $this->notvencDescricaoconfirmacao = $notvencDescricaoconfirmacao;

        return $this;
    }

    /**
     * Get notvencDescricaoconfirmacao
     *
     * @return string 
     */
    public function getNotvencDescricaoconfirmacao()
    {
        return $this->notvencDescricaoconfirmacao;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Notificacaovencimento
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
