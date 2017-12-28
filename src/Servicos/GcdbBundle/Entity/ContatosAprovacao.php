<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContatosAprovacao
 */
class ContatosAprovacao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var \Servicos\GcdbBundle\Entity\FornecedoresAprovacao
     */
    private $idFornecedor;


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
     * Set tipo
     *
     * @param string $tipo
     * @return ContatosAprovacao
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
     * Set valor
     *
     * @param string $valor
     * @return ContatosAprovacao
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return ContatosAprovacao
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
     * Set idFornecedor
     *
     * @param \Servicos\GcdbBundle\Entity\FornecedoresAprovacao $idFornecedor
     * @return ContatosAprovacao
     */
    public function setIdFornecedor(\Servicos\GcdbBundle\Entity\FornecedoresAprovacao $idFornecedor = null)
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    /**
     * Get idFornecedor
     *
     * @return \Servicos\GcdbBundle\Entity\FornecedoresAprovacao 
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }
}
