<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banco
 */
class Banco
{
    /**
     * @var integer
     */
    private $bancCodigoid;

    /**
     * @var string
     */
    private $bancCodigobacen;

    /**
     * @var string
     */
    private $bancNome;

    /**
     * @var string
     */
    private $bancSegmento;

    /**
     * @var string
     */
    private $bancCnpj;


    /**
     * Get bancCodigoid
     *
     * @return integer 
     */
    public function getBancCodigoid()
    {
        return $this->bancCodigoid;
    }

    /**
     * Set bancCodigobacen
     *
     * @param string $bancCodigobacen
     * @return Banco
     */
    public function setBancCodigobacen($bancCodigobacen)
    {
        $this->bancCodigobacen = $bancCodigobacen;

        return $this;
    }

    /**
     * Get bancCodigobacen
     *
     * @return string 
     */
    public function getBancCodigobacen()
    {
        return $this->bancCodigobacen;
    }

    /**
     * Set bancNome
     *
     * @param string $bancNome
     * @return Banco
     */
    public function setBancNome($bancNome)
    {
        $this->bancNome = $bancNome;

        return $this;
    }

    /**
     * Get bancNome
     *
     * @return string 
     */
    public function getBancNome()
    {
        return $this->bancNome;
    }

    /**
     * Set bancSegmento
     *
     * @param string $bancSegmento
     * @return Banco
     */
    public function setBancSegmento($bancSegmento)
    {
        $this->bancSegmento = $bancSegmento;

        return $this;
    }

    /**
     * Get bancSegmento
     *
     * @return string 
     */
    public function getBancSegmento()
    {
        return $this->bancSegmento;
    }

    /**
     * Set bancCnpj
     *
     * @param string $bancCnpj
     * @return Banco
     */
    public function setBancCnpj($bancCnpj)
    {
        $this->bancCnpj = $bancCnpj;

        return $this;
    }

    /**
     * Get bancCnpj
     *
     * @return string 
     */
    public function getBancCnpj()
    {
        return $this->bancCnpj;
    }
}
