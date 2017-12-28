<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaProprietario
 */
class ViaturaProprietario
{
    /**
     * @var integer
     */
    private $viatProprietario;

    /**
     * @var integer
     */
    private $viaturaid;

    /**
     * @var integer
     */
    private $propSistechcid;

    /**
     * @var integer
     */
    private $propCadUsuarioid;

    /**
     * @var integer
     */
    private $propAlteracaoUsuarioid;

    /**
     * @var \DateTime
     */
    private $propDatainc;

    /**
     * @var \DateTime
     */
    private $propDataAlteracao;

    /**
     * @var string
     */
    private $propMotivoAlteracao;


    /**
     * Get viatProprietario
     *
     * @return integer 
     */
    public function getViatProprietario()
    {
        return $this->viatProprietario;
    }

    /**
     * Set viaturaid
     *
     * @param integer $viaturaid
     * @return ViaturaProprietario
     */
    public function setViaturaid($viaturaid)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return integer 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }

    /**
     * Set propSistechcid
     *
     * @param integer $propSistechcid
     * @return ViaturaProprietario
     */
    public function setPropSistechcid($propSistechcid)
    {
        $this->propSistechcid = $propSistechcid;

        return $this;
    }

    /**
     * Get propSistechcid
     *
     * @return integer 
     */
    public function getPropSistechcid()
    {
        return $this->propSistechcid;
    }

    /**
     * Set propCadUsuarioid
     *
     * @param integer $propCadUsuarioid
     * @return ViaturaProprietario
     */
    public function setPropCadUsuarioid($propCadUsuarioid)
    {
        $this->propCadUsuarioid = $propCadUsuarioid;

        return $this;
    }

    /**
     * Get propCadUsuarioid
     *
     * @return integer 
     */
    public function getPropCadUsuarioid()
    {
        return $this->propCadUsuarioid;
    }

    /**
     * Set propAlteracaoUsuarioid
     *
     * @param integer $propAlteracaoUsuarioid
     * @return ViaturaProprietario
     */
    public function setPropAlteracaoUsuarioid($propAlteracaoUsuarioid)
    {
        $this->propAlteracaoUsuarioid = $propAlteracaoUsuarioid;

        return $this;
    }

    /**
     * Get propAlteracaoUsuarioid
     *
     * @return integer 
     */
    public function getPropAlteracaoUsuarioid()
    {
        return $this->propAlteracaoUsuarioid;
    }

    /**
     * Set propDatainc
     *
     * @param \DateTime $propDatainc
     * @return ViaturaProprietario
     */
    public function setPropDatainc($propDatainc)
    {
        $this->propDatainc = $propDatainc;

        return $this;
    }

    /**
     * Get propDatainc
     *
     * @return \DateTime 
     */
    public function getPropDatainc()
    {
        return $this->propDatainc;
    }

    /**
     * Set propDataAlteracao
     *
     * @param \DateTime $propDataAlteracao
     * @return ViaturaProprietario
     */
    public function setPropDataAlteracao($propDataAlteracao)
    {
        $this->propDataAlteracao = $propDataAlteracao;

        return $this;
    }

    /**
     * Get propDataAlteracao
     *
     * @return \DateTime 
     */
    public function getPropDataAlteracao()
    {
        return $this->propDataAlteracao;
    }

    /**
     * Set propMotivoAlteracao
     *
     * @param string $propMotivoAlteracao
     * @return ViaturaProprietario
     */
    public function setPropMotivoAlteracao($propMotivoAlteracao)
    {
        $this->propMotivoAlteracao = $propMotivoAlteracao;

        return $this;
    }

    /**
     * Get propMotivoAlteracao
     *
     * @return string 
     */
    public function getPropMotivoAlteracao()
    {
        return $this->propMotivoAlteracao;
    }
}
