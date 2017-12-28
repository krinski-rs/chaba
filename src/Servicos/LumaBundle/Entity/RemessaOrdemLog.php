<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessaOrdemLog
 */
class RemessaOrdemLog
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
     * @var \Servicos\LumaBundle\Entity\RemessaOrdem
     */
    private $idRemessaOrdem;


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
     * @return RemessaOrdemLog
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
     * @return RemessaOrdemLog
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
     * @return RemessaOrdemLog
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
     * Set idRemessaOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaOrdem $idRemessaOrdem
     * @return RemessaOrdemLog
     */
    public function setIdRemessaOrdem(\Servicos\LumaBundle\Entity\RemessaOrdem $idRemessaOrdem = null)
    {
        $this->idRemessaOrdem = $idRemessaOrdem;

        return $this;
    }

    /**
     * Get idRemessaOrdem
     *
     * @return \Servicos\LumaBundle\Entity\RemessaOrdem 
     */
    public function getIdRemessaOrdem()
    {
        return $this->idRemessaOrdem;
    }
}
