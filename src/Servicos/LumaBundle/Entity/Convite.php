<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convite
 */
class Convite
{
    /**
     * @var integer
     */
    private $convCodigoid;

    /**
     * @var \DateTime
     */
    private $convDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get convCodigoid
     *
     * @return integer 
     */
    public function getConvCodigoid()
    {
        return $this->convCodigoid;
    }

    /**
     * Set convDatainc
     *
     * @param \DateTime $convDatainc
     * @return Convite
     */
    public function setConvDatainc($convDatainc)
    {
        $this->convDatainc = $convDatainc;

        return $this;
    }

    /**
     * Get convDatainc
     *
     * @return \DateTime 
     */
    public function getConvDatainc()
    {
        return $this->convDatainc;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return Convite
     */
    public function setCotaCodigoid(\Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid = null)
    {
        $this->cotaCodigoid = $cotaCodigoid;

        return $this;
    }

    /**
     * Get cotaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacao 
     */
    public function getCotaCodigoid()
    {
        return $this->cotaCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Convite
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
}
