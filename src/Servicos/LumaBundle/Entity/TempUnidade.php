<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempUnidade
 */
class TempUnidade
{
    /**
     * @var integer
     */
    private $unidCodigoid;

    /**
     * @var string
     */
    private $tipoNome;

    /**
     * @var string
     */
    private $unidNome;


    /**
     * Get unidCodigoid
     *
     * @return integer 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set tipoNome
     *
     * @param string $tipoNome
     * @return TempUnidade
     */
    public function setTipoNome($tipoNome)
    {
        $this->tipoNome = $tipoNome;

        return $this;
    }

    /**
     * Get tipoNome
     *
     * @return string 
     */
    public function getTipoNome()
    {
        return $this->tipoNome;
    }

    /**
     * Set unidNome
     *
     * @param string $unidNome
     * @return TempUnidade
     */
    public function setUnidNome($unidNome)
    {
        $this->unidNome = $unidNome;

        return $this;
    }

    /**
     * Get unidNome
     *
     * @return string 
     */
    public function getUnidNome()
    {
        return $this->unidNome;
    }
}
