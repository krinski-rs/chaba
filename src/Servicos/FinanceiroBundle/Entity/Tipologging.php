<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipologging
 */
class Tipologging
{
    /**
     * @var integer
     */
    private $tipologgCodigoid;

    /**
     * @var string
     */
    private $tipologgNome;


    /**
     * Get tipologgCodigoid
     *
     * @return integer 
     */
    public function getTipologgCodigoid()
    {
        return $this->tipologgCodigoid;
    }

    /**
     * Set tipologgNome
     *
     * @param string $tipologgNome
     * @return Tipologging
     */
    public function setTipologgNome($tipologgNome)
    {
        $this->tipologgNome = $tipologgNome;

        return $this;
    }

    /**
     * Get tipologgNome
     *
     * @return string 
     */
    public function getTipologgNome()
    {
        return $this->tipologgNome;
    }
}
