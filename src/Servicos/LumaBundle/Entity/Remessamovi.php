<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remessamovi
 */
class Remessamovi
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $remDataCriacao;

    /**
     * @var \DateTime
     */
    private $remDataRetorno;

    /**
     * @var string
     */
    private $remArquivoClientes;

    /**
     * @var string
     */
    private $remArquivoProdutos;

    /**
     * @var string
     */
    private $remArquivoMovimentacoes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $remessamoviMovimentacao;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->remessamoviMovimentacao = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set remDataCriacao
     *
     * @param \DateTime $remDataCriacao
     * @return Remessamovi
     */
    public function setRemDataCriacao($remDataCriacao)
    {
        $this->remDataCriacao = $remDataCriacao;

        return $this;
    }

    /**
     * Get remDataCriacao
     *
     * @return \DateTime 
     */
    public function getRemDataCriacao()
    {
        return $this->remDataCriacao;
    }

    /**
     * Set remDataRetorno
     *
     * @param \DateTime $remDataRetorno
     * @return Remessamovi
     */
    public function setRemDataRetorno($remDataRetorno)
    {
        $this->remDataRetorno = $remDataRetorno;

        return $this;
    }

    /**
     * Get remDataRetorno
     *
     * @return \DateTime 
     */
    public function getRemDataRetorno()
    {
        return $this->remDataRetorno;
    }

    /**
     * Set remArquivoClientes
     *
     * @param string $remArquivoClientes
     * @return Remessamovi
     */
    public function setRemArquivoClientes($remArquivoClientes)
    {
        $this->remArquivoClientes = $remArquivoClientes;

        return $this;
    }

    /**
     * Get remArquivoClientes
     *
     * @return string 
     */
    public function getRemArquivoClientes()
    {
        return $this->remArquivoClientes;
    }

    /**
     * Set remArquivoProdutos
     *
     * @param string $remArquivoProdutos
     * @return Remessamovi
     */
    public function setRemArquivoProdutos($remArquivoProdutos)
    {
        $this->remArquivoProdutos = $remArquivoProdutos;

        return $this;
    }

    /**
     * Get remArquivoProdutos
     *
     * @return string 
     */
    public function getRemArquivoProdutos()
    {
        return $this->remArquivoProdutos;
    }

    /**
     * Set remArquivoMovimentacoes
     *
     * @param string $remArquivoMovimentacoes
     * @return Remessamovi
     */
    public function setRemArquivoMovimentacoes($remArquivoMovimentacoes)
    {
        $this->remArquivoMovimentacoes = $remArquivoMovimentacoes;

        return $this;
    }

    /**
     * Get remArquivoMovimentacoes
     *
     * @return string 
     */
    public function getRemArquivoMovimentacoes()
    {
        return $this->remArquivoMovimentacoes;
    }


    
    /**
     * Add remessamoviMovimentacao
     *
     * @param \Servicos\LumaBundle\Entity\RemessamoviMovimentacao $remessamoviMovimentacao
     * @return Remessamovi
     */
    public function addRemessamoviMovimentacao(\Servicos\LumaBundle\Entity\RemessamoviMovimentacao $remessamoviMovimentacao)
    {
        $this->remessamoviMovimentacao[] = $remessamoviMovimentacao;

        return $this;
    }

    /**
     * Remove remessamoviMovimentacao
     *
     * @param \Servicos\LumaBundle\Entity\RemessamoviMovimentacao $remessamoviMovimentacao
     */
    public function removeRemessamoviMovimentacao(\Servicos\LumaBundle\Entity\RemessamoviMovimentacao $remessamoviMovimentacao)
    {
        $this->remessamoviMovimentacao->removeElement($remessamoviMovimentacao);
    }

    /**
     * Get remessamoviMovimentacao
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemessamoviMovimentacao()
    {
        return $this->remessamoviMovimentacao;
    }
}
