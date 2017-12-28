<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rescisao
 */
class Rescisao
{
    /**
     * @var integer
     */
    private $rescCodigoid;

    /**
     * @var \DateTime
     */
    private $rescDatarecebimento;

    /**
     * @var \DateTime
     */
    private $rescDatainc;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get rescCodigoid
     *
     * @return integer 
     */
    public function getRescCodigoid()
    {
        return $this->rescCodigoid;
    }

    /**
     * Set rescDatarecebimento
     *
     * @param \DateTime $rescDatarecebimento
     * @return Rescisao
     */
    public function setRescDatarecebimento($rescDatarecebimento)
    {
        $this->rescDatarecebimento = $rescDatarecebimento;

        return $this;
    }

    /**
     * Get rescDatarecebimento
     *
     * @return \DateTime 
     */
    public function getRescDatarecebimento()
    {
        return $this->rescDatarecebimento;
    }

    /**
     * Set rescDatainc
     *
     * @param \DateTime $rescDatainc
     * @return Rescisao
     */
    public function setRescDatainc($rescDatainc)
    {
        $this->rescDatainc = $rescDatainc;

        return $this;
    }

    /**
     * Get rescDatainc
     *
     * @return \DateTime 
     */
    public function getRescDatainc()
    {
        return $this->rescDatainc;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Rescisao
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
