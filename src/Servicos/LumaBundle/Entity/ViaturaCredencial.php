<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaCredencial
 */
class ViaturaCredencial
{
    /**
     * @var integer
     */
    private $viatCartaoid;

    /**
     * @var integer
     */
    private $credenciTipo;

    /**
     * @var integer
     */
    private $credenciCadUsuarioid;

    /**
     * @var \DateTime
     */
    private $credenciDatainc;

    /**
     * @var string
     */
    private $credenciNumero;

    /**
     * @var \DateTime
     */
    private $credenciDataVencimento;

    /**
     * @var \DateTime
     */
    private $credenciDatafim;

    /**
     * @var string
     */
    private $credenciObservacao;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viatCartaoid
     *
     * @return integer 
     */
    public function getViatCartaoid()
    {
        return $this->viatCartaoid;
    }

    /**
     * Set credenciTipo
     *
     * @param integer $credenciTipo
     * @return ViaturaCredencial
     */
    public function setCredenciTipo($credenciTipo)
    {
        $this->credenciTipo = $credenciTipo;

        return $this;
    }

    /**
     * Get credenciTipo
     *
     * @return integer 
     */
    public function getCredenciTipo()
    {
        return $this->credenciTipo;
    }

    /**
     * Set credenciCadUsuarioid
     *
     * @param integer $credenciCadUsuarioid
     * @return ViaturaCredencial
     */
    public function setCredenciCadUsuarioid($credenciCadUsuarioid)
    {
        $this->credenciCadUsuarioid = $credenciCadUsuarioid;

        return $this;
    }

    /**
     * Get credenciCadUsuarioid
     *
     * @return integer 
     */
    public function getCredenciCadUsuarioid()
    {
        return $this->credenciCadUsuarioid;
    }

    /**
     * Set credenciDatainc
     *
     * @param \DateTime $credenciDatainc
     * @return ViaturaCredencial
     */
    public function setCredenciDatainc($credenciDatainc)
    {
        $this->credenciDatainc = $credenciDatainc;

        return $this;
    }

    /**
     * Get credenciDatainc
     *
     * @return \DateTime 
     */
    public function getCredenciDatainc()
    {
        return $this->credenciDatainc;
    }

    /**
     * Set credenciNumero
     *
     * @param string $credenciNumero
     * @return ViaturaCredencial
     */
    public function setCredenciNumero($credenciNumero)
    {
        $this->credenciNumero = $credenciNumero;

        return $this;
    }

    /**
     * Get credenciNumero
     *
     * @return string 
     */
    public function getCredenciNumero()
    {
        return $this->credenciNumero;
    }

    /**
     * Set credenciDataVencimento
     *
     * @param \DateTime $credenciDataVencimento
     * @return ViaturaCredencial
     */
    public function setCredenciDataVencimento($credenciDataVencimento)
    {
        $this->credenciDataVencimento = $credenciDataVencimento;

        return $this;
    }

    /**
     * Get credenciDataVencimento
     *
     * @return \DateTime 
     */
    public function getCredenciDataVencimento()
    {
        return $this->credenciDataVencimento;
    }

    /**
     * Set credenciDatafim
     *
     * @param \DateTime $credenciDatafim
     * @return ViaturaCredencial
     */
    public function setCredenciDatafim($credenciDatafim)
    {
        $this->credenciDatafim = $credenciDatafim;

        return $this;
    }

    /**
     * Get credenciDatafim
     *
     * @return \DateTime 
     */
    public function getCredenciDatafim()
    {
        return $this->credenciDatafim;
    }

    /**
     * Set credenciObservacao
     *
     * @param string $credenciObservacao
     * @return ViaturaCredencial
     */
    public function setCredenciObservacao($credenciObservacao)
    {
        $this->credenciObservacao = $credenciObservacao;

        return $this;
    }

    /**
     * Get credenciObservacao
     *
     * @return string 
     */
    public function getCredenciObservacao()
    {
        return $this->credenciObservacao;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaCredencial
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
