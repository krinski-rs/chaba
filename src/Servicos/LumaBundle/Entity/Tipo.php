<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipo
 */
class Tipo
{
    /**
     * @var integer
     */
    private $tipoCodigoid;

    /**
     * @var string
     */
    private $tipoNome;

    /**
     * @var integer
     */
    private $tipoTipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $unidade;
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->unidade = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get tipoCodigoid
     *
     * @return integer 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
     * Set tipoNome
     *
     * @param string $tipoNome
     * @return Tipo
     */
    public function setTipoNome($tipoNome)
    {
        $this->tipoNome = $tipoNome;

        return $this;
    }

    /**
     * Get tipoNome
     *
     * @return string 
     */
    public function getTipoNome()
    {
        return $this->tipoNome;
    }

    /**
     * Set tipoTipo
     *
     * @param integer $tipoTipo
     * @return Tipo
     */
    public function setTipoTipo($tipoTipo)
    {
        $this->tipoTipo = $tipoTipo;

        return $this;
    }

    /**
     * Get tipoTipo
     *
     * @return integer 
     */
    public function getTipoTipo()
    {
        return $this->tipoTipo;
    }

    /**
     * Add unidade
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidade
     * @return Tipo
     */
    public function addUnidade(\Servicos\LumaBundle\Entity\Unidade $unidade)
    {
    	$this->unidade = $unidade;
    
    	return $this;
    }
    
    /**
     * Remove unidade
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidade
     */
    public function removeUnidade(\Servicos\LumaBundle\Entity\Unidade $unidade)
    {
    	$this->unidade->removeElement($unidade);
    }
    
    /**
     * Get unidade
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnidade()
    {
    	return $this->unidade;
    }
    
}
