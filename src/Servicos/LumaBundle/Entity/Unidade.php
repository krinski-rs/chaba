<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidade
 */
class Unidade
{
    /**
     * @var integer
     */
    private $unidCodigoid;

    /**
     * @var integer
     */
    private $circCodigoid;

    /**
     * @var integer
     */
    private $endeentrCodigoid;

    /**
     * @var string
     */
    private $unidNome;

    /**
     * @var integer
     */
    private $unidStechcodigoid;

    /**
     * @var \DateTime
     */
    private $unidDatainc;

    /**
     * @var boolean
     */
    private $unidAtivo;

    /**
     * @var boolean
     */
    private $unidOculto;

    /**
     * @var boolean
     */
    private $unidLocaldeentrega;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidPaicodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $estoque;
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->tipo = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->estoque = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get unidCodigoid
     *
     * @return integer 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set circCodigoid
     *
     * @param integer $circCodigoid
     * @return Unidade
     */
    public function setCircCodigoid($circCodigoid)
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
     * Set endeentrCodigoid
     *
     * @param integer $endeentrCodigoid
     * @return Unidade
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
     * Set unidNome
     *
     * @param string $unidNome
     * @return Unidade
     */
    public function setUnidNome($unidNome)
    {
        $this->unidNome = $unidNome;

        return $this;
    }

    /**
     * Get unidNome
     *
     * @return string 
     */
    public function getUnidNome()
    {
        return $this->unidNome;
    }

    /**
     * Set unidStechcodigoid
     *
     * @param integer $unidStechcodigoid
     * @return Unidade
     */
    public function setUnidStechcodigoid($unidStechcodigoid)
    {
        $this->unidStechcodigoid = $unidStechcodigoid;

        return $this;
    }

    /**
     * Get unidStechcodigoid
     *
     * @return integer 
     */
    public function getUnidStechcodigoid()
    {
        return $this->unidStechcodigoid;
    }

    /**
     * Set unidDatainc
     *
     * @param \DateTime $unidDatainc
     * @return Unidade
     */
    public function setUnidDatainc($unidDatainc)
    {
        $this->unidDatainc = $unidDatainc;

        return $this;
    }

    /**
     * Get unidDatainc
     *
     * @return \DateTime 
     */
    public function getUnidDatainc()
    {
        return $this->unidDatainc;
    }

    /**
     * Set unidAtivo
     *
     * @param boolean $unidAtivo
     * @return Unidade
     */
    public function setUnidAtivo($unidAtivo)
    {
        $this->unidAtivo = $unidAtivo;

        return $this;
    }

    /**
     * Get unidAtivo
     *
     * @return boolean 
     */
    public function getUnidAtivo()
    {
        return $this->unidAtivo;
    }

    /**
     * Set unidOculto
     *
     * @param boolean $unidOculto
     * @return Unidade
     */
    public function setUnidOculto($unidOculto)
    {
        $this->unidOculto = $unidOculto;

        return $this;
    }

    /**
     * Get unidOculto
     *
     * @return boolean 
     */
    public function getUnidOculto()
    {
        return $this->unidOculto;
    }

    /**
     * Set unidLocaldeentrega
     *
     * @param boolean $unidLocaldeentrega
     * @return Unidade
     */
    public function setUnidLocaldeentrega($unidLocaldeentrega)
    {
        $this->unidLocaldeentrega = $unidLocaldeentrega;

        return $this;
    }

    /**
     * Get unidLocaldeentrega
     *
     * @return boolean 
     */
    public function getUnidLocaldeentrega()
    {
        return $this->unidLocaldeentrega;
    }

    /**
     * Set unidPaicodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidPaicodigoid
     * @return Unidade
     */
    public function setUnidPaicodigoid(\Servicos\LumaBundle\Entity\Unidade $unidPaicodigoid = null)
    {
        $this->unidPaicodigoid = $unidPaicodigoid;

        return $this;
    }

    /**
     * Get unidPaicodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidPaicodigoid()
    {
        return $this->unidPaicodigoid;
    }

    /**
     * Add tipo
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipo
     * @return Unidade
     */
    public function addTipo(\Servicos\LumaBundle\Entity\Tipo $tipo)
    {
    	$this->tipo[] = $tipo;
    
    	return $this;
    }

    /**
     * Remove tipo
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipo
     */
    public function removeTipo(\Servicos\LumaBundle\Entity\Tipo $tipo)
    {
    	$this->tipo->removeElement($tipo);
    }

    /**
     * Get tipo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipo()
    {
    	return $this->tipo;
    }

    /**
     * Add estoque
     *
     * @param \Servicos\LumaBundle\Entity\Estoque $estoque
     * @return Unidade
     */
    public function addEstoque(\Servicos\LumaBundle\Entity\Estoque $estoque)
    {
    	$this->estoque[] = $estoque;
    
    	return $this;
    }

    /**
     * Remove estoque
     *
     * @param \Servicos\LumaBundle\Entity\Estoque $estoque
     */
    public function removeEstoque(\Servicos\LumaBundle\Entity\Estoque $estoque)
    {
    	$this->estoque->removeElement($estoque);
    }

    /**
     * Get estoque
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstoque()
    {
    	return $this->estoque;
    }
}
