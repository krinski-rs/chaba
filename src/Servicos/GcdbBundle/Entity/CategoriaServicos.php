<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaServicos
 */
class CategoriaServicos
{
    /**
     * @var integer
     */
    private $categoriaid;

    /**
     * @var integer
     */
    private $servicoid;


    /**
     * Set categoriaid
     *
     * @param integer $categoriaid
     * @return CategoriaServicos
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;

        return $this;
    }

    /**
     * Get categoriaid
     *
     * @return integer 
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * Set servicoid
     *
     * @param integer $servicoid
     * @return CategoriaServicos
     */
    public function setServicoid($servicoid)
    {
        $this->servicoid = $servicoid;

        return $this;
    }

    /**
     * Get servicoid
     *
     * @return integer 
     */
    public function getServicoid()
    {
        return $this->servicoid;
    }
}
