<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorFormacao
 */
class RhColaboradorFormacao
{
    /**
     * @var integer
     */
    private $idColaboradorFormacao;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var string
     */
    private $instituicao;

    /**
     * @var string
     */
    private $escolaridade;

    /**
     * @var string
     */
    private $curso;

    /**
     * @var \DateTime
     */
    private $dataPrevista;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataFinal;


    /**
     * Get idColaboradorFormacao
     *
     * @return integer 
     */
    public function getIdColaboradorFormacao()
    {
        return $this->idColaboradorFormacao;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhColaboradorFormacao
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorFormacao
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
     * @return RhColaboradorFormacao
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
     * Set instituicao
     *
     * @param string $instituicao
     * @return RhColaboradorFormacao
     */
    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;

        return $this;
    }

    /**
     * Get instituicao
     *
     * @return string 
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }

    /**
     * Set escolaridade
     *
     * @param string $escolaridade
     * @return RhColaboradorFormacao
     */
    public function setEscolaridade($escolaridade)
    {
        $this->escolaridade = $escolaridade;

        return $this;
    }

    /**
     * Get escolaridade
     *
     * @return string 
     */
    public function getEscolaridade()
    {
        return $this->escolaridade;
    }

    /**
     * Set curso
     *
     * @param string $curso
     * @return RhColaboradorFormacao
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return string 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set dataPrevista
     *
     * @param \DateTime $dataPrevista
     * @return RhColaboradorFormacao
     */
    public function setDataPrevista($dataPrevista)
    {
        $this->dataPrevista = $dataPrevista;

        return $this;
    }

    /**
     * Get dataPrevista
     *
     * @return \DateTime 
     */
    public function getDataPrevista()
    {
        return $this->dataPrevista;
    }

    /**
     * Set dataInicial
     *
     * @param \DateTime $dataInicial
     * @return RhColaboradorFormacao
     */
    public function setDataInicial($dataInicial)
    {
        $this->dataInicial = $dataInicial;

        return $this;
    }

    /**
     * Get dataInicial
     *
     * @return \DateTime 
     */
    public function getDataInicial()
    {
        return $this->dataInicial;
    }

    /**
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return RhColaboradorFormacao
     */
    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;

        return $this;
    }

    /**
     * Get dataFinal
     *
     * @return \DateTime 
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }
}
