<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enderecoentregaatributovalor
 */
class Enderecoentregaatributovalor
{
    /**
     * @var integer
     */
    private $endeentratrivaloCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var integer
     */
    private $endeentrCodigoid;

    /**
     * @var string
     */
    private $endeentratrivaloValor;

    /**
     * @var string
     */
    private $endeentratrivaloDescricao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $endeentratrivaloDatafim;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Atributovalor
     */
    private $atrivaloCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor
     */
    private $endeentratrivaloPaicodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuitoPop;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $atributoAdicional;
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->circuitoPop = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->atributoAdicional = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get endeentratrivaloCodigoid
     *
     * @return integer 
     */
    public function getEndeentratrivaloCodigoid()
    {
        return $this->endeentratrivaloCodigoid;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Enderecoentregaatributovalor
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid)
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

    /**
     * Set endeentrCodigoid
     *
     * @param integer $endeentrCodigoid
     * @return Enderecoentregaatributovalor
     */
    public function setEndeentrCodigoid($endeentrCodigoid)
    {
        $this->endeentrCodigoid = $endeentrCodigoid;

        return $this;
    }

    /**
     * Get endeentrCodigoid
     *
     * @return integer 
     */
    public function getEndeentrCodigoid()
    {
        return $this->endeentrCodigoid;
    }

    /**
     * Set endeentratrivaloValor
     *
     * @param string $endeentratrivaloValor
     * @return Enderecoentregaatributovalor
     */
    public function setEndeentratrivaloValor($endeentratrivaloValor)
    {
        $this->endeentratrivaloValor = $endeentratrivaloValor;

        return $this;
    }

    /**
     * Get endeentratrivaloValor
     *
     * @return string 
     */
    public function getEndeentratrivaloValor()
    {
        return $this->endeentratrivaloValor;
    }

    /**
     * Set endeentratrivaloDescricao
     *
     * @param string $endeentratrivaloDescricao
     * @return Enderecoentregaatributovalor
     */
    public function setEndeentratrivaloDescricao($endeentratrivaloDescricao)
    {
        $this->endeentratrivaloDescricao = $endeentratrivaloDescricao;

        return $this;
    }

    /**
     * Get endeentratrivaloDescricao
     *
     * @return string 
     */
    public function getEndeentratrivaloDescricao()
    {
        return $this->endeentratrivaloDescricao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return Enderecoentregaatributovalor
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return Enderecoentregaatributovalor
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set endeentratrivaloDatafim
     *
     * @param \DateTime $endeentratrivaloDatafim
     * @return Enderecoentregaatributovalor
     */
    public function setEndeentratrivaloDatafim($endeentratrivaloDatafim)
    {
        $this->endeentratrivaloDatafim = $endeentratrivaloDatafim;

        return $this;
    }

    /**
     * Get endeentratrivaloDatafim
     *
     * @return \DateTime 
     */
    public function getEndeentratrivaloDatafim()
    {
        return $this->endeentratrivaloDatafim;
    }

    /**
     * Set atrivaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Atributovalor $atrivaloCodigoid
     * @return Enderecoentregaatributovalor
     */
    public function setAtrivaloCodigoid(\Servicos\FinanceiroBundle\Entity\Atributovalor $atrivaloCodigoid = null)
    {
        $this->atrivaloCodigoid = $atrivaloCodigoid;

        return $this;
    }

    /**
     * Get atrivaloCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Atributovalor 
     */
    public function getAtrivaloCodigoid()
    {
        return $this->atrivaloCodigoid;
    }

    /**
     * Set endeentratrivaloPaicodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloPaicodigoid
     * @return Enderecoentregaatributovalor
     */
    public function setEndeentratrivaloPaicodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloPaicodigoid = null)
    {
        $this->endeentratrivaloPaicodigoid = $endeentratrivaloPaicodigoid;

        return $this;
    }

    /**
     * Get endeentratrivaloPaicodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor 
     */
    public function getEndeentratrivaloPaicodigoid()
    {
        return $this->endeentratrivaloPaicodigoid;
    }

    /**
     * Add circuitoPop
     *
     * @param \Servicos\GcdbBundle\Entity\CircuitoPop $circuitoPop
     * @return Enderecoentregaatributovalor
     */
    public function addCircuitoPop(\Servicos\GcdbBundle\Entity\CircuitoPop $circuitoPop)
    {
        $this->circuitoPop[] = $circuitoPop;

        return $this;
    }

    /**
     * Remove circuitoPop
     *
     * @param \Servicos\GcdbBundle\Entity\CircuitoPop $circuitoPop
     */
    public function removeCircuitoPop(\Servicos\GcdbBundle\Entity\CircuitoPop $circuitoPop)
    {
        $this->circuitoPop->removeElement($circuitoPop);
    }

    /**
     * Get circuitoPop
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCircuitoPop()
    {
        return $this->circuitoPop;
    }

    /**
     * Add atributoAdicional
     *
     * @param AtributoAdicional $atributoAdicional
     * @return Enderecoentregaatributovalor
     */
    public function addAtributoAdicional(AtributoAdicional $atributoAdicional)
    {
        $this->atributoAdicional[] = $atributoAdicional;

        return $this;
    }

    /**
     * Remove atributoAdicional
     *
     * @param AtributoAdicional $atributoAdicional
     */
    public function removeAtributoAdicional(AtributoAdicional $atributoAdicional)
    {
        $this->atributoAdicional->removeElement($atributoAdicional);
    }

    /**
     * Get atributoAdicional
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtributoAdicional()
    {
        return $this->atributoAdicional;
    }
}
