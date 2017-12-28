<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var integer
     */
    private $teamCodigoid;

    /**
     * @var string
     */
    private $teamNome;

    /**
     * @var string
     */
    private $teamApelido;

    /**
     * @var boolean
     */
    private $teamAtivo;


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
     * Set teamNome
     *
     * @param string $teamNome
     * @return Team
     */
    public function setTeamNome($teamNome)
    {
        $this->teamNome = $teamNome;

        return $this;
    }

    /**
     * Get teamNome
     *
     * @return string 
     */
    public function getTeamNome()
    {
        return $this->teamNome;
    }

    /**
     * Set teamApelido
     *
     * @param string $teamApelido
     * @return Team
     */
    public function setTeamApelido($teamApelido)
    {
        $this->teamApelido = $teamApelido;

        return $this;
    }

    /**
     * Get teamApelido
     *
     * @return string 
     */
    public function getTeamApelido()
    {
        return $this->teamApelido;
    }

    /**
     * Set teamAtivo
     *
     * @param boolean $teamAtivo
     * @return Team
     */
    public function setTeamAtivo($teamAtivo)
    {
        $this->teamAtivo = $teamAtivo;

        return $this;
    }

    /**
     * Get teamAtivo
     *
     * @return boolean 
     */
    public function getTeamAtivo()
    {
        return $this->teamAtivo;
    }
}
