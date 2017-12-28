<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutPermissoes
 */
class AutPermissoes
{
    /**
     * @var integer
     */
    private $opcoesId;

    /**
     * @var integer
     */
    private $usuariosId;

    /**
     * @var integer
     */
    private $permissao;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuario;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutOpcoes
     */
    private $autOpcoes;


    /**
     * Set opcoesId
     *
     * @param integer $opcoesId
     * @return AutPermissoes
     */
    public function setOpcoesId($opcoesId)
    {
        $this->opcoesId = $opcoesId;

        return $this;
    }

    /**
     * Get opcoesId
     *
     * @return integer 
     */
    public function getOpcoesId()
    {
        return $this->opcoesId;
    }

    /**
     * Set usuariosId
     *
     * @param integer $usuariosId
     * @return AutPermissoes
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
     * Set permissao
     *
     * @param integer $permissao
     * @return AutPermissoes
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;

        return $this;
    }

    /**
     * Get permissao
     *
     * @return integer 
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * Set autUsuario
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuario
     * @return AutPermissoes
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
     * Set autOpcoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutOpcoes $autOpcoes
     * @return AutPermissoes
     */
    public function setAutOpcoes(\Servicos\GcdbBundle\Entity\AutOpcoes $autOpcoes = null)
    {
        $this->autOpcoes = $autOpcoes;
        $this->opcoesId = $autOpcoes->getId();

        return $this;
    }

    /**
     * Get autOpcoes
     *
     * @return \Servicos\GcdbBundle\Entity\AutOpcoes 
     */
    public function getAutOpcoes()
    {
        return $this->autOpcoes;
    }
}
