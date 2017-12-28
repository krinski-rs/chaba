<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suspencao
 */
class Suspencao
{
    /**
     * @var integer
     */
    private $suspCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $suspDatainc;

    /**
     * @var \DateTime
     */
    private $suspDatasuspenso;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get suspCodigoid
     *
     * @return integer 
     */
    public function getSuspCodigoid()
    {
        return $this->suspCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Suspencao
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set suspDatainc
     *
     * @param \DateTime $suspDatainc
     * @return Suspencao
     */
    public function setSuspDatainc($suspDatainc)
    {
        $this->suspDatainc = $suspDatainc;

        return $this;
    }

    /**
     * Get suspDatainc
     *
     * @return \DateTime 
     */
    public function getSuspDatainc()
    {
        return $this->suspDatainc;
    }

    /**
     * Set suspDatasuspenso
     *
     * @param \DateTime $suspDatasuspenso
     * @return Suspencao
     */
    public function setSuspDatasuspenso($suspDatasuspenso)
    {
        $this->suspDatasuspenso = $suspDatasuspenso;

        return $this;
    }

    /**
     * Get suspDatasuspenso
     *
     * @return \DateTime 
     */
    public function getSuspDatasuspenso()
    {
        return $this->suspDatasuspenso;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Suspencao
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
