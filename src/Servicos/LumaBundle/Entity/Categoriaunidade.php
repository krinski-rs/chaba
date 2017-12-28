<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoriaunidade
 */
class Categoriaunidade
{
    /**
     * @var integer
     */
    private $cateunidCodigoid;

    /**
     * @var boolean
     */
    private $cateunidAtivo;

    /**
     * @var \Servicos\LumaBundle\Entity\Categoria
     */
    private $cateCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get cateunidCodigoid
     *
     * @return integer 
     */
    public function getCateunidCodigoid()
    {
        return $this->cateunidCodigoid;
    }

    /**
     * Set cateunidAtivo
     *
     * @param boolean $cateunidAtivo
     * @return Categoriaunidade
     */
    public function setCateunidAtivo($cateunidAtivo)
    {
        $this->cateunidAtivo = $cateunidAtivo;

        return $this;
    }

    /**
     * Get cateunidAtivo
     *
     * @return boolean 
     */
    public function getCateunidAtivo()
    {
        return $this->cateunidAtivo;
    }

    /**
     * Set cateCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Categoria $cateCodigoid
     * @return Categoriaunidade
     */
    public function setCateCodigoid(\Servicos\LumaBundle\Entity\Categoria $cateCodigoid = null)
    {
        $this->cateCodigoid = $cateCodigoid;

        return $this;
    }

    /**
     * Get cateCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Categoria 
     */
    public function getCateCodigoid()
    {
        return $this->cateCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Categoriaunidade
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
}
