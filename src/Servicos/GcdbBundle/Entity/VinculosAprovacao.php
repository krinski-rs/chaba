<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VinculosAprovacao
 */
class VinculosAprovacao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idCategoria;

    /**
     * @var integer
     */
    private $idProduto;

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
     * Set idCategoria
     *
     * @param integer $idCategoria
     * @return VinculosAprovacao
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    /**
     * Get idCategoria
     *
     * @return integer 
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set idProduto
     *
     * @param integer $idProduto
     * @return VinculosAprovacao
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get idProduto
     *
     * @return integer 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set idFornecedor
     *
     * @param \Servicos\GcdbBundle\Entity\FornecedoresAprovacao $idFornecedor
     * @return VinculosAprovacao
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
