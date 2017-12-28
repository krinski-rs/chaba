<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 */
class Categoria
{
    /**
     * @var integer
     */
    private $cateCodigoid;

    /**
     * @var string
     */
    private $cateNome;

    /**
     * @var string
     */
    private $cateDescricao;

    /**
     * @var \DateTime
     */
    private $cateDatainc;

    /**
     * @var boolean
     */
    private $cateAtivo;

    /**
     * @var string
     */
    private $cateOrdem;

    /**
     * @var \Servicos\LumaBundle\Entity\Categoria
     */
    private $catePaicodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Ncm
     */
    private $ncmCodigoid;


    /**
     * Get cateCodigoid
     *
     * @return integer 
     */
    public function getCateCodigoid()
    {
        return $this->cateCodigoid;
    }

    /**
     * Set cateNome
     *
     * @param string $cateNome
     * @return Categoria
     */
    public function setCateNome($cateNome)
    {
        $this->cateNome = $cateNome;

        return $this;
    }

    /**
     * Get cateNome
     *
     * @return string 
     */
    public function getCateNome()
    {
        return $this->cateNome;
    }

    /**
     * Set cateDescricao
     *
     * @param string $cateDescricao
     * @return Categoria
     */
    public function setCateDescricao($cateDescricao)
    {
        $this->cateDescricao = $cateDescricao;

        return $this;
    }

    /**
     * Get cateDescricao
     *
     * @return string 
     */
    public function getCateDescricao()
    {
        return $this->cateDescricao;
    }

    /**
     * Set cateDatainc
     *
     * @param \DateTime $cateDatainc
     * @return Categoria
     */
    public function setCateDatainc($cateDatainc)
    {
        $this->cateDatainc = $cateDatainc;

        return $this;
    }

    /**
     * Get cateDatainc
     *
     * @return \DateTime 
     */
    public function getCateDatainc()
    {
        return $this->cateDatainc;
    }

    /**
     * Set cateAtivo
     *
     * @param boolean $cateAtivo
     * @return Categoria
     */
    public function setCateAtivo($cateAtivo)
    {
        $this->cateAtivo = $cateAtivo;

        return $this;
    }

    /**
     * Get cateAtivo
     *
     * @return boolean 
     */
    public function getCateAtivo()
    {
        return $this->cateAtivo;
    }

    /**
     * Set cateOrdem
     *
     * @param string $cateOrdem
     * @return Categoria
     */
    public function setCateOrdem($cateOrdem)
    {
        $this->cateOrdem = $cateOrdem;

        return $this;
    }

    /**
     * Get cateOrdem
     *
     * @return string 
     */
    public function getCateOrdem()
    {
        return $this->cateOrdem;
    }

    /**
     * Set catePaicodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Categoria $catePaicodigoid
     * @return Categoria
     */
    public function setCatePaicodigoid(\Servicos\LumaBundle\Entity\Categoria $catePaicodigoid = null)
    {
        $this->catePaicodigoid = $catePaicodigoid;

        return $this;
    }

    /**
     * Get catePaicodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Categoria 
     */
    public function getCatePaicodigoid()
    {
        return $this->catePaicodigoid;
    }

    /**
     * Set ncmCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ncm $ncmCodigoid
     * @return Categoria
     */
    public function setNcmCodigoid(\Servicos\LumaBundle\Entity\Ncm $ncmCodigoid = null)
    {
        $this->ncmCodigoid = $ncmCodigoid;

        return $this;
    }

    /**
     * Get ncmCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Ncm 
     */
    public function getNcmCodigoid()
    {
        return $this->ncmCodigoid;
    }
}
