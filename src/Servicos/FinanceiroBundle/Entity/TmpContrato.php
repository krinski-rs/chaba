<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpContrato
 */
class TmpContrato
{
    /**
     * @var integer
     */
    private $idTmpContrato;

    /**
     * @var string
     */
    private $circuito;

    /**
     * @var string
     */
    private $conta;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $designacao;

    /**
     * @var string
     */
    private $canalVenda;

    /**
     * @var \DateTime
     */
    private $ativado;

    /**
     * @var \DateTime
     */
    private $destivado;

    /**
     * @var string
     */
    private $velocidade;

    /**
     * @var string
     */
    private $produto;

    /**
     * @var string
     */
    private $servico;

    /**
     * @var string
     */
    private $pedido;

    /**
     * @var string
     */
    private $valorAtivacao;

    /**
     * @var string
     */
    private $valorSemImposto;

    /**
     * @var string
     */
    private $valorComImposto;

    /**
     * @var integer
     */
    private $contCodigoid;

    /**
     * @var boolean
     */
    private $leitura;

    /**
     * @var boolean
     */
    private $erro;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\TmpContaCriada
     */
    private $idTmpContaCriada;


    /**
     * Get idTmpContrato
     *
     * @return integer 
     */
    public function getIdTmpContrato()
    {
        return $this->idTmpContrato;
    }

    /**
     * Set circuito
     *
     * @param string $circuito
     * @return TmpContrato
     */
    public function setCircuito($circuito)
    {
        $this->circuito = $circuito;

        return $this;
    }

    /**
     * Get circuito
     *
     * @return string 
     */
    public function getCircuito()
    {
        return $this->circuito;
    }

    /**
     * Set conta
     *
     * @param string $conta
     * @return TmpContrato
     */
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * Get conta
     *
     * @return string 
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return TmpContrato
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return TmpContrato
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set designacao
     *
     * @param string $designacao
     * @return TmpContrato
     */
    public function setDesignacao($designacao)
    {
        $this->designacao = $designacao;

        return $this;
    }

    /**
     * Get designacao
     *
     * @return string 
     */
    public function getDesignacao()
    {
        return $this->designacao;
    }

    /**
     * Set canalVenda
     *
     * @param string $canalVenda
     * @return TmpContrato
     */
    public function setCanalVenda($canalVenda)
    {
        $this->canalVenda = $canalVenda;

        return $this;
    }

    /**
     * Get canalVenda
     *
     * @return string 
     */
    public function getCanalVenda()
    {
        return $this->canalVenda;
    }

    /**
     * Set ativado
     *
     * @param \DateTime $ativado
     * @return TmpContrato
     */
    public function setAtivado($ativado)
    {
        $this->ativado = $ativado;

        return $this;
    }

    /**
     * Get ativado
     *
     * @return \DateTime 
     */
    public function getAtivado()
    {
        return $this->ativado;
    }

    /**
     * Set destivado
     *
     * @param \DateTime $destivado
     * @return TmpContrato
     */
    public function setDestivado($destivado)
    {
        $this->destivado = $destivado;

        return $this;
    }

    /**
     * Get destivado
     *
     * @return \DateTime 
     */
    public function getDestivado()
    {
        return $this->destivado;
    }

    /**
     * Set velocidade
     *
     * @param string $velocidade
     * @return TmpContrato
     */
    public function setVelocidade($velocidade)
    {
        $this->velocidade = $velocidade;

        return $this;
    }

    /**
     * Get velocidade
     *
     * @return string 
     */
    public function getVelocidade()
    {
        return $this->velocidade;
    }

    /**
     * Set produto
     *
     * @param string $produto
     * @return TmpContrato
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get produto
     *
     * @return string 
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set servico
     *
     * @param string $servico
     * @return TmpContrato
     */
    public function setServico($servico)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get servico
     *
     * @return string 
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Set pedido
     *
     * @param string $pedido
     * @return TmpContrato
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return string 
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set valorAtivacao
     *
     * @param string $valorAtivacao
     * @return TmpContrato
     */
    public function setValorAtivacao($valorAtivacao)
    {
        $this->valorAtivacao = $valorAtivacao;

        return $this;
    }

    /**
     * Get valorAtivacao
     *
     * @return string 
     */
    public function getValorAtivacao()
    {
        return $this->valorAtivacao;
    }

    /**
     * Set valorSemImposto
     *
     * @param string $valorSemImposto
     * @return TmpContrato
     */
    public function setValorSemImposto($valorSemImposto)
    {
        $this->valorSemImposto = $valorSemImposto;

        return $this;
    }

    /**
     * Get valorSemImposto
     *
     * @return string 
     */
    public function getValorSemImposto()
    {
        return $this->valorSemImposto;
    }

    /**
     * Set valorComImposto
     *
     * @param string $valorComImposto
     * @return TmpContrato
     */
    public function setValorComImposto($valorComImposto)
    {
        $this->valorComImposto = $valorComImposto;

        return $this;
    }

    /**
     * Get valorComImposto
     *
     * @return string 
     */
    public function getValorComImposto()
    {
        return $this->valorComImposto;
    }

    /**
     * Set contCodigoid
     *
     * @param integer $contCodigoid
     * @return TmpContrato
     */
    public function setContCodigoid($contCodigoid)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return integer 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set leitura
     *
     * @param boolean $leitura
     * @return TmpContrato
     */
    public function setLeitura($leitura)
    {
        $this->leitura = $leitura;

        return $this;
    }

    /**
     * Get leitura
     *
     * @return boolean 
     */
    public function getLeitura()
    {
        return $this->leitura;
    }

    /**
     * Set erro
     *
     * @param boolean $erro
     * @return TmpContrato
     */
    public function setErro($erro)
    {
        $this->erro = $erro;

        return $this;
    }

    /**
     * Get erro
     *
     * @return boolean 
     */
    public function getErro()
    {
        return $this->erro;
    }

    /**
     * Set idTmpContaCriada
     *
     * @param \Servicos\FinanceiroBundle\Entity\TmpContaCriada $idTmpContaCriada
     * @return TmpContrato
     */
    public function setIdTmpContaCriada(\Servicos\FinanceiroBundle\Entity\TmpContaCriada $idTmpContaCriada = null)
    {
        $this->idTmpContaCriada = $idTmpContaCriada;

        return $this;
    }

    /**
     * Get idTmpContaCriada
     *
     * @return \Servicos\FinanceiroBundle\Entity\TmpContaCriada 
     */
    public function getIdTmpContaCriada()
    {
        return $this->idTmpContaCriada;
    }
}
