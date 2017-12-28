<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoque
 */
class Estoque
{
    /**
     * @var integer
     */
    private $estoCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $estoqueproduto;
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->estoqueproduto = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get estoCodigoid
     *
     * @return integer 
     */
    public function getEstoCodigoid()
    {
        return $this->estoCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Estoque
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Add estoqueproduto
     *
     * @param \Servicos\LumaBundle\Entity\Estoqueproduto $estoqueproduto
     * @return Unidade
     */
    public function addEstoqueproduto(\Servicos\LumaBundle\Entity\Estoqueproduto $estoqueproduto)
    {
    	$this->estoqueproduto = $estoqueproduto;
    
    	return $this;
    }

    /**
     * Remove estoqueproduto
     *
     * @param \Servicos\LumaBundle\Entity\Estoqueproduto $estoqueproduto
     */
    public function removeEstoqueproduto(\Servicos\LumaBundle\Entity\Estoqueproduto $estoqueproduto)
    {
    	$this->estoqueproduto->removeElement($estoqueproduto);
    }

    /**
     * Get estoqueproduto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstoqueproduto()
    {
    	return $this->estoqueproduto;
    }
}
