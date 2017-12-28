<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsCategoria
 */
class TicketsCategoria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var boolean
     */
    private $contaSla;

    /**
     * @var integer
     */
    private $prioridade;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var integer
     */
    private $ativo;


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
     * Set nome
     *
     * @param string $nome
     * @return TicketsCategoria
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
     * Set contaSla
     *
     * @param boolean $contaSla
     * @return TicketsCategoria
     */
    public function setContaSla($contaSla)
    {
        $this->contaSla = $contaSla;

        return $this;
    }

    /**
     * Get contaSla
     *
     * @return boolean 
     */
    public function getContaSla()
    {
        return $this->contaSla;
    }

    /**
     * Set prioridade
     *
     * @param integer $prioridade
     * @return TicketsCategoria
     */
    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;

        return $this;
    }

    /**
     * Get prioridade
     *
     * @return integer 
     */
    public function getPrioridade()
    {
        return $this->prioridade;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return TicketsCategoria
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set ativo
     *
     * @param integer $ativo
     * @return TicketsCategoria
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
