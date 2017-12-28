<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnderecoentregaatributovalorHisto
 */
class EnderecoentregaatributovalorHisto
{
    /**
     * @var integer
     */
    private $endeentratrivaloHisto;

    /**
     * @var integer
     */
    private $atrivaloCodigoid;

    /**
     * @var string
     */
    private $endeentratrivaloValor;

    /**
     * @var string
     */
    private $endeentratrivaloDescricao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor
     */
    private $endeentratrivaloCodigoid;


    /**
     * Get endeentratrivaloHisto
     *
     * @return integer 
     */
    public function getEndeentratrivaloHisto()
    {
        return $this->endeentratrivaloHisto;
    }

    /**
     * Set atrivaloCodigoid
     *
     * @param integer $atrivaloCodigoid
     * @return EnderecoentregaatributovalorHisto
     */
    public function setAtrivaloCodigoid($atrivaloCodigoid)
    {
        $this->atrivaloCodigoid = $atrivaloCodigoid;

        return $this;
    }

    /**
     * Get atrivaloCodigoid
     *
     * @return integer 
     */
    public function getAtrivaloCodigoid()
    {
        return $this->atrivaloCodigoid;
    }

    /**
     * Set endeentratrivaloValor
     *
     * @param string $endeentratrivaloValor
     * @return EnderecoentregaatributovalorHisto
     */
    public function setEndeentratrivaloValor($endeentratrivaloValor)
    {
        $this->endeentratrivaloValor = $endeentratrivaloValor;

        return $this;
    }

    /**
     * Get endeentratrivaloValor
     *
     * @return string 
     */
    public function getEndeentratrivaloValor()
    {
        return $this->endeentratrivaloValor;
    }

    /**
     * Set endeentratrivaloDescricao
     *
     * @param string $endeentratrivaloDescricao
     * @return EnderecoentregaatributovalorHisto
     */
    public function setEndeentratrivaloDescricao($endeentratrivaloDescricao)
    {
        $this->endeentratrivaloDescricao = $endeentratrivaloDescricao;

        return $this;
    }

    /**
     * Get endeentratrivaloDescricao
     *
     * @return string 
     */
    public function getEndeentratrivaloDescricao()
    {
        return $this->endeentratrivaloDescricao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return EnderecoentregaatributovalorHisto
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
     * Set registrante
     *
     * @param integer $registrante
     * @return EnderecoentregaatributovalorHisto
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
     * Set endeentratrivaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid
     * @return EnderecoentregaatributovalorHisto
     */
    public function setEndeentratrivaloCodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid = null)
    {
        $this->endeentratrivaloCodigoid = $endeentratrivaloCodigoid;

        return $this;
    }

    /**
     * Get endeentratrivaloCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor 
     */
    public function getEndeentratrivaloCodigoid()
    {
        return $this->endeentratrivaloCodigoid;
    }
}
