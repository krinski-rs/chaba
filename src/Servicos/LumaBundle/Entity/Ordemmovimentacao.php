<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordemmovimentacao
 */
class Ordemmovimentacao
{
    /**
     * @var integer
     */
    private $ordemoviCodigoid;

    /**
     * @var \DateTime
     */
    private $ordemoviDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordem
     */
    private $ordeCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Movimentacao
     */
    private $moviCodigoid;


    /**
     * Get ordemoviCodigoid
     *
     * @return integer 
     */
    public function getOrdemoviCodigoid()
    {
        return $this->ordemoviCodigoid;
    }

    /**
     * Set ordemoviDatainc
     *
     * @param \DateTime $ordemoviDatainc
     * @return Ordemmovimentacao
     */
    public function setOrdemoviDatainc($ordemoviDatainc)
    {
        $this->ordemoviDatainc = $ordemoviDatainc;

        return $this;
    }

    /**
     * Get ordemoviDatainc
     *
     * @return \DateTime 
     */
    public function getOrdemoviDatainc()
    {
        return $this->ordemoviDatainc;
    }

    /**
     * Set ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return Ordemmovimentacao
     */
    public function setOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid = null)
    {
        $this->ordeCodigoid = $ordeCodigoid;

        return $this;
    }

    /**
     * Get ordeCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Ordem 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }

    /**
     * Set moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return Ordemmovimentacao
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
}
