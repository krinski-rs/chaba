<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servico
 */
class Servico
{
    /**
     * @var integer
     */
    private $idservico;

    /**
     * @var string
     */
    private $servico;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idservico
     *
     * @return integer 
     */
    public function getIdservico()
    {
        return $this->idservico;
    }

    /**
     * Set servico
     *
     * @param string $servico
     * @return Servico
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return Servico
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
