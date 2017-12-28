<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Envio
 */
class Envio
{
    /**
     * @var integer
     */
    private $enviCodigoid;

    /**
     * @var string
     */
    private $enviNome;


    /**
     * Get enviCodigoid
     *
     * @return integer 
     */
    public function getEnviCodigoid()
    {
        return $this->enviCodigoid;
    }

    /**
     * Set enviNome
     *
     * @param string $enviNome
     * @return Envio
     */
    public function setEnviNome($enviNome)
    {
        $this->enviNome = $enviNome;

        return $this;
    }

    /**
     * Get enviNome
     *
     * @return string 
     */
    public function getEnviNome()
    {
        return $this->enviNome;
    }
}
