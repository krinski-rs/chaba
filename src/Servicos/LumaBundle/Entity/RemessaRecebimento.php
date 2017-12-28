<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessaRecebimento
 */
class RemessaRecebimento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dataCriacao;

    /**
     * @var \DateTime
     */
    private $dataRetorno;

    /**
     * @var string
     */
    private $arquivoRecebimento;


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
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     * @return RemessaRecebimento
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
     * Set dataRetorno
     *
     * @param \DateTime $dataRetorno
     * @return RemessaRecebimento
     */
    public function setDataRetorno($dataRetorno)
    {
        $this->dataRetorno = $dataRetorno;

        return $this;
    }

    /**
     * Get dataRetorno
     *
     * @return \DateTime 
     */
    public function getDataRetorno()
    {
        return $this->dataRetorno;
    }

    /**
     * Set arquivoRecebimento
     *
     * @param string $arquivoRecebimento
     * @return RemessaRecebimento
     */
    public function setArquivoRecebimento($arquivoRecebimento)
    {
        $this->arquivoRecebimento = $arquivoRecebimento;

        return $this;
    }

    /**
     * Get arquivoRecebimento
     *
     * @return string 
     */
    public function getArquivoRecebimento()
    {
        return $this->arquivoRecebimento;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $remessaRecebimentoOrdem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->remessaRecebimentoOrdem = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add remessaRecebimentoOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $remessaRecebimentoOrdem
     * @return RemessaRecebimento
     */
    public function addRemessaRecebimentoOrdem(\Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $remessaRecebimentoOrdem)
    {
        $this->remessaRecebimentoOrdem[] = $remessaRecebimentoOrdem;

        return $this;
    }

    /**
     * Remove remessaRecebimentoOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $remessaRecebimentoOrdem
     */
    public function removeRemessaRecebimentoOrdem(\Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $remessaRecebimentoOrdem)
    {
        $this->remessaRecebimentoOrdem->removeElement($remessaRecebimentoOrdem);
    }

    /**
     * Get remessaRecebimentoOrdem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemessaRecebimentoOrdem()
    {
        return $this->remessaRecebimentoOrdem;
    }
}
