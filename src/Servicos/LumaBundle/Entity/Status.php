<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 */
class Status
{
    /**
     * @var integer
     */
    private $statCodigoid;

    /**
     * @var string
     */
    private $statNome;


    /**
     * Get statCodigoid
     *
     * @return integer 
     */
    public function getStatCodigoid()
    {
        return $this->statCodigoid;
    }

    /**
     * Set statNome
     *
     * @param string $statNome
     * @return Status
     */
    public function setStatNome($statNome)
    {
        $this->statNome = $statNome;

        return $this;
    }

    /**
     * Get statNome
     *
     * @return string 
     */
    public function getStatNome()
    {
        return $this->statNome;
    }
}
