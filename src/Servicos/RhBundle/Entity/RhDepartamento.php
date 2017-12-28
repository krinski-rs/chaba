<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDepartamento
 */
class RhDepartamento
{
    /**
     * @var integer
     */
    private $idDepartamento;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var boolean
     */
    private $staff;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \Servicos\RhBundle\Entity\RhDepartamento
     */
    private $idDepartamentoAsc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rhCargoCargo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rhCargoCargo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idDepartamento
     *
     * @return integer 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return RhDepartamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set staff
     *
     * @param boolean $staff
     * @return RhDepartamento
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff
     *
     * @return boolean 
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhDepartamento
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
     * Set idDepartamentoAsc
     *
     * @param \Servicos\RhBundle\Entity\RhDepartamento $idDepartamentoAsc
     * @return RhDepartamento
     */
    public function setIdDepartamentoAsc(\Servicos\RhBundle\Entity\RhDepartamento $idDepartamentoAsc = null)
    {
        $this->idDepartamentoAsc = $idDepartamentoAsc;

        return $this;
    }

    /**
     * Get idDepartamentoAsc
     *
     * @return \Servicos\RhBundle\Entity\RhDepartamento 
     */
    public function getIdDepartamentoAsc()
    {
        return $this->idDepartamentoAsc;
    }

    /**
     * Add rhCargoCargo
     *
     * @param \Servicos\RhBundle\Entity\RhCargo $rhCargoCargo
     * @return RhDepartamento
     */
    public function addRhCargoCargo(\Servicos\RhBundle\Entity\RhCargo $rhCargoCargo)
    {
        $this->rhCargoCargo[] = $rhCargoCargo;

        return $this;
    }

    /**
     * Remove rhCargoCargo
     *
     * @param \Servicos\RhBundle\Entity\RhCargo $rhCargoCargo
     */
    public function removeRhCargoCargo(\Servicos\RhBundle\Entity\RhCargo $rhCargoCargo)
    {
        $this->rhCargoCargo->removeElement($rhCargoCargo);
    }

    /**
     * Get rhCargoCargo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRhCargoCargo()
    {
        return $this->rhCargoCargo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colaboradorDepartamento;


    /**
     * Add colaboradorDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento
     * @return RhDepartamento
     */
    public function addColaboradorDepartamento(\Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento)
    {
        $this->colaboradorDepartamento[] = $colaboradorDepartamento;

        return $this;
    }

    /**
     * Remove colaboradorDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento
     */
    public function removeColaboradorDepartamento(\Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento)
    {
        $this->colaboradorDepartamento->removeElement($colaboradorDepartamento);
    }

    /**
     * Get colaboradorDepartamento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColaboradorDepartamento()
    {
        return $this->colaboradorDepartamento;
    }
}
