<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorEmpresaAnterior
 */
class RhColaboradorEmpresaAnterior
{
    /**
     * @var integer
     */
    private $idEmpregoAnterior;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $empresa;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataFinal;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var string
     */
    private $salario;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;


    /**
     * Get idEmpregoAnterior
     *
     * @return integer 
     */
    public function getIdEmpregoAnterior()
    {
        return $this->idEmpregoAnterior;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhColaboradorEmpresaAnterior
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
     * Set empresa
     *
     * @param string $empresa
     * @return RhColaboradorEmpresaAnterior
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return RhColaboradorEmpresaAnterior
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
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return RhColaboradorEmpresaAnterior
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

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return RhColaboradorEmpresaAnterior
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set salario
     *
     * @param string $salario
     * @return RhColaboradorEmpresaAnterior
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return string 
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorEmpresaAnterior
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorEmpresaAnterior
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
}
