<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popbateria
 */
class Popbateria
{
    /**
     * @var integer
     */
    private $idBaterias;

    /**
     * @var integer
     */
    private $capacidade;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $erro;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $movimentacao;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;


    /**
     * Get idBaterias
     *
     * @return integer 
     */
    public function getIdBaterias()
    {
        return $this->idBaterias;
    }

    /**
     * Set capacidade
     *
     * @param integer $capacidade
     * @return Popbateria
     */
    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;

        return $this;
    }

    /**
     * Get capacidade
     *
     * @return integer 
     */
    public function getCapacidade()
    {
        return $this->capacidade;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     * @return Popbateria
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Popbateria
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Popbateria
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Popbateria
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Popbateria
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set erro
     *
     * @param string $erro
     * @return Popbateria
     */
    public function setErro($erro)
    {
        $this->erro = $erro;

        return $this;
    }

    /**
     * Get erro
     *
     * @return string 
     */
    public function getErro()
    {
        return $this->erro;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Popbateria
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
     * Set movimentacao
     *
     * @param integer $movimentacao
     * @return Popbateria
     */
    public function setMovimentacao($movimentacao)
    {
        $this->movimentacao = $movimentacao;

        return $this;
    }

    /**
     * Get movimentacao
     *
     * @return integer 
     */
    public function getMovimentacao()
    {
        return $this->movimentacao;
    }

    /**
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return Popbateria
     */
    public function setIdPop(\Servicos\LumaBundle\Entity\Pop $idPop = null)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return \Servicos\LumaBundle\Entity\Pop 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }
}
