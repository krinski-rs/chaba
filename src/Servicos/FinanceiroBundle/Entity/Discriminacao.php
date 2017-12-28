<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discriminacao
 */
class Discriminacao
{
    /**
     * @var integer
     */
    private $idDiscriminacao;

    /**
     * @var string
     */
    private $descricao;


    /**
     * Get idDiscriminacao
     *
     * @return integer 
     */
    public function getIdDiscriminacao()
    {
        return $this->idDiscriminacao;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Discriminacao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
}
