<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SemanaturnoautUsuarios
 */
class SemanaturnoautUsuarios
{
    /**
     * @var integer
     */
    private $sematurnautUsr;

    /**
     * @var integer
     */
    private $sematurnCodigoid;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $sematurnautUsrAtivo;


    /**
     * Get sematurnautUsr
     *
     * @return integer 
     */
    public function getSematurnautUsr()
    {
        return $this->sematurnautUsr;
    }

    /**
     * Set sematurnCodigoid
     *
     * @param integer $sematurnCodigoid
     * @return SemanaturnoautUsuarios
     */
    public function setSematurnCodigoid($sematurnCodigoid)
    {
        $this->sematurnCodigoid = $sematurnCodigoid;

        return $this;
    }

    /**
     * Get sematurnCodigoid
     *
     * @return integer 
     */
    public function getSematurnCodigoid()
    {
        return $this->sematurnCodigoid;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return SemanaturnoautUsuarios
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sematurnautUsrAtivo
     *
     * @param boolean $sematurnautUsrAtivo
     * @return SemanaturnoautUsuarios
     */
    public function setSematurnautUsrAtivo($sematurnautUsrAtivo)
    {
        $this->sematurnautUsrAtivo = $sematurnautUsrAtivo;

        return $this;
    }

    /**
     * Get sematurnautUsrAtivo
     *
     * @return boolean 
     */
    public function getSematurnautUsrAtivo()
    {
        return $this->sematurnautUsrAtivo;
    }
}
