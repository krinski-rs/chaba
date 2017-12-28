<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaMotorista
 */
class ViaturaMotorista
{
    /**
     * @var integer
     */
    private $idViaturaMotorista;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $rhIdDocumento;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var boolean
     */
    private $assinado;

    /**
     * @var integer
     */
    private $idColaboradorAprovador;

    /**
     * @var \DateTime
     */
    private $dataAprovacao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var \Servicos\LumaBundle\Entity\Movimentacao
     */
    private $moviCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get idViaturaMotorista
     *
     * @return integer 
     */
    public function getIdViaturaMotorista()
    {
        return $this->idViaturaMotorista;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return ViaturaMotorista
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set rhIdDocumento
     *
     * @param integer $rhIdDocumento
     * @return ViaturaMotorista
     */
    public function setRhIdDocumento($rhIdDocumento)
    {
        $this->rhIdDocumento = $rhIdDocumento;

        return $this;
    }

    /**
     * Get rhIdDocumento
     *
     * @return integer 
     */
    public function getRhIdDocumento()
    {
        return $this->rhIdDocumento;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return ViaturaMotorista
     */
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return integer 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set assinado
     *
     * @param boolean $assinado
     * @return ViaturaMotorista
     */
    public function setAssinado($assinado)
    {
        $this->assinado = $assinado;

        return $this;
    }

    /**
     * Get assinado
     *
     * @return boolean 
     */
    public function getAssinado()
    {
        return $this->assinado;
    }

    /**
     * Set idColaboradorAprovador
     *
     * @param integer $idColaboradorAprovador
     * @return ViaturaMotorista
     */
    public function setIdColaboradorAprovador($idColaboradorAprovador)
    {
        $this->idColaboradorAprovador = $idColaboradorAprovador;

        return $this;
    }

    /**
     * Get idColaboradorAprovador
     *
     * @return integer 
     */
    public function getIdColaboradorAprovador()
    {
        return $this->idColaboradorAprovador;
    }

    /**
     * Set dataAprovacao
     *
     * @param \DateTime $dataAprovacao
     * @return ViaturaMotorista
     */
    public function setDataAprovacao($dataAprovacao)
    {
        $this->dataAprovacao = $dataAprovacao;

        return $this;
    }

    /**
     * Get dataAprovacao
     *
     * @return \DateTime 
     */
    public function getDataAprovacao()
    {
        return $this->dataAprovacao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return ViaturaMotorista
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return ViaturaMotorista
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return ViaturaMotorista
     */
    public function setMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid = null)
    {
        $this->moviCodigoid = $moviCodigoid;

        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Movimentacao 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaMotorista
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
