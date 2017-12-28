<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessaRecebimentoOrdemLog
 */
class RemessaRecebimentoOrdemLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $campo;

    /**
     * @var string
     */
    private $mensagem;

    /**
     * @var \DateTime
     */
    private $dataCriacao;

    /**
     * @var \Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem
     */
    private $idRemessaRecebimentoOrdem;


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
     * Set campo
     *
     * @param string $campo
     * @return RemessaRecebimentoOrdemLog
     */
    public function setCampo($campo)
    {
        $this->campo = $campo;

        return $this;
    }

    /**
     * Get campo
     *
     * @return string 
     */
    public function getCampo()
    {
        return $this->campo;
    }

    /**
     * Set mensagem
     *
     * @param string $mensagem
     * @return RemessaRecebimentoOrdemLog
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get mensagem
     *
     * @return string 
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     * @return RemessaRecebimentoOrdemLog
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
     * Set idRemessaRecebimentoOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $idRemessaRecebimentoOrdem
     * @return RemessaRecebimentoOrdemLog
     */
    public function setIdRemessaRecebimentoOrdem(\Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem $idRemessaRecebimentoOrdem = null)
    {
        $this->idRemessaRecebimentoOrdem = $idRemessaRecebimentoOrdem;

        return $this;
    }

    /**
     * Get idRemessaRecebimentoOrdem
     *
     * @return \Servicos\LumaBundle\Entity\RemessaRecebimentoOrdem 
     */
    public function getIdRemessaRecebimentoOrdem()
    {
        return $this->idRemessaRecebimentoOrdem;
    }
}
