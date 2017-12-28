<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finalidade
 */
class Finalidade
{
    /**
     * @var integer
     */
    private $finaCodigoid;

    /**
     * @var string
     */
    private $finaNome;

    /**
     * @var string
     */
    private $finaDescricao;


    /**
     * Get finaCodigoid
     *
     * @return integer 
     */
    public function getFinaCodigoid()
    {
        return $this->finaCodigoid;
    }

    /**
     * Set finaNome
     *
     * @param string $finaNome
     * @return Finalidade
     */
    public function setFinaNome($finaNome)
    {
        $this->finaNome = $finaNome;

        return $this;
    }

    /**
     * Get finaNome
     *
     * @return string 
     */
    public function getFinaNome()
    {
        return $this->finaNome;
    }

    /**
     * Set finaDescricao
     *
     * @param string $finaDescricao
     * @return Finalidade
     */
    public function setFinaDescricao($finaDescricao)
    {
        $this->finaDescricao = $finaDescricao;

        return $this;
    }

    /**
     * Get finaDescricao
     *
     * @return string 
     */
    public function getFinaDescricao()
    {
        return $this->finaDescricao;
    }
}
