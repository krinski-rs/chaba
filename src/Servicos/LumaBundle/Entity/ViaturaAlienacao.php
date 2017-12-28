<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaAlienacao
 */
class ViaturaAlienacao
{
    /**
     * @var integer
     */
    private $viaturaAlienacaoid;

    /**
     * @var integer
     */
    private $alieUserAlienado;

    /**
     * @var integer
     */
    private $alieCadUsuarioid;

    /**
     * @var \DateTime
     */
    private $alieDatainc;

    /**
     * @var \DateTime
     */
    private $alieDataPrevista;

    /**
     * @var \DateTime
     */
    private $alieDataFinal;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var string
     */
    private $observacao;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viaturaAlienacaoid
     *
     * @return integer 
     */
    public function getViaturaAlienacaoid()
    {
        return $this->viaturaAlienacaoid;
    }

    /**
     * Set alieUserAlienado
     *
     * @param integer $alieUserAlienado
     * @return ViaturaAlienacao
     */
    public function setAlieUserAlienado($alieUserAlienado)
    {
        $this->alieUserAlienado = $alieUserAlienado;

        return $this;
    }

    /**
     * Get alieUserAlienado
     *
     * @return integer 
     */
    public function getAlieUserAlienado()
    {
        return $this->alieUserAlienado;
    }

    /**
     * Set alieCadUsuarioid
     *
     * @param integer $alieCadUsuarioid
     * @return ViaturaAlienacao
     */
    public function setAlieCadUsuarioid($alieCadUsuarioid)
    {
        $this->alieCadUsuarioid = $alieCadUsuarioid;

        return $this;
    }

    /**
     * Get alieCadUsuarioid
     *
     * @return integer 
     */
    public function getAlieCadUsuarioid()
    {
        return $this->alieCadUsuarioid;
    }

    /**
     * Set alieDatainc
     *
     * @param \DateTime $alieDatainc
     * @return ViaturaAlienacao
     */
    public function setAlieDatainc($alieDatainc)
    {
        $this->alieDatainc = $alieDatainc;

        return $this;
    }

    /**
     * Get alieDatainc
     *
     * @return \DateTime 
     */
    public function getAlieDatainc()
    {
        return $this->alieDatainc;
    }

    /**
     * Set alieDataPrevista
     *
     * @param \DateTime $alieDataPrevista
     * @return ViaturaAlienacao
     */
    public function setAlieDataPrevista($alieDataPrevista)
    {
        $this->alieDataPrevista = $alieDataPrevista;

        return $this;
    }

    /**
     * Get alieDataPrevista
     *
     * @return \DateTime 
     */
    public function getAlieDataPrevista()
    {
        return $this->alieDataPrevista;
    }

    /**
     * Set alieDataFinal
     *
     * @param \DateTime $alieDataFinal
     * @return ViaturaAlienacao
     */
    public function setAlieDataFinal($alieDataFinal)
    {
        $this->alieDataFinal = $alieDataFinal;

        return $this;
    }

    /**
     * Get alieDataFinal
     *
     * @return \DateTime 
     */
    public function getAlieDataFinal()
    {
        return $this->alieDataFinal;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return ViaturaAlienacao
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return ViaturaAlienacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string 
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaAlienacao
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
