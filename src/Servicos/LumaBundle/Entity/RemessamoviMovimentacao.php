<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessamoviMovimentacao
 */
class RemessamoviMovimentacao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Servicos\LumaBundle\Entity\Movimentacao
     */
    private $moviCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Remessamovi
     */
    private $remmovi;


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
     * Set moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return RemessamoviMovimentacao
     */
    public function setMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid = null)
    {
        $this->moviCodigoid = $moviCodigoid;

        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Movimentacao 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Set remmovi
     *
     * @param \Servicos\LumaBundle\Entity\Remessamovi $remmovi
     * @return RemessamoviMovimentacao
     */
    public function setRemmovi(\Servicos\LumaBundle\Entity\Remessamovi $remmovi = null)
    {
        $this->remmovi = $remmovi;

        return $this;
    }

    /**
     * Get remmovi
     *
     * @return \Servicos\LumaBundle\Entity\Remessamovi 
     */
    public function getRemmovi()
    {
        return $this->remmovi;
    }
}
