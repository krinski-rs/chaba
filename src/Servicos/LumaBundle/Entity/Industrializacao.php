<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industrializacao
 */
class Industrializacao
{
    /**
     * @var integer
     */
    private $induCodigoid;

    /**
     * @var float
     */
    private $induQuantidade;

    /**
     * @var \DateTime
     */
    private $induDatainc;

    /**
     * @var integer
     */
    private $induFabricantecodigoid;

    /**
     * @var integer
     */
    private $induAuditorcodigoid;

    /**
     * @var \DateTime
     */
    private $induAlditoriadatainc;

    /**
     * @var boolean
     */
    private $induAprovadosn;

    /**
     * @var integer
     */
    private $moviCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get induCodigoid
     *
     * @return integer 
     */
    public function getInduCodigoid()
    {
        return $this->induCodigoid;
    }

    /**
     * Set induQuantidade
     *
     * @param float $induQuantidade
     * @return Industrializacao
     */
    public function setInduQuantidade($induQuantidade)
    {
        $this->induQuantidade = $induQuantidade;

        return $this;
    }

    /**
     * Get induQuantidade
     *
     * @return float 
     */
    public function getInduQuantidade()
    {
        return $this->induQuantidade;
    }

    /**
     * Set induDatainc
     *
     * @param \DateTime $induDatainc
     * @return Industrializacao
     */
    public function setInduDatainc($induDatainc)
    {
        $this->induDatainc = $induDatainc;

        return $this;
    }

    /**
     * Get induDatainc
     *
     * @return \DateTime 
     */
    public function getInduDatainc()
    {
        return $this->induDatainc;
    }

    /**
     * Set induFabricantecodigoid
     *
     * @param integer $induFabricantecodigoid
     * @return Industrializacao
     */
    public function setInduFabricantecodigoid($induFabricantecodigoid)
    {
        $this->induFabricantecodigoid = $induFabricantecodigoid;

        return $this;
    }

    /**
     * Get induFabricantecodigoid
     *
     * @return integer 
     */
    public function getInduFabricantecodigoid()
    {
        return $this->induFabricantecodigoid;
    }

    /**
     * Set induAuditorcodigoid
     *
     * @param integer $induAuditorcodigoid
     * @return Industrializacao
     */
    public function setInduAuditorcodigoid($induAuditorcodigoid)
    {
        $this->induAuditorcodigoid = $induAuditorcodigoid;

        return $this;
    }

    /**
     * Get induAuditorcodigoid
     *
     * @return integer 
     */
    public function getInduAuditorcodigoid()
    {
        return $this->induAuditorcodigoid;
    }

    /**
     * Set induAlditoriadatainc
     *
     * @param \DateTime $induAlditoriadatainc
     * @return Industrializacao
     */
    public function setInduAlditoriadatainc($induAlditoriadatainc)
    {
        $this->induAlditoriadatainc = $induAlditoriadatainc;

        return $this;
    }

    /**
     * Get induAlditoriadatainc
     *
     * @return \DateTime 
     */
    public function getInduAlditoriadatainc()
    {
        return $this->induAlditoriadatainc;
    }

    /**
     * Set induAprovadosn
     *
     * @param boolean $induAprovadosn
     * @return Industrializacao
     */
    public function setInduAprovadosn($induAprovadosn)
    {
        $this->induAprovadosn = $induAprovadosn;

        return $this;
    }

    /**
     * Get induAprovadosn
     *
     * @return boolean 
     */
    public function getInduAprovadosn()
    {
        return $this->induAprovadosn;
    }

    /**
     * Set moviCodigoid
     *
     * @param integer $moviCodigoid
     * @return Industrializacao
     */
    public function setMoviCodigoid($moviCodigoid)
    {
        $this->moviCodigoid = $moviCodigoid;

        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return integer 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Industrializacao
     */
    public function setProdCodigoid(\Servicos\LumaBundle\Entity\Produto $prodCodigoid = null)
    {
        $this->prodCodigoid = $prodCodigoid;

        return $this;
    }

    /**
     * Get prodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Produto 
     */
    public function getProdCodigoid()
    {
        return $this->prodCodigoid;
    }
}
