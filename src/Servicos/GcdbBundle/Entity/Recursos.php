<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recursos
 */
class Recursos
{
    /**
     * @var integer
     */
    private $recursoid;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $unidade;


    /**
     * Get recursoid
     *
     * @return integer 
     */
    public function getRecursoid()
    {
        return $this->recursoid;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Recursos
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
     * Set unidade
     *
     * @param string $unidade
     * @return Recursos
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return string 
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
