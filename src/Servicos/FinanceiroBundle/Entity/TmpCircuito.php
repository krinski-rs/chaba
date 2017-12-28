<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpCircuito
 */
class TmpCircuito
{
    /**
     * @var integer
     */
    private $idTmpCircuito;

    /**
     * @var integer
     */
    private $contCodigoid;

    /**
     * @var integer
     */
    private $circuito;

    /**
     * @var integer
     */
    private $idCircuito;

    /**
     * @var string
     */
    private $razaoSocial;

    /**
     * @var string
     */
    private $fantasia;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $ie;

    /**
     * @var string
     */
    private $im;

    /**
     * @var string
     */
    private $contribuinteIcms;

    /**
     * @var string
     */
    private $segmentoMercado;

    /**
     * @var string
     */
    private $ramoAtividade;

    /**
     * @var string
     */
    private $porte;

    /**
     * @var string
     */
    private $areaAtuacao;

    /**
     * @var boolean
     */
    private $faturamentoAnual;

    /**
     * @var integer
     */
    private $numeroFuncionario;

    /**
     * @var string
     */
    private $gerenteConta;

    /**
     * @var string
     */
    private $canalVenda;

    /**
     * @var string
     */
    private $produto;

    /**
     * @var string
     */
    private $meioAcesso;

    /**
     * @var string
     */
    private $capacidade;

    /**
     * @var string
     */
    private $pedido;

    /**
     * @var \DateTime
     */
    private $dataPedido;

    /**
     * @var string
     */
    private $clienteFinal;

    /**
     * @var string
     */
    private $tipoServico;

    /**
     * @var string
     */
    private $prazoMes;

    /**
     * @var \DateTime
     */
    private $dataPervistaAtivacao;

    /**
     * @var string
     */
    private $slaDisponibilidade;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $motivoAlteracao;

    /**
     * @var string
     */
    private $equipamentoCliente;

    /**
     * @var string
     */
    private $historico;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataAtivacao;

    /**
     * @var \DateTime
     */
    private $dataCancelamento;

    /**
     * @var \DateTime
     */
    private $dataAtivacaoComercial;

    /**
     * @var string
     */
    private $designacao;

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
     * @var boolean
     */
    private $status;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\TmpContrato
     */
    private $idTmpContrato;


    /**
     * Get idTmpCircuito
     *
     * @return integer 
     */
    public function getIdTmpCircuito()
    {
        return $this->idTmpCircuito;
    }

    /**
     * Set contCodigoid
     *
     * @param integer $contCodigoid
     * @return TmpCircuito
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
     * Set circuito
     *
     * @param integer $circuito
     * @return TmpCircuito
     */
    public function setCircuito($circuito)
    {
        $this->circuito = $circuito;

        return $this;
    }

    /**
     * Get circuito
     *
     * @return integer 
     */
    public function getCircuito()
    {
        return $this->circuito;
    }

    /**
     * Set idCircuito
     *
     * @param integer $idCircuito
     * @return TmpCircuito
     */
    public function setIdCircuito($idCircuito)
    {
        $this->idCircuito = $idCircuito;

        return $this;
    }

    /**
     * Get idCircuito
     *
     * @return integer 
     */
    public function getIdCircuito()
    {
        return $this->idCircuito;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     * @return TmpCircuito
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get razaoSocial
     *
     * @return string 
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set fantasia
     *
     * @param string $fantasia
     * @return TmpCircuito
     */
    public function setFantasia($fantasia)
    {
        $this->fantasia = $fantasia;

        return $this;
    }

    /**
     * Get fantasia
     *
     * @return string 
     */
    public function getFantasia()
    {
        return $this->fantasia;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return TmpCircuito
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
     * Set ie
     *
     * @param string $ie
     * @return TmpCircuito
     */
    public function setIe($ie)
    {
        $this->ie = $ie;

        return $this;
    }

    /**
     * Get ie
     *
     * @return string 
     */
    public function getIe()
    {
        return $this->ie;
    }

    /**
     * Set im
     *
     * @param string $im
     * @return TmpCircuito
     */
    public function setIm($im)
    {
        $this->im = $im;

        return $this;
    }

    /**
     * Get im
     *
     * @return string 
     */
    public function getIm()
    {
        return $this->im;
    }

    /**
     * Set contribuinteIcms
     *
     * @param string $contribuinteIcms
     * @return TmpCircuito
     */
    public function setContribuinteIcms($contribuinteIcms)
    {
        $this->contribuinteIcms = $contribuinteIcms;

        return $this;
    }

    /**
     * Get contribuinteIcms
     *
     * @return string 
     */
    public function getContribuinteIcms()
    {
        return $this->contribuinteIcms;
    }

    /**
     * Set segmentoMercado
     *
     * @param string $segmentoMercado
     * @return TmpCircuito
     */
    public function setSegmentoMercado($segmentoMercado)
    {
        $this->segmentoMercado = $segmentoMercado;

        return $this;
    }

    /**
     * Get segmentoMercado
     *
     * @return string 
     */
    public function getSegmentoMercado()
    {
        return $this->segmentoMercado;
    }

    /**
     * Set ramoAtividade
     *
     * @param string $ramoAtividade
     * @return TmpCircuito
     */
    public function setRamoAtividade($ramoAtividade)
    {
        $this->ramoAtividade = $ramoAtividade;

        return $this;
    }

    /**
     * Get ramoAtividade
     *
     * @return string 
     */
    public function getRamoAtividade()
    {
        return $this->ramoAtividade;
    }

    /**
     * Set porte
     *
     * @param string $porte
     * @return TmpCircuito
     */
    public function setPorte($porte)
    {
        $this->porte = $porte;

        return $this;
    }

    /**
     * Get porte
     *
     * @return string 
     */
    public function getPorte()
    {
        return $this->porte;
    }

    /**
     * Set areaAtuacao
     *
     * @param string $areaAtuacao
     * @return TmpCircuito
     */
    public function setAreaAtuacao($areaAtuacao)
    {
        $this->areaAtuacao = $areaAtuacao;

        return $this;
    }

    /**
     * Get areaAtuacao
     *
     * @return string 
     */
    public function getAreaAtuacao()
    {
        return $this->areaAtuacao;
    }

    /**
     * Set faturamentoAnual
     *
     * @param boolean $faturamentoAnual
     * @return TmpCircuito
     */
    public function setFaturamentoAnual($faturamentoAnual)
    {
        $this->faturamentoAnual = $faturamentoAnual;

        return $this;
    }

    /**
     * Get faturamentoAnual
     *
     * @return boolean 
     */
    public function getFaturamentoAnual()
    {
        return $this->faturamentoAnual;
    }

    /**
     * Set numeroFuncionario
     *
     * @param integer $numeroFuncionario
     * @return TmpCircuito
     */
    public function setNumeroFuncionario($numeroFuncionario)
    {
        $this->numeroFuncionario = $numeroFuncionario;

        return $this;
    }

    /**
     * Get numeroFuncionario
     *
     * @return integer 
     */
    public function getNumeroFuncionario()
    {
        return $this->numeroFuncionario;
    }

    /**
     * Set gerenteConta
     *
     * @param string $gerenteConta
     * @return TmpCircuito
     */
    public function setGerenteConta($gerenteConta)
    {
        $this->gerenteConta = $gerenteConta;

        return $this;
    }

    /**
     * Get gerenteConta
     *
     * @return string 
     */
    public function getGerenteConta()
    {
        return $this->gerenteConta;
    }

    /**
     * Set canalVenda
     *
     * @param string $canalVenda
     * @return TmpCircuito
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
     * Set produto
     *
     * @param string $produto
     * @return TmpCircuito
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
     * Set meioAcesso
     *
     * @param string $meioAcesso
     * @return TmpCircuito
     */
    public function setMeioAcesso($meioAcesso)
    {
        $this->meioAcesso = $meioAcesso;

        return $this;
    }

    /**
     * Get meioAcesso
     *
     * @return string 
     */
    public function getMeioAcesso()
    {
        return $this->meioAcesso;
    }

    /**
     * Set capacidade
     *
     * @param string $capacidade
     * @return TmpCircuito
     */
    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;

        return $this;
    }

    /**
     * Get capacidade
     *
     * @return string 
     */
    public function getCapacidade()
    {
        return $this->capacidade;
    }

    /**
     * Set pedido
     *
     * @param string $pedido
     * @return TmpCircuito
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
     * Set dataPedido
     *
     * @param \DateTime $dataPedido
     * @return TmpCircuito
     */
    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;

        return $this;
    }

    /**
     * Get dataPedido
     *
     * @return \DateTime 
     */
    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    /**
     * Set clienteFinal
     *
     * @param string $clienteFinal
     * @return TmpCircuito
     */
    public function setClienteFinal($clienteFinal)
    {
        $this->clienteFinal = $clienteFinal;

        return $this;
    }

    /**
     * Get clienteFinal
     *
     * @return string 
     */
    public function getClienteFinal()
    {
        return $this->clienteFinal;
    }

    /**
     * Set tipoServico
     *
     * @param string $tipoServico
     * @return TmpCircuito
     */
    public function setTipoServico($tipoServico)
    {
        $this->tipoServico = $tipoServico;

        return $this;
    }

    /**
     * Get tipoServico
     *
     * @return string 
     */
    public function getTipoServico()
    {
        return $this->tipoServico;
    }

    /**
     * Set prazoMes
     *
     * @param string $prazoMes
     * @return TmpCircuito
     */
    public function setPrazoMes($prazoMes)
    {
        $this->prazoMes = $prazoMes;

        return $this;
    }

    /**
     * Get prazoMes
     *
     * @return string 
     */
    public function getPrazoMes()
    {
        return $this->prazoMes;
    }

    /**
     * Set dataPervistaAtivacao
     *
     * @param \DateTime $dataPervistaAtivacao
     * @return TmpCircuito
     */
    public function setDataPervistaAtivacao($dataPervistaAtivacao)
    {
        $this->dataPervistaAtivacao = $dataPervistaAtivacao;

        return $this;
    }

    /**
     * Get dataPervistaAtivacao
     *
     * @return \DateTime 
     */
    public function getDataPervistaAtivacao()
    {
        return $this->dataPervistaAtivacao;
    }

    /**
     * Set slaDisponibilidade
     *
     * @param string $slaDisponibilidade
     * @return TmpCircuito
     */
    public function setSlaDisponibilidade($slaDisponibilidade)
    {
        $this->slaDisponibilidade = $slaDisponibilidade;

        return $this;
    }

    /**
     * Get slaDisponibilidade
     *
     * @return string 
     */
    public function getSlaDisponibilidade()
    {
        return $this->slaDisponibilidade;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return TmpCircuito
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return TmpCircuito
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return TmpCircuito
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     * @return TmpCircuito
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return TmpCircuito
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set uf
     *
     * @param string $uf
     * @return TmpCircuito
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string 
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return TmpCircuito
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set motivoAlteracao
     *
     * @param string $motivoAlteracao
     * @return TmpCircuito
     */
    public function setMotivoAlteracao($motivoAlteracao)
    {
        $this->motivoAlteracao = $motivoAlteracao;

        return $this;
    }

    /**
     * Get motivoAlteracao
     *
     * @return string 
     */
    public function getMotivoAlteracao()
    {
        return $this->motivoAlteracao;
    }

    /**
     * Set equipamentoCliente
     *
     * @param string $equipamentoCliente
     * @return TmpCircuito
     */
    public function setEquipamentoCliente($equipamentoCliente)
    {
        $this->equipamentoCliente = $equipamentoCliente;

        return $this;
    }

    /**
     * Get equipamentoCliente
     *
     * @return string 
     */
    public function getEquipamentoCliente()
    {
        return $this->equipamentoCliente;
    }

    /**
     * Set historico
     *
     * @param string $historico
     * @return TmpCircuito
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string 
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * Set dataInicial
     *
     * @param \DateTime $dataInicial
     * @return TmpCircuito
     */
    public function setDataInicial($dataInicial)
    {
        $this->dataInicial = $dataInicial;

        return $this;
    }

    /**
     * Get dataInicial
     *
     * @return \DateTime 
     */
    public function getDataInicial()
    {
        return $this->dataInicial;
    }

    /**
     * Set dataAtivacao
     *
     * @param \DateTime $dataAtivacao
     * @return TmpCircuito
     */
    public function setDataAtivacao($dataAtivacao)
    {
        $this->dataAtivacao = $dataAtivacao;

        return $this;
    }

    /**
     * Get dataAtivacao
     *
     * @return \DateTime 
     */
    public function getDataAtivacao()
    {
        return $this->dataAtivacao;
    }

    /**
     * Set dataCancelamento
     *
     * @param \DateTime $dataCancelamento
     * @return TmpCircuito
     */
    public function setDataCancelamento($dataCancelamento)
    {
        $this->dataCancelamento = $dataCancelamento;

        return $this;
    }

    /**
     * Get dataCancelamento
     *
     * @return \DateTime 
     */
    public function getDataCancelamento()
    {
        return $this->dataCancelamento;
    }

    /**
     * Set dataAtivacaoComercial
     *
     * @param \DateTime $dataAtivacaoComercial
     * @return TmpCircuito
     */
    public function setDataAtivacaoComercial($dataAtivacaoComercial)
    {
        $this->dataAtivacaoComercial = $dataAtivacaoComercial;

        return $this;
    }

    /**
     * Get dataAtivacaoComercial
     *
     * @return \DateTime 
     */
    public function getDataAtivacaoComercial()
    {
        return $this->dataAtivacaoComercial;
    }

    /**
     * Set designacao
     *
     * @param string $designacao
     * @return TmpCircuito
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
     * Set valorAtivacao
     *
     * @param string $valorAtivacao
     * @return TmpCircuito
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
     * @return TmpCircuito
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
     * @return TmpCircuito
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
     * Set status
     *
     * @param boolean $status
     * @return TmpCircuito
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set idTmpContrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\TmpContrato $idTmpContrato
     * @return TmpCircuito
     */
    public function setIdTmpContrato(\Servicos\FinanceiroBundle\Entity\TmpContrato $idTmpContrato = null)
    {
        $this->idTmpContrato = $idTmpContrato;

        return $this;
    }

    /**
     * Get idTmpContrato
     *
     * @return \Servicos\FinanceiroBundle\Entity\TmpContrato 
     */
    public function getIdTmpContrato()
    {
        return $this->idTmpContrato;
    }
}
