<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViatCorPredominante
 */
class ViatCorPredominante
{
    /**
     * @var integer
     */
    private $idViatCorPredominante;

    /**
     * @var string
     */
    private $descricao;


    /**
     * Get idViatCorPredominante
     *
     * @return integer 
     */
    public function getIdViatCorPredominante()
    {
        return $this->idViatCorPredominante;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return ViatCorPredominante
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
