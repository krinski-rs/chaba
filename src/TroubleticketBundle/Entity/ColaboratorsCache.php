<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ColaboratorsCache
 *
 * @ORM\Table(name="troubleticket.colaborators_cache")
 * @ORM\Entity
 */
class ColaboratorsCache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Define o identificador
     *
     * @param int $id Identificador
     * @access public
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }


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
     * Set name
     *
     * @param string $name
     * @return ColaboratorsCache
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
