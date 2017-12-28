<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamautUsuarios
 */
class TeamautUsuarios
{
    /**
     * @var integer
     */
    private $idteamautUsrCodigoid;

    /**
     * @var integer
     */
    private $teamCodigoid;

    /**
     * @var integer
     */
    private $id;


    /**
     * Get idteamautUsrCodigoid
     *
     * @return integer 
     */
    public function getIdteamautUsrCodigoid()
    {
        return $this->idteamautUsrCodigoid;
    }

    /**
     * Set teamCodigoid
     *
     * @param integer $teamCodigoid
     * @return TeamautUsuarios
     */
    public function setTeamCodigoid($teamCodigoid)
    {
        $this->teamCodigoid = $teamCodigoid;

        return $this;
    }

    /**
     * Get teamCodigoid
     *
     * @return integer 
     */
    public function getTeamCodigoid()
    {
        return $this->teamCodigoid;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return TeamautUsuarios
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
}
