<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicosDetalhes
 */
class ServicosDetalhes
{
    /**
     * @var integer
     */
    private $id;

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
    private $descricao;

    /**
     * @var string
     */
    private $volumeTrafego;

    /**
     * @var string
     */
    private $velocidadeTrafego;


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
     * Set servicoid
     *
     * @param integer $servicoid
     * @return ServicosDetalhes
     */
    public function setServicoid($servicoid)
    {
        $this->servicoid = $servicoid;

        return $this;
    }

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
     * @return ServicosDetalhes
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
     * Set descricao
     *
     * @param string $descricao
     * @return ServicosDetalhes
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set volumeTrafego
     *
     * @param string $volumeTrafego
     * @return ServicosDetalhes
     */
    public function setVolumeTrafego($volumeTrafego)
    {
        $this->volumeTrafego = $volumeTrafego;

        return $this;
    }

    /**
     * Get volumeTrafego
     *
     * @return string 
     */
    public function getVolumeTrafego()
    {
        return $this->volumeTrafego;
    }

    /**
     * Set velocidadeTrafego
     *
     * @param string $velocidadeTrafego
     * @return ServicosDetalhes
     */
    public function setVelocidadeTrafego($velocidadeTrafego)
    {
        $this->velocidadeTrafego = $velocidadeTrafego;

        return $this;
    }

    /**
     * Get velocidadeTrafego
     *
     * @return string 
     */
    public function getVelocidadeTrafego()
    {
        return $this->velocidadeTrafego;
    }
}
