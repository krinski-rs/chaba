<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaDocumentos
 */
class CategoriaDocumentos
{
    /**
     * @var integer
     */
    private $categoriaid;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descricao;


    /**
     * Get categoriaid
     *
     * @return integer 
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return CategoriaDocumentos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return CategoriaDocumentos
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
}
