<?php

namespace TroubleticketBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

use DateTime;
/**
 * Entidade de mapeamento do histórico dos boletins
 *
 * @ORM\Entity
 * @ORM\Table(name="troubleticket.history")
 */
class History {
    /**
     * Identificador interno do histórico gerado automaticamente
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * Boletim o qual o histórico pertence
     *
     * @var Reports
     * @access protected
     *
     * @ORM\OneToOne(targetEntity="Reports")
     * @ORM\JoinColumn(name="report_id",referencedColumnName="id")
     */
    protected $report_id;
    /**
     * Identificador do subcaso relacionado ao boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $subcase_id;
    /**
     * Comentário do que é realizado para gerar histórico
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="text")
     */
    protected $comment;
    /**
     * Data de quando foi gerado o histórico
     *
     * @var DateTime
     * @access protected
     *
     * @ORM\Column(type="datetime")
     */
    protected $date;
    /**
     * Motivo pelo qual está realizando a ação que gera o histórico
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="text")
     */
    protected $reason;
    /**
     * Level do suporte
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $support_level;
    /**
     * Identificador do status do boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $report_status;
    /**
     * Identificador do usuário que realizou a ação que gerou o histórico
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $usuario;

    /**
     *  Nome do usuário que realizou a ação que gerou o histórico
     *
     * @var string
     * @access protected
     */
    protected $username;

    /**
     * Retorna o Identificador
     *
     * @access public
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Define o identificador do subcaso
     *
     * @param integer $subcaseId
     * @access public
     * @return History
     */
    public function setSubcaseId($subcaseId)
    {
        $this->subcase_id = $subcaseId;

        return $this;
    }

    /**
     * Retorna o identificador do subcaso
     *
     * @access public
     * @return integer
     */
    public function getSubcaseId()
    {
        return $this->subcase_id;
    }

    /**
     * Define o nome do usuário
     *
     * @param string $username
     * @access public
     * @return History
     */
    public function setUserName($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Retorna o nome do usuário
     *
     * @access public
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Define o comentário
     *
     * @param string $comment
     * @access public
     * @return History
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Retorna o comentário
     *
     * @access public
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Define a data do histórico
     *
     * @param \DateTime $date
     * @access public
     * @return History
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Retorna a data do histórico
     *
     * @access public
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Define o motivo
     *
     * @param string $reason
     * @access public
     * @return History
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Retorna o motivo
     *
     * @access public
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Define o level de suporte
     *
     * @param string $supportLevel
     * @access public
     * @return History
     */
    public function setSupportLevel($supportLevel)
    {
        $this->support_level = $supportLevel;

        return $this;
    }

    /**
     * Retorna o level de suporte
     *
     * @access public
     * @return string
     */
    public function getSupportLevel()
    {
        return $this->support_level;
    }

    /**
     * Define o status do boletim
     *
     * @param integer $reportStatus
     * @access public
     * @return History
     */
    public function setReportStatus($reportStatus)
    {
        $this->report_status = $reportStatus;

        return $this;
    }

    /**
     * Retorna o status do boletim
     *
     * @access public
     * @return integer
     */
    public function getReportStatus()
    {
        return $this->report_status;
    }

    /**
     * Define o identificador do usuário
     *
     * @param string $usuario
     * @access public
     * @return History
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Retorna o identificador do usuário
     *
     * @access public
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Define o boletim o qual o histórico pertence
     *
     * @param \TroubleticketBundle\Entity\Reports $reportId
     * @access public
     * @return History
     */
    public function setReportId(\TroubleticketBundle\Entity\Reports $reportId = null)
    {
        $this->report_id = $reportId;

        return $this;
    }

    /**
     * Retorna o boletim o qual o histórico pertence
     *
     * @access public
     * @return \TroubleticketBundle\Entity\Reports
     */
    public function getReportId()
    {
        return $this->report_id;
    }

    /**
     * Retorna o status do boletim traduzido para o usuário
     *
     * @access public
     * @return string
     */
    public function getStatusReportString()
    {
        return Reports::translateStatusCode($this->getReportStatus());
    }

    /**
     * Retorna a diferença de tempo entre a data atual e a data do comentário
     *
     * @access public
     * @return integer
     */
     public function getTimeDiffHistory()
     {
        $historyDate = $this->getDate();
        $currentDate = new DateTime;

        return $currentDate->getTimeStamp() - $historyDate->getTimeStamp();
     }
}
