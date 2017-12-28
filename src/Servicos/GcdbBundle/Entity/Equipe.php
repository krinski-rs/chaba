<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 */
class Equipe
{
    /**
     * @var integer
     */
    private $equipeid;

    /**
     * @var string
     */
    private $equipenome;

    /**
     * @var string
     */
    private $equipeapelido;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get equipeid
     *
     * @return integer 
     */
    public function getEquipeid()
    {
        return $this->equipeid;
    }

    /**
     * Set equipenome
     *
     * @param string $equipenome
     * @return Equipe
     */
    public function setEquipenome($equipenome)
    {
        $this->equipenome = $equipenome;

        return $this;
    }

    /**
     * Get equipenome
     *
     * @return string 
     */
    public function getEquipenome()
    {
        return $this->equipenome;
    }

    /**
     * Set equipeapelido
     *
     * @param string $equipeapelido
     * @return Equipe
     */
    public function setEquipeapelido($equipeapelido)
    {
        $this->equipeapelido = $equipeapelido;

        return $this;
    }

    /**
     * Get equipeapelido
     *
     * @return string 
     */
    public function getEquipeapelido()
    {
        return $this->equipeapelido;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Equipe
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
}
