<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosServicos
 */
class PlanosServicos
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
     * @var string
     */
    private $tipoServidor;

    /**
     * @var string
     */
    private $tipoPlano;

    /**
     * @var float
     */
    private $valorMensal;

    /**
     * @var float
     */
    private $valorAtivacao;

    /**
     * @var boolean
     */
    private $status;


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
     * @return PlanosServicos
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
     * Set tipoServidor
     *
     * @param string $tipoServidor
     * @return PlanosServicos
     */
    public function setTipoServidor($tipoServidor)
    {
        $this->tipoServidor = $tipoServidor;

        return $this;
    }

    /**
     * Get tipoServidor
     *
     * @return string 
     */
    public function getTipoServidor()
    {
        return $this->tipoServidor;
    }

    /**
     * Set tipoPlano
     *
     * @param string $tipoPlano
     * @return PlanosServicos
     */
    public function setTipoPlano($tipoPlano)
    {
        $this->tipoPlano = $tipoPlano;

        return $this;
    }

    /**
     * Get tipoPlano
     *
     * @return string 
     */
    public function getTipoPlano()
    {
        return $this->tipoPlano;
    }

    /**
     * Set valorMensal
     *
     * @param float $valorMensal
     * @return PlanosServicos
     */
    public function setValorMensal($valorMensal)
    {
        $this->valorMensal = $valorMensal;

        return $this;
    }

    /**
     * Get valorMensal
     *
     * @return float 
     */
    public function getValorMensal()
    {
        return $this->valorMensal;
    }

    /**
     * Set valorAtivacao
     *
     * @param float $valorAtivacao
     * @return PlanosServicos
     */
    public function setValorAtivacao($valorAtivacao)
    {
        $this->valorAtivacao = $valorAtivacao;

        return $this;
    }

    /**
     * Get valorAtivacao
     *
     * @return float 
     */
    public function getValorAtivacao()
    {
        return $this->valorAtivacao;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return PlanosServicos
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
