<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicoAtributo
 */
class ServicoAtributo
{
    /**
     * @var integer
     */
    private $idServicoAtributo;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Atributo
     */
    private $atriCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servico
     */
    private $servCodigoid;


    /**
     * Get idServicoAtributo
     *
     * @return integer 
     */
    public function getIdServicoAtributo()
    {
        return $this->idServicoAtributo;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return ServicoAtributo
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return ServicoAtributo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set atriCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Atributo $atriCodigoid
     * @return ServicoAtributo
     */
    public function setAtriCodigoid(\Servicos\FinanceiroBundle\Entity\Atributo $atriCodigoid = null)
    {
        $this->atriCodigoid = $atriCodigoid;

        return $this;
    }

    /**
     * Get atriCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Atributo 
     */
    public function getAtriCodigoid()
    {
        return $this->atriCodigoid;
    }

    /**
     * Set servCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servico $servCodigoid
     * @return ServicoAtributo
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
}
