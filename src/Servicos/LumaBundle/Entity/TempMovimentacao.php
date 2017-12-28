<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempMovimentacao
 */
class TempMovimentacao
{
    /**
     * @var integer
     */
    private $codigo;

    /**
     * @var \DateTime
     */
    private $dataordem;

    /**
     * @var string
     */
    private $origem;

    /**
     * @var string
     */
    private $destino;

    /**
     * @var string
     */
    private $destinoFinal;

    /**
     * @var string
     */
    private $responsavel;

    /**
     * @var string
     */
    private $solicitante;

    /**
     * @var string
     */
    private $motivo;

    /**
     * @var string
     */
    private $nfe;

    /**
     * @var string
     */
    private $ordem;

    /**
     * @var string
     */
    private $finalidade;

    /**
     * @var integer
     */
    private $origemId;

    /**
     * @var integer
     */
    private $destinoId;

    /**
     * @var integer
     */
    private $destinoFinalId;


    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set dataordem
     *
     * @param \DateTime $dataordem
     * @return TempMovimentacao
     */
    public function setDataordem($dataordem)
    {
        $this->dataordem = $dataordem;

        return $this;
    }

    /**
     * Get dataordem
     *
     * @return \DateTime 
     */
    public function getDataordem()
    {
        return $this->dataordem;
    }

    /**
     * Set origem
     *
     * @param string $origem
     * @return TempMovimentacao
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;

        return $this;
    }

    /**
     * Get origem
     *
     * @return string 
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return TempMovimentacao
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set destinoFinal
     *
     * @param string $destinoFinal
     * @return TempMovimentacao
     */
    public function setDestinoFinal($destinoFinal)
    {
        $this->destinoFinal = $destinoFinal;

        return $this;
    }

    /**
     * Get destinoFinal
     *
     * @return string 
     */
    public function getDestinoFinal()
    {
        return $this->destinoFinal;
    }

    /**
     * Set responsavel
     *
     * @param string $responsavel
     * @return TempMovimentacao
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get responsavel
     *
     * @return string 
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set solicitante
     *
     * @param string $solicitante
     * @return TempMovimentacao
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Get solicitante
     *
     * @return string 
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return TempMovimentacao
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set nfe
     *
     * @param string $nfe
     * @return TempMovimentacao
     */
    public function setNfe($nfe)
    {
        $this->nfe = $nfe;

        return $this;
    }

    /**
     * Get nfe
     *
     * @return string 
     */
    public function getNfe()
    {
        return $this->nfe;
    }

    /**
     * Set ordem
     *
     * @param string $ordem
     * @return TempMovimentacao
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;

        return $this;
    }

    /**
     * Get ordem
     *
     * @return string 
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * Set finalidade
     *
     * @param string $finalidade
     * @return TempMovimentacao
     */
    public function setFinalidade($finalidade)
    {
        $this->finalidade = $finalidade;

        return $this;
    }

    /**
     * Get finalidade
     *
     * @return string 
     */
    public function getFinalidade()
    {
        return $this->finalidade;
    }

    /**
     * Set origemId
     *
     * @param integer $origemId
     * @return TempMovimentacao
     */
    public function setOrigemId($origemId)
    {
        $this->origemId = $origemId;

        return $this;
    }

    /**
     * Get origemId
     *
     * @return integer 
     */
    public function getOrigemId()
    {
        return $this->origemId;
    }

    /**
     * Set destinoId
     *
     * @param integer $destinoId
     * @return TempMovimentacao
     */
    public function setDestinoId($destinoId)
    {
        $this->destinoId = $destinoId;

        return $this;
    }

    /**
     * Get destinoId
     *
     * @return integer 
     */
    public function getDestinoId()
    {
        return $this->destinoId;
    }

    /**
     * Set destinoFinalId
     *
     * @param integer $destinoFinalId
     * @return TempMovimentacao
     */
    public function setDestinoFinalId($destinoFinalId)
    {
        $this->destinoFinalId = $destinoFinalId;

        return $this;
    }

    /**
     * Get destinoFinalId
     *
     * @return integer 
     */
    public function getDestinoFinalId()
    {
        return $this->destinoFinalId;
    }
}
