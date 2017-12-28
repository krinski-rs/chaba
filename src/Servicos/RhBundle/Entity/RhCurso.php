<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhCurso
 */
class RhCurso
{
    /**
     * @var integer
     */
    private $idCurso;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $curso;

    /**
     * @var string
     */
    private $tipoCurso;

    /**
     * @var string
     */
    private $instituicao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataConclusao;

    /**
     * @var string
     */
    private $horasCurso;

    /**
     * @var integer
     */
    private $registrante;


    /**
     * Get idCurso
     *
     * @return integer 
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhCurso
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
     * Set curso
     *
     * @param string $curso
     * @return RhCurso
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
     * Set tipoCurso
     *
     * @param string $tipoCurso
     * @return RhCurso
     */
    public function setTipoCurso($tipoCurso)
    {
        $this->tipoCurso = $tipoCurso;

        return $this;
    }

    /**
     * Get tipoCurso
     *
     * @return string 
     */
    public function getTipoCurso()
    {
        return $this->tipoCurso;
    }

    /**
     * Set instituicao
     *
     * @param string $instituicao
     * @return RhCurso
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhCurso
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
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return RhCurso
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataConclusao
     *
     * @param \DateTime $dataConclusao
     * @return RhCurso
     */
    public function setDataConclusao($dataConclusao)
    {
        $this->dataConclusao = $dataConclusao;

        return $this;
    }

    /**
     * Get dataConclusao
     *
     * @return \DateTime 
     */
    public function getDataConclusao()
    {
        return $this->dataConclusao;
    }

    /**
     * Set horasCurso
     *
     * @param string $horasCurso
     * @return RhCurso
     */
    public function setHorasCurso($horasCurso)
    {
        $this->horasCurso = $horasCurso;

        return $this;
    }

    /**
     * Get horasCurso
     *
     * @return string 
     */
    public function getHorasCurso()
    {
        return $this->horasCurso;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhCurso
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
}
