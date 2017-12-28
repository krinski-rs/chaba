<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vlans
 */
class Vlans
{
    /**
     * @var integer
     */
    private $idvlan;

    /**
     * @var integer
     */
    private $tagid;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $servico;

    /**
     * @var string
     */
    private $numCircuito;

    /**
     * @var string
     */
    private $status;


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
     * Set tagid
     *
     * @param integer $tagid
     * @return Vlans
     */
    public function setTagid($tagid)
    {
        $this->tagid = $tagid;

        return $this;
    }

    /**
     * Get tagid
     *
     * @return integer 
     */
    public function getTagid()
    {
        return $this->tagid;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Vlans
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
     * Set servico
     *
     * @param string $servico
     * @return Vlans
     */
    public function setServico($servico)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get servico
     *
     * @return string 
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Set numCircuito
     *
     * @param string $numCircuito
     * @return Vlans
     */
    public function setNumCircuito($numCircuito)
    {
        $this->numCircuito = $numCircuito;

        return $this;
    }

    /**
     * Get numCircuito
     *
     * @return string 
     */
    public function getNumCircuito()
    {
        return $this->numCircuito;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Vlans
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
