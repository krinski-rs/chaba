<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GruposServicos
 */
class GruposServicos
{
    /**
     * @var integer
     */
    private $gruposervicoid;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var boolean
     */
    private $cgst;


    /**
     * Get gruposervicoid
     *
     * @return integer 
     */
    public function getGruposervicoid()
    {
        return $this->gruposervicoid;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return GruposServicos
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
     * Set cgst
     *
     * @param boolean $cgst
     * @return GruposServicos
     */
    public function setCgst($cgst)
    {
        $this->cgst = $cgst;

        return $this;
    }

    /**
     * Get cgst
     *
     * @return boolean 
     */
    public function getCgst()
    {
        return $this->cgst;
    }
}
