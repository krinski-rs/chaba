<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motivo
 */
class Motivo
{
    /**
     * @var integer
     */
    private $motivoCodigoid;

    /**
     * @var string
     */
    private $motivoMotivo;

    /**
     * @var integer
     */
    private $motivoAtivo;


    /**
     * Get motivoCodigoid
     *
     * @return integer 
     */
    public function getMotivoCodigoid()
    {
        return $this->motivoCodigoid;
    }

    /**
     * Set motivoMotivo
     *
     * @param string $motivoMotivo
     * @return Motivo
     */
    public function setMotivoMotivo($motivoMotivo)
    {
        $this->motivoMotivo = $motivoMotivo;

        return $this;
    }

    /**
     * Get motivoMotivo
     *
     * @return string 
     */
    public function getMotivoMotivo()
    {
        return $this->motivoMotivo;
    }

    /**
     * Set motivoAtivo
     *
     * @param integer $motivoAtivo
     * @return Motivo
     */
    public function setMotivoAtivo($motivoAtivo)
    {
        $this->motivoAtivo = $motivoAtivo;

        return $this;
    }

    /**
     * Get motivoAtivo
     *
     * @return integer 
     */
    public function getMotivoAtivo()
    {
        return $this->motivoAtivo;
    }
}
