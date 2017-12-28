<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reativacao
 */
class Reativacao
{
    /**
     * @var integer
     */
    private $reatCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $reatDatainc;

    /**
     * @var \DateTime
     */
    private $reatDatareativado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get reatCodigoid
     *
     * @return integer 
     */
    public function getReatCodigoid()
    {
        return $this->reatCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Reativacao
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
     * Set reatDatainc
     *
     * @param \DateTime $reatDatainc
     * @return Reativacao
     */
    public function setReatDatainc($reatDatainc)
    {
        $this->reatDatainc = $reatDatainc;

        return $this;
    }

    /**
     * Get reatDatainc
     *
     * @return \DateTime 
     */
    public function getReatDatainc()
    {
        return $this->reatDatainc;
    }

    /**
     * Set reatDatareativado
     *
     * @param \DateTime $reatDatareativado
     * @return Reativacao
     */
    public function setReatDatareativado($reatDatareativado)
    {
        $this->reatDatareativado = $reatDatareativado;

        return $this;
    }

    /**
     * Get reatDatareativado
     *
     * @return \DateTime 
     */
    public function getReatDatareativado()
    {
        return $this->reatDatareativado;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Reativacao
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
