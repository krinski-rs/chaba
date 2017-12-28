<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratovalorfatura
 */
class Contratovalorfatura
{
    /**
     * @var integer
     */
    private $contvalofatuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    private $contvaloCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Fatura
     */
    private $fatuCodigoid;


    /**
     * Get contvalofatuCodigoid
     *
     * @return integer 
     */
    public function getContvalofatuCodigoid()
    {
        return $this->contvalofatuCodigoid;
    }

    /**
     * Set contvaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloCodigoid
     * @return Contratovalorfatura
     */
    public function setContvaloCodigoid(\Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloCodigoid = null)
    {
        $this->contvaloCodigoid = $contvaloCodigoid;

        return $this;
    }

    /**
     * Get contvaloCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contratovalor 
     */
    public function getContvaloCodigoid()
    {
        return $this->contvaloCodigoid;
    }

    /**
     * Set fatuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid
     * @return Contratovalorfatura
     */
    public function setFatuCodigoid(\Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid = null)
    {
        $this->fatuCodigoid = $fatuCodigoid;

        return $this;
    }

    /**
     * Get fatuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Fatura 
     */
    public function getFatuCodigoid()
    {
        return $this->fatuCodigoid;
    }
}
