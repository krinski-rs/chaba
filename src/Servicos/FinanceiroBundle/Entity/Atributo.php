<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributo
 */
class Atributo
{
    /**
     * @var integer
     */
    private $atriCodigoid;

    /**
     * @var string
     */
    private $atriNome;

    /**
     * @var string
     */
    private $atribTipohtml;

    /**
     * @var string
     */
    private $atribMask;


    /**
     * Get atriCodigoid
     *
     * @return integer 
     */
    public function getAtriCodigoid()
    {
        return $this->atriCodigoid;
    }

    /**
     * Set atriNome
     *
     * @param string $atriNome
     * @return Atributo
     */
    public function setAtriNome($atriNome)
    {
        $this->atriNome = $atriNome;

        return $this;
    }

    /**
     * Get atriNome
     *
     * @return string 
     */
    public function getAtriNome()
    {
        return $this->atriNome;
    }

    /**
     * Set atribTipohtml
     *
     * @param string $atribTipohtml
     * @return Atributo
     */
    public function setAtribTipohtml($atribTipohtml)
    {
        $this->atribTipohtml = $atribTipohtml;

        return $this;
    }

    /**
     * Get atribTipohtml
     *
     * @return string 
     */
    public function getAtribTipohtml()
    {
        return $this->atribTipohtml;
    }

    /**
     * Set atribMask
     *
     * @param string $atribMask
     * @return Atributo
     */
    public function setAtribMask($atribMask)
    {
        $this->atribMask = $atribMask;

        return $this;
    }

    /**
     * Get atribMask
     *
     * @return string 
     */
    public function getAtribMask()
    {
        return $this->atribMask;
    }
}
