<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 */
class Nivel
{
    /**
     * @var integer
     */
    private $niveCodigoid;

    /**
     * @var string
     */
    private $niveNome;


    /**
     * Get niveCodigoid
     *
     * @return integer 
     */
    public function getNiveCodigoid()
    {
        return $this->niveCodigoid;
    }

    /**
     * Set niveNome
     *
     * @param string $niveNome
     * @return Nivel
     */
    public function setNiveNome($niveNome)
    {
        $this->niveNome = $niveNome;

        return $this;
    }

    /**
     * Get niveNome
     *
     * @return string 
     */
    public function getNiveNome()
    {
        return $this->niveNome;
    }
}
