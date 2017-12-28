<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servico
 */
class Servico
{
    /**
     * @var integer
     */
    private $servCodigoid;

    /**
     * @var string
     */
    private $servNome;

    /**
     * @var string
     */
    private $servDescricao;

    /**
     * @var \DateTime
     */
    private $servDatainc;

    /**
     * @var string
     */
    private $servApelido;

    /**
     * @var boolean
     */
    private $servDependente;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Gruposervico
     */
    private $grupservCodigoid;


    /**
     * Get servCodigoid
     *
     * @return integer 
     */
    public function getServCodigoid()
    {
        return $this->servCodigoid;
    }

    /**
     * Set servNome
     *
     * @param string $servNome
     * @return Servico
     */
    public function setServNome($servNome)
    {
        $this->servNome = $servNome;

        return $this;
    }

    /**
     * Get servNome
     *
     * @return string 
     */
    public function getServNome()
    {
        return $this->servNome;
    }

    /**
     * Set servDescricao
     *
     * @param string $servDescricao
     * @return Servico
     */
    public function setServDescricao($servDescricao)
    {
        $this->servDescricao = $servDescricao;

        return $this;
    }

    /**
     * Get servDescricao
     *
     * @return string 
     */
    public function getServDescricao()
    {
        return $this->servDescricao;
    }

    /**
     * Set servDatainc
     *
     * @param \DateTime $servDatainc
     * @return Servico
     */
    public function setServDatainc($servDatainc)
    {
        $this->servDatainc = $servDatainc;

        return $this;
    }

    /**
     * Get servDatainc
     *
     * @return \DateTime 
     */
    public function getServDatainc()
    {
        return $this->servDatainc;
    }

    /**
     * Set servApelido
     *
     * @param string $servApelido
     * @return Servico
     */
    public function setServApelido($servApelido)
    {
        $this->servApelido = $servApelido;

        return $this;
    }

    /**
     * Get servApelido
     *
     * @return string 
     */
    public function getServApelido()
    {
        return $this->servApelido;
    }

    /**
     * Set servDependente
     *
     * @param boolean $servDependente
     * @return Servico
     */
    public function setServDependente($servDependente)
    {
        $this->servDependente = $servDependente;

        return $this;
    }

    /**
     * Get servDependente
     *
     * @return boolean 
     */
    public function getServDependente()
    {
        return $this->servDependente;
    }

    /**
     * Set grupservCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Gruposervico $grupservCodigoid
     * @return Servico
     */
    public function setGrupservCodigoid(\Servicos\FinanceiroBundle\Entity\Gruposervico $grupservCodigoid = null)
    {
        $this->grupservCodigoid = $grupservCodigoid;

        return $this;
    }

    /**
     * Get grupservCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Gruposervico 
     */
    public function getGrupservCodigoid()
    {
        return $this->grupservCodigoid;
    }
}
