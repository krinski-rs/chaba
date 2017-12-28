<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriasAccounts
 */
class CategoriasAccounts
{
    /**
     * @var integer
     */
    private $categoriaid;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $datacriacao;

    /**
     * @var string
     */
    private $criador;


    /**
     * Get categoriaid
     *
     * @return integer 
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return CategoriasAccounts
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
     * Set status
     *
     * @param integer $status
     * @return CategoriasAccounts
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set datacriacao
     *
     * @param \DateTime $datacriacao
     * @return CategoriasAccounts
     */
    public function setDatacriacao($datacriacao)
    {
        $this->datacriacao = $datacriacao;

        return $this;
    }

    /**
     * Get datacriacao
     *
     * @return \DateTime 
     */
    public function getDatacriacao()
    {
        return $this->datacriacao;
    }

    /**
     * Set criador
     *
     * @param string $criador
     * @return CategoriasAccounts
     */
    public function setCriador($criador)
    {
        $this->criador = $criador;

        return $this;
    }

    /**
     * Get criador
     *
     * @return string 
     */
    public function getCriador()
    {
        return $this->criador;
    }
}
