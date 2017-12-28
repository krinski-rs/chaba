<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoquehistorico
 */
class Estoquehistorico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idResponsavel;

    /**
     * @var \DateTime
     */
    private $dataCrawler;

    /**
     * @var integer
     */
    private $cicloCrawler;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoque
     */
    private $idEstoque;


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
     * Set idResponsavel
     *
     * @param integer $idResponsavel
     * @return Estoquehistorico
     */
    public function setIdResponsavel($idResponsavel)
    {
        $this->idResponsavel = $idResponsavel;

        return $this;
    }

    /**
     * Get idResponsavel
     *
     * @return integer 
     */
    public function getIdResponsavel()
    {
        return $this->idResponsavel;
    }

    /**
     * Set dataCrawler
     *
     * @param \DateTime $dataCrawler
     * @return Estoquehistorico
     */
    public function setDataCrawler($dataCrawler)
    {
        $this->dataCrawler = $dataCrawler;

        return $this;
    }

    /**
     * Get dataCrawler
     *
     * @return \DateTime 
     */
    public function getDataCrawler()
    {
        return $this->dataCrawler;
    }

    /**
     * Set cicloCrawler
     *
     * @param integer $cicloCrawler
     * @return Estoquehistorico
     */
    public function setCicloCrawler($cicloCrawler)
    {
        $this->cicloCrawler = $cicloCrawler;

        return $this;
    }

    /**
     * Get cicloCrawler
     *
     * @return integer 
     */
    public function getCicloCrawler()
    {
        return $this->cicloCrawler;
    }

    /**
     * Set idEstoque
     *
     * @param \Servicos\LumaBundle\Entity\Estoque $idEstoque
     * @return Estoquehistorico
     */
    public function setIdEstoque(\Servicos\LumaBundle\Entity\Estoque $idEstoque = null)
    {
        $this->idEstoque = $idEstoque;

        return $this;
    }

    /**
     * Get idEstoque
     *
     * @return \Servicos\LumaBundle\Entity\Estoque 
     */
    public function getIdEstoque()
    {
        return $this->idEstoque;
    }
}
