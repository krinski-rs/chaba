<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratovalorDiscriminacao
 */
class ContratovalorDiscriminacao
{
    /**
     * @var integer
     */
    private $contDiscriminacaoCodigoid;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contratovalor
     */
    private $contvaloCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Discriminacao
     */
    private $discriminacaoCodigoid;


    /**
     * Get contDiscriminacaoCodigoid
     *
     * @return integer 
     */
    public function getContDiscriminacaoCodigoid()
    {
        return $this->contDiscriminacaoCodigoid;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return ContratovalorDiscriminacao
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set contvaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contvaloCodigoid
     * @return ContratovalorDiscriminacao
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
     * Set discriminacaoCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Discriminacao $discriminacaoCodigoid
     * @return ContratovalorDiscriminacao
     */
    public function setDiscriminacaoCodigoid(\Servicos\FinanceiroBundle\Entity\Discriminacao $discriminacaoCodigoid = null)
    {
        $this->discriminacaoCodigoid = $discriminacaoCodigoid;

        return $this;
    }

    /**
     * Get discriminacaoCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Discriminacao 
     */
    public function getDiscriminacaoCodigoid()
    {
        return $this->discriminacaoCodigoid;
    }
}
