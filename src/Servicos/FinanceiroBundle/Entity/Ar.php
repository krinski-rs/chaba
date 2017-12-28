<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ar
 */
class Ar
{
    /**
     * @var integer
     */
    private $arCodigoid;

    /**
     * @var string
     */
    private $arNumero;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Rangear
     */
    private $rangarCodigoid;


    /**
     * Get arCodigoid
     *
     * @return integer 
     */
    public function getArCodigoid()
    {
        return $this->arCodigoid;
    }

    /**
     * Set arNumero
     *
     * @param string $arNumero
     * @return Ar
     */
    public function setArNumero($arNumero)
    {
        $this->arNumero = $arNumero;

        return $this;
    }

    /**
     * Get arNumero
     *
     * @return string 
     */
    public function getArNumero()
    {
        return $this->arNumero;
    }

    /**
     * Set rangarCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Rangear $rangarCodigoid
     * @return Ar
     */
    public function setRangarCodigoid(\Servicos\FinanceiroBundle\Entity\Rangear $rangarCodigoid = null)
    {
        $this->rangarCodigoid = $rangarCodigoid;

        return $this;
    }

    /**
     * Get rangarCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Rangear 
     */
    public function getRangarCodigoid()
    {
        return $this->rangarCodigoid;
    }
}
