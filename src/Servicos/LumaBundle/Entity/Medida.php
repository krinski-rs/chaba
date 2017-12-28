<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medida
 */
class Medida
{
    /**
     * @var integer
     */
    private $mediCodigoid;

    /**
     * @var string
     */
    private $mediNome;

    /**
     * @var string
     */
    private $mediSigla;


    /**
     * Get mediCodigoid
     *
     * @return integer 
     */
    public function getMediCodigoid()
    {
        return $this->mediCodigoid;
    }

    /**
     * Set mediNome
     *
     * @param string $mediNome
     * @return Medida
     */
    public function setMediNome($mediNome)
    {
        $this->mediNome = $mediNome;

        return $this;
    }

    /**
     * Get mediNome
     *
     * @return string 
     */
    public function getMediNome()
    {
        return $this->mediNome;
    }

    /**
     * Set mediSigla
     *
     * @param string $mediSigla
     * @return Medida
     */
    public function setMediSigla($mediSigla)
    {
        $this->mediSigla = $mediSigla;

        return $this;
    }

    /**
     * Get mediSigla
     *
     * @return string 
     */
    public function getMediSigla()
    {
        return $this->mediSigla;
    }
}
