<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CircuitoPop
 */
class CircuitoPop
{
    /**
     * @var integer
     */
    private $idCircuitoPop;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;

    /**
     * @var \Servicos\GcdbBundle\Entity\Circuito
     */
    private $circCodigoid;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor
     */
    private $endeentratrivaloCodigoid;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idCircuitoPop
     *
     * @return integer 
     */
    public function getIdCircuitoPop()
    {
        return $this->idCircuitoPop;
    }

    /**
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return CircuitoPop
     */
    public function setIdPop(\Servicos\LumaBundle\Entity\Pop $idPop)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return integer 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }

    /**
     * Set circCodigoid
     *
     * @param \Servicos\GcdbBundle\Entity\Circuito $circCodigoid
     * @return CircuitoPop
     */
    public function setCircCodigoid(\Servicos\GcdbBundle\Entity\Circuito $circCodigoid)
    {
        $this->circCodigoid = $circCodigoid;

        return $this;
    }

    /**
     * Get circCodigoid
     *
     * @return integer 
     */
    public function getCircCodigoid()
    {
        return $this->circCodigoid;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return CircuitoPop
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return CircuitoPop
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
     * Set endeentratrivaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid
     * @return CircuitoPop
     */
    public function setEndeentratrivaloCodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid)
    {
        $this->endeentratrivaloCodigoid = $endeentratrivaloCodigoid;

        return $this;
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return CircuitoPop
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
