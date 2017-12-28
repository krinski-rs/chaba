<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoricoTickets
 */
class HistoricoTickets
{
    /**
     * @var integer
     */
    private $histtickCodigoid;

    /**
     * @var \DateTime
     */
    private $histtickDatainc;

    /**
     * @var integer
     */
    private $histtickQuantidade;

    /**
     * @var integer
     */
    private $tickcateCodigoid;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autuserCodigoid;


    /**
     * Get histtickCodigoid
     *
     * @return integer 
     */
    public function getHisttickCodigoid()
    {
        return $this->histtickCodigoid;
    }

    /**
     * Set histtickDatainc
     *
     * @param \DateTime $histtickDatainc
     * @return HistoricoTickets
     */
    public function setHisttickDatainc($histtickDatainc)
    {
        $this->histtickDatainc = $histtickDatainc;

        return $this;
    }

    /**
     * Get histtickDatainc
     *
     * @return \DateTime 
     */
    public function getHisttickDatainc()
    {
        return $this->histtickDatainc;
    }

    /**
     * Set histtickQuantidade
     *
     * @param integer $histtickQuantidade
     * @return HistoricoTickets
     */
    public function setHisttickQuantidade($histtickQuantidade)
    {
        $this->histtickQuantidade = $histtickQuantidade;

        return $this;
    }

    /**
     * Get histtickQuantidade
     *
     * @return integer 
     */
    public function getHisttickQuantidade()
    {
        return $this->histtickQuantidade;
    }

    /**
     * Set tickcateCodigoid
     *
     * @param integer $tickcateCodigoid
     * @return HistoricoTickets
     */
    public function setTickcateCodigoid($tickcateCodigoid)
    {
        $this->tickcateCodigoid = $tickcateCodigoid;

        return $this;
    }

    /**
     * Get tickcateCodigoid
     *
     * @return integer 
     */
    public function getTickcateCodigoid()
    {
        return $this->tickcateCodigoid;
    }

    /**
     * Set autuserCodigoid
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autuserCodigoid
     * @return HistoricoTickets
     */
    public function setAutuserCodigoid(\Servicos\GcdbBundle\Entity\AutUsuarios $autuserCodigoid = null)
    {
        $this->autuserCodigoid = $autuserCodigoid;

        return $this;
    }

    /**
     * Get autuserCodigoid
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getAutuserCodigoid()
    {
        return $this->autuserCodigoid;
    }
}
