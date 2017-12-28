<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacidade
 */
class Capacidade
{
    /**
     * @var integer
     */
    private $capaCodigoid;

    /**
     * @var integer
     */
    private $capaCapacidade;


    /**
     * Get capaCodigoid
     *
     * @return integer 
     */
    public function getCapaCodigoid()
    {
        return $this->capaCodigoid;
    }

    /**
     * Set capaCapacidade
     *
     * @param integer $capaCapacidade
     * @return Capacidade
     */
    public function setCapaCapacidade($capaCapacidade)
    {
        $this->capaCapacidade = $capaCapacidade;

        return $this;
    }

    /**
     * Get capaCapacidade
     *
     * @return integer 
     */
    public function getCapaCapacidade()
    {
        return $this->capaCapacidade;
    }
}
