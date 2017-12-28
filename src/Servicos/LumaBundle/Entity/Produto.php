<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 */
class Produto
{
    /**
     * @var integer
     */
    private $prodCodigoid;

    /**
     * @var string
     */
    private $prodNome;

    /**
     * @var string
     */
    private $prodDescricao;

    /**
     * @var \DateTime
     */
    private $prodDatainc;

    /**
     * @var boolean
     */
    private $prodAtivo;

    /**
     * @var boolean
     */
    private $prodIslance;

    /**
     * @var string
     */
    private $nomeNfe;

    /**
     * @var \Servicos\LumaBundle\Entity\Categoria
     */
    private $cateCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Medida
     */
    private $mediCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Ncm
     */
    private $ncmCodigoid;

    /**
     * @var boolean $prodGarantiaEstendida
     */
    private $prodGarantiaEstendida;

    /**
     * @var boolean $prodImportado
     */
    private $prodImportado;

    /**
     * @var string
     */
    private $prodOrigem;

    /**
     * @var string
     */
    private $prodClassificacao;


    /**
     * Get prodCodigoid
     *
     * @return integer 
     */
    public function getProdCodigoid()
    {
        return $this->prodCodigoid;
    }

    /**
     * Set prodNome
     *
     * @param string $prodNome
     * @return Produto
     */
    public function setProdNome($prodNome)
    {
        $this->prodNome = $prodNome;

        return $this;
    }

    /**
     * Get prodNome
     *
     * @return string 
     */
    public function getProdNome()
    {
        return $this->prodNome;
    }

    /**
     * Set prodDescricao
     *
     * @param string $prodDescricao
     * @return Produto
     */
    public function setProdDescricao($prodDescricao)
    {
        $this->prodDescricao = $prodDescricao;

        return $this;
    }

    /**
     * Get prodDescricao
     *
     * @return string 
     */
    public function getProdDescricao()
    {
        return $this->prodDescricao;
    }

    /**
     * Set prodDatainc
     *
     * @param \DateTime $prodDatainc
     * @return Produto
     */
    public function setProdDatainc($prodDatainc)
    {
        $this->prodDatainc = $prodDatainc;

        return $this;
    }

    /**
     * Get prodDatainc
     *
     * @return \DateTime 
     */
    public function getProdDatainc()
    {
        return $this->prodDatainc;
    }

    /**
     * Set prodAtivo
     *
     * @param boolean $prodAtivo
     * @return Produto
     */
    public function setProdAtivo($prodAtivo)
    {
        $this->prodAtivo = $prodAtivo;

        return $this;
    }

    /**
     * Get prodAtivo
     *
     * @return boolean 
     */
    public function getProdAtivo()
    {
        return $this->prodAtivo;
    }

    /**
     * Set prodIslance
     *
     * @param boolean $prodIslance
     * @return Produto
     */
    public function setProdIslance($prodIslance)
    {
        $this->prodIslance = $prodIslance;

        return $this;
    }

    /**
     * Get prodIslance
     *
     * @return boolean 
     */
    public function getProdIslance()
    {
        return $this->prodIslance;
    }

    /**
     * Set nomeNfe
     *
     * @param string $nomeNfe
     * @return Produto
     */
    public function setNomeNfe($nomeNfe)
    {
        $this->nomeNfe = $nomeNfe;

        return $this;
    }

    /**
     * Get nomeNfe
     *
     * @return string 
     */
    public function getNomeNfe()
    {
        return $this->nomeNfe;
    }

    /**
     * Set cateCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Categoria $cateCodigoid
     * @return Produto
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
     * Set mediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Medida $mediCodigoid
     * @return Produto
     */
    public function setMediCodigoid(\Servicos\LumaBundle\Entity\Medida $mediCodigoid = null)
    {
        $this->mediCodigoid = $mediCodigoid;

        return $this;
    }

    /**
     * Get mediCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Medida 
     */
    public function getMediCodigoid()
    {
        return $this->mediCodigoid;
    }

    /**
     * Set ncmCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ncm $ncmCodigoid
     * @return Produto
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

    /**
     * @return boolean
     */
    public function getProdGarantiaEstendida()
    {
        return $this->prodGarantiaEstendida;
    }

    /**
     * @param boolean $prodGarantiaEstendida
     */
    public function setProdGarantiaEstendida($prodGarantiaEstendida)
    {
        $this->prodGarantiaEstendida = $prodGarantiaEstendida;
    }

    /**
     * @return boolean
     */
    public function getProdImportado()
    {
        return $this->prodImportado;
    }

    /**
     * @param boolean $prodImportado
     */
    public function setProdImportado($prodImportado)
    {
        $this->prodImportado = $prodImportado;
    }

    /**
     * @return string
     */
    public function getProdOrigem()
    {
        return $this->prodOrigem;
    }

    /**
     * @param string $prodOrigem
     */
    public function setProdOrigem($prodOrigem)
    {
        $this->prodOrigem = $prodOrigem;
    }

    /**
     * @return string
     */
    public function getProdClassificacao()
    {
        return $this->prodClassificacao;
    }

    /**
     * @param string $prodClassificacao
     */
    public function setProdClassificacao($prodClassificacao)
    {
        $this->prodClassificacao = $prodClassificacao;
    }


	
}
