<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessamoviMovimentacaoLog
 */
class RemessamoviMovimentacaoLog
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
     * @var \Servicos\LumaBundle\Entity\RemessamoviMovimentacao
     */
    private $idRemessamoviMovimentacao;


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
     * @return RemessamoviMovimentacaoLog
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
     * @return RemessamoviMovimentacaoLog
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
     * @return RemessamoviMovimentacaoLog
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
     * Set idRemessamoviMovimentacao
     *
     * @param \Servicos\LumaBundle\Entity\RemessamoviMovimentacao $idRemessamoviMovimentacao
     * @return RemessamoviMovimentacaoLog
     */
    public function setIdRemessamoviMovimentacao(\Servicos\LumaBundle\Entity\RemessamoviMovimentacao $idRemessamoviMovimentacao = null)
    {
        $this->idRemessamoviMovimentacao = $idRemessamoviMovimentacao;

        return $this;
    }

    /**
     * Get idRemessamoviMovimentacao
     *
     * @return \Servicos\LumaBundle\Entity\RemessamoviMovimentacao 
     */
    public function getIdRemessamoviMovimentacao()
    {
        return $this->idRemessamoviMovimentacao;
    }
}
