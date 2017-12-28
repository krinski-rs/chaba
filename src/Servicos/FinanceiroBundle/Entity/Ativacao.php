<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ativacao
 */
class Ativacao
{
    /**
     * @var integer
     */
    private $ativCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $ativDatainc;

    /**
     * @var \DateTime
     */
    private $ativDataativado;

    /**
     * @var boolean
     */
    private $ativApospagamento;

    /**
     * @var boolean
     */
    private $ativAposassinatura;

    /**
     * @var \DateTime
     */
    private $ativDatafixa;

    /**
     * @var integer
     */
    private $ativDiasapos;

    /**
     * @var boolean
     */
    private $ativCobraraposativacao;

    /**
     * @var boolean
     */
    private $ativCobraraposassinatura;

    /**
     * @var \DateTime
     */
    private $ativCobrardatafixa;

    /**
     * @var integer
     */
    private $ativCobrardiasapos;

    /**
     * @var \DateTime
     */
    private $ativDataalterado;

    /**
     * @var \DateTime
     */
    private $ativPagamentotaxa;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get ativCodigoid
     *
     * @return integer 
     */
    public function getAtivCodigoid()
    {
        return $this->ativCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Ativacao
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
     * Set ativDatainc
     *
     * @param \DateTime $ativDatainc
     * @return Ativacao
     */
    public function setAtivDatainc($ativDatainc)
    {
        $this->ativDatainc = $ativDatainc;

        return $this;
    }

    /**
     * Get ativDatainc
     *
     * @return \DateTime 
     */
    public function getAtivDatainc()
    {
        return $this->ativDatainc;
    }

    /**
     * Set ativDataativado
     *
     * @param \DateTime $ativDataativado
     * @return Ativacao
     */
    public function setAtivDataativado($ativDataativado)
    {
        $this->ativDataativado = $ativDataativado;

        return $this;
    }

    /**
     * Get ativDataativado
     *
     * @return \DateTime 
     */
    public function getAtivDataativado()
    {
        return $this->ativDataativado;
    }

    /**
     * Set ativApospagamento
     *
     * @param boolean $ativApospagamento
     * @return Ativacao
     */
    public function setAtivApospagamento($ativApospagamento)
    {
        $this->ativApospagamento = $ativApospagamento;

        return $this;
    }

    /**
     * Get ativApospagamento
     *
     * @return boolean 
     */
    public function getAtivApospagamento()
    {
        return $this->ativApospagamento;
    }

    /**
     * Set ativAposassinatura
     *
     * @param boolean $ativAposassinatura
     * @return Ativacao
     */
    public function setAtivAposassinatura($ativAposassinatura)
    {
        $this->ativAposassinatura = $ativAposassinatura;

        return $this;
    }

    /**
     * Get ativAposassinatura
     *
     * @return boolean 
     */
    public function getAtivAposassinatura()
    {
        return $this->ativAposassinatura;
    }

    /**
     * Set ativDatafixa
     *
     * @param \DateTime $ativDatafixa
     * @return Ativacao
     */
    public function setAtivDatafixa($ativDatafixa)
    {
        $this->ativDatafixa = $ativDatafixa;

        return $this;
    }

    /**
     * Get ativDatafixa
     *
     * @return \DateTime 
     */
    public function getAtivDatafixa()
    {
        return $this->ativDatafixa;
    }

    /**
     * Set ativDiasapos
     *
     * @param integer $ativDiasapos
     * @return Ativacao
     */
    public function setAtivDiasapos($ativDiasapos)
    {
        $this->ativDiasapos = $ativDiasapos;

        return $this;
    }

    /**
     * Get ativDiasapos
     *
     * @return integer 
     */
    public function getAtivDiasapos()
    {
        return $this->ativDiasapos;
    }

    /**
     * Set ativCobraraposativacao
     *
     * @param boolean $ativCobraraposativacao
     * @return Ativacao
     */
    public function setAtivCobraraposativacao($ativCobraraposativacao)
    {
        $this->ativCobraraposativacao = $ativCobraraposativacao;

        return $this;
    }

    /**
     * Get ativCobraraposativacao
     *
     * @return boolean 
     */
    public function getAtivCobraraposativacao()
    {
        return $this->ativCobraraposativacao;
    }

    /**
     * Set ativCobraraposassinatura
     *
     * @param boolean $ativCobraraposassinatura
     * @return Ativacao
     */
    public function setAtivCobraraposassinatura($ativCobraraposassinatura)
    {
        $this->ativCobraraposassinatura = $ativCobraraposassinatura;

        return $this;
    }

    /**
     * Get ativCobraraposassinatura
     *
     * @return boolean 
     */
    public function getAtivCobraraposassinatura()
    {
        return $this->ativCobraraposassinatura;
    }

    /**
     * Set ativCobrardatafixa
     *
     * @param \DateTime $ativCobrardatafixa
     * @return Ativacao
     */
    public function setAtivCobrardatafixa($ativCobrardatafixa)
    {
        $this->ativCobrardatafixa = $ativCobrardatafixa;

        return $this;
    }

    /**
     * Get ativCobrardatafixa
     *
     * @return \DateTime 
     */
    public function getAtivCobrardatafixa()
    {
        return $this->ativCobrardatafixa;
    }

    /**
     * Set ativCobrardiasapos
     *
     * @param integer $ativCobrardiasapos
     * @return Ativacao
     */
    public function setAtivCobrardiasapos($ativCobrardiasapos)
    {
        $this->ativCobrardiasapos = $ativCobrardiasapos;

        return $this;
    }

    /**
     * Get ativCobrardiasapos
     *
     * @return integer 
     */
    public function getAtivCobrardiasapos()
    {
        return $this->ativCobrardiasapos;
    }

    /**
     * Set ativDataalterado
     *
     * @param \DateTime $ativDataalterado
     * @return Ativacao
     */
    public function setAtivDataalterado($ativDataalterado)
    {
        $this->ativDataalterado = $ativDataalterado;

        return $this;
    }

    /**
     * Get ativDataalterado
     *
     * @return \DateTime 
     */
    public function getAtivDataalterado()
    {
        return $this->ativDataalterado;
    }

    /**
     * Set ativPagamentotaxa
     *
     * @param \DateTime $ativPagamentotaxa
     * @return Ativacao
     */
    public function setAtivPagamentotaxa($ativPagamentotaxa)
    {
        $this->ativPagamentotaxa = $ativPagamentotaxa;

        return $this;
    }

    /**
     * Get ativPagamentotaxa
     *
     * @return \DateTime 
     */
    public function getAtivPagamentotaxa()
    {
        return $this->ativPagamentotaxa;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Ativacao
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }
}
