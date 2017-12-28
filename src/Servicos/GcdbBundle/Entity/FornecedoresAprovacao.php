<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FornecedoresAprovacao
 */
class FornecedoresAprovacao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $razao;

    /**
     * @var string
     */
    private $fantasia;

    /**
     * @var string
     */
    private $ie;

    /**
     * @var string
     */
    private $im;

    /**
     * @var \DateTime
     */
    private $datafundacao;

    /**
     * @var integer
     */
    private $segmento;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var integer
     */
    private $tipologradouro;

    /**
     * @var string
     */
    private $logradouro;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var integer
     */
    private $tipocomplemento;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $cnpj;


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
     * Set razao
     *
     * @param string $razao
     * @return FornecedoresAprovacao
     */
    public function setRazao($razao)
    {
        $this->razao = $razao;

        return $this;
    }

    /**
     * Get razao
     *
     * @return string 
     */
    public function getRazao()
    {
        return $this->razao;
    }

    /**
     * Set fantasia
     *
     * @param string $fantasia
     * @return FornecedoresAprovacao
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
     * Set ie
     *
     * @param string $ie
     * @return FornecedoresAprovacao
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
     * @return FornecedoresAprovacao
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
     * Set datafundacao
     *
     * @param \DateTime $datafundacao
     * @return FornecedoresAprovacao
     */
    public function setDatafundacao($datafundacao)
    {
        $this->datafundacao = $datafundacao;

        return $this;
    }

    /**
     * Get datafundacao
     *
     * @return \DateTime 
     */
    public function getDatafundacao()
    {
        return $this->datafundacao;
    }

    /**
     * Set segmento
     *
     * @param integer $segmento
     * @return FornecedoresAprovacao
     */
    public function setSegmento($segmento)
    {
        $this->segmento = $segmento;

        return $this;
    }

    /**
     * Get segmento
     *
     * @return integer 
     */
    public function getSegmento()
    {
        return $this->segmento;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return FornecedoresAprovacao
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
     * Set uf
     *
     * @param string $uf
     * @return FornecedoresAprovacao
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
     * Set cidade
     *
     * @param string $cidade
     * @return FornecedoresAprovacao
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
     * Set tipologradouro
     *
     * @param integer $tipologradouro
     * @return FornecedoresAprovacao
     */
    public function setTipologradouro($tipologradouro)
    {
        $this->tipologradouro = $tipologradouro;

        return $this;
    }

    /**
     * Get tipologradouro
     *
     * @return integer 
     */
    public function getTipologradouro()
    {
        return $this->tipologradouro;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     * @return FornecedoresAprovacao
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro
     *
     * @return string 
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return FornecedoresAprovacao
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
     * Set bairro
     *
     * @param string $bairro
     * @return FornecedoresAprovacao
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
     * Set tipocomplemento
     *
     * @param integer $tipocomplemento
     * @return FornecedoresAprovacao
     */
    public function setTipocomplemento($tipocomplemento)
    {
        $this->tipocomplemento = $tipocomplemento;

        return $this;
    }

    /**
     * Get tipocomplemento
     *
     * @return integer 
     */
    public function getTipocomplemento()
    {
        return $this->tipocomplemento;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return FornecedoresAprovacao
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
     * Set data
     *
     * @param \DateTime $data
     * @return FornecedoresAprovacao
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return FornecedoresAprovacao
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
}
