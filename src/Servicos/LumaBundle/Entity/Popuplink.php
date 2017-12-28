<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popuplink
 */
class Popuplink
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $origem;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $destino;


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
     * Set origem
     *
     * @param \Servicos\LumaBundle\Entity\Pop $origem
     * @return Popuplink
     */
    public function setOrigem(\Servicos\LumaBundle\Entity\Pop $origem = null)
    {
        $this->origem = $origem;

        return $this;
    }

    /**
     * Get origem
     *
     * @return \Servicos\LumaBundle\Entity\Pop 
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * Set destino
     *
     * @param \Servicos\LumaBundle\Entity\Pop $destino
     * @return Popuplink
     */
    public function setDestino(\Servicos\LumaBundle\Entity\Pop $destino = null)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return \Servicos\LumaBundle\Entity\Pop 
     */
    public function getDestino()
    {
        return $this->destino;
    }
}
