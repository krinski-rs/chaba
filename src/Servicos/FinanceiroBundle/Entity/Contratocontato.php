<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratocontato
 */
class Contratocontato
{
    /**
     * @var integer
     */
    private $contcontCodigoid;

    /**
     * @var integer
     */
    private $usrCodigoid;

    /**
     * @var string
     */
    private $contcontContato;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get contcontCodigoid
     *
     * @return integer 
     */
    public function getContcontCodigoid()
    {
        return $this->contcontCodigoid;
    }

    /**
     * Set usrCodigoid
     *
     * @param integer $usrCodigoid
     * @return Contratocontato
     */
    public function setUsrCodigoid($usrCodigoid)
    {
        $this->usrCodigoid = $usrCodigoid;

        return $this;
    }

    /**
     * Get usrCodigoid
     *
     * @return integer 
     */
    public function getUsrCodigoid()
    {
        return $this->usrCodigoid;
    }

    /**
     * Set contcontContato
     *
     * @param string $contcontContato
     * @return Contratocontato
     */
    public function setContcontContato($contcontContato)
    {
        $this->contcontContato = $contcontContato;

        return $this;
    }

    /**
     * Get contcontContato
     *
     * @return string 
     */
    public function getContcontContato()
    {
        return $this->contcontContato;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratocontato
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
