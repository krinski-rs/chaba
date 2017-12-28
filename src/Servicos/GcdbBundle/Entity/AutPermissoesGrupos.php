<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutPermissoesGrupos
 */
class AutPermissoesGrupos
{
    /**
     * @var integer
     */
    private $opcoesId;

    /**
     * @var integer
     */
    private $gruposId;

    /**
     * @var integer
     */
    private $permissao;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutGrupos
     */
    private $autGrupos;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutOpcoes
     */
    private $autOpcoes;


    /**
     * Set opcoesId
     *
     * @param integer $opcoesId
     * @return AutPermissoesGrupos
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
     * Set gruposId
     *
     * @param integer $gruposId
     * @return AutPermissoesGrupos
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
     * Set permissao
     *
     * @param integer $permissao
     * @return AutPermissoesGrupos
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
     * Set autGrupos
     *
     * @param \Servicos\GcdbBundle\Entity\AutGrupos $autGrupos
     * @return AutPermissoesGrupos
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

    /**
     * Set autOpcoes
     *
     * @param \Servicos\GcdbBundle\Entity\AutOpcoes $autOpcoes
     * @return AutPermissoesGrupos
     */
    public function setAutOpcoes(\Servicos\GcdbBundle\Entity\AutOpcoes $autOpcoes = null)
    {
        $this->autOpcoes = $autOpcoes;

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
