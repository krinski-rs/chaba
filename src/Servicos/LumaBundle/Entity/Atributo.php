<?php

namespace Servicos\LumaBundle\Entity;

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
    private $atriMascara;

    /**
     * @var boolean
     */
    private $atriRequeridosn;

    /**
     * @var boolean
     */
    private $atriUnicosn;

    /**
     * @var string
     */
    private $atriTipohtml;


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
     * Set atriMascara
     *
     * @param string $atriMascara
     * @return Atributo
     */
    public function setAtriMascara($atriMascara)
    {
        $this->atriMascara = $atriMascara;

        return $this;
    }

    /**
     * Get atriMascara
     *
     * @return string 
     */
    public function getAtriMascara()
    {
        return $this->atriMascara;
    }

    /**
     * Set atriRequeridosn
     *
     * @param boolean $atriRequeridosn
     * @return Atributo
     */
    public function setAtriRequeridosn($atriRequeridosn)
    {
        $this->atriRequeridosn = $atriRequeridosn;

        return $this;
    }

    /**
     * Get atriRequeridosn
     *
     * @return boolean 
     */
    public function getAtriRequeridosn()
    {
        return $this->atriRequeridosn;
    }

    /**
     * Set atriUnicosn
     *
     * @param boolean $atriUnicosn
     * @return Atributo
     */
    public function setAtriUnicosn($atriUnicosn)
    {
        $this->atriUnicosn = $atriUnicosn;

        return $this;
    }

    /**
     * Get atriUnicosn
     *
     * @return boolean 
     */
    public function getAtriUnicosn()
    {
        return $this->atriUnicosn;
    }

    /**
     * Set atriTipohtml
     *
     * @param string $atriTipohtml
     * @return Atributo
     */
    public function setAtriTipohtml($atriTipohtml)
    {
        $this->atriTipohtml = $atriTipohtml;

        return $this;
    }

    /**
     * Get atriTipohtml
     *
     * @return string 
     */
    public function getAtriTipohtml()
    {
        return $this->atriTipohtml;
    }
}
