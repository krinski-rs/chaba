<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remessa
 */
class Remessa
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
    private $remArquivoFornecedores;

    /**
     * @var string
     */
    private $remArquivoProdutos;

    /**
     * @var string
     */
    private $remArquivoPedidos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $remessaOrdem;


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
     * @return Remessa
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
     * @return Remessa
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
     * Set remArquivoFornecedores
     *
     * @param string $remArquivoFornecedores
     * @return Remessa
     */
    public function setRemArquivoFornecedores($remArquivoFornecedores)
    {
        $this->remArquivoFornecedores = $remArquivoFornecedores;

        return $this;
    }

    /**
     * Get remArquivoFornecedores
     *
     * @return string 
     */
    public function getRemArquivoFornecedores()
    {
        return $this->remArquivoFornecedores;
    }

    /**
     * Set remArquivoProdutos
     *
     * @param string $remArquivoProdutos
     * @return Remessa
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
     * Set remArquivoPedidos
     *
     * @param string $remArquivoPedidos
     * @return Remessa
     */
    public function setRemArquivoPedidos($remArquivoPedidos)
    {
        $this->remArquivoPedidos = $remArquivoPedidos;

        return $this;
    }

    /**
     * Get remArquivoPedidos
     *
     * @return string 
     */
    public function getRemArquivoPedidos()
    {
        return $this->remArquivoPedidos;
    }
    
    /**
     * Add remessaOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaOrdem $remessaOrdem
     * @return Delivery
     */
    public function addRemessaOrdem(\Servicos\LumaBundle\Entity\RemessaOrdem $remessaOrdem)
    {
        $this->remessaOrdem[] = $remessaOrdem;

        return $this;
    }

    /**
     * Remove remessaOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaOrdem $remessaOrdem
     */
    public function removeRemessaOrdem(\Servicos\LumaBundle\Entity\RemessaOrdem $remessaOrdem)
    {
        $this->remessaOrdem->removeElement($remessaOrdem);
    }

    /**
     * Get remessaOrdem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemessaOrdem()
    {
        return $this->remessaOrdem;
    }
}
