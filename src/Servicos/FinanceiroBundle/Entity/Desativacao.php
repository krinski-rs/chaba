<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Desativacao
 */
class Desativacao
{
    /**
     * @var integer
     */
    private $desaCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $desaDatainc;

    /**
     * @var \DateTime
     */
    private $desaDatadesativado;

    /**
     * @var boolean
     */
    private $desaAtivo;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get desaCodigoid
     *
     * @return integer 
     */
    public function getDesaCodigoid()
    {
        return $this->desaCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Desativacao
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
     * Set desaDatainc
     *
     * @param \DateTime $desaDatainc
     * @return Desativacao
     */
    public function setDesaDatainc($desaDatainc)
    {
        $this->desaDatainc = $desaDatainc;

        return $this;
    }

    /**
     * Get desaDatainc
     *
     * @return \DateTime 
     */
    public function getDesaDatainc()
    {
        return $this->desaDatainc;
    }

    /**
     * Set desaDatadesativado
     *
     * @param \DateTime $desaDatadesativado
     * @return Desativacao
     */
    public function setDesaDatadesativado($desaDatadesativado)
    {
        $this->desaDatadesativado = $desaDatadesativado;

        return $this;
    }

    /**
     * Get desaDatadesativado
     *
     * @return \DateTime 
     */
    public function getDesaDatadesativado()
    {
        return $this->desaDatadesativado;
    }

    /**
     * Set desaAtivo
     *
     * @param boolean $desaAtivo
     * @return Desativacao
     */
    public function setDesaAtivo($desaAtivo)
    {
        $this->desaAtivo = $desaAtivo;

        return $this;
    }

    /**
     * Get desaAtivo
     *
     * @return boolean 
     */
    public function getDesaAtivo()
    {
        return $this->desaAtivo;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Desativacao
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
