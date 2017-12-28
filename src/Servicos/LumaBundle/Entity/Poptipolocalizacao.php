<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poptipolocalizacao
 */
class Poptipolocalizacao
{
    /**
     * @var integer
     */
    private $idTipo;

    /**
     * @var string
     */
    private $nome;


    /**
     * Get idTipo
     *
     * @return integer 
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Poptipolocalizacao
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
