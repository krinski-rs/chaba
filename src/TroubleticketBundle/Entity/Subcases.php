<?php

namespace TroubleticketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

use DateTime;

/**
 * Entidade de mapeamento dos subcasos do boletim
 *
 * @ORM\Table(name="troubleticket.subcases")
 * @ORM\Entity
 */
class Subcases
{
	const EM_ATENDIMENTO 		 = 0;
	const PAUSADO 				 = 1;
	const FECHADO 				 = 2;
	const EM_DESLOCAMENTO 		 = 3;
	const EM_ATENDIMENTO_INFRA 	 = 4;
	const EM_ATENDIMENTO_CAMPO 	 = 5;
	const EM_ATENDIMENTO_CLIENTE = 6;

	const TYPE_COC 		 		 = 1;
	const TYPE_MANTAINER 		 = 2;
	const SUBCASO_TT    		 = 'Subcaso TT';
	
    /**
     * Identificador interno gerado automáticamente
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Equipe encaminhada
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(name="team", type="string")
     */
    protected $team;

    /**
     * Previsão
     *
     * @var DateTime
     * @access protected
     *
     * @ORM\Column(name="forecast", type="time")
     */
    protected $forecast;

    /**
     * Identificador do status
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(name="status", type="integer")
     */
    protected $status;

    /**
     * Identificador do tipo
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(name="type", type="integer")
     */
    protected $type;

	/**
     * Boletim a qual pertence
     *
     * @var Reports
     * @access protected
     *
     * @ORM\OneToOne(targetEntity="Reports")
     * @ORM\JoinColumn(name="report_id",referencedColumnName="id")
     */
    protected $report_id;

    /**
     * Contadores de tempos
     *
     * @var TimeCounters
     * @access protected
     *
     * @ORM\OneToMany(targetEntity="TimeCounters", mappedBy="subcase",fetch="EXTRA_LAZY")
     */
    protected $timecounters;

    /**
     * Código de exibição do Subcaso
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * Lista de materiais
     *
     * @var text
     * @access protected
     *
     * @ORM\Column(name="list_of_materials",type="text")
     */
    protected $materials;
    
    /**
     * Id da atividade criada no TOA
     *
     * @var int
     * @access protected
     *
     * @ORM\Column(name="id_activity",type="integer")
     */
    protected $id_activity;

    /**
     * Tipo de atividade que o técnico irá executar
     *
     * @var int
     * @access protected
     *
     * @ORM\Column(name="activity_type",type="integer")
     */
    protected $activity_type;

    /**
     * Método Construtor
     */
    public function __construct()
    {
        $this->timecounters = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Define a equipe
     *
     * @param string $team
     * @access public
     * @return Subcases
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Retorna a equipe
     *
     * @access public
     * @return string
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Define a previsão
     *
     * @param \DateTime $forecast
     * @access public
     * @return Subcases
     */
    public function setForecast($forecast)
    {
        $this->forecast = $forecast;

        return $this;
    }

    /**
     * Retorna a previsão
     *
     * @access public
     * @return \DateTime
     */
    public function getForecast()
    {
        return $this->forecast;
    }

    /**
     * Define o status
     *
     * @param integer $status
     * @access public
     * @return Subcases
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Retorna o status
     *
     * @access public
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Define o tipo
     *
     * @param integer $type
     * @access public
     * @return Subcases
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Retorna o tipo
     *
     * @access public
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Define o boletim a qual pertence
     *
     * @param \TroubleticketBundle\Entity\Reports $reportId
     * @access public
     * @return Subcases
     */
    public function setReportId(\TroubleticketBundle\Entity\Reports $reportId = null)
    {
        $this->report_id = $reportId;

        return $this;
    }

    /**
     * Retorna o boletim a qual pertence
     *
     * @access public
     * @return \TroubleticketBundle\Entity\Reports
     */
    public function getReportId()
    {
        return $this->report_id;
    }


    /**
     * Retorna os contadores
     *
     * @access public
     * @return ArrayCollection
     */
    public function getTimeCounters()
    {
    	return $this->timecounters;
    }

    /**
     * Seta um valor ao código de exibição do Subcaso.
     *
     * @param string $code
     * @return Subcases
     */
     public function setCode($code){
        $this->code = $code;

        return $this;
    }

    /**
     * Retorna o cód. de exibição do subcaso.
     *
     * @return string
     */
     public function getCode(){
        return $this->code;
     }

    /**
     * Seta a lista de materiais.
     *
     * @param text $materials
     * @return Subcases
     */
     public function setMaterials($materials){
        $this->materials = $materials;

        return $this;
    }

    /**
     * Retorna a lista de materiais
     *
     * @return text
     */
     public function getMaterials(){
        return $this->materials;
     }

    /**
     * Retorna o tempo médio de espera
     *
     * @access public
     * @return number|NULL
     */
    public function getTME()
    {
    	$timeCounters = $this->getTimeCounters();
    	$oldestDate = new DateTime("now");
		$lastTimeCounter = null;

    	if(count($timeCounters) > 0){
	    	foreach($timeCounters as $timecounter){
	    		$tcDate = $timecounter->getInitialDate();

		   		if ($tcDate < $oldestDate) {
		   			$oldestDate = $tcDate;
		   		}

		   		if (is_null($lastTimeCounter) || $tcDate > $lastTimeCounter->getInitialDate()) {
		   			$lastTimeCounter = $timecounter;
		   		}
	    	}

	    	$recentDate = $lastTimeCounter->getFinalDate();
	    	if (!$recentDate) {
	    		$recentDate = new DateTime("now");
	    	}

	    	return $recentDate->getTimestamp() - $oldestDate->getTimestamp();
    	}

    	return null;
    }

    /**
     * Retorno o tipo para o usuário visualizar na tela
     *
     * @access public
     * @return string
     */
    public function getTypeString()
    {
    	$type = $this->getType();

    	if ($type == self::TYPE_COC) {
    		$type = "COC";

    	} else if ($type == self::TYPE_MANTAINER) {
    		$type = "MANTAINER";

    	} else {
    		return null;
    	}

    	return $type;
    }

    /**
     * Retorna o último time counter
     *
     * @access public
     * @return TimeCounters
     */
    public function getLastTimeCounter()
    {
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->isNull('final_date'));
        $timeCounters = $this->timecounters->matching($criteria);

        return $timeCounters[0];
    }

    /**
     * Retorna o status para o usuário visualizar na tela
     *
     * @access public
     * @return string
     */
    public function getStatusString()
    {

    	$status = $this->getStatus();
    	if(is_null($status)){
    		return null;
    	}
    	switch ($status) {
    		case static::EM_ATENDIMENTO:
    			$status = 'Em Atendimento';
    			break;
    		case static::PAUSADO:
    			$status = 'Pausado';
    			break;
    		case static::FECHADO:
    			$status = 'Fechado';
    			break;
    		case static::EM_DESLOCAMENTO:
    			$status = 'Em deslocamento';
    			break;
    		case static::EM_ATENDIMENTO_INFRA:
    			$status = 'Em atendimento - Infra';
    			break;
    		case static::EM_ATENDIMENTO_CAMPO:
    			$status = 'Em atendimento - Campo';
    				break;
    		case static::EM_ATENDIMENTO_CLIENTE:
    			$status = 'Em atendimento - Cliente';
    			break;

    	}

    	return $status;
    }
    
    /**
     * Seta o id da tarefa
     *
     * @set IdActitivy
     */
    public function setIdActivity($idActivity){
    	$this->id_activity= $idActivity;
    	
    	return $this;
    }
    
    /**
     * Retorna o id da atividade gravada no TOA
     *
     * @return string
     */
    public function getIdActivity(){
    	return $this->id_activity;
    }

    /**
     * @return int
     */
    public function getActivityType()
    {
        return $this->activity_type;
    }

    /**
     * @param int $activity_type
     */
    public function setActivityType($activity_type)
    {
        $this->activity_type = $activity_type;
    }
}
