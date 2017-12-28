<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class TipoAprovacao 
{
	 /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $descricao
     */
    private $descricao;

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
     * Set descricao
     *
     * @param text $descricao
     * @return TipoAprovacao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Get descricao
     *
     * @return text 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
}