<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ativacaotemplatepermissao
 */
class Ativacaotemplatepermissao
{
    /**
     * @var integer
     */
    private $ativtemppermiCodigoid;

    /**
     * @var integer
     */
    private $ativtemppermiOrdem;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Ativacaotemplate
     */
    private $ativtempCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Atributo
     */
    private $atriCodigoid;


    /**
     * Get ativtemppermiCodigoid
     *
     * @return integer 
     */
    public function getAtivtemppermiCodigoid()
    {
        return $this->ativtemppermiCodigoid;
    }

    /**
     * Set ativtemppermiOrdem
     *
     * @param integer $ativtemppermiOrdem
     * @return Ativacaotemplatepermissao
     */
    public function setAtivtemppermiOrdem($ativtemppermiOrdem)
    {
        $this->ativtemppermiOrdem = $ativtemppermiOrdem;

        return $this;
    }

    /**
     * Get ativtemppermiOrdem
     *
     * @return integer 
     */
    public function getAtivtemppermiOrdem()
    {
        return $this->ativtemppermiOrdem;
    }

    /**
     * Set ativtempCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Ativacaotemplate $ativtempCodigoid
     * @return Ativacaotemplatepermissao
     */
    public function setAtivtempCodigoid(\Servicos\FinanceiroBundle\Entity\Ativacaotemplate $ativtempCodigoid = null)
    {
        $this->ativtempCodigoid = $ativtempCodigoid;

        return $this;
    }

    /**
     * Get ativtempCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Ativacaotemplate 
     */
    public function getAtivtempCodigoid()
    {
        return $this->ativtempCodigoid;
    }

    /**
     * Set atriCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Atributo $atriCodigoid
     * @return Ativacaotemplatepermissao
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
}
