<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Designacao
 */
class Designacao
{
    /**
     * @var integer
     */
    private $desigCodigoid;

    /**
     * @var integer
     */
    private $clieCodigoid;

    /**
     * @var string
     */
    private $desigStt;

    /**
     * @var integer
     */
    private $desigNumero;

    /**
     * @var string
     */
    private $desigPedido;

    /**
     * @var integer
     */
    private $desigPonta;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentrega
     */
    private $endeentrCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contrato;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contrato = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get desigCodigoid
     *
     * @return integer 
     */
    public function getDesigCodigoid()
    {
        return $this->desigCodigoid;
    }

    /**
     * Set clieCodigoid
     *
     * @param integer $clieCodigoid
     * @return Designacao
     */
    public function setClieCodigoid($clieCodigoid)
    {
        $this->clieCodigoid = $clieCodigoid;

        return $this;
    }

    /**
     * Get clieCodigoid
     *
     * @return integer 
     */
    public function getClieCodigoid()
    {
        return $this->clieCodigoid;
    }

    /**
     * Set desigStt
     *
     * @param string $desigStt
     * @return Designacao
     */
    public function setDesigStt($desigStt)
    {
        $this->desigStt = $desigStt;

        return $this;
    }

    /**
     * Get desigStt
     *
     * @return string 
     */
    public function getDesigStt()
    {
        return $this->desigStt;
    }

    /**
     * Set desigNumero
     *
     * @param integer $desigNumero
     * @return Designacao
     */
    public function setDesigNumero($desigNumero)
    {
        $this->desigNumero = $desigNumero;

        return $this;
    }

    /**
     * Get desigNumero
     *
     * @return integer 
     */
    public function getDesigNumero()
    {
        return $this->desigNumero;
    }

    /**
     * Set desigPedido
     *
     * @param string $desigPedido
     * @return Designacao
     */
    public function setDesigPedido($desigPedido)
    {
        $this->desigPedido = $desigPedido;

        return $this;
    }

    /**
     * Get desigPedido
     *
     * @return string 
     */
    public function getDesigPedido()
    {
        return $this->desigPedido;
    }

    /**
     * Set desigPonta
     *
     * @param integer $desigPonta
     * @return Designacao
     */
    public function setDesigPonta($desigPonta)
    {
        $this->desigPonta = $desigPonta;

        return $this;
    }

    /**
     * Get desigPonta
     *
     * @return integer 
     */
    public function getDesigPonta()
    {
        return $this->desigPonta;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Designacao
     */
    public function addContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato[] = $contrato;

        return $this;
    }

    /**
     * Remove contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     */
    public function removeContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato->removeElement($contrato);
    }

    /**
     * Get contrato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set endeentrCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid
     * @return Designacao
     */
    public function setEnderecoentrega(\Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid)
    {
        $this->endeentrCodigoid = $endeentrCodigoid;
        
        return $this;
    }

    /**
     * Get endeentrCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentrega 
     */
    public function getEnderecoentrega()
    {
        return $this->endeentrCodigoid;
    }
}
