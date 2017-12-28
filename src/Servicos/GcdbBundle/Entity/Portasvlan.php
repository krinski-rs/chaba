<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portasvlan
 */
class Portasvlan
{
    /**
     * @var integer
     */
    private $idportavlan;

    /**
     * @var integer
     */
    private $idporta;

    /**
     * @var integer
     */
    private $idvlan;

    /**
     * @var integer
     */
    private $idswitch;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $tagging;


    /**
     * Get idportavlan
     *
     * @return integer 
     */
    public function getIdportavlan()
    {
        return $this->idportavlan;
    }

    /**
     * Set idporta
     *
     * @param integer $idporta
     * @return Portasvlan
     */
    public function setIdporta($idporta)
    {
        $this->idporta = $idporta;

        return $this;
    }

    /**
     * Get idporta
     *
     * @return integer 
     */
    public function getIdporta()
    {
        return $this->idporta;
    }

    /**
     * Set idvlan
     *
     * @param integer $idvlan
     * @return Portasvlan
     */
    public function setIdvlan($idvlan)
    {
        $this->idvlan = $idvlan;

        return $this;
    }

    /**
     * Get idvlan
     *
     * @return integer 
     */
    public function getIdvlan()
    {
        return $this->idvlan;
    }

    /**
     * Set idswitch
     *
     * @param integer $idswitch
     * @return Portasvlan
     */
    public function setIdswitch($idswitch)
    {
        $this->idswitch = $idswitch;

        return $this;
    }

    /**
     * Get idswitch
     *
     * @return integer 
     */
    public function getIdswitch()
    {
        return $this->idswitch;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Portasvlan
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
     * Set tagging
     *
     * @param string $tagging
     * @return Portasvlan
     */
    public function setTagging($tagging)
    {
        $this->tagging = $tagging;

        return $this;
    }

    /**
     * Get tagging
     *
     * @return string 
     */
    public function getTagging()
    {
        return $this->tagging;
    }
}
