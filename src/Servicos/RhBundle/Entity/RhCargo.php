<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhCargo
 */
class RhCargo
{
    /**
     * @var integer
     */
    private $idCargo;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $motivoEdicao;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

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
    private $nivel;

    /**
     * @var integer
     */
    private $idGrupoSistech;

    /**
     * @var boolean
     */
    private $crea;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhGrupoMaterial
     */
    private $idCargoMaterial;

    /**
     * @var \Servicos\RhBundle\Entity\RhTipoCargo
     */
    private $idTipoCargo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rhDepartamentoDepartamento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rhDepartamentoDepartamento = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idCargo
     *
     * @return integer 
     */
    public function getIdCargo()
    {
        return $this->idCargo;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return RhCargo
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
     * Set descricao
     *
     * @param string $descricao
     * @return RhCargo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set motivoEdicao
     *
     * @param string $motivoEdicao
     * @return RhCargo
     */
    public function setMotivoEdicao($motivoEdicao)
    {
        $this->motivoEdicao = $motivoEdicao;

        return $this;
    }

    /**
     * Get motivoEdicao
     *
     * @return string 
     */
    public function getMotivoEdicao()
    {
        return $this->motivoEdicao;
    }

    /**
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhCargo
     */
    public function setRegistranteEdicao($registranteEdicao)
    {
        $this->registranteEdicao = $registranteEdicao;

        return $this;
    }

    /**
     * Get registranteEdicao
     *
     * @return integer 
     */
    public function getRegistranteEdicao()
    {
        return $this->registranteEdicao;
    }

    /**
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhCargo
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;

        return $this;
    }

    /**
     * Get dataEdicao
     *
     * @return \DateTime 
     */
    public function getDataEdicao()
    {
        return $this->dataEdicao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhCargo
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
     * @return RhCargo
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
     * Set nivel
     *
     * @param string $nivel
     * @return RhCargo
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set idGrupoSistech
     *
     * @param integer $idGrupoSistech
     * @return RhCargo
     */
    public function setIdGrupoSistech($idGrupoSistech)
    {
        $this->idGrupoSistech = $idGrupoSistech;

        return $this;
    }

    /**
     * Get idGrupoSistech
     *
     * @return integer 
     */
    public function getIdGrupoSistech()
    {
        return $this->idGrupoSistech;
    }

    /**
     * Set crea
     *
     * @param boolean $crea
     * @return RhCargo
     */
    public function setCrea($crea)
    {
        $this->crea = $crea;

        return $this;
    }

    /**
     * Get crea
     *
     * @return boolean 
     */
    public function getCrea()
    {
        return $this->crea;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhCargo
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
     * Set idCargoMaterial
     *
     * @param \Servicos\RhBundle\Entity\RhGrupoMaterial $idCargoMaterial
     * @return RhCargo
     */
    public function setIdCargoMaterial(\Servicos\RhBundle\Entity\RhGrupoMaterial $idCargoMaterial = null)
    {
        $this->idCargoMaterial = $idCargoMaterial;

        return $this;
    }

    /**
     * Get idCargoMaterial
     *
     * @return \Servicos\RhBundle\Entity\RhGrupoMaterial 
     */
    public function getIdCargoMaterial()
    {
        return $this->idCargoMaterial;
    }

    /**
     * Set idTipoCargo
     *
     * @param \Servicos\RhBundle\Entity\RhTipoCargo $idTipoCargo
     * @return RhCargo
     */
    public function setIdTipoCargo(\Servicos\RhBundle\Entity\RhTipoCargo $idTipoCargo = null)
    {
        $this->idTipoCargo = $idTipoCargo;

        return $this;
    }

    /**
     * Get idTipoCargo
     *
     * @return \Servicos\RhBundle\Entity\RhTipoCargo 
     */
    public function getIdTipoCargo()
    {
        return $this->idTipoCargo;
    }

    /**
     * Add rhDepartamentoDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhDepartamento $rhDepartamentoDepartamento
     * @return RhCargo
     */
    public function addRhDepartamentoDepartamento(\Servicos\RhBundle\Entity\RhDepartamento $rhDepartamentoDepartamento)
    {
        $this->rhDepartamentoDepartamento[] = $rhDepartamentoDepartamento;

        return $this;
    }

    /**
     * Remove rhDepartamentoDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhDepartamento $rhDepartamentoDepartamento
     */
    public function removeRhDepartamentoDepartamento(\Servicos\RhBundle\Entity\RhDepartamento $rhDepartamentoDepartamento)
    {
        $this->rhDepartamentoDepartamento->removeElement($rhDepartamentoDepartamento);
    }

    /**
     * Get rhDepartamentoDepartamento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRhDepartamentoDepartamento()
    {
        return $this->rhDepartamentoDepartamento;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colaboradorCargo;


    /**
     * Add colaboradorCargo
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo
     * @return RhCargo
     */
    public function addColaboradorCargo(\Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo)
    {
        $this->colaboradorCargo[] = $colaboradorCargo;

        return $this;
    }

    /**
     * Remove colaboradorCargo
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo
     */
    public function removeColaboradorCargo(\Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo)
    {
        $this->colaboradorCargo->removeElement($colaboradorCargo);
    }

    /**
     * Get colaboradorCargo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColaboradorCargo()
    {
        return $this->colaboradorCargo;
    }
}
