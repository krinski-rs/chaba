<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentroCustoOrdemInterna
 */
class CentroCustoOrdemInterna
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $centroCustoOrdemInterna;


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
     * Set centroCustoOrdemInterna
     *
     * @param integer $centroCustoOrdemInterna
     * @return CentroCustoOrdemInterna
     */
    public function setCentroCustoOrdemInterna($centroCustoOrdemInterna)
    {
        $this->centroCustoOrdemInterna = $centroCustoOrdemInterna;

        return $this;
    }

    /**
     * Get centroCustoOrdemInterna
     *
     * @return integer 
     */
    public function getCentroCustoOrdemInterna()
    {
        return $this->centroCustoOrdemInterna;
    }
}
