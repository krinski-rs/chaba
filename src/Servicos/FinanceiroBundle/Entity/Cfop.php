<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cfop
 */
class Cfop
{
    /**
     * @var integer
     */
    private $cfopCodigoid;

    /**
     * @var integer
     */
    private $cfopPaicodigoid;

    /**
     * @var string
     */
    private $cfopCfop;

    /**
     * @var string
     */
    private $cfopDescricao;

    /**
     * @var string
     */
    private $cfopAplicacao;


    /**
     * Get cfopCodigoid
     *
     * @return integer 
     */
    public function getCfopCodigoid()
    {
        return $this->cfopCodigoid;
    }

    /**
     * Set cfopPaicodigoid
     *
     * @param integer $cfopPaicodigoid
     * @return Cfop
     */
    public function setCfopPaicodigoid($cfopPaicodigoid)
    {
        $this->cfopPaicodigoid = $cfopPaicodigoid;

        return $this;
    }

    /**
     * Get cfopPaicodigoid
     *
     * @return integer 
     */
    public function getCfopPaicodigoid()
    {
        return $this->cfopPaicodigoid;
    }

    /**
     * Set cfopCfop
     *
     * @param string $cfopCfop
     * @return Cfop
     */
    public function setCfopCfop($cfopCfop)
    {
        $this->cfopCfop = $cfopCfop;

        return $this;
    }

    /**
     * Get cfopCfop
     *
     * @return string 
     */
    public function getCfopCfop()
    {
        return $this->cfopCfop;
    }

    /**
     * Set cfopDescricao
     *
     * @param string $cfopDescricao
     * @return Cfop
     */
    public function setCfopDescricao($cfopDescricao)
    {
        $this->cfopDescricao = $cfopDescricao;

        return $this;
    }

    /**
     * Get cfopDescricao
     *
     * @return string 
     */
    public function getCfopDescricao()
    {
        return $this->cfopDescricao;
    }

    /**
     * Set cfopAplicacao
     *
     * @param string $cfopAplicacao
     * @return Cfop
     */
    public function setCfopAplicacao($cfopAplicacao)
    {
        $this->cfopAplicacao = $cfopAplicacao;

        return $this;
    }

    /**
     * Get cfopAplicacao
     *
     * @return string 
     */
    public function getCfopAplicacao()
    {
        return $this->cfopAplicacao;
    }
}
