<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CondicaoPagamento
 */
class CondicaoPagamento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $condpagCodigo;

    /**
     * @var string
     */
    private $condpagDescricao;


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
     * Set condpagCodigo
     *
     * @param string $condpagCodigo
     * @return CondicaoPagamento
     */
    public function setCondpagCodigo($condpagCodigo)
    {
        $this->condpagCodigo = $condpagCodigo;

        return $this;
    }

    /**
     * Get condpagCodigo
     *
     * @return string 
     */
    public function getCondpagCodigo()
    {
        return $this->condpagCodigo;
    }

    /**
     * Set condpagDescricao
     *
     * @param string $condpagDescricao
     * @return CondicaoPagamento
     */
    public function setCondpagDescricao($condpagDescricao)
    {
        $this->condpagDescricao = $condpagDescricao;

        return $this;
    }

    /**
     * Get condpagDescricao
     *
     * @return string 
     */
    public function getCondpagDescricao()
    {
        return $this->condpagDescricao;
    }
}
