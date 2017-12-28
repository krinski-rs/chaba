<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teamtoteam
 */
class Teamtoteam
{
    /**
     * @var integer
     */
    private $teamtoCodigoid;

    /**
     * @var integer
     */
    private $teamCodigoid;

    /**
     * @var integer
     */
    private $teamtoTeam;


    /**
     * Get teamtoCodigoid
     *
     * @return integer 
     */
    public function getTeamtoCodigoid()
    {
        return $this->teamtoCodigoid;
    }

    /**
     * Set teamCodigoid
     *
     * @param integer $teamCodigoid
     * @return Teamtoteam
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
     * Set teamtoTeam
     *
     * @param integer $teamtoTeam
     * @return Teamtoteam
     */
    public function setTeamtoTeam($teamtoTeam)
    {
        $this->teamtoTeam = $teamtoTeam;

        return $this;
    }

    /**
     * Get teamtoTeam
     *
     * @return integer 
     */
    public function getTeamtoTeam()
    {
        return $this->teamtoTeam;
    }
}
