<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentroCusto
 */
class CentroCusto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $codigo;

    /**
     * @var integer
     */
    private $responsavelId;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \DateTime
     */
    private $dataCriacao;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \DateTime
     */
    private $dataExclusao;

    /**
     * @var \Servicos\LumaBundle\Entity\CentroCustoOrdemInterna
     */
    private $centroCustoOrdemInterna;

    /**
     * @var \Servicos\LumaBundle\Entity\CentroCustoCategoria
     */
    private $categoria;

    /**
     * @var \Servicos\LumaBundle\Entity\CentroCusto
     */
    private $pai;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ordeCodigoid;

    /**
     * @var boolean $ordemInterna
     */
    private $ordemInterna;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordeCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return CentroCusto
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set responsavelId
     *
     * @param integer $responsavelId
     * @return CentroCusto
     */
    public function setResponsavelId($responsavelId)
    {
        $this->responsavelId = $responsavelId;

        return $this;
    }

    /**
     * Get responsavelId
     *
     * @return integer 
     */
    public function getResponsavelId()
    {
        return $this->responsavelId;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return CentroCusto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     * @return CentroCusto
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return \DateTime 
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return CentroCusto
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

    /**
     * Set dataExclusao
     *
     * @param \DateTime $dataExclusao
     * @return CentroCusto
     */
    public function setDataExclusao($dataExclusao)
    {
        $this->dataExclusao = $dataExclusao;

        return $this;
    }

    /**
     * Get dataExclusao
     *
     * @return \DateTime 
     */
    public function getDataExclusao()
    {
        return $this->dataExclusao;
    }

    /**
     * Set centroCustoOrdemInterna
     *
     * @param \Servicos\LumaBundle\Entity\CentroCustoOrdemInterna $centroCustoOrdemInterna
     * @return CentroCusto
     */
    public function setCentroCustoOrdemInterna(\Servicos\LumaBundle\Entity\CentroCustoOrdemInterna $centroCustoOrdemInterna = null)
    {
        $this->centroCustoOrdemInterna = $centroCustoOrdemInterna;

        return $this;
    }

    /**
     * Get centroCustoOrdemInterna
     *
     * @return \Servicos\LumaBundle\Entity\CentroCustoOrdemInterna 
     */
    public function getCentroCustoOrdemInterna()
    {
        return $this->centroCustoOrdemInterna;
    }

    /**
     * Set categoria
     *
     * @param \Servicos\LumaBundle\Entity\CentroCustoCategoria $categoria
     * @return CentroCusto
     */
    public function setCategoria(\Servicos\LumaBundle\Entity\CentroCustoCategoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Servicos\LumaBundle\Entity\CentroCustoCategoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set pai
     *
     * @param \Servicos\LumaBundle\Entity\CentroCusto $pai
     * @return CentroCusto
     */
    public function setPai(\Servicos\LumaBundle\Entity\CentroCusto $pai = null)
    {
        $this->pai = $pai;

        return $this;
    }

    /**
     * Get pai
     *
     * @return \Servicos\LumaBundle\Entity\CentroCusto 
     */
    public function getPai()
    {
        return $this->pai;
    }

    /**
     * Add ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return CentroCusto
     */
    public function addOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid)
    {
        $this->ordeCodigoid[] = $ordeCodigoid;

        return $this;
    }

    /**
     * Remove ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     */
    public function removeOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid)
    {
        $this->ordeCodigoid->removeElement($ordeCodigoid);
    }

    /**
     * Get ordeCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }

    /**
     * Set ordemInterna
     *
     * @param boolean $ordemInterna
     * @return CentroCusto
     */
    public function setOrdemInterna($ordemInterna)
    {
        $this->ordemInterna = $ordemInterna;
        return $this;
    }

    /**
     * Get ordemInterna
     *
     * @return boolean 
     */
    public function getOrdemInterna()
    {
        return $this->ordemInterna;
    }

}
