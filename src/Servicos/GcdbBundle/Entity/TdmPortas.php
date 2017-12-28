<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TdmPortas
 */
class TdmPortas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $impedancia;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $nexthop;

    /**
     * @var \Servicos\GcdbBundle\Entity\TdmEnlaceSide
     */
    private $idEnlacesSide;


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
     * Set tipo
     *
     * @param string $tipo
     * @return TdmPortas
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set impedancia
     *
     * @param string $impedancia
     * @return TdmPortas
     */
    public function setImpedancia($impedancia)
    {
        $this->impedancia = $impedancia;

        return $this;
    }

    /**
     * Get impedancia
     *
     * @return string 
     */
    public function getImpedancia()
    {
        return $this->impedancia;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return TdmPortas
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
     * Set nexthop
     *
     * @param integer $nexthop
     * @return TdmPortas
     */
    public function setNexthop($nexthop)
    {
        $this->nexthop = $nexthop;

        return $this;
    }

    /**
     * Get nexthop
     *
     * @return integer 
     */
    public function getNexthop()
    {
        return $this->nexthop;
    }

    /**
     * Set idEnlacesSide
     *
     * @param \Servicos\GcdbBundle\Entity\TdmEnlaceSide $idEnlacesSide
     * @return TdmPortas
     */
    public function setIdEnlacesSide(\Servicos\GcdbBundle\Entity\TdmEnlaceSide $idEnlacesSide = null)
    {
        $this->idEnlacesSide = $idEnlacesSide;

        return $this;
    }

    /**
     * Get idEnlacesSide
     *
     * @return \Servicos\GcdbBundle\Entity\TdmEnlaceSide 
     */
    public function getIdEnlacesSide()
    {
        return $this->idEnlacesSide;
    }
}
