<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidostatus
 */
class Pedidostatus
{
    /**
     * @var integer
     */
    private $pedistatCodigoid;

    /**
     * @var string
     */
    private $pedistatNome;

    /**
     * @var boolean
     */
    private $pedistatEditavel;

    /**
     * @var boolean
     */
    private $pedistatPendente;


    /**
     * Get pedistatCodigoid
     *
     * @return integer 
     */
    public function getPedistatCodigoid()
    {
        return $this->pedistatCodigoid;
    }

    /**
     * Set pedistatNome
     *
     * @param string $pedistatNome
     * @return Pedidostatus
     */
    public function setPedistatNome($pedistatNome)
    {
        $this->pedistatNome = $pedistatNome;

        return $this;
    }

    /**
     * Get pedistatNome
     *
     * @return string 
     */
    public function getPedistatNome()
    {
        return $this->pedistatNome;
    }

    /**
     * Set pedistatEditavel
     *
     * @param boolean $pedistatEditavel
     * @return Pedidostatus
     */
    public function setPedistatEditavel($pedistatEditavel)
    {
        $this->pedistatEditavel = $pedistatEditavel;

        return $this;
    }

    /**
     * Get pedistatEditavel
     *
     * @return boolean 
     */
    public function getPedistatEditavel()
    {
        return $this->pedistatEditavel;
    }

    /**
     * Set pedistatPendente
     *
     * @param boolean $pedistatPendente
     * @return Pedidostatus
     */
    public function setPedistatPendente($pedistatPendente)
    {
        $this->pedistatPendente = $pedistatPendente;

        return $this;
    }

    /**
     * Get pedistatPendente
     *
     * @return boolean 
     */
    public function getPedistatPendente()
    {
        return $this->pedistatPendente;
    }
}
