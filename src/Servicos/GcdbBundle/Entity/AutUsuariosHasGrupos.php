<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutUsuariosHasGrupos
 */
class AutUsuariosHasGrupos
{
    /**
     * @var integer
     */
    private $usuariosId;

    /**
     * @var integer
     */
    private $gruposId;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuario;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutGrupos
     */
    private $autGrupos;


    /**
     * Set usuariosId
     *
     * @param integer $usuariosId
     * @return AutUsuariosHasGrupos
     */
    public function setUsuariosId($usuariosId)
    {
        $this->usuariosId = $usuariosId;

        return $this;
    }

    /**
     * Get usuariosId
     *
     * @return integer 
     */
    public function getUsuariosId()
    {
        return $this->usuariosId;
    }

    /**
     * Set gruposId
     *
     * @param integer $gruposId
     * @return AutUsuariosHasGrupos
     */
    public function setGruposId($gruposId)
    {
        $this->gruposId = $gruposId;

        return $this;
    }

    /**
     * Get gruposId
     *
     * @return integer 
     */
    public function getGruposId()
    {
        return $this->gruposId;
    }

    /**
     * Set autUsuario
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuario
     * @return AutUsuariosHasGrupos
     */
    public function setAutUsuario(\Servicos\GcdbBundle\Entity\AutUsuarios $autUsuario = null)
    {
        $this->autUsuario = $autUsuario;

        return $this;
    }

    /**
     * Get autUsuario
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getAutUsuario()
    {
        return $this->autUsuario;
    }

    /**
     * Set autGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutGrupos $autGrupos
     * @return AutUsuariosHasGrupos
     */
    public function setAutGrupos(\Servicos\GcdbBundle\Entity\AutGrupos $autGrupos = null)
    {
        $this->autGrupos = $autGrupos;

        return $this;
    }

    /**
     * Get autGrupos
     *
     * @return \Servicos\GcdbBundle\Entity\AutGrupos 
     */
    public function getAutGrupos()
    {
        return $this->autGrupos;
    }
}
