<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicoDiscriminacao
 */
class ServicoDiscriminacao
{
    /**
     * @var integer
     */
    private $servdiscCodigoid;

    /**
     * @var string
     */
    private $servdiscValorpadrao;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servico
     */
    private $servCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Discriminacao
     */
    private $idDiscriminacao;


    /**
     * Get servdiscCodigoid
     *
     * @return integer 
     */
    public function getServdiscCodigoid()
    {
        return $this->servdiscCodigoid;
    }

    /**
     * Set servdiscValorpadrao
     *
     * @param string $servdiscValorpadrao
     * @return ServicoDiscriminacao
     */
    public function setServdiscValorpadrao($servdiscValorpadrao)
    {
        $this->servdiscValorpadrao = $servdiscValorpadrao;

        return $this;
    }

    /**
     * Get servdiscValorpadrao
     *
     * @return string 
     */
    public function getServdiscValorpadrao()
    {
        return $this->servdiscValorpadrao;
    }

    /**
     * Set servCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servico $servCodigoid
     * @return ServicoDiscriminacao
     */
    public function setServCodigoid(\Servicos\FinanceiroBundle\Entity\Servico $servCodigoid = null)
    {
        $this->servCodigoid = $servCodigoid;

        return $this;
    }

    /**
     * Get servCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Servico 
     */
    public function getServCodigoid()
    {
        return $this->servCodigoid;
    }

    /**
     * Set idDiscriminacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Discriminacao $idDiscriminacao
     * @return ServicoDiscriminacao
     */
    public function setIdDiscriminacao(\Servicos\FinanceiroBundle\Entity\Discriminacao $idDiscriminacao = null)
    {
        $this->idDiscriminacao = $idDiscriminacao;

        return $this;
    }

    /**
     * Get idDiscriminacao
     *
     * @return \Servicos\FinanceiroBundle\Entity\Discriminacao 
     */
    public function getIdDiscriminacao()
    {
        return $this->idDiscriminacao;
    }
}
