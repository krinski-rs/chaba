<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TdmEquipamentos
 */
class TdmEquipamentos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $capacidadeSdhPdh;


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
     * @param string $descricao
     * @return TdmEquipamentos
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

    /**
     * Set capacidadeSdhPdh
     *
     * @param string $capacidadeSdhPdh
     * @return TdmEquipamentos
     */
    public function setCapacidadeSdhPdh($capacidadeSdhPdh)
    {
        $this->capacidadeSdhPdh = $capacidadeSdhPdh;

        return $this;
    }

    /**
     * Get capacidadeSdhPdh
     *
     * @return string 
     */
    public function getCapacidadeSdhPdh()
    {
        return $this->capacidadeSdhPdh;
    }
}
