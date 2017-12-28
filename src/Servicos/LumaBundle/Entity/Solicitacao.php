<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitacao
 */
class Solicitacao
{
    /**
     * @var integer
     */
    private $soliCodigoid;

    /**
     * @var \DateTime
     */
    private $soliDatainc;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $soliPrazoentrerga;

    /**
     * @var boolean
     */
    private $soliAtivo;

    /**
     * @var string
     */
    private $soliObservacao;

    /**
     * @var string
     */
    private $soliObservacaofornecedor;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\CentroCusto
     */
    private $centroCusto;

    /**
     * @var integer
     */
    private $cadUserFilial;

    /**
     * @var string
     */
    private $soliLimite;

    /**
     * @var string $soliCer
     */
    private $soliCer;

    /**
     * @var string $soliEnderecoEntrega
     */
    private $soliEnderecoEntrega;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $solicitacaoaprovacao;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $solicitacaoprodutos;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $solicitacaocotacoes;


    public function __construct()
    {
        $this->solicitacaoaprovacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->solicitacaoprodutos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->solicitacaocotacoes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get soliCodigoid
     *
     * @return integer 
     */
    public function getSoliCodigoid()
    {
        return $this->soliCodigoid;
    }

    /**
     * Set soliDatainc
     *
     * @param \DateTime $soliDatainc
     * @return Solicitacao
     */
    public function setSoliDatainc($soliDatainc)
    {
        $this->soliDatainc = $soliDatainc;

        return $this;
    }

    /**
     * Get soliDatainc
     *
     * @return \DateTime 
     */
    public function getSoliDatainc()
    {
        return $this->soliDatainc;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Solicitacao
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set soliPrazoentrerga
     *
     * @param \DateTime $soliPrazoentrerga
     * @return Solicitacao
     */
    public function setSoliPrazoentrerga($soliPrazoentrerga)
    {
        $this->soliPrazoentrerga = $soliPrazoentrerga;

        return $this;
    }

    /**
     * Get soliPrazoentrerga
     *
     * @return \DateTime 
     */
    public function getSoliPrazoentrerga()
    {
        return $this->soliPrazoentrerga;
    }

    /**
     * Set soliAtivo
     *
     * @param boolean $soliAtivo
     * @return Solicitacao
     */
    public function setSoliAtivo($soliAtivo)
    {
        $this->soliAtivo = $soliAtivo;

        return $this;
    }

    /**
     * Get soliAtivo
     *
     * @return boolean 
     */
    public function getSoliAtivo()
    {
        return $this->soliAtivo;
    }

    /**
     * Set soliObservacao
     *
     * @param string $soliObservacao
     * @return Solicitacao
     */
    public function setSoliObservacao($soliObservacao)
    {
        $this->soliObservacao = $soliObservacao;

        return $this;
    }

    /**
     * Get soliObservacao
     *
     * @return string 
     */
    public function getSoliObservacao()
    {
        return $this->soliObservacao;
    }

    /**
     * Set soliObservacaofornecedor
     *
     * @param string $soliObservacaofornecedor
     * @return Solicitacao
     */
    public function setSoliObservacaofornecedor($soliObservacaofornecedor)
    {
        $this->soliObservacaofornecedor = $soliObservacaofornecedor;

        return $this;
    }

    /**
     * Get soliObservacaofornecedor
     *
     * @return string 
     */
    public function getSoliObservacaofornecedor()
    {
        return $this->soliObservacaofornecedor;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Solicitacao
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
     * @var \Servicos\LumaBundle\Entity\OrdemInterna
     */
    private $ordemInterna;


    /**
     * Set ordemInterna
     *
     * @param \Servicos\LumaBundle\Entity\OrdemInterna $ordemInterna
     * @return Solicitacao
     */
    public function setOrdemInterna(\Servicos\LumaBundle\Entity\OrdemInterna $ordemInterna = null)
    {
        $this->ordemInterna = $ordemInterna;

        return $this;
    }

    /**
     * Get ordemInterna
     *
     * @return \Servicos\LumaBundle\Entity\OrdemInterna 
     */
    public function getOrdemInterna()
    {
        return $this->ordemInterna;
    }

    /**
     * Set cadUserFilial
     *
     * @param integer $cadUserFilial
     * @return Solicitacao
     */
    public function setCadUserFilial($cadUserFilial)
    {
        $this->cadUserFilial = $cadUserFilial;

        return $this;
    }

    /**
     * Get cadUserFilial
     *
     * @return integer 
     */
    public function getCadUserFilial()
    {
        return $this->cadUserFilial;
    }

    /**
     * Set soliLimite
     *
     * @param string $soliLimite
     * @return Solicitacao
     */
    public function setSoliLimite($soliLimite)
    {
        $this->soliLimite = $soliLimite;

        return $this;
    }

    /**
     * Get soliLimite
     *
     * @return string 
     */
    public function getSoliLimite()
    {
        return $this->soliLimite;
    }

    /**
     *
     * @return string $soliCer
     */
    public function getSoliCer()
    {
        return $this->soliCer;
    }

    /**
     * @param string $soliCer
     */
    public function setSoliCer($soliCer)
    {
        $this->soliCer = $soliCer;

        return $this;
    }

    /**
     * @return string $soliEnderecoEntrega
     */
    public function getSoliEnderecoEntrega()
    {
        return $this->soliEnderecoEntrega;
    }

    /**s
     * @param string $soliEnderecoEntrega $soliEnderecoEntrega the soli endereco entrega
     */
    public function setSoliEnderecoEntrega($soliEnderecoEntrega)
    {
        $this->soliEnderecoEntrega = $soliEnderecoEntrega;

        return $this;
    }

    /**
     * Add solicitacaoaprovacao
     *
     * @param \Servicos\LumaBundle\Entity\Solicitacaoaprovacao $solicitacaoaprovacao
     * @return Solicitacao
     */
    public function addSolicitacaoaprovacao(\Servicos\LumaBundle\Entity\Solicitacaoaprovacao $solicitacaoaprovacao)
    {
        $this->solicitacaoaprovacao[] = $solicitacaoaprovacao;
        return $this;
    }

    /**
     * Get solicitacaoaprovacao
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSolicitacaoaprovacao()
    {
        return $this->solicitacaoaprovacao;
    }

    /**
     * Set centroCusto
     *
     * @param \Servicos\LumaBundle\Entity\CentroCusto
     * @return Solicitacao
     */
    public function setCentroCusto(\Servicos\LumaBundle\Entity\CentroCusto $centroCusto)
    {
        $this->centroCusto = $centroCusto;
        return $this;
    }

    /**
     * Get centroCusto
     *
     * @return \Servicos\LumaBundle\Entity\CentroCusto 
     */
    public function getCentroCusto()
    {
        return $this->centroCusto;
    }

    /**
     * Add solicitacaoprodutos
     *
     * @param \Servicos\LumaBundle\Entity\Solicitacaoproduto $solicitacaoproduto
     * @return Solicitacao
     */
    public function addSolicitacaoproduto(\Servicos\LumaBundle\Entity\Solicitacaoproduto $solicitacaoproduto)
    {
        $this->solicitacaoprodutos[] = $solicitacaoproduto;
        return $this;
    }

    /**
     * Get solicitacaoprodutos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSolicitacaoprodutos()
    {
        return $this->solicitacaoprodutos;
    }

    /**
     * Add solicitacaocotacao
     *
     * @param \Servicos\LumaBundle\Entity\Cotacaosolicitacao $solicitacaocotacao
     * @return Solicitacao
     */
    public function addSolicitacaocotacao(\Servicos\LumaBundle\Entity\Solicitacaoproduto $solicitacaocotacao)
    {
        $this->solicitacaocotacoes[] = $solicitacaocotacao;
        return $this;
    }

    /**
     * Get solicitacaocotacoes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSolicitacaocotacoes()
    {
        return $this->solicitacaocotacoes;
    }

}
