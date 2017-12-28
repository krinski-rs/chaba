<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadLigacaoC2u
 */
class CadLigacaoC2u
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dtInicio;

    /**
     * @var \DateTime
     */
    private $dtFim;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var boolean
     */
    private $cobranca;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $cadCid;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers2;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoLigacao
     */
    private $admTipoLigacao;


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
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return CadLigacaoC2u
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return CadLigacaoC2u
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return CadLigacaoC2u
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set cobranca
     *
     * @param boolean $cobranca
     * @return CadLigacaoC2u
     */
    public function setCobranca($cobranca)
    {
        $this->cobranca = $cobranca;

        return $this;
    }

    /**
     * Get cobranca
     *
     * @return boolean 
     */
    public function getCobranca()
    {
        return $this->cobranca;
    }

    /**
     * Set cadCid
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $cadCid
     * @return CadLigacaoC2u
     */
    public function setCadCid(\Servicos\GcdbBundle\Entity\Customers $cadCid = null)
    {
        $this->cadCid = $cadCid;

        return $this;
    }

    /**
     * Get cadCid
     *
     * @return \Servicos\GcdbBundle\Entity\Customers 
     */
    public function getCadCid()
    {
        return $this->cadCid;
    }

    /**
     * Set cadUsers2
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers2
     * @return CadLigacaoC2u
     */
    public function setCadUsers2(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers2 = null)
    {
        $this->cadUsers2 = $cadUsers2;

        return $this;
    }

    /**
     * Get cadUsers2
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers2()
    {
        return $this->cadUsers2;
    }

    /**
     * Set admTipoLigacao
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoLigacao $admTipoLigacao
     * @return CadLigacaoC2u
     */
    public function setAdmTipoLigacao(\Servicos\GcdbBundle\Entity\AdmTipoLigacao $admTipoLigacao = null)
    {
        $this->admTipoLigacao = $admTipoLigacao;

        return $this;
    }

    /**
     * Get admTipoLigacao
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoLigacao 
     */
    public function getAdmTipoLigacao()
    {
        return $this->admTipoLigacao;
    }
}
