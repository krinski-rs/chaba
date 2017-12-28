<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoarea
 */
class Pedidoarea
{
    /**
     * @var integer
     */
    private $pediareaCodigoid;

    /**
     * @var string
     */
    private $pediareaNome;


    /**
     * Get pediareaCodigoid
     *
     * @return integer 
     */
    public function getPediareaCodigoid()
    {
        return $this->pediareaCodigoid;
    }

    /**
     * Set pediareaNome
     *
     * @param string $pediareaNome
     * @return Pedidoarea
     */
    public function setPediareaNome($pediareaNome)
    {
        $this->pediareaNome = $pediareaNome;

        return $this;
    }

    /**
     * Get pediareaNome
     *
     * @return string 
     */
    public function getPediareaNome()
    {
        return $this->pediareaNome;
    }
}
