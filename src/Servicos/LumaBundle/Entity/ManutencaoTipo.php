<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoTipo
 */
class ManutencaoTipo
{
    /**
     * @var integer
     */
    private $tipoCodigoid;

    /**
     * @var string
     */
    private $tipo;


    /**
     * Get tipoCodigoid
     *
     * @return integer 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return ManutencaoTipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
