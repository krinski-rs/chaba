<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimentacao
 */
class Movimentacao
{
    const PENDENTE_ENVIO = 1;
    const PENDENTE_CONFIRMACAO = 2;
    const ERRO_INTEGRACAO = 3;
    const ENVIADO = 4;
    const CANCELADO = 5;
    const NF_EMITIDA = 6;
    /**
     * @var integer
     */
    private $moviCodigoid;

    /**
     * @var integer
     */
    private $usrResponsavel;

    /**
     * @var integer
     */
    private $usrSolicitante;

    /**
     * @var \DateTime
     */
    private $moviDatainc;

    /**
     * @var string
     */
    private $moviMotivo;

    /**
     * @var string
     */
    private $moviTipo;

    /**
     * @var string
     */
    private $moviEntregador;

    /**
     * @var string
     */
    private $moviDocumentoentregador;

    /**
     * @var boolean
     */
    private $moviNfe;

    /**
     * @var string
     */
    private $nfeId;

    /**
     * @var boolean
     */
    private $moviAutomatica;

    /**
     * @var \Servicos\LumaBundle\Entity\Finalidade
     */
    private $finaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidDecodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidParacodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidDestinofinalcodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pediCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $moviProdutos;


    /**
     * @var int
     */
    private $cadUserDestino;
        

    /**
     * @var int
     */
    private $cadUserOrigem;

    /**
     * @var string
     */
    private $operacao;

    /**
     * @var int
     */
    private $moviStatusIntegracao;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pediCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moviProdutos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get moviCodigoid
     *
     * @return integer 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Set usrResponsavel
     *
     * @param integer $usrResponsavel
     * @return Movimentacao
     */
    public function setUsrResponsavel($usrResponsavel)
    {
        $this->usrResponsavel = $usrResponsavel;

        return $this;
    }

    /**
     * Get usrResponsavel
     *
     * @return integer 
     */
    public function getUsrResponsavel()
    {
        return $this->usrResponsavel;
    }

    /**
     * Set usrSolicitante
     *
     * @param integer $usrSolicitante
     * @return Movimentacao
     */
    public function setUsrSolicitante($usrSolicitante)
    {
        $this->usrSolicitante = $usrSolicitante;

        return $this;
    }

    /**
     * Get usrSolicitante
     *
     * @return integer 
     */
    public function getUsrSolicitante()
    {
        return $this->usrSolicitante;
    }

    /**
     * Set moviDatainc
     *
     * @param \DateTime $moviDatainc
     * @return Movimentacao
     */
    public function setMoviDatainc($moviDatainc)
    {
        $this->moviDatainc = $moviDatainc;

        return $this;
    }

    /**
     * Get moviDatainc
     *
     * @return \DateTime 
     */
    public function getMoviDatainc()
    {
        return $this->moviDatainc;
    }

    /**
     * Set moviMotivo
     *
     * @param string $moviMotivo
     * @return Movimentacao
     */
    public function setMoviMotivo($moviMotivo)
    {
        $this->moviMotivo = $moviMotivo;

        return $this;
    }

    /**
     * Get moviMotivo
     *
     * @return string 
     */
    public function getMoviMotivo()
    {
        return $this->moviMotivo;
    }

    /**
     * Set moviTipo
     *
     * @param string $moviTipo
     * @return Movimentacao
     */
    public function setMoviTipo($moviTipo)
    {
        $this->moviTipo = $moviTipo;

        return $this;
    }

    /**
     * Get moviTipo
     *
     * @return string 
     */
    public function getMoviTipo()
    {
        return $this->moviTipo;
    }

    /**
     * Set moviEntregador
     *
     * @param string $moviEntregador
     * @return Movimentacao
     */
    public function setMoviEntregador($moviEntregador)
    {
        $this->moviEntregador = $moviEntregador;

        return $this;
    }

    /**
     * Get moviEntregador
     *
     * @return string 
     */
    public function getMoviEntregador()
    {
        return $this->moviEntregador;
    }

    /**
     * Set moviDocumentoentregador
     *
     * @param string $moviDocumentoentregador
     * @return Movimentacao
     */
    public function setMoviDocumentoentregador($moviDocumentoentregador)
    {
        $this->moviDocumentoentregador = $moviDocumentoentregador;

        return $this;
    }

    /**
     * Get moviDocumentoentregador
     *
     * @return string 
     */
    public function getMoviDocumentoentregador()
    {
        return $this->moviDocumentoentregador;
    }

    /**
     * Set moviNfe
     *
     * @param boolean $moviNfe
     * @return Movimentacao
     */
    public function setMoviNfe($moviNfe)
    {
        $this->moviNfe = $moviNfe;

        return $this;
    }

    /**
     * Get moviNfe
     *
     * @return boolean 
     */
    public function getMoviNfe()
    {
        return $this->moviNfe;
    }

    /**
     * Set nfeId
     *
     * @param string $nfeId
     * @return Movimentacao
     */
    public function setNfeId($nfeId)
    {
        $this->nfeId = $nfeId;

        return $this;
    }

    /**
     * Get nfeId
     *
     * @return string 
     */
    public function getNfeId()
    {
        return $this->nfeId;
    }

    /**
     * Set moviAutomatica
     *
     * @param boolean $moviAutomatica
     * @return Movimentacao
     */
    public function setMoviAutomatica($moviAutomatica)
    {
        $this->moviAutomatica = $moviAutomatica;

        return $this;
    }

    /**
     * Get moviAutomatica
     *
     * @return boolean 
     */
    public function getMoviAutomatica()
    {
        return $this->moviAutomatica;
    }

    /**
     * Set finaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Finalidade $finaCodigoid
     * @return Movimentacao
     */
    public function setFinaCodigoid(\Servicos\LumaBundle\Entity\Finalidade $finaCodigoid = null)
    {
        $this->finaCodigoid = $finaCodigoid;

        return $this;
    }

    /**
     * Get finaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Finalidade 
     */
    public function getFinaCodigoid()
    {
        return $this->finaCodigoid;
    }

    /**
     * Set unidDecodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidDecodigoid
     * @return Movimentacao
     */
    public function setUnidDecodigoid(\Servicos\LumaBundle\Entity\Unidade $unidDecodigoid = null)
    {
        $this->unidDecodigoid = $unidDecodigoid;

        return $this;
    }

    /**
     * Get unidDecodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidDecodigoid()
    {
        return $this->unidDecodigoid;
    }

    /**
     * Set unidParacodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidParacodigoid
     * @return Movimentacao
     */
    public function setUnidParacodigoid(\Servicos\LumaBundle\Entity\Unidade $unidParacodigoid = null)
    {
        $this->unidParacodigoid = $unidParacodigoid;

        return $this;
    }

    /**
     * Get unidParacodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidParacodigoid()
    {
        return $this->unidParacodigoid;
    }

    /**
     * Set unidDestinofinalcodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidDestinofinalcodigoid
     * @return Movimentacao
     */
    public function setUnidDestinofinalcodigoid(\Servicos\LumaBundle\Entity\Unidade $unidDestinofinalcodigoid = null)
    {
        $this->unidDestinofinalcodigoid = $unidDestinofinalcodigoid;

        return $this;
    }

    /**
     * Get unidDestinofinalcodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidDestinofinalcodigoid()
    {
        return $this->unidDestinofinalcodigoid;
    }

    /**
     * Add pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     * @return Movimentacao
     */
    public function addPediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid)
    {
        $this->pediCodigoid[] = $pediCodigoid;

        return $this;
    }

    /**
     * Remove pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     */
    public function removePediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid)
    {
        $this->pediCodigoid->removeElement($pediCodigoid);
    }

    /**
     * Get pediCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPediCodigoid()
    {
        return $this->pediCodigoid;
    }

      /**
     * Add moviProdutos
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacaoproduto $moviProdutos
     * @return Movimentacao
     */
    public function addMovimentacaoproduto(\Servicos\LumaBundle\Entity\Movimentacaoproduto $moviProdutos)
    {
        $this->moviProdutos[] = $moviProdutos;
        return $this;
    }

    /**
     * Get moviProdutos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMoviProdutos()
    {
        return $this->moviProdutos;
    }

    /**
     * @return int
     */
    public function getCadUserDestino()
    {
        return $this->cadUserDestino;
    }

    /**
     * @param int $cadUserDestino
     */
    public function setCadUserDestino($cadUserDestino)
    {
        $this->cadUserDestino = $cadUserDestino;
        return $this;
    }

    /**
     * @return int
     */
    public function getCadUserOrigem()
    {
        return $this->cadUserOrigem;
    }

    /**
     * @param int $cadUserOrigem
     */
    public function setCadUserOrigem($cadUserOrigem)
    {
        $this->cadUserOrigem = $cadUserOrigem;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperacao()
    {
        return $this->operacao;
    }

    /**
     * @param mixed $operacao
     */
    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getMoviStatusIntegracao()
    {
        return $this->moviStatusIntegracao;
    }

    /**
     * @param mixed $moviStatusIntegracao
     */
    public function setMoviStatusIntegracao($moviStatusIntegracao)
    {
        $this->moviStatusIntegracao = $moviStatusIntegracao;
        return $this;
    }
}
