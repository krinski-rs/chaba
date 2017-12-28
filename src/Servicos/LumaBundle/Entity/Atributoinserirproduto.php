<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributoinserirproduto
 */
class Atributoinserirproduto
{
    /**
     * @var integer
     */
    private $atriinseCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Atributo
     */
    private $atriCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Inserirproduto
     */
    private $inseCodigoid;


    /**
     * Get atriinseCodigoid
     *
     * @return integer 
     */
    public function getAtriinseCodigoid()
    {
        return $this->atriinseCodigoid;
    }

    /**
     * Set atriCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Atributo $atriCodigoid
     * @return Atributoinserirproduto
     */
    public function setAtriCodigoid(\Servicos\LumaBundle\Entity\Atributo $atriCodigoid = null)
    {
        $this->atriCodigoid = $atriCodigoid;

        return $this;
    }

    /**
     * Get atriCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Atributo 
     */
    public function getAtriCodigoid()
    {
        return $this->atriCodigoid;
    }

    /**
     * Set inseCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Inserirproduto $inseCodigoid
     * @return Atributoinserirproduto
     */
    public function setInseCodigoid(\Servicos\LumaBundle\Entity\Inserirproduto $inseCodigoid = null)
    {
        $this->inseCodigoid = $inseCodigoid;

        return $this;
    }

    /**
     * Get inseCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Inserirproduto 
     */
    public function getInseCodigoid()
    {
        return $this->inseCodigoid;
    }
}
