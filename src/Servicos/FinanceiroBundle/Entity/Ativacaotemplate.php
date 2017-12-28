<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ativacaotemplate
 */
class Ativacaotemplate
{
    /**
     * @var integer
     */
    private $ativtempCodigoid;

    /**
     * @var string
     */
    private $ativtempNome;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servico
     */
    private $servCodigoid;


    /**
     * Get ativtempCodigoid
     *
     * @return integer 
     */
    public function getAtivtempCodigoid()
    {
        return $this->ativtempCodigoid;
    }

    /**
     * Set ativtempNome
     *
     * @param string $ativtempNome
     * @return Ativacaotemplate
     */
    public function setAtivtempNome($ativtempNome)
    {
        $this->ativtempNome = $ativtempNome;

        return $this;
    }

    /**
     * Get ativtempNome
     *
     * @return string 
     */
    public function getAtivtempNome()
    {
        return $this->ativtempNome;
    }

    /**
     * Set servCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servico $servCodigoid
     * @return Ativacaotemplate
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
