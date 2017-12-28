<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessaOrdem
 */
class RemessaOrdem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordem
     */
    private $ordeCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Remessa
     */
    private $rem;


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
     * Set ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return RemessaOrdem
     */
    public function setOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid = null)
    {
        $this->ordeCodigoid = $ordeCodigoid;

        return $this;
    }

    /**
     * Get ordeCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Ordem 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }

    /**
     * Set rem
     *
     * @param \Servicos\LumaBundle\Entity\Remessa $rem
     * @return RemessaOrdem
     */
    public function setRem(\Servicos\LumaBundle\Entity\Remessa $rem = null)
    {
        $this->rem = $rem;

        return $this;
    }

    /**
     * Get rem
     *
     * @return \Servicos\LumaBundle\Entity\Remessa 
     */
    public function getRem()
    {
        return $this->rem;
    }
}
