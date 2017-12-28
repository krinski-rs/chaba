<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicos
 */
class Servicos
{
    /**
     * @var integer
     */
    private $servicoid;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $apelido;

    /**
     * @var \Servicos\GcdbBundle\Entity\GruposServicos
     */
    private $gruposervicoid;


    /**
     * Get servicoid
     *
     * @return integer 
     */
    public function getServicoid()
    {
        return $this->servicoid;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Servicos
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
     * Set apelido
     *
     * @param string $apelido
     * @return Servicos
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get apelido
     *
     * @return string 
     */
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set gruposervicoid
     *
     * @param \Servicos\GcdbBundle\Entity\GruposServicos $gruposervicoid
     * @return Servicos
     */
    public function setGruposervicoid(\Servicos\GcdbBundle\Entity\GruposServicos $gruposervicoid = null)
    {
        $this->gruposervicoid = $gruposervicoid;

        return $this;
    }

    /**
     * Get gruposervicoid
     *
     * @return \Servicos\GcdbBundle\Entity\GruposServicos 
     */
    public function getGruposervicoid()
    {
        return $this->gruposervicoid;
    }
}
