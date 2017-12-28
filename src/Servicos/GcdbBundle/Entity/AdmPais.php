<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmPais
 */
class AdmPais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $codigoBacen;


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
     * Set sigla
     *
     * @param string $sigla
     * @return AdmPais
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return AdmPais
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set codigoBacen
     *
     * @param integer $codigoBacen
     * @return AdmPais
     */
    public function setCodigoBacen($codigoBacen)
    {
        $this->codigoBacen = $codigoBacen;

        return $this;
    }

    /**
     * Get codigoBacen
     *
     * @return integer 
     */
    public function getCodigoBacen()
    {
        return $this->codigoBacen;
    }
}
