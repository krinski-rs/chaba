<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentroCustoColaborador
 */
class CentroCustoColaborador
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $colaboradorId;

    /**
     * @var \DateTime
     */
    private $dataInclusao;

    /**
     * @var \DateTime
     */
    private $dataExclusao;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\LumaBundle\Entity\CentroCusto
     */
    private $centroCusto;


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
     * Set colaboradorId
     *
     * @param integer $colaboradorId
     * @return CentroCustoColaborador
     */
    public function setColaboradorId($colaboradorId)
    {
        $this->colaboradorId = $colaboradorId;

        return $this;
    }

    /**
     * Get colaboradorId
     *
     * @return integer 
     */
    public function getColaboradorId()
    {
        return $this->colaboradorId;
    }

    /**
     * Set dataInclusao
     *
     * @param \DateTime $dataInclusao
     * @return CentroCustoColaborador
     */
    public function setDataInclusao($dataInclusao)
    {
        $this->dataInclusao = $dataInclusao;

        return $this;
    }

    /**
     * Get dataInclusao
     *
     * @return \DateTime 
     */
    public function getDataInclusao()
    {
        return $this->dataInclusao;
    }

    /**
     * Set dataExclusao
     *
     * @param \DateTime $dataExclusao
     * @return CentroCustoColaborador
     */
    public function setDataExclusao($dataExclusao)
    {
        $this->dataExclusao = $dataExclusao;

        return $this;
    }

    /**
     * Get dataExclusao
     *
     * @return \DateTime 
     */
    public function getDataExclusao()
    {
        return $this->dataExclusao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return CentroCustoColaborador
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

    /**
     * Set centroCusto
     *
     * @param \Servicos\LumaBundle\Entity\CentroCusto $centroCusto
     * @return CentroCustoColaborador
     */
    public function setCentroCusto(\Servicos\LumaBundle\Entity\CentroCusto $centroCusto = null)
    {
        $this->centroCusto = $centroCusto;

        return $this;
    }

    /**
     * Get centroCusto
     *
     * @return \Servicos\LumaBundle\Entity\CentroCusto 
     */
    public function getCentroCusto()
    {
        return $this->centroCusto;
    }
}
