<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Birthday
 */
class Birthday
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateSend;

    /**
     * @var \DateTime
     */
    private $dateSent;

    /**
     * @var integer
     */
    private $active;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;


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
     * Set dateSend
     *
     * @param \DateTime $dateSend
     * @return Birthday
     */
    public function setDateSend($dateSend)
    {
        $this->dateSend = $dateSend;

        return $this;
    }

    /**
     * Get dateSend
     *
     * @return \DateTime 
     */
    public function getDateSend()
    {
        return $this->dateSend;
    }

    /**
     * Set dateSent
     *
     * @param \DateTime $dateSent
     * @return Birthday
     */
    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    /**
     * Get dateSent
     *
     * @return \DateTime 
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Birthday
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return Birthday
     */
    public function setCadUsers(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers = null)
    {
        $this->cadUsers = $cadUsers;

        return $this;
    }

    /**
     * Get cadUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers()
    {
        return $this->cadUsers;
    }
}
