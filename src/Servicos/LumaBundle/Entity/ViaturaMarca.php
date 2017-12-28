<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaMarca
 */
class ViaturaMarca
{
    /**
     * @var integer
     */
    private $viatMarcaid;

    /**
     * @var integer
     */
    private $marcaCadUsuarioid;

    /**
     * @var string
     */
    private $marcaNome;

    /**
     * @var \DateTime
     */
    private $marcaDatainc;

    /**
     * @var boolean
     */
    private $marcaAtivo;


    /**
     * Get viatMarcaid
     *
     * @return integer 
     */
    public function getViatMarcaid()
    {
        return $this->viatMarcaid;
    }

    /**
     * Set marcaCadUsuarioid
     *
     * @param integer $marcaCadUsuarioid
     * @return ViaturaMarca
     */
    public function setMarcaCadUsuarioid($marcaCadUsuarioid)
    {
        $this->marcaCadUsuarioid = $marcaCadUsuarioid;

        return $this;
    }

    /**
     * Get marcaCadUsuarioid
     *
     * @return integer 
     */
    public function getMarcaCadUsuarioid()
    {
        return $this->marcaCadUsuarioid;
    }

    /**
     * Set marcaNome
     *
     * @param string $marcaNome
     * @return ViaturaMarca
     */
    public function setMarcaNome($marcaNome)
    {
        $this->marcaNome = $marcaNome;

        return $this;
    }

    /**
     * Get marcaNome
     *
     * @return string 
     */
    public function getMarcaNome()
    {
        return $this->marcaNome;
    }

    /**
     * Set marcaDatainc
     *
     * @param \DateTime $marcaDatainc
     * @return ViaturaMarca
     */
    public function setMarcaDatainc($marcaDatainc)
    {
        $this->marcaDatainc = $marcaDatainc;

        return $this;
    }

    /**
     * Get marcaDatainc
     *
     * @return \DateTime 
     */
    public function getMarcaDatainc()
    {
        return $this->marcaDatainc;
    }

    /**
     * Set marcaAtivo
     *
     * @param boolean $marcaAtivo
     * @return ViaturaMarca
     */
    public function setMarcaAtivo($marcaAtivo)
    {
        $this->marcaAtivo = $marcaAtivo;

        return $this;
    }

    /**
     * Get marcaAtivo
     *
     * @return boolean 
     */
    public function getMarcaAtivo()
    {
        return $this->marcaAtivo;
    }
}
