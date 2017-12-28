<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gruposervico
 */
class Gruposervico
{
    /**
     * @var integer
     */
    private $grupservCodigoid;

    /**
     * @var string
     */
    private $grupservNome;

    /**
     * @var string
     */
    private $grupservDescricao;

    /**
     * @var \DateTime
     */
    private $grupservDatainc;


    /**
     * Get grupservCodigoid
     *
     * @return integer 
     */
    public function getGrupservCodigoid()
    {
        return $this->grupservCodigoid;
    }

    /**
     * Set grupservNome
     *
     * @param string $grupservNome
     * @return Gruposervico
     */
    public function setGrupservNome($grupservNome)
    {
        $this->grupservNome = $grupservNome;

        return $this;
    }

    /**
     * Get grupservNome
     *
     * @return string 
     */
    public function getGrupservNome()
    {
        return $this->grupservNome;
    }

    /**
     * Set grupservDescricao
     *
     * @param string $grupservDescricao
     * @return Gruposervico
     */
    public function setGrupservDescricao($grupservDescricao)
    {
        $this->grupservDescricao = $grupservDescricao;

        return $this;
    }

    /**
     * Get grupservDescricao
     *
     * @return string 
     */
    public function getGrupservDescricao()
    {
        return $this->grupservDescricao;
    }

    /**
     * Set grupservDatainc
     *
     * @param \DateTime $grupservDatainc
     * @return Gruposervico
     */
    public function setGrupservDatainc($grupservDatainc)
    {
        $this->grupservDatainc = $grupservDatainc;

        return $this;
    }

    /**
     * Get grupservDatainc
     *
     * @return \DateTime 
     */
    public function getGrupservDatainc()
    {
        return $this->grupservDatainc;
    }
}
