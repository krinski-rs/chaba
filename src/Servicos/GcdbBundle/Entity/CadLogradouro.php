<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadLogradouro
 */
class CadLogradouro
{
    /**
     * @var integer
     */
    private $cad01Codigo;

    /**
     * @var string
     */
    private $cad01Nome;


    /**
     * Get cad01Codigo
     *
     * @return integer 
     */
    public function getCad01Codigo()
    {
        return $this->cad01Codigo;
    }

    /**
     * Set cad01Nome
     *
     * @param string $cad01Nome
     * @return CadLogradouro
     */
    public function setCad01Nome($cad01Nome)
    {
        $this->cad01Nome = $cad01Nome;

        return $this;
    }

    /**
     * Get cad01Nome
     *
     * @return string 
     */
    public function getCad01Nome()
    {
        return $this->cad01Nome;
    }
}
