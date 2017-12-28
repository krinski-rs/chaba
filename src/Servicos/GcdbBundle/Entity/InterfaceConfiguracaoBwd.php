<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterfaceConfiguracaoBwd
 */
class InterfaceConfiguracaoBwd
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $periodicidadeDias;

    /**
     * @var string
     */
    private $texto;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set periodicidadeDias
     *
     * @param integer $periodicidadeDias
     * @return InterfaceConfiguracaoBwd
     */
    public function setPeriodicidadeDias($periodicidadeDias)
    {
        $this->periodicidadeDias = $periodicidadeDias;

        return $this;
    }

    /**
     * Get periodicidadeDias
     *
     * @return integer 
     */
    public function getPeriodicidadeDias()
    {
        return $this->periodicidadeDias;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return InterfaceConfiguracaoBwd
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }
}
