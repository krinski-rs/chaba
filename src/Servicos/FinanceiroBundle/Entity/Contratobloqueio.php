<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratobloqueio
 */
class Contratobloqueio
{
    /**
     * @var integer
     */
    private $contbloqCodigoid;

    /**
     * @var string
     */
    private $contbloqMotivo;

    /**
     * @var integer
     */
    private $contbloqUsuario;

    /**
     * @var \DateTime
     */
    private $contbloqDatainc;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Bloqueio
     */
    private $bloqCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get contbloqCodigoid
     *
     * @return integer 
     */
    public function getContbloqCodigoid()
    {
        return $this->contbloqCodigoid;
    }

    /**
     * Set contbloqMotivo
     *
     * @param string $contbloqMotivo
     * @return Contratobloqueio
     */
    public function setContbloqMotivo($contbloqMotivo)
    {
        $this->contbloqMotivo = $contbloqMotivo;

        return $this;
    }

    /**
     * Get contbloqMotivo
     *
     * @return string 
     */
    public function getContbloqMotivo()
    {
        return $this->contbloqMotivo;
    }

    /**
     * Set contbloqUsuario
     *
     * @param integer $contbloqUsuario
     * @return Contratobloqueio
     */
    public function setContbloqUsuario($contbloqUsuario)
    {
        $this->contbloqUsuario = $contbloqUsuario;

        return $this;
    }

    /**
     * Get contbloqUsuario
     *
     * @return integer 
     */
    public function getContbloqUsuario()
    {
        return $this->contbloqUsuario;
    }

    /**
     * Set contbloqDatainc
     *
     * @param \DateTime $contbloqDatainc
     * @return Contratobloqueio
     */
    public function setContbloqDatainc($contbloqDatainc)
    {
        $this->contbloqDatainc = $contbloqDatainc;

        return $this;
    }

    /**
     * Get contbloqDatainc
     *
     * @return \DateTime 
     */
    public function getContbloqDatainc()
    {
        return $this->contbloqDatainc;
    }

    /**
     * Set bloqCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Bloqueio $bloqCodigoid
     * @return Contratobloqueio
     */
    public function setBloqCodigoid(\Servicos\FinanceiroBundle\Entity\Bloqueio $bloqCodigoid = null)
    {
        $this->bloqCodigoid = $bloqCodigoid;

        return $this;
    }

    /**
     * Get bloqCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Bloqueio 
     */
    public function getBloqCodigoid()
    {
        return $this->bloqCodigoid;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratobloqueio
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
