<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Origem
 */
class Origem
{
    /**
     * @var integer
     */
    private $origemid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $origem;

    /**
     * @var string
     */
    private $agente;

    /**
     * @var \DateTime
     */
    private $datacadastro;


    /**
     * Get origemid
     *
     * @return integer 
     */
    public function getOrigemid()
    {
        return $this->origemid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Origem
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set origem
     *
     * @param string $origem
     * @return Origem
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;

        return $this;
    }

    /**
     * Get origem
     *
     * @return string 
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * Set agente
     *
     * @param string $agente
     * @return Origem
     */
    public function setAgente($agente)
    {
        $this->agente = $agente;

        return $this;
    }

    /**
     * Get agente
     *
     * @return string 
     */
    public function getAgente()
    {
        return $this->agente;
    }

    /**
     * Set datacadastro
     *
     * @param \DateTime $datacadastro
     * @return Origem
     */
    public function setDatacadastro($datacadastro)
    {
        $this->datacadastro = $datacadastro;

        return $this;
    }

    /**
     * Get datacadastro
     *
     * @return \DateTime 
     */
    public function getDatacadastro()
    {
        return $this->datacadastro;
    }
}
