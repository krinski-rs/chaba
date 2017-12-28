<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpPonta
 */
class TmpPonta
{
    /**
     * @var integer
     */
    private $idTmpPonta;

    /**
     * @var string
     */
    private $ponta;

    /**
     * @var string
     */
    private $interface;

    /**
     * @var string
     */
    private $logradouro;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var integer
     */
    private $idPop;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\TmpCircuito
     */
    private $idTmpCircuito;


    /**
     * Get idTmpPonta
     *
     * @return integer 
     */
    public function getIdTmpPonta()
    {
        return $this->idTmpPonta;
    }

    /**
     * Set ponta
     *
     * @param string $ponta
     * @return TmpPonta
     */
    public function setPonta($ponta)
    {
        $this->ponta = $ponta;

        return $this;
    }

    /**
     * Get ponta
     *
     * @return string 
     */
    public function getPonta()
    {
        return $this->ponta;
    }

    /**
     * Set interface
     *
     * @param string $interface
     * @return TmpPonta
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;

        return $this;
    }

    /**
     * Get interface
     *
     * @return string 
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     * @return TmpPonta
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro
     *
     * @return string 
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return TmpPonta
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return TmpPonta
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return TmpPonta
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return TmpPonta
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set idPop
     *
     * @param integer $idPop
     * @return TmpPonta
     */
    public function setIdPop($idPop)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return integer 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }

    /**
     * Set idTmpCircuito
     *
     * @param \Servicos\FinanceiroBundle\Entity\TmpCircuito $idTmpCircuito
     * @return TmpPonta
     */
    public function setIdTmpCircuito(\Servicos\FinanceiroBundle\Entity\TmpCircuito $idTmpCircuito = null)
    {
        $this->idTmpCircuito = $idTmpCircuito;

        return $this;
    }

    /**
     * Get idTmpCircuito
     *
     * @return \Servicos\FinanceiroBundle\Entity\TmpCircuito 
     */
    public function getIdTmpCircuito()
    {
        return $this->idTmpCircuito;
    }
}
