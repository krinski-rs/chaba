<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratoservico
 */
class Contratoservico
{
    /**
     * @var integer
     */
    private $contservCodigoid;

    /**
     * @var string
     */
    private $contservCircuito;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servicocapacidade
     */
    private $servcapaCodigoid;


    /**
     * Get contservCodigoid
     *
     * @return integer 
     */
    public function getContservCodigoid()
    {
        return $this->contservCodigoid;
    }

    /**
     * Set contservCircuito
     *
     * @param string $contservCircuito
     * @return Contratoservico
     */
    public function setContservCircuito($contservCircuito)
    {
        $this->contservCircuito = $contservCircuito;

        return $this;
    }

    /**
     * Get contservCircuito
     *
     * @return string 
     */
    public function getContservCircuito()
    {
        return $this->contservCircuito;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratoservico
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

    /**
     * Set servcapaCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servicocapacidade $servcapaCodigoid
     * @return Contratoservico
     */
    public function setServcapaCodigoid(\Servicos\FinanceiroBundle\Entity\Servicocapacidade $servcapaCodigoid = null)
    {
        $this->servcapaCodigoid = $servcapaCodigoid;

        return $this;
    }

    /**
     * Get servcapaCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Servicocapacidade 
     */
    public function getServcapaCodigoid()
    {
        return $this->servcapaCodigoid;
    }
}
