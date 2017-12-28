<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaRastreador
 */
class ViaturaRastreador
{
    /**
     * @var integer
     */
    private $viatRastreadorid;

    /**
     * @var integer
     */
    private $rastCadUsuarioid;

    /**
     * @var integer
     */
    private $rastUsuarioidAlteracao;

    /**
     * @var string
     */
    private $rastMotivoAlteracao;

    /**
     * @var \DateTime
     */
    private $rastDataAlteracao;

    /**
     * @var \DateTime
     */
    private $rastDatainc;

    /**
     * @var string
     */
    private $rastNumero;

    /**
     * @var string
     */
    private $rastChip;

    /**
     * @var string
     */
    private $rastChipNumero;

    /**
     * @var string
     */
    private $rastOperadora;

    /**
     * @var boolean
     */
    private $rastAtivo;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viatRastreadorid
     *
     * @return integer 
     */
    public function getViatRastreadorid()
    {
        return $this->viatRastreadorid;
    }

    /**
     * Set rastCadUsuarioid
     *
     * @param integer $rastCadUsuarioid
     * @return ViaturaRastreador
     */
    public function setRastCadUsuarioid($rastCadUsuarioid)
    {
        $this->rastCadUsuarioid = $rastCadUsuarioid;

        return $this;
    }

    /**
     * Get rastCadUsuarioid
     *
     * @return integer 
     */
    public function getRastCadUsuarioid()
    {
        return $this->rastCadUsuarioid;
    }

    /**
     * Set rastUsuarioidAlteracao
     *
     * @param integer $rastUsuarioidAlteracao
     * @return ViaturaRastreador
     */
    public function setRastUsuarioidAlteracao($rastUsuarioidAlteracao)
    {
        $this->rastUsuarioidAlteracao = $rastUsuarioidAlteracao;

        return $this;
    }

    /**
     * Get rastUsuarioidAlteracao
     *
     * @return integer 
     */
    public function getRastUsuarioidAlteracao()
    {
        return $this->rastUsuarioidAlteracao;
    }

    /**
     * Set rastMotivoAlteracao
     *
     * @param string $rastMotivoAlteracao
     * @return ViaturaRastreador
     */
    public function setRastMotivoAlteracao($rastMotivoAlteracao)
    {
        $this->rastMotivoAlteracao = $rastMotivoAlteracao;

        return $this;
    }

    /**
     * Get rastMotivoAlteracao
     *
     * @return string 
     */
    public function getRastMotivoAlteracao()
    {
        return $this->rastMotivoAlteracao;
    }

    /**
     * Set rastDataAlteracao
     *
     * @param \DateTime $rastDataAlteracao
     * @return ViaturaRastreador
     */
    public function setRastDataAlteracao($rastDataAlteracao)
    {
        $this->rastDataAlteracao = $rastDataAlteracao;

        return $this;
    }

    /**
     * Get rastDataAlteracao
     *
     * @return \DateTime 
     */
    public function getRastDataAlteracao()
    {
        return $this->rastDataAlteracao;
    }

    /**
     * Set rastDatainc
     *
     * @param \DateTime $rastDatainc
     * @return ViaturaRastreador
     */
    public function setRastDatainc($rastDatainc)
    {
        $this->rastDatainc = $rastDatainc;

        return $this;
    }

    /**
     * Get rastDatainc
     *
     * @return \DateTime 
     */
    public function getRastDatainc()
    {
        return $this->rastDatainc;
    }

    /**
     * Set rastNumero
     *
     * @param string $rastNumero
     * @return ViaturaRastreador
     */
    public function setRastNumero($rastNumero)
    {
        $this->rastNumero = $rastNumero;

        return $this;
    }

    /**
     * Get rastNumero
     *
     * @return string 
     */
    public function getRastNumero()
    {
        return $this->rastNumero;
    }

    /**
     * Set rastChip
     *
     * @param string $rastChip
     * @return ViaturaRastreador
     */
    public function setRastChip($rastChip)
    {
        $this->rastChip = $rastChip;

        return $this;
    }

    /**
     * Get rastChip
     *
     * @return string 
     */
    public function getRastChip()
    {
        return $this->rastChip;
    }

    /**
     * Set rastChipNumero
     *
     * @param string $rastChipNumero
     * @return ViaturaRastreador
     */
    public function setRastChipNumero($rastChipNumero)
    {
        $this->rastChipNumero = $rastChipNumero;

        return $this;
    }

    /**
     * Get rastChipNumero
     *
     * @return string 
     */
    public function getRastChipNumero()
    {
        return $this->rastChipNumero;
    }

    /**
     * Set rastOperadora
     *
     * @param string $rastOperadora
     * @return ViaturaRastreador
     */
    public function setRastOperadora($rastOperadora)
    {
        $this->rastOperadora = $rastOperadora;

        return $this;
    }

    /**
     * Get rastOperadora
     *
     * @return string 
     */
    public function getRastOperadora()
    {
        return $this->rastOperadora;
    }

    /**
     * Set rastAtivo
     *
     * @param boolean $rastAtivo
     * @return ViaturaRastreador
     */
    public function setRastAtivo($rastAtivo)
    {
        $this->rastAtivo = $rastAtivo;

        return $this;
    }

    /**
     * Get rastAtivo
     *
     * @return boolean 
     */
    public function getRastAtivo()
    {
        return $this->rastAtivo;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaRastreador
     */
    public function setViaturaid(\Servicos\LumaBundle\Entity\Viatura $viaturaid = null)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }
}
