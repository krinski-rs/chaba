<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadPais
 */
class CadPais
{
    /**
     * @var integer
     */
    private $cad05Codigo;

    /**
     * @var string
     */
    private $cad05Sigla;

    /**
     * @var string
     */
    private $cad05Nome;

    /**
     * @var integer
     */
    private $cad05Referencia;

    /**
     * @var integer
     */
    private $cad16Codigo;

    /**
     * @var string
     */
    private $cad05Nacionalidade;


    /**
     * Get cad05Codigo
     *
     * @return integer 
     */
    public function getCad05Codigo()
    {
        return $this->cad05Codigo;
    }

    /**
     * Set cad05Sigla
     *
     * @param string $cad05Sigla
     * @return CadPais
     */
    public function setCad05Sigla($cad05Sigla)
    {
        $this->cad05Sigla = $cad05Sigla;

        return $this;
    }

    /**
     * Get cad05Sigla
     *
     * @return string 
     */
    public function getCad05Sigla()
    {
        return $this->cad05Sigla;
    }

    /**
     * Set cad05Nome
     *
     * @param string $cad05Nome
     * @return CadPais
     */
    public function setCad05Nome($cad05Nome)
    {
        $this->cad05Nome = $cad05Nome;

        return $this;
    }

    /**
     * Get cad05Nome
     *
     * @return string 
     */
    public function getCad05Nome()
    {
        return $this->cad05Nome;
    }

    /**
     * Set cad05Referencia
     *
     * @param integer $cad05Referencia
     * @return CadPais
     */
    public function setCad05Referencia($cad05Referencia)
    {
        $this->cad05Referencia = $cad05Referencia;

        return $this;
    }

    /**
     * Get cad05Referencia
     *
     * @return integer 
     */
    public function getCad05Referencia()
    {
        return $this->cad05Referencia;
    }

    /**
     * Set cad16Codigo
     *
     * @param integer $cad16Codigo
     * @return CadPais
     */
    public function setCad16Codigo($cad16Codigo)
    {
        $this->cad16Codigo = $cad16Codigo;

        return $this;
    }

    /**
     * Get cad16Codigo
     *
     * @return integer 
     */
    public function getCad16Codigo()
    {
        return $this->cad16Codigo;
    }

    /**
     * Set cad05Nacionalidade
     *
     * @param string $cad05Nacionalidade
     * @return CadPais
     */
    public function setCad05Nacionalidade($cad05Nacionalidade)
    {
        $this->cad05Nacionalidade = $cad05Nacionalidade;

        return $this;
    }

    /**
     * Get cad05Nacionalidade
     *
     * @return string 
     */
    public function getCad05Nacionalidade()
    {
        return $this->cad05Nacionalidade;
    }
}
