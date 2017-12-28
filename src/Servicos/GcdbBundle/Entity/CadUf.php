<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUf
 */
class CadUf
{
    /**
     * @var string
     */
    private $cad04Codigo;

    /**
     * @var string
     */
    private $cad04Nome;

    /**
     * @var integer
     */
    private $cad05Codigo;


    /**
     * Get cad04Codigo
     *
     * @return string 
     */
    public function getCad04Codigo()
    {
        return $this->cad04Codigo;
    }

    /**
     * Set cad04Nome
     *
     * @param string $cad04Nome
     * @return CadUf
     */
    public function setCad04Nome($cad04Nome)
    {
        $this->cad04Nome = $cad04Nome;

        return $this;
    }

    /**
     * Get cad04Nome
     *
     * @return string 
     */
    public function getCad04Nome()
    {
        return $this->cad04Nome;
    }

    /**
     * Set cad05Codigo
     *
     * @param integer $cad05Codigo
     * @return CadUf
     */
    public function setCad05Codigo($cad05Codigo)
    {
        $this->cad05Codigo = $cad05Codigo;

        return $this;
    }

    /**
     * Get cad05Codigo
     *
     * @return integer 
     */
    public function getCad05Codigo()
    {
        return $this->cad05Codigo;
    }
}
