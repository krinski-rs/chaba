<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaEspecie
 */
class ViaturaEspecie
{
    /**
     * @var integer
     */
    private $viatEspecieId;

    /**
     * @var string
     */
    private $descricao;


    /**
     * Get viatEspecieId
     *
     * @return integer 
     */
    public function getViatEspecieId()
    {
        return $this->viatEspecieId;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return ViaturaEspecie
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
