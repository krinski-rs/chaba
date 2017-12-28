<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PopsCache
 *
 * @ORM\Table(name="troubleticket.pops_cache")
 * @ORM\Entity
 */
class PopsCache
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
     * @return PopsCache
     */
    public function setName($name)
    {
        $this->name = (string)$name;

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
