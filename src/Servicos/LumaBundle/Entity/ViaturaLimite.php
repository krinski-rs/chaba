<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaLimite
 */
class ViaturaLimite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $limite;

    /**
     * @var integer
     */
    private $author;

    /**
     * @var \DateTime
     */
    private $dateRecord;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viatura;


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
     * Set limite
     *
     * @param string $limite
     * @return ViaturaLimite
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }

    /**
     * Get limite
     *
     * @return string 
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return ViaturaLimite
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set dateRecord
     *
     * @param \DateTime $dateRecord
     * @return ViaturaLimite
     */
    public function setDateRecord($dateRecord)
    {
        $this->dateRecord = $dateRecord;

        return $this;
    }

    /**
     * Get dateRecord
     *
     * @return \DateTime 
     */
    public function getDateRecord()
    {
        return $this->dateRecord;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return ViaturaLimite
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set viatura
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viatura
     * @return ViaturaLimite
     */
    public function setViatura(\Servicos\LumaBundle\Entity\Viatura $viatura = null)
    {
        $this->viatura = $viatura;

        return $this;
    }

    /**
     * Get viatura
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViatura()
    {
        return $this->viatura;
    }
}
