<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popnomeconcessionaria
 */
class Popnomeconcessionaria
{
    /**
     * @var integer
     */
    private $idNomeConcessionaria;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $nome;


    /**
     * Get idNomeConcessionaria
     *
     * @return integer 
     */
    public function getIdNomeConcessionaria()
    {
        return $this->idNomeConcessionaria;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return Popnomeconcessionaria
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Popnomeconcessionaria
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
}
