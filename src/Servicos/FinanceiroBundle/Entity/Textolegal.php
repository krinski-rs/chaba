<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Textolegal
 */
class Textolegal
{
    /**
     * @var integer
     */
    private $textlegaCodigoid;

    /**
     * @var string
     */
    private $textlegaTexto;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get textlegaCodigoid
     *
     * @return integer 
     */
    public function getTextlegaCodigoid()
    {
        return $this->textlegaCodigoid;
    }

    /**
     * Set textlegaTexto
     *
     * @param string $textlegaTexto
     * @return Textolegal
     */
    public function setTextlegaTexto($textlegaTexto)
    {
        $this->textlegaTexto = $textlegaTexto;

        return $this;
    }

    /**
     * Get textlegaTexto
     *
     * @return string 
     */
    public function getTextlegaTexto()
    {
        return $this->textlegaTexto;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Textolegal
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }
}
