<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inserirproduto
 */
class Inserirproduto
{
    /**
     * @var integer
     */
    private $inseCodigoid;

    /**
     * @var string
     */
    private $inseNome;

    /**
     * @var string
     */
    private $inseDescricao;

    /**
     * @var integer
     */
    private $inseIslance;

    /**
     * @var integer
     */
    private $inseSolicitantecodigoid;

    /**
     * @var \DateTime
     */
    private $inseDatainc;

    /**
     * @var integer
     */
    private $inseTecnicocodigoid;

    /**
     * @var boolean
     */
    private $inseTecnicoaprovadosn;

    /**
     * @var string
     */
    private $inseTecnicoobservacao;

    /**
     * @var \DateTime
     */
    private $inseTecnicodataalteracao;

    /**
     * @var integer
     */
    private $inseMaterialcodigoid;

    /**
     * @var boolean
     */
    private $inseMaterialaprovadosn;

    /**
     * @var string
     */
    private $inseMaterialobservacao;

    /**
     * @var \DateTime
     */
    private $inseMaterialdataalteracao;

    /**
     * @var boolean
     */
    private $inseAlteracao;

    /**
     * @var string
     */
    private $inseImagens;

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
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get inseCodigoid
     *
     * @return integer 
     */
    public function getInseCodigoid()
    {
        return $this->inseCodigoid;
    }

    /**
     * Set inseNome
     *
     * @param string $inseNome
     * @return Inserirproduto
     */
    public function setInseNome($inseNome)
    {
        $this->inseNome = $inseNome;

        return $this;
    }

    /**
     * Get inseNome
     *
     * @return string 
     */
    public function getInseNome()
    {
        return $this->inseNome;
    }

    /**
     * Set inseDescricao
     *
     * @param string $inseDescricao
     * @return Inserirproduto
     */
    public function setInseDescricao($inseDescricao)
    {
        $this->inseDescricao = $inseDescricao;

        return $this;
    }

    /**
     * Get inseDescricao
     *
     * @return string 
     */
    public function getInseDescricao()
    {
        return $this->inseDescricao;
    }

    /**
     * Set inseIslance
     *
     * @param integer $inseIslance
     * @return Inserirproduto
     */
    public function setInseIslance($inseIslance)
    {
        $this->inseIslance = $inseIslance;

        return $this;
    }

    /**
     * Get inseIslance
     *
     * @return integer 
     */
    public function getInseIslance()
    {
        return $this->inseIslance;
    }

    /**
     * Set inseSolicitantecodigoid
     *
     * @param integer $inseSolicitantecodigoid
     * @return Inserirproduto
     */
    public function setInseSolicitantecodigoid($inseSolicitantecodigoid)
    {
        $this->inseSolicitantecodigoid = $inseSolicitantecodigoid;

        return $this;
    }

    /**
     * Get inseSolicitantecodigoid
     *
     * @return integer 
     */
    public function getInseSolicitantecodigoid()
    {
        return $this->inseSolicitantecodigoid;
    }

    /**
     * Set inseDatainc
     *
     * @param \DateTime $inseDatainc
     * @return Inserirproduto
     */
    public function setInseDatainc($inseDatainc)
    {
        $this->inseDatainc = $inseDatainc;

        return $this;
    }

    /**
     * Get inseDatainc
     *
     * @return \DateTime 
     */
    public function getInseDatainc()
    {
        return $this->inseDatainc;
    }

    /**
     * Set inseTecnicocodigoid
     *
     * @param integer $inseTecnicocodigoid
     * @return Inserirproduto
     */
    public function setInseTecnicocodigoid($inseTecnicocodigoid)
    {
        $this->inseTecnicocodigoid = $inseTecnicocodigoid;

        return $this;
    }

    /**
     * Get inseTecnicocodigoid
     *
     * @return integer 
     */
    public function getInseTecnicocodigoid()
    {
        return $this->inseTecnicocodigoid;
    }

    /**
     * Set inseTecnicoaprovadosn
     *
     * @param boolean $inseTecnicoaprovadosn
     * @return Inserirproduto
     */
    public function setInseTecnicoaprovadosn($inseTecnicoaprovadosn)
    {
        $this->inseTecnicoaprovadosn = $inseTecnicoaprovadosn;

        return $this;
    }

    /**
     * Get inseTecnicoaprovadosn
     *
     * @return boolean 
     */
    public function getInseTecnicoaprovadosn()
    {
        return $this->inseTecnicoaprovadosn;
    }

    /**
     * Set inseTecnicoobservacao
     *
     * @param string $inseTecnicoobservacao
     * @return Inserirproduto
     */
    public function setInseTecnicoobservacao($inseTecnicoobservacao)
    {
        $this->inseTecnicoobservacao = $inseTecnicoobservacao;

        return $this;
    }

    /**
     * Get inseTecnicoobservacao
     *
     * @return string 
     */
    public function getInseTecnicoobservacao()
    {
        return $this->inseTecnicoobservacao;
    }

    /**
     * Set inseTecnicodataalteracao
     *
     * @param \DateTime $inseTecnicodataalteracao
     * @return Inserirproduto
     */
    public function setInseTecnicodataalteracao($inseTecnicodataalteracao)
    {
        $this->inseTecnicodataalteracao = $inseTecnicodataalteracao;

        return $this;
    }

    /**
     * Get inseTecnicodataalteracao
     *
     * @return \DateTime 
     */
    public function getInseTecnicodataalteracao()
    {
        return $this->inseTecnicodataalteracao;
    }

    /**
     * Set inseMaterialcodigoid
     *
     * @param integer $inseMaterialcodigoid
     * @return Inserirproduto
     */
    public function setInseMaterialcodigoid($inseMaterialcodigoid)
    {
        $this->inseMaterialcodigoid = $inseMaterialcodigoid;

        return $this;
    }

    /**
     * Get inseMaterialcodigoid
     *
     * @return integer 
     */
    public function getInseMaterialcodigoid()
    {
        return $this->inseMaterialcodigoid;
    }

    /**
     * Set inseMaterialaprovadosn
     *
     * @param boolean $inseMaterialaprovadosn
     * @return Inserirproduto
     */
    public function setInseMaterialaprovadosn($inseMaterialaprovadosn)
    {
        $this->inseMaterialaprovadosn = $inseMaterialaprovadosn;

        return $this;
    }

    /**
     * Get inseMaterialaprovadosn
     *
     * @return boolean 
     */
    public function getInseMaterialaprovadosn()
    {
        return $this->inseMaterialaprovadosn;
    }

    /**
     * Set inseMaterialobservacao
     *
     * @param string $inseMaterialobservacao
     * @return Inserirproduto
     */
    public function setInseMaterialobservacao($inseMaterialobservacao)
    {
        $this->inseMaterialobservacao = $inseMaterialobservacao;

        return $this;
    }

    /**
     * Get inseMaterialobservacao
     *
     * @return string 
     */
    public function getInseMaterialobservacao()
    {
        return $this->inseMaterialobservacao;
    }

    /**
     * Set inseMaterialdataalteracao
     *
     * @param \DateTime $inseMaterialdataalteracao
     * @return Inserirproduto
     */
    public function setInseMaterialdataalteracao($inseMaterialdataalteracao)
    {
        $this->inseMaterialdataalteracao = $inseMaterialdataalteracao;

        return $this;
    }

    /**
     * Get inseMaterialdataalteracao
     *
     * @return \DateTime 
     */
    public function getInseMaterialdataalteracao()
    {
        return $this->inseMaterialdataalteracao;
    }

    /**
     * Set inseAlteracao
     *
     * @param boolean $inseAlteracao
     * @return Inserirproduto
     */
    public function setInseAlteracao($inseAlteracao)
    {
        $this->inseAlteracao = $inseAlteracao;

        return $this;
    }

    /**
     * Get inseAlteracao
     *
     * @return boolean 
     */
    public function getInseAlteracao()
    {
        return $this->inseAlteracao;
    }

    /**
     * Set inseImagens
     *
     * @param string $inseImagens
     * @return Inserirproduto
     */
    public function setInseImagens($inseImagens)
    {
        $this->inseImagens = $inseImagens;

        return $this;
    }

    /**
     * Get inseImagens
     *
     * @return string 
     */
    public function getInseImagens()
    {
        return $this->inseImagens;
    }

    /**
     * Set cateCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Categoria $cateCodigoid
     * @return Inserirproduto
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
     * @return Inserirproduto
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
     * @return Inserirproduto
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
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Inserirproduto
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
