<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poptiporf
 */
class Poptiporf
{
    /**
     * @var integer
     */
    private $idTipoRf;

    /**
     * @var string
     */
    private $nome;


    /**
     * Get idTipoRf
     *
     * @return integer 
     */
    public function getIdTipoRf()
    {
        return $this->idTipoRf;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Poptiporf
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
