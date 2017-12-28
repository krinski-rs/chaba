<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TdmEnlaces
 */
class TdmEnlaces
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $capacidadeConfigurada;

    /**
     * @var \Servicos\GcdbBundle\Entity\TdmEquipamentos
     */
    private $idTdmEquipamentos;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return TdmEnlaces
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
     * Set capacidadeConfigurada
     *
     * @param string $capacidadeConfigurada
     * @return TdmEnlaces
     */
    public function setCapacidadeConfigurada($capacidadeConfigurada)
    {
        $this->capacidadeConfigurada = $capacidadeConfigurada;

        return $this;
    }

    /**
     * Get capacidadeConfigurada
     *
     * @return string 
     */
    public function getCapacidadeConfigurada()
    {
        return $this->capacidadeConfigurada;
    }

    /**
     * Set idTdmEquipamentos
     *
     * @param \Servicos\GcdbBundle\Entity\TdmEquipamentos $idTdmEquipamentos
     * @return TdmEnlaces
     */
    public function setIdTdmEquipamentos(\Servicos\GcdbBundle\Entity\TdmEquipamentos $idTdmEquipamentos = null)
    {
        $this->idTdmEquipamentos = $idTdmEquipamentos;

        return $this;
    }

    /**
     * Get idTdmEquipamentos
     *
     * @return \Servicos\GcdbBundle\Entity\TdmEquipamentos 
     */
    public function getIdTdmEquipamentos()
    {
        return $this->idTdmEquipamentos;
    }
}
