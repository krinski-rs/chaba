<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaApoliceSeguro
 */
class ViaturaApoliceSeguro
{
    /**
     * @var integer
     */
    private $viatApoliceid;

    /**
     * @var integer
     */
    private $apoliCadUsersid;

    /**
     * @var string
     */
    private $apoliNumero;

    /**
     * @var string
     */
    private $apoliFoneAtendimento;

    /**
     * @var \DateTime
     */
    private $apoliDatainc;

    /**
     * @var \DateTime
     */
    private $apoliDataVencimento;

    /**
     * @var \DateTime
     */
    private $apoliDatafim;

    /**
     * @var integer
     */
    private $apoliSistechcid;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viatApoliceid
     *
     * @return integer 
     */
    public function getViatApoliceid()
    {
        return $this->viatApoliceid;
    }

    /**
     * Set apoliCadUsersid
     *
     * @param integer $apoliCadUsersid
     * @return ViaturaApoliceSeguro
     */
    public function setApoliCadUsersid($apoliCadUsersid)
    {
        $this->apoliCadUsersid = $apoliCadUsersid;

        return $this;
    }

    /**
     * Get apoliCadUsersid
     *
     * @return integer 
     */
    public function getApoliCadUsersid()
    {
        return $this->apoliCadUsersid;
    }

    /**
     * Set apoliNumero
     *
     * @param string $apoliNumero
     * @return ViaturaApoliceSeguro
     */
    public function setApoliNumero($apoliNumero)
    {
        $this->apoliNumero = $apoliNumero;

        return $this;
    }

    /**
     * Get apoliNumero
     *
     * @return string 
     */
    public function getApoliNumero()
    {
        return $this->apoliNumero;
    }

    /**
     * Set apoliFoneAtendimento
     *
     * @param string $apoliFoneAtendimento
     * @return ViaturaApoliceSeguro
     */
    public function setApoliFoneAtendimento($apoliFoneAtendimento)
    {
        $this->apoliFoneAtendimento = $apoliFoneAtendimento;

        return $this;
    }

    /**
     * Get apoliFoneAtendimento
     *
     * @return string 
     */
    public function getApoliFoneAtendimento()
    {
        return $this->apoliFoneAtendimento;
    }

    /**
     * Set apoliDatainc
     *
     * @param \DateTime $apoliDatainc
     * @return ViaturaApoliceSeguro
     */
    public function setApoliDatainc($apoliDatainc)
    {
        $this->apoliDatainc = $apoliDatainc;

        return $this;
    }

    /**
     * Get apoliDatainc
     *
     * @return \DateTime 
     */
    public function getApoliDatainc()
    {
        return $this->apoliDatainc;
    }

    /**
     * Set apoliDataVencimento
     *
     * @param \DateTime $apoliDataVencimento
     * @return ViaturaApoliceSeguro
     */
    public function setApoliDataVencimento($apoliDataVencimento)
    {
        $this->apoliDataVencimento = $apoliDataVencimento;

        return $this;
    }

    /**
     * Get apoliDataVencimento
     *
     * @return \DateTime 
     */
    public function getApoliDataVencimento()
    {
        return $this->apoliDataVencimento;
    }

    /**
     * Set apoliDatafim
     *
     * @param \DateTime $apoliDatafim
     * @return ViaturaApoliceSeguro
     */
    public function setApoliDatafim($apoliDatafim)
    {
        $this->apoliDatafim = $apoliDatafim;

        return $this;
    }

    /**
     * Get apoliDatafim
     *
     * @return \DateTime 
     */
    public function getApoliDatafim()
    {
        return $this->apoliDatafim;
    }

    /**
     * Set apoliSistechcid
     *
     * @param integer $apoliSistechcid
     * @return ViaturaApoliceSeguro
     */
    public function setApoliSistechcid($apoliSistechcid)
    {
        $this->apoliSistechcid = $apoliSistechcid;

        return $this;
    }

    /**
     * Get apoliSistechcid
     *
     * @return integer 
     */
    public function getApoliSistechcid()
    {
        return $this->apoliSistechcid;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaApoliceSeguro
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
