<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpAtributo
 */
class TmpAtributo
{
    /**
     * @var integer
     */
    private $idTmpAtributo;

    /**
     * @var string
     */
    private $colunaCsv;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\TmpPonta
     */
    private $idTmpPonta;


    /**
     * Get idTmpAtributo
     *
     * @return integer 
     */
    public function getIdTmpAtributo()
    {
        return $this->idTmpAtributo;
    }

    /**
     * Set colunaCsv
     *
     * @param string $colunaCsv
     * @return TmpAtributo
     */
    public function setColunaCsv($colunaCsv)
    {
        $this->colunaCsv = $colunaCsv;

        return $this;
    }

    /**
     * Get colunaCsv
     *
     * @return string 
     */
    public function getColunaCsv()
    {
        return $this->colunaCsv;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return TmpAtributo
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
     * Set idTmpPonta
     *
     * @param \Servicos\FinanceiroBundle\Entity\TmpPonta $idTmpPonta
     * @return TmpAtributo
     */
    public function setIdTmpPonta(\Servicos\FinanceiroBundle\Entity\TmpPonta $idTmpPonta = null)
    {
        $this->idTmpPonta = $idTmpPonta;

        return $this;
    }

    /**
     * Get idTmpPonta
     *
     * @return \Servicos\FinanceiroBundle\Entity\TmpPonta 
     */
    public function getIdTmpPonta()
    {
        return $this->idTmpPonta;
    }
}
