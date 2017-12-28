<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipodocumento
 */
class Tipodocumento
{
    /**
     * @var integer
     */
    private $tipodocuCodigoid;

    /**
     * @var string
     */
    private $tipodocuNome;


    /**
     * Get tipodocuCodigoid
     *
     * @return integer 
     */
    public function getTipodocuCodigoid()
    {
        return $this->tipodocuCodigoid;
    }

    /**
     * Set tipodocuNome
     *
     * @param string $tipodocuNome
     * @return Tipodocumento
     */
    public function setTipodocuNome($tipodocuNome)
    {
        $this->tipodocuNome = $tipodocuNome;

        return $this;
    }

    /**
     * Get tipodocuNome
     *
     * @return string 
     */
    public function getTipodocuNome()
    {
        return $this->tipodocuNome;
    }
}
