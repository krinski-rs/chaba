<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Confirmacao
 */
class Confirmacao
{
    /**
     * @var integer
     */
    private $confCodigoid;

    /**
     * @var string
     */
    private $confTipo;

    /**
     * @var \DateTime
     */
    private $confDatainc;

    /**
     * @var \DateTime
     */
    private $confDataconfi;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var boolean
     */
    private $confCiente;

    /**
     * @var string
     */
    private $confJustificativa;

    /**
     * @var string
     */
    private $confContato;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Ativacao
     */
    private $ativCodigoid;


    /**
     * Get confCodigoid
     *
     * @return integer 
     */
    public function getConfCodigoid()
    {
        return $this->confCodigoid;
    }

    /**
     * Set confTipo
     *
     * @param string $confTipo
     * @return Confirmacao
     */
    public function setConfTipo($confTipo)
    {
        $this->confTipo = $confTipo;

        return $this;
    }

    /**
     * Get confTipo
     *
     * @return string 
     */
    public function getConfTipo()
    {
        return $this->confTipo;
    }

    /**
     * Set confDatainc
     *
     * @param \DateTime $confDatainc
     * @return Confirmacao
     */
    public function setConfDatainc($confDatainc)
    {
        $this->confDatainc = $confDatainc;

        return $this;
    }

    /**
     * Get confDatainc
     *
     * @return \DateTime 
     */
    public function getConfDatainc()
    {
        return $this->confDatainc;
    }

    /**
     * Set confDataconfi
     *
     * @param \DateTime $confDataconfi
     * @return Confirmacao
     */
    public function setConfDataconfi($confDataconfi)
    {
        $this->confDataconfi = $confDataconfi;

        return $this;
    }

    /**
     * Get confDataconfi
     *
     * @return \DateTime 
     */
    public function getConfDataconfi()
    {
        return $this->confDataconfi;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Confirmacao
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
     * Set confCiente
     *
     * @param boolean $confCiente
     * @return Confirmacao
     */
    public function setConfCiente($confCiente)
    {
        $this->confCiente = $confCiente;

        return $this;
    }

    /**
     * Get confCiente
     *
     * @return boolean 
     */
    public function getConfCiente()
    {
        return $this->confCiente;
    }

    /**
     * Set confJustificativa
     *
     * @param string $confJustificativa
     * @return Confirmacao
     */
    public function setConfJustificativa($confJustificativa)
    {
        $this->confJustificativa = $confJustificativa;

        return $this;
    }

    /**
     * Get confJustificativa
     *
     * @return string 
     */
    public function getConfJustificativa()
    {
        return $this->confJustificativa;
    }

    /**
     * Set confContato
     *
     * @param string $confContato
     * @return Confirmacao
     */
    public function setConfContato($confContato)
    {
        $this->confContato = $confContato;

        return $this;
    }

    /**
     * Get confContato
     *
     * @return string 
     */
    public function getConfContato()
    {
        return $this->confContato;
    }

    /**
     * Set ativCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Ativacao $ativCodigoid
     * @return Confirmacao
     */
    public function setAtivCodigoid(\Servicos\FinanceiroBundle\Entity\Ativacao $ativCodigoid = null)
    {
        $this->ativCodigoid = $ativCodigoid;

        return $this;
    }

    /**
     * Get ativCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Ativacao 
     */
    public function getAtivCodigoid()
    {
        return $this->ativCodigoid;
    }
}
