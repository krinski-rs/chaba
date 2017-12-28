<?php

namespace TroubleticketBundle\Entity {
    use Doctrine\ORM\Mapping as ORM;
    /**
     * Entidade de mapeamento para os contadores
     * 
     * @ORM\Entity
     * @ORM\Table(name="troubleticket.time_counters")
     */
    class TimeCounters {
        /**
         * Identificador interno gerado automáticamente
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
         * Boletim vinculado
         * 
         * @var Reports
         * @access protected
         * 
         * @ORM\ManyToOne(targetEntity="Reports", inversedBy="time_counters")
         * @ORM\JoinColumn(name="report_id",referencedColumnName="id")
         */
        protected $report;

        /**
         * Identificador do boletim
         * 
         * @var integer
         * @access protected
         * 
         * @ORM\Column(type="integer")
         */
        protected $report_id;

        /**
         * Status do boletim
         * 
         * @var integer
         * @access protected
         * 
         * @ORM\Column(type="integer")
         */
        protected $report_status;


        /**
         * Identificador do subcaso
         * 
         * @var integer
         * @access protected
         * 
         * @ORM\Column(type="integer")
         */
        protected $subcase_id;
        /**
         * Data inicial
         * 
         * @var DateTime
         * @access protected
         * 
         * @ORM\Column(type="datetime")
         */
        protected $initial_date;
        /**
         * Data final
         * 
         * @var DateTime
         * @access protected
         * 
         * @ORM\Column(type="datetime")
         */
        protected $final_date;
        /**
         * Fila em que o boletim está
         * 
         * @var integer
         * @access protected
         * 
         * @ORM\Column(type="integer")
         */
        protected $stack;
        /**
         * Status do subcaso
         * 
         * @var integer
         * @access protected
         * 
         * @ORM\Column(type="integer")
         */
        protected $subcase_status;

        /**
         * Subcaso relacionado
         * 
         * @var Subcases
         * @access protected
         * 
         * @ORM\ManyToOne(targetEntity="Subcases", inversedBy="timecounters")
         * @ORM\JoinColumn(name="subcase_id",referencedColumnName="id")
         */
        protected $subcase;

        /**
         * Retorna o identificador
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
         * @return TimeCounters
         */
        public function setSubcaseId($subcaseId)
        {
            $this->subcase_id = $subcaseId;

            return $this;
        }

        /**
         * Define o subcaso
         * 
         * @param type $subcase 
         * @access public
         * @return type
         */
        public function setSubcase($subcase)
        {
        	$this->subcase = $subcase;

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
         * Retorna o subcaso
         * 
         * @access public
         * @return type
         */
        public function getSubcase()
        {
            return $this->subcase;
        }

        /**
         * Define a data inicial
         *
         * @param \DateTime $initialDate
         * @access public
         * @return TimeCounters
         */
        public function setInitialDate($initialDate)
        {
            $this->initial_date = $initialDate;

            return $this;
        }

        /**
         * Retorna a data inicial
         *
         * @access public
         * @return \DateTime
         */
        public function getInitialDate()
        {
            return $this->initial_date;
        }

        /**
         * Define a data final
         *
         * @param \DateTime $finalDate
         * @access public
         * @return TimeCounters
         */
        public function setFinalDate($finalDate)
        {
            $this->final_date = $finalDate;

            return $this;
        }

        /**
         * Retorna data final
         *
         * @access public
         * @return \DateTime
         */
        public function getFinalDate()
        {
            return $this->final_date;
        }

        /**
         * Define a file em que o boletim está
         *
         * @param integer $stack
         * @access public
         * @return TimeCounters
         */
        public function setStack($stack)
        {
            $this->stack = $stack;

            return $this;
        }

        /**
         * Retorna a fila em que o boletim está
         *
         * @access public
         * @return integer
         */
        public function getStack()
        {
            return $this->stack;
        }

        /**
         * Define o status do subcaso
         *
         * @param integer $subcaseStatus
         * @access public
         * @return TimeCounters
         */
        public function setSubcaseStatus($subcaseStatus)
        {
            $this->subcase_status = $subcaseStatus;

            return $this;
        }

        /**
         * Retorna o status do subcaso
         *
         * @access public
         * @return integer
         */
        public function getSubcaseStatus()
        {
            return $this->subcase_status;
        }

        /**
         * Define o boletim
         *
         * @param \TroubleticketBundle\Entity\Reports $report
         * @access public
         * @return TimeCounters
         */
        public function setReport(\TroubleticketBundle\Entity\Reports $report = null)
        {
            $this->report = $report;
            $this->report_status = $report->getStatus();

            return $this;
        }

        /**
         * Retorna o boletim
         *
         * @access public
         * @return \TroubleticketBundle\Entity\Reports
         */
        public function getReport()
        {
            return $this->report;
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
    }
}
