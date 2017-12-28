<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsConfig
 */
class TicketsConfig
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $emailTo;

    /**
     * @var \DateTime
     */
    private $addDate;


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
     * Set emailTo
     *
     * @param string $emailTo
     * @return TicketsConfig
     */
    public function setEmailTo($emailTo)
    {
        $this->emailTo = $emailTo;

        return $this;
    }

    /**
     * Get emailTo
     *
     * @return string 
     */
    public function getEmailTo()
    {
        return $this->emailTo;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     * @return TicketsConfig
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime 
     */
    public function getAddDate()
    {
        return $this->addDate;
    }
}
