<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poptipoabrigo
 */
class Poptipoabrigo
{
    /**
     * @var integer
     */
    private $idTipoAbrigo;

    /**
     * @var string
     */
    private $nome;


    /**
     * Get idTipoAbrigo
     *
     * @return integer 
     */
    public function getIdTipoAbrigo()
    {
        return $this->idTipoAbrigo;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Poptipoabrigo
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
