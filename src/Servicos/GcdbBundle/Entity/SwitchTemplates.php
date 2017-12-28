<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SwitchTemplates
 */
class SwitchTemplates
{
    /**
     * @var integer
     */
    private $idswitchtemplate;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $url;


    /**
     * Get idswitchtemplate
     *
     * @return integer 
     */
    public function getIdswitchtemplate()
    {
        return $this->idswitchtemplate;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return SwitchTemplates
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return SwitchTemplates
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return SwitchTemplates
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}
