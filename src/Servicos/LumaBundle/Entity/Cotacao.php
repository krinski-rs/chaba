<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacao
 */
class Cotacao
{
    /**
     * @var integer
     */
    private $cotaCodigoid;

    /**
     * @var integer
     */
    private $autusuarioCodigoid;

    /**
     * @var \DateTime
     */
    private $cotaDatainc;

    /**
     * @var \DateTime
     */
    private $cotaAbertura;

    /**
     * @var \DateTime
     */
    private $cotaFechamento;

    /**
     * @var string
     */
    private $cotaDescricao;

    /**
     * @var string
     */
    private $cotaDescricaofornecedor;

    /**
     * @var string
     */
    private $cotaEnderecoentrega;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;


    /**
     * Get cotaCodigoid
     *
     * @return integer 
     */
    public function getCotaCodigoid()
    {
        return $this->cotaCodigoid;
    }

    /**
     * Set autusuarioCodigoid
     *
     * @param integer $autusuarioCodigoid
     * @return Cotacao
     */
    public function setAutusuarioCodigoid($autusuarioCodigoid)
    {
        $this->autusuarioCodigoid = $autusuarioCodigoid;

        return $this;
    }

    /**
     * Get autusuarioCodigoid
     *
     * @return integer 
     */
    public function getAutusuarioCodigoid()
    {
        return $this->autusuarioCodigoid;
    }

    /**
     * Set cotaDatainc
     *
     * @param \DateTime $cotaDatainc
     * @return Cotacao
     */
    public function setCotaDatainc($cotaDatainc)
    {
        $this->cotaDatainc = $cotaDatainc;

        return $this;
    }

    /**
     * Get cotaDatainc
     *
     * @return \DateTime 
     */
    public function getCotaDatainc()
    {
        return $this->cotaDatainc;
    }

    /**
     * Set cotaAbertura
     *
     * @param \DateTime $cotaAbertura
     * @return Cotacao
     */
    public function setCotaAbertura($cotaAbertura)
    {
        $this->cotaAbertura = $cotaAbertura;

        return $this;
    }

    /**
     * Get cotaAbertura
     *
     * @return \DateTime 
     */
    public function getCotaAbertura()
    {
        return $this->cotaAbertura;
    }

    /**
     * Set cotaFechamento
     *
     * @param \DateTime $cotaFechamento
     * @return Cotacao
     */
    public function setCotaFechamento($cotaFechamento)
    {
        $this->cotaFechamento = $cotaFechamento;

        return $this;
    }

    /**
     * Get cotaFechamento
     *
     * @return \DateTime 
     */
    public function getCotaFechamento()
    {
        return $this->cotaFechamento;
    }

    /**
     * Set cotaDescricao
     *
     * @param string $cotaDescricao
     * @return Cotacao
     */
    public function setCotaDescricao($cotaDescricao)
    {
        $this->cotaDescricao = $cotaDescricao;

        return $this;
    }

    /**
     * Get cotaDescricao
     *
     * @return string 
     */
    public function getCotaDescricao()
    {
        return $this->cotaDescricao;
    }

    /**
     * Set cotaDescricaofornecedor
     *
     * @param string $cotaDescricaofornecedor
     * @return Cotacao
     */
    public function setCotaDescricaofornecedor($cotaDescricaofornecedor)
    {
        $this->cotaDescricaofornecedor = $cotaDescricaofornecedor;

        return $this;
    }

    /**
     * Get cotaDescricaofornecedor
     *
     * @return string 
     */
    public function getCotaDescricaofornecedor()
    {
        return $this->cotaDescricaofornecedor;
    }

    /**
     * Set cotaEnderecoentrega
     *
     * @param string $cotaEnderecoentrega
     * @return Cotacao
     */
    public function setCotaEnderecoentrega($cotaEnderecoentrega)
    {
        $this->cotaEnderecoentrega = $cotaEnderecoentrega;

        return $this;
    }

    /**
     * Get cotaEnderecoentrega
     *
     * @return string 
     */
    public function getCotaEnderecoentrega()
    {
        return $this->cotaEnderecoentrega;
    }

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Cotacao
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }
}
