<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidaderesponsavel
 */
class Unidaderesponsavel
{
    /**
     * @var integer
     */
    private $unidrespCodigoid;

    /**
     * @var \DateTime
     */
    private $unidrespDatacadastro;

    /**
     * @var integer
     */
    private $caduserCodigoid;

    /**
     * @var boolean
     */
    private $unidrespDigest;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get unidrespCodigoid
     *
     * @return integer 
     */
    public function getUnidrespCodigoid()
    {
        return $this->unidrespCodigoid;
    }

    /**
     * Set unidrespDatacadastro
     *
     * @param \DateTime $unidrespDatacadastro
     * @return Unidaderesponsavel
     */
    public function setUnidrespDatacadastro($unidrespDatacadastro)
    {
        $this->unidrespDatacadastro = $unidrespDatacadastro;

        return $this;
    }

    /**
     * Get unidrespDatacadastro
     *
     * @return \DateTime 
     */
    public function getUnidrespDatacadastro()
    {
        return $this->unidrespDatacadastro;
    }

    /**
     * Set caduserCodigoid
     *
     * @param integer $caduserCodigoid
     * @return Unidaderesponsavel
     */
    public function setCaduserCodigoid($caduserCodigoid)
    {
        $this->caduserCodigoid = $caduserCodigoid;

        return $this;
    }

    /**
     * Get caduserCodigoid
     *
     * @return integer 
     */
    public function getCaduserCodigoid()
    {
        return $this->caduserCodigoid;
    }

    /**
     * Set unidrespDigest
     *
     * @param boolean $unidrespDigest
     * @return Unidaderesponsavel
     */
    public function setUnidrespDigest($unidrespDigest)
    {
        $this->unidrespDigest = $unidrespDigest;

        return $this;
    }

    /**
     * Get unidrespDigest
     *
     * @return boolean 
     */
    public function getUnidrespDigest()
    {
        return $this->unidrespDigest;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Unidaderesponsavel
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
}
