<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpContaCriada
 */
class TmpContaCriada
{
    /**
     * @var integer
     */
    private $idTmpContaCriada;

    /**
     * @var string
     */
    private $ramoAtividade;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $porte;

    /**
     * @var string
     */
    private $tipoPessoa;

    /**
     * @var integer
     */
    private $contaCriada;

    /**
     * @var string
     */
    private $gc;

    /**
     * @var string
     */
    private $canalVenda;

    /**
     * @var integer
     */
    private $cid;


    /**
     * Get idTmpContaCriada
     *
     * @return integer 
     */
    public function getIdTmpContaCriada()
    {
        return $this->idTmpContaCriada;
    }

    /**
     * Set ramoAtividade
     *
     * @param string $ramoAtividade
     * @return TmpContaCriada
     */
    public function setRamoAtividade($ramoAtividade)
    {
        $this->ramoAtividade = $ramoAtividade;

        return $this;
    }

    /**
     * Get ramoAtividade
     *
     * @return string 
     */
    public function getRamoAtividade()
    {
        return $this->ramoAtividade;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return TmpContaCriada
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
     * Set estado
     *
     * @param string $estado
     * @return TmpContaCriada
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
     * Set cidade
     *
     * @param string $cidade
     * @return TmpContaCriada
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
     * Set cnpj
     *
     * @param string $cnpj
     * @return TmpContaCriada
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set porte
     *
     * @param string $porte
     * @return TmpContaCriada
     */
    public function setPorte($porte)
    {
        $this->porte = $porte;

        return $this;
    }

    /**
     * Get porte
     *
     * @return string 
     */
    public function getPorte()
    {
        return $this->porte;
    }

    /**
     * Set tipoPessoa
     *
     * @param string $tipoPessoa
     * @return TmpContaCriada
     */
    public function setTipoPessoa($tipoPessoa)
    {
        $this->tipoPessoa = $tipoPessoa;

        return $this;
    }

    /**
     * Get tipoPessoa
     *
     * @return string 
     */
    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    /**
     * Set contaCriada
     *
     * @param integer $contaCriada
     * @return TmpContaCriada
     */
    public function setContaCriada($contaCriada)
    {
        $this->contaCriada = $contaCriada;

        return $this;
    }

    /**
     * Get contaCriada
     *
     * @return integer 
     */
    public function getContaCriada()
    {
        return $this->contaCriada;
    }

    /**
     * Set gc
     *
     * @param string $gc
     * @return TmpContaCriada
     */
    public function setGc($gc)
    {
        $this->gc = $gc;

        return $this;
    }

    /**
     * Get gc
     *
     * @return string 
     */
    public function getGc()
    {
        return $this->gc;
    }

    /**
     * Set canalVenda
     *
     * @param string $canalVenda
     * @return TmpContaCriada
     */
    public function setCanalVenda($canalVenda)
    {
        $this->canalVenda = $canalVenda;

        return $this;
    }

    /**
     * Get canalVenda
     *
     * @return string 
     */
    public function getCanalVenda()
    {
        return $this->canalVenda;
    }

    /**
     * Set cid
     *
     * @param integer $cid
     * @return TmpContaCriada
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return integer 
     */
    public function getCid()
    {
        return $this->cid;
    }
}
