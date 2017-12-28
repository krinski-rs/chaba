<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordem
 */
class Ordem
{
    const OC_PENDENTE_ENVIO = 1;
    const OC_PENDENTE_CONFIRMACAO = 2;
    const OC_ERRO_INTEGRACAO = 3;
    const OC_ENVIADO = 4;

    /**
     * @var integer
     */
    private $ordeCodigoid;

    /**
     * @var \DateTime
     */
    private $ordeDataentrega;

    /**
     * @var string
     */
    private $ordeEnderecoentrega;

    /**
     * @var string
     */
    private $ordeDescricao;

    /**
     * @var \DateTime
     */
    private $ordeDatainc;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var integer
     */
    private $usuaAprovador;

    /**
     * @var \DateTime
     */
    private $ordeDataprevista;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $endeCodigoid;

    /**
     * @var integer
     */
    private $ordeStatusIntegracao;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->endeCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get ordeCodigoid
     *
     * @return integer 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }

    /**
     * Set ordeDataentrega
     *
     * @param \DateTime $ordeDataentrega
     * @return Ordem
     */
    public function setOrdeDataentrega($ordeDataentrega)
    {
        $this->ordeDataentrega = $ordeDataentrega;

        return $this;
    }

    /**
     * Get ordeDataentrega
     *
     * @return \DateTime 
     */
    public function getOrdeDataentrega()
    {
        return $this->ordeDataentrega;
    }

    /**
     * Set ordeEnderecoentrega
     *
     * @param string $ordeEnderecoentrega
     * @return Ordem
     */
    public function setOrdeEnderecoentrega($ordeEnderecoentrega)
    {
        $this->ordeEnderecoentrega = $ordeEnderecoentrega;

        return $this;
    }

    /**
     * Get ordeEnderecoentrega
     *
     * @return string 
     */
    public function getOrdeEnderecoentrega()
    {
        return $this->ordeEnderecoentrega;
    }

    /**
     * Set ordeDescricao
     *
     * @param string $ordeDescricao
     * @return Ordem
     */
    public function setOrdeDescricao($ordeDescricao)
    {
        $this->ordeDescricao = $ordeDescricao;

        return $this;
    }

    /**
     * Get ordeDescricao
     *
     * @return string 
     */
    public function getOrdeDescricao()
    {
        return $this->ordeDescricao;
    }

    /**
     * Set ordeDatainc
     *
     * @param \DateTime $ordeDatainc
     * @return Ordem
     */
    public function setOrdeDatainc($ordeDatainc)
    {
        $this->ordeDatainc = $ordeDatainc;

        return $this;
    }

    /**
     * Get ordeDatainc
     *
     * @return \DateTime 
     */
    public function getOrdeDatainc()
    {
        return $this->ordeDatainc;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Ordem
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set usuaAprovador
     *
     * @param integer $usuaAprovador
     * @return Ordem
     */
    public function setUsuaAprovador($usuaAprovador)
    {
        $this->usuaAprovador = $usuaAprovador;

        return $this;
    }

    /**
     * Get usuaAprovador
     *
     * @return integer 
     */
    public function getUsuaAprovador()
    {
        return $this->usuaAprovador;
    }

    /**
     * Set ordeDataprevista
     *
     * @param \DateTime $ordeDataprevista
     * @return Ordem
     */
    public function setOrdeDataprevista($ordeDataprevista)
    {
        $this->ordeDataprevista = $ordeDataprevista;

        return $this;
    }

    /**
     * Get ordeDataprevista
     *
     * @return \DateTime 
     */
    public function getOrdeDataprevista()
    {
        return $this->ordeDataprevista;
    }

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Ordem
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
     * Add endeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Endereco $endeCodigoid
     * @return Ordem
     */
    public function addEndeCodigoid(\Servicos\LumaBundle\Entity\Endereco $endeCodigoid)
    {
        $this->endeCodigoid[] = $endeCodigoid;

        return $this;
    }

    /**
     * Remove endeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Endereco $endeCodigoid
     */
    public function removeEndeCodigoid(\Servicos\LumaBundle\Entity\Endereco $endeCodigoid)
    {
        $this->endeCodigoid->removeElement($endeCodigoid);
    }

    /**
     * Get endeCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEndeCodigoid()
    {
        return $this->endeCodigoid;
    }

    /**
     * Set ordeStatusIntegracao
     *
     * @param int $ordeStatusIntegracao
     * @return Ordem
     */
    public function setOrdeStatusIntegracao($ordeStatusIntegracao = null)
    {
        $this->ordeStatusIntegracao = $ordeStatusIntegracao;

        return $this;
    }

    /**
     * Get ordeStatusIntegracao
     *
     * @return int 
     */
    public function getOrdeStatusIntegracao()
    {
        return $this->ordeStatusIntegracao;
    }
    
    /**
     * @var string
     */
    private $ordeInformacaoAdicional;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $centroCusto;


    /**
     * Set ordeInformacaoAdicional
     *
     * @param string $ordeInformacaoAdicional
     * @return Ordem
     */
    public function setOrdeInformacaoAdicional($ordeInformacaoAdicional)
    {
        $this->ordeInformacaoAdicional = $ordeInformacaoAdicional;

        return $this;
    }

    /**
     * Get ordeInformacaoAdicional
     *
     * @return string 
     */
    public function getOrdeInformacaoAdicional()
    {
        return $this->ordeInformacaoAdicional;
    }

    /**
     * Add centroCusto
     *
     * @param \Servicos\LumaBundle\Entity\CentroCusto $centroCusto
     * @return Ordem
     */
    public function addCentroCusto(\Servicos\LumaBundle\Entity\CentroCusto $centroCusto)
    {
        $this->centroCusto[] = $centroCusto;

        return $this;
    }

    /**
     * Remove centroCusto
     *
     * @param \Servicos\LumaBundle\Entity\CentroCusto $centroCusto
     */
    public function removeCentroCusto(\Servicos\LumaBundle\Entity\CentroCusto $centroCusto)
    {
        $this->centroCusto->removeElement($centroCusto);
    }

    /**
     * Get centroCusto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentroCusto()
    {
        return $this->centroCusto;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $remessaOrdem;


    /**
     * Add remessaOrdem
     *
     * @param \Servicos\LumaBundle\Entity\RemessaOrdem $remessaOrdem
     * @return Ordem
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $nfEntrada;


    /**
     * Add nfEntrada
     *
     * @param \Servicos\LumaBundle\Entity\OrdemNfEntrada $nfEntrada
     * @return Ordem
     */
    public function addNfEntrada(\Servicos\LumaBundle\Entity\OrdemNfEntrada $nfEntrada)
    {
        $this->nfEntrada[] = $nfEntrada;

        return $this;
    }

    /**
     * Remove nfEntrada
     *
     * @param \Servicos\LumaBundle\Entity\OrdemNfEntrada $nfEntrada
     */
    public function removeNfEntrada(\Servicos\LumaBundle\Entity\OrdemNfEntrada $nfEntrada)
    {
        $this->nfEntrada->removeElement($nfEntrada);
    }

    /**
     * Get nfEntrada
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNfEntrada()
    {
        return $this->nfEntrada;
    }
}
