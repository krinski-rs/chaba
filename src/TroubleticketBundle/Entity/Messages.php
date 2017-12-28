<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="troubleticket.messages")
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="viewed_by", type="integer", nullable=true)
     */
    private $viewedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_repository", type="string")
     */
    private $referenceRepository;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference_id", type="string")
     */
    private $referenceId;

    /**
     * Boletim a qual pertence
     *
     * @var Reports
     * @access protected
     *
     * @ORM\ManyToOne(targetEntity="Reports")
     * @ORM\JoinColumn(name="report_id",referencedColumnName="id")
     */
    protected $report;


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
     * Set message
     *
     * @param string $message
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Messages
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set report
     *
     * @param \TroubleticketBundle\Entity\Reports $report
     * @return Messages
     */
    public function setReport(\TroubleticketBundle\Entity\Reports $report = null)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return \TroubleticketBundle\Entity\Reports 
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Messages
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set referenceRepository
     *
     * @param string $referenceRepository
     * @return Messages
     */
    public function setReferenceRepository($referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;

        return $this;
    }

    /**
     * Get referenceRepository
     *
     * @return string 
     */
    public function getReferenceRepository()
    {
        return $this->referenceRepository;
    }

    /**
     * Set referenceId
     *
     * @param string $referenceId
     * @return Messages
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * Get referenceId
     *
     * @return string 
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }


    public function isFromClient()
    {
        if ($this->referenceRepository == 'ServicosGcdbBundle:CadUsers') {
            return true;
        }

        return false;
    }

    /**
     * Set viewedBy
     *
     * @param integer $viewedBy
     * @return Messages
     */
    public function setViewedBy($viewedBy)
    {
        $this->viewedBy = $viewedBy;

        return $this;
    }

    /**
     * Get viewedBy
     *
     * @return integer 
     */
    public function getViewedBy()
    {
        return $this->viewedBy;
    }
}
