<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medida
 */
class Medida
{
    /**
     * @var integer
     */
    private $mediCodigoid;

    /**
     * @var string
     */
    private $mediNome;

    /**
     * @var string
     */
    private $mediSigla;

    /**
     * @var integer
     */
    private $mediMultiplicador;

    /**
     * @var integer
     */
    private $mediVezes;

    /**
     * @var integer
     */
    private $mediCategoria;


    /**
     * Get mediCodigoid
     *
     * @return integer 
     */
    public function getMediCodigoid()
    {
        return $this->mediCodigoid;
    }

    /**
     * Set mediNome
     *
     * @param string $mediNome
     * @return Medida
     */
    public function setMediNome($mediNome)
    {
        $this->mediNome = $mediNome;

        return $this;
    }

    /**
     * Get mediNome
     *
     * @return string 
     */
    public function getMediNome()
    {
        return $this->mediNome;
    }

    /**
     * Set mediSigla
     *
     * @param string $mediSigla
     * @return Medida
     */
    public function setMediSigla($mediSigla)
    {
        $this->mediSigla = $mediSigla;

        return $this;
    }

    /**
     * Get mediSigla
     *
     * @return string 
     */
    public function getMediSigla()
    {
        return $this->mediSigla;
    }

    /**
     * Set mediMultiplicador
     *
     * @param integer $mediMultiplicador
     * @return Medida
     */
    public function setMediMultiplicador($mediMultiplicador)
    {
        $this->mediMultiplicador = $mediMultiplicador;

        return $this;
    }

    /**
     * Get mediMultiplicador
     *
     * @return integer 
     */
    public function getMediMultiplicador()
    {
        return $this->mediMultiplicador;
    }

    /**
     * Set mediVezes
     *
     * @param integer $mediVezes
     * @return Medida
     */
    public function setMediVezes($mediVezes)
    {
        $this->mediVezes = $mediVezes;

        return $this;
    }

    /**
     * Get mediVezes
     *
     * @return integer 
     */
    public function getMediVezes()
    {
        return $this->mediVezes;
    }

    /**
     * Set mediCategoria
     *
     * @param integer $mediCategoria
     * @return Medida
     */
    public function setMediCategoria($mediCategoria)
    {
        $this->mediCategoria = $mediCategoria;

        return $this;
    }

    /**
     * Get mediCategoria
     *
     * @return integer 
     */
    public function getMediCategoria()
    {
        return $this->mediCategoria;
    }
}
