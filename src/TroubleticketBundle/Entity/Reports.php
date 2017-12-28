<?php

namespace TroubleticketBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

use TroubleticketBundle\Api;

use DateTime;
use StdClass;

/**
 * Entidade de mapeamento dos boletins
 *
 * @ORM\Entity
 * @ORM\Table(name="troubleticket.reports")
 */
class Reports {

    const INATIVO = -1;
    const EM_ATENDIMENTO = 0;
    const PAUSADO = 1;
    const RESOLVIDO = 2;
    const FECHADO = 3;
    const CANCELADO = 4;

    const TYPE_BA = 1;
    const TYPE_BI = 2;
    const TYPE_BS = 3;

    const STACK_NONE = -1;
    const STACK_SN1 = 1;
    const STACK_SN2 = 2;
    const STACK_SN3 = 4;
    const STACK_ANALISE_PROBLEMAS = 3;
    const STACK_VOZ = 5;

    const TOTALMENTE_INOPERANTE = 1;
    const PARCIALMENTE_INOPERANTE = 2;

    const PHONE_CHANNEL = 1;
    const EMAIL_CHANNEL = 2;
    const APP_CHANNEL   = 3;
    const WEB_CHANNEL   = 4;

    const SYSTEM_TROUBLETICKET = 1;
    const SYSTEM_MOBILE = 2;
    const SYSTEM_CRV = 3;

    /**
     * Identificador interno dos boletins gerado automaticamente
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
     * Identificador do circuito
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $circuit_id;

    /**
     * Boletim que é vinculado a outro boletim
     *
     * @var Reports
     * @access protected
     *
     * @ORM\ManyToOne(targetEntity="Reports", inversedBy="children",fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_id",referencedColumnName="id")
     */
    protected $parent;

    /**
     * Relcionamento inverso do boletim vinculado
     *
     * @var ArrayCollection
     * @access protected
     *
     * @ORM\OneToMany(targetEntity="Reports", mappedBy="parent")
     */
    protected $children;

    /**
     * Identificador do boletim vinculado
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $parent_id;

    /**
     * Designação do circuito
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=20)
     */
    protected $designation;
    /**
     * Data inicial do boletim
     *
     * @var DateTime
     * @access protected
     *
     * @ORM\Column(type="datetime")
     */
    protected $initial_date;
    /**
     * Data final do boletim
     *
     * @var DateTime
     * @access protected
     *
     * @ORM\Column(type="datetime")
     */
    protected $final_date;
    /**
     * Data inicial do boletim
     *
     * @var DateTime
     * @access protected
     *
     * @ORM\Column(type="datetime")
     */
    protected $last_update;
    /**
     * Tipo do boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer",length=20)
     */
    protected $type;
    /**
     * Descrição do boletim
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $description;
    /**
     * Fila em que está o boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $stack;
    /**
     * Identificador da operadora
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $operator_report_identifier;
    /**
     * Técnico responsável
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $responsible;
    /**
     * Nome do solicitante
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $requester_name;
    /**
     * Telefone do solicitante
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=20)
     */
    protected $requester_phone;
    /**
     * Email do solicitante
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=60)
     */
    protected $requester_email;
    /**
     * Causa do fechamento
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $cause;
    /**
     * Falha
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $failure;
    /**
     * Local da falha
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $failure_local;
    /**
     * Problema
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string",length=40)
     */
    protected $problem;
    /**
     * Status do boletim
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * Solução do problema
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $solution;

    /**
     * Motivo do fechamento
     *
     * @var text
     * @access protected
     *
     * @ORM\Column(name="close_reason", type="text")
     */
    protected $closeReason;

    /**
     * Sympton
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(name="symptom", type="integer")
     */
    protected $symptom;

    /**
     * Stretch
     *
     * @var text
     * @access protected
     *
     * @ORM\Column(name="stretch", type="text")
     */
    protected $stretch;

    /**
     * Informa se o boletim está totalmente inoperante ou parcialmente inoperante
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="decimal",length=1)
     */
    protected $issue;

    /**
     * Informa se o boletim está totalmente inoperante ou parcialmente inoperante
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(name="created_by_client", type="boolean")
     */
    protected $createdByClient;

    /**
     * Contadores de tempos controle
     *
     * @var ArrayCollection
     * @access protected
     *
     * @ORM\OneToMany(targetEntity="TimeCounters", mappedBy="report",fetch="EXTRA_LAZY")
     * @ORM\OrderBy({"initial_date" = "DESC"})
     */
    protected $time_counters;

    /**
     * Subcasos do boletim
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Subcases", mappedBy="report_id",fetch="EXTRA_LAZY")
     */
    protected $subcases;

    /**
     * Histórico de ações
     *
     * @var ArrayCollection
     * @access protected
     *
     * @ORM\OneToMany(targetEntity="History", mappedBy="report_id",fetch="EXTRA_LAZY")
     * @ORM\OrderBy({"date" = "DESC", "id" = "DESC"})
     */
    protected $histories;

    /**
     * circuitCache
     *
     * @var ArrayCollection
     * @access protected
     * @ORM\OneToOne(targetEntity="CircuitsCache", orphanRemoval=true)
     * @ORM\JoinColumn(name="circuit_id",referencedColumnName="id", nullable=true)
     */
    protected $circuitCache;

    /**
     * popCache
     *
     * @var ArrayCollection
     * @access protected
     * @ORM\OneToOne(targetEntity="PopsCache", orphanRemoval=true)
     * @ORM\JoinColumn(name="pop_id",referencedColumnName="id", nullable=true)
     */
    protected $popCache;

    /**
     * providerCache
     *
     * @var ArrayCollection
     * @access protected
     * @ORM\OneToOne(targetEntity="ProvidersCache", orphanRemoval=true)
     * @ORM\JoinColumn(name="provider_id",referencedColumnName="id", nullable=true)
     */
    protected $providerCache;

    /**
     * Contador do tempo médio de espera
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $tme_counter;

    /**
     * Contador do tempo pausado
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $paused_counter;

    /**
     * Contador do tempo resolvido
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $solved_counter;

    /**
     * Contador do tempo médio de resposta
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $tmr_counter;

    /**
     * Contador do NOC
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $noc_counter;

    /**
     * Contador da stack do sn1
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn1_counter;

    /**
     * Contador do stack do sn2
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn2_counter;

    /**
     * Contador da stack do sn3
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn3_counter;

    /**
     * Contador da stack do voz
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $voz_counter;

    /**
     * Contador do COC
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $coc_counter;

    /**
     * Identificador do canal de atendimento
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $service_channel;

    /**
     * Identificador do responsável pelo boletim caso esteja na stack sn1
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn1;

    /**
     * Identificador do responsável pelo boletim caso esteja na stack sn2
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn2;

    /**
     * Identificador do responsável pelo boletim caso esteja na stack sn3
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $sn3;

    /**
     * Identificador do responsável pelo boletim caso esteja na stack voz
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $voz;

    /**
     * Contador para tempo em descolamento
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $displacement_counter;

    /**
     * Contador para o tempo de atendimento em infra
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $infra_counter;

    /**
     * Contador para o tempo em campo
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $field_counter;

    /**
     * Contador para o tempo no cliente
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $client_counter;

    /**
     * Dados do responsável
     *
     * @var mixed
     * @access protected
     */
    protected $reponsible_data = null;

    /**
     * Stack utilizado caso o boletim seja reiniado ou pausado
     *
     * @var integer
     * @access protected
     */
    protected $fakeStack;

    /**
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * Incidente de fechamento do boletim
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $incident;

    /**
     * Classificação de severidade de fechamento do boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $closed_symptom;

    /**
     * Campo estrutura para o fechamento do boletim
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $structure;

    /**
     * Campo elemento para o fechamento do boletim
     *
     * @var string
     * @access protected
     *
     * @ORM\Column(type="string")
     */
    protected $element;

    /**
     * Identificador do pop
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $pop_id;

    /**
     * Identificador do fornecedor
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $provider_id;

    /**
     * Identificador do sistema que criou o boletim
     *
     * @var integer
     * @access protected
     *
     * @ORM\Column(type="integer")
     */
    protected $created_by_system;

    /**
     * Método Construtor
     */
    public function __construct()
    {
        $this->time_counters = new ArrayCollection();
        $this->histories = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->subcases = new ArrayCollection();
        $this->issue = 0;
        $this->createdByClient = false;
    }

    /**
     * Retorna o identificador do técnico sn1
     *
     * @access public
     * @return integer
     */
    public function getSn1() {
        return $this->sn1;
    }

    /**
     * Define o identificador do técnico sn1
     *
     * @param integer $sn1
     * @access public
     * @return integer
     */
    public function setSn1($sn1) {
        $this->sn1 = $sn1;
    }

        /**
     * Define o identificador do canal de atendimento
     *
     * @param integer $channel
     * @access public
     * @return integer
     */
    public function setServiceChannel($channel) {
        $this->service_channel = $channel;
    }

    /**
     * Retorna o identificador do canal de atendimento
     *
     * @access public
     * @return String
     */
    public function getServiceChannel() {

        switch ($this->service_channel) {
            case self::PHONE_CHANNEL:
                return 'Telefone';
                break;
            case self::EMAIL_CHANNEL:
                return 'E-mail';
                break;
            case self::APP_CHANNEL:
                return 'Aplicativo';
                break;
            case self::WEB_CHANNEL:
                return 'Web';
                break;
        }
        return 'Não informado';
    }

    /**
     * Retorna o identificador do técnico sn2
     *
     * @access public
     * @return integer
     */
    public function getSn2() {
        return $this->sn2;
    }

    /**
     * Define o identificador do técnico sn2
     *
     * @param integer $sn1
     * @access public
     * @return integer
     */
    public function setSn2($sn2) {
        $this->sn2 = $sn2;
    }

    /**
     * Retorna o identificador do técnico sn3
     *
     * @access public
     * @return integer
     */
    public function getSn3() {
        return $this->sn3;
    }

    /**
     * Define o identificador do técnico sn3
     *
     * @param integer $sn3
     * @access public
     * @return integer
     */
    public function setSn3($sn3) {
        $this->sn3 = $sn3;
    }

    /**
     * Retorna o identificador do técnico Voz
     *
     * @access public
     * @return integer
     */
    public function getVoz() {
        return $this->voz;
    }

    /**
     * Define o identificador do técnico Voz
     *
     * @param integer $voz
     * @access public
     * @return integer
     */
    public function setVoz($voz) {
        $this->voz = $voz;
    }

    /**
     * Retorna o contador do tempo médio de espera
     *
     * @access public
     * @return integer
     */
    public function getTmeCounter() {
        return $this->tme_counter;
    }

    /**
     * Retorna o contador do tempo pausado
     *
     * @access public
     * @return integer
     */
    public function getPausedCounter() {
        return $this->paused_counter;
    }

    /**
     * Retorna o contador do tempo resolvido
     *
     * @access public
     * @return integer
     */
    public function getSolvedCounter() {
        return $this->solved_counter;
    }

    /**
     * Retorna o contador do tempo médio de resposta
     *
     * @access public
     * @return integer
     */
    public function getTmrCounter() {
        return $this->tmr_counter;
    }

    /**
     * Retorna o contador do noc
     *
     * @access public
     * @return integer
     */
    public function getNocCounter() {
        return $this->noc_counter;
    }

    /**
     * Retorna o contador da stack de sn1
     *
     * @access public
     * @return integer
     */
    public function getSn1Counter() {
        return $this->sn1_counter;
    }

    /**
     * Retorna o contador da stack de sn2
     *
     * @access public
     * @return integer
     */
    public function getSn2Counter() {
        return $this->sn2_counter;
    }

    /**
     * Retorna o contador da stack de sn3
     *
     * @access public
     * @return integer
     */
    public function getSn3Counter() {
        return $this->sn3_counter;
    }

    /**
     * Retorna o contador da stack de Voz
     *
     * @access public
     * @return integer
     */
    public function getVozCounter() {
        return $this->voz_counter;
    }

    /**
     * Retorna o contador do coc
     *
     * @access public
     * @return integer
     */
    public function getCocCounter() {
        return $this->coc_counter;
    }

    /**
     * Retorna o contador do tempo em deslocamento
     *
     * @access public
     * @return integer
     */
    public function getDisplacementCounter() {
        return $this->displacement_counter;
    }

    /**
     * Retorna o contador do tempo em atendimento de infra
     *
     * @access public
     * @return integer
     */
    public function getInfraCounter() {
        return $this->infra_counter;
    }

    /**
     * Retorna o contador do tempo em campo
     *
     * @access public
     * @return integer
     */
    public function getFieldCounter() {
        return $this->field_counter;
    }

    /**
     * Retorna o contador do tempo no cliente
     *
     * @access public
     * @return integer
     */
    public function getClientCounter() {
        return $this->client_counter;
    }

    /**
     * Retorna os boletins vinculados a um BI
     *
     * @access public
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Retorna os boletins vinculados a um BI e estão em atendimento
     *
     * @access public
     * @return array
     * @todo alterar declaração do método para deixar mais claro o que ele realmente faz
     */
    public function getOpenedChildren()
    {
        $children = $this->getChildren();
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->eq('status', self::EM_ATENDIMENTO));

        return $children->matching($criteria);
    }


    /**
     * Retorna o identificador do boletim
     *
     * @access public
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Define o código
     *
     * @param string $code
     * @access public
     * @return Reports
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Retorna o código
     *
     * @access public
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Define a designação do circuito
     *
     * @param string $designation
     * @access public
     * @return Reports
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Retorna a designação do circuito
     *
     * @access public
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Define a data inicial do boletim
     *
     * @param \DateTime $initialDate
     * @access public
     * @return Reports
     */
    public function setInitialDate($initialDate)
    {
        $this->initial_date = $initialDate;

        return $this;
    }

    /**
     * Retorna a data inicial do boletim
     *
     * @access public
     * @return \DateTime
     */
    public function getInitialDate()
    {
        return $this->initial_date;
    }

    /**
     * Define a data final do boletim
     *
     * @param \DateTime $finalDate
     * @access public
     * @return Reports
     */
    public function setFinalDate($finalDate)
    {
        $this->final_date = $finalDate;

        return $this;
    }

    /**
     *
     *
     * @access public
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     *
     *
     * @param \DateTime $lastUpdate
     * @access public
     * @return Reports
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastupdate;

        return $this;
    }

    /**
     * Retorna a data final do boletim
     *
     * @access public
     * @return \DateTime
     */
    public function getFinalDate()
    {
        return $this->final_date;
    }

    /**
     * Define o tipo do boletim
     *
     * @param integer $type
     * @access public
     * @return Reports
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Retorna o tipo do boletim
     *
     * @access public
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Define a descrição do boletim
     *
     * @access public
     * @param string $description
     * @return Reports
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Retorna a descrição do boletim
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Define a fila em que está o boletim
     *
     * @param integer $stack
     * @access public
     * @return Reports
     */
    public function setStack($stack)
    {
        $this->stack = $stack;

        return $this;
    }

    /**
     * Retorna a fila em que está o boletim
     *
     * Caso esteja pausado ou foi reiniciado retorna uma fila secundária
     *
     * @access public
     * @return integer
     */
    public function getStack()
    {
        return !is_null($this->fakeStack) ? $this->fakeStack : $this->stack;
    }

    /**
     * Define a fila secundária para quando o boletim for reiniciado ou pausado
     *
     * @param integer $stack
     * @access public
     * @return Reports
     */
    public function setFakeStack($stack)
    {
        $this->fakeStack = $stack;

        return $this;
    }

    /**
     * Retorna a fila em que o boletim está para demonstração no tela do usuário
     *
     * @access public
     * @return type
     */
    public function getStackString()
    {
        $stack = $this->getStack();
        switch ($stack) {
            case self::STACK_VOZ:
                $stack = 'Voz';
                break;
            case self::STACK_SN3:
                $stack = 'SN3';
                break;
            case self::STACK_SN2:
                $stack = 'SN2';
                break;
            case self::STACK_SN1:
            default:
                $stack = 'SN1';
        }
        return $stack;
    }

    /**
     * Define o identificador da operadora
     *
     * @param string $operatorReportIdentifier
     * @access public
     * @return Reports
     */
    public function setOperatorReportIdentifier($operatorReportIdentifier)
    {
        $this->operator_report_identifier = $operatorReportIdentifier;
        return $this;
    }

    /**
     * Define a solução
     *
     * @param string $solution
     * @access public
     * @return Reports
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Retorna a solução
     *
     * @access public
     * @return string
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Retorna o identificador da operadora
     *
     * @access public
     * @return string
     */
    public function getOperatorReportIdentifier()
    {
        return $this->operator_report_identifier;
    }

    /**
     * Define o Técnico responsável
     *
     * @param string $responsible
     * @access public
     * @return Reports
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;

        return $this;
    }

    /**
     * Define os dados do técnico responsável
     *
     * @param array $data
     * @access public
     * @return $this
     */
    public function setResponsibleData(StdClass $data)
    {
        $this->reponsible_data = $data;

        return $this;
    }

    /**
     * Retorna os dados do técnico responsável
     *
     * @access public
     * @return mixed
     */
    public function getResponsibleData()
    {
        return $this->reponsible_data;
    }

    /**
     * Retorna o técnico responsável
     *
     * @access public
     * @return null
     */
    public function getResponsible()
    {
        return $this->responsible;
    }


    /**
     * Define o nome do solicitante
     *
     * @param string $requesterName
     * @access public
     * @return Reports
     */
    public function setRequesterName($requesterName)
    {
        $this->requester_name = $requesterName;

        return $this;
    }

    /**
     * Retorna o nome do solicitante
     *
     * @access public
     * @return string
     */
    public function getRequesterName()
    {
        return $this->requester_name;
    }

    /**
     * Define o telefone do solicitante
     *
     * @param string $requesterPhone
     * @access public
     * @return Reports
     */
    public function setRequesterPhone($requesterPhone)
    {
        $this->requester_phone = $requesterPhone;

        return $this;
    }

    /**
     * Retorna o telefone do solicitante
     *
     * @access public
     * @return string
     */
    public function getRequesterPhone()
    {
        return $this->requester_phone;
    }

    /**
     * Define o email do solicitante
     *
     * @param string $requesterEmail
     * @access public
     * @return Reports
     */
    public function setRequesterEmail($requesterEmail)
    {
        $this->requester_email = $requesterEmail;

        return $this;
    }

    /**
     * Retorna o email do solicitante
     *
     * @access public
     * @return string
     */
    public function getRequesterEmail()
    {
        return $this->requester_email;
    }

    /**
     * Define a causa
     *
     * @param string $cause
     * @access public
     * @return Reports
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Retorna a causa
     *
     * @access public
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Define a falha
     *
     * @param string $failure
     * @access public
     * @return Reports
     */
    public function setFailure($failure)
    {
        $this->failure = $failure;

        return $this;
    }

    /**
     * Retorna a falha
     *
     * @access public
     * @return string
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * Define o local da falha
     *
     * @param string $failureLocal
     * @access public
     * @return Reports
     */
    public function setFailureLocal($failureLocal)
    {
        $this->failure_local = $failureLocal;

        return $this;
    }

    /**
     * Retorna o local da falha
     *
     * @access public
     * @return string
     */
    public function getFailureLocal()
    {
        return $this->failure_local;
    }

    /**
     * Define o problema
     *
     * @param string $problem
     * @access public
     * @return Reports
     */
    public function setProblem($problem)
    {
        $this->problem = $problem;

        return $this;
    }

    /**
     * Retorna o problema
     *
     * @access public
     * @return string
     */
    public function getProblem()
    {
        return $this->problem;
    }

    /**
     * Define o identificador do circuito
     *
     * @param integer $circuitId
     * @access public
     * @return Reports
     */
    public function setCircuitId($circuitId)
    {
        $this->circuit_id = $circuitId;

        return $this;
    }

    public function setCircuitCache(CircuitsCache $circuit)
    {
        $this->circuitCache = $circuit;

        return $this;
    }

    public function getCircuitCache()
    {
        return $this->circuitCache;
    }

    /**
     * Retorna o identificador do circuito
     *
     * @access public
     * @return integer
     */
    public function getCircuitId()
    {
        return $this->circuit_id;
    }

    /**
     * Define um boletim vinculado
     *
     * @param \TroubleticketBundle\Entity\Reports $parentId
     * @access public
     * @return Reports
     */
    public function setParent(\TroubleticketBundle\Entity\Reports $parent= null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Retorna o identificador do boletim vinculado
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Retorna o boletim vinculado
     *
     * @access public
     * @return Reports
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Define o status do boletim
     *
     * @param integer $status
     * @access public
     * @return Reports
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Retorna o status do boletim
     *
     * @access public
     * @return integer $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Retorna os subcasos do boletim
     *
     * @access public
     * @return ArrayCollection
     */
    public function getSubcases()
    {
    	return $this->subcases;
    }

    /**
     * Retorna o status como string para visualizar na tela do usuário
     *
     * @access public
     * @return string
     */
    public function getStatusString()
    {
        return self::translateStatusCode($this->getStatus());
    }

    /**
     * Traduz o status para demonstrar na tela do usuário
     *
     * @param integer $status
     * @return string
     */
    public static function translateStatusCode($status)
    {
        switch ($status) {
            case static::INATIVO:
                $status = 'Inativo';
                break;
            case static::EM_ATENDIMENTO:
                $status = 'Em Atendimento';
                break;
            case static::PAUSADO:
                $status = 'Pausado';
                break;
            case static::RESOLVIDO:
                $status = 'Resolvido';
                break;
            case static::FECHADO:
                $status = 'Fechado';
                break;
            case static::CANCELADO:
                $status = 'Cancelado';
                break;
        }
        return $status;
    }

    /**
     * Retorna o tempo médio de espera calculado pela diferença entre as datas final e inicial
     *
     * @access public
     * @return integer
     */
    public function getTME()
    {
        $finalDate = $this->getFinalDate();
        if (!$finalDate) {
            $finalDate = new DateTime;
        }

        return $finalDate->getTimestamp() - $this->getInitialDate()->getTimestamp();
    }

    /**
     * Valida se um boletim alterar a fila
     *
     * @access public
     * @return boolean
     */
    public function canChangeStack()
    {
        $status = $this->getStatus();
        return in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se um boletim pode ser enviado para a stack sn1
     *
     * @access public
     * @return boolean
     */
    public function canSendToSN1()
    {
        $status = $this->getStatus();
        return $this->getStack() == self::STACK_VOZ && in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se um boletim pode ser enviado para a stack sn2
     *
     * @access public
     * @return boolean
     */
    public function canSendToSN2()
    {
        $status = $this->getStatus();
        return ($this->getStack() == self::STACK_SN1 || $this->getStack() == self::STACK_VOZ) && in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se um boletim pode ser enviado para a stack sn2
     *
     * @access public
     * @return boolean
     */
    public function canSendToSN3()
    {
        $status = $this->getStatus();
        return ($this->getStack() == self::STACK_SN1 || $this->getStack() == self::STACK_SN2 || $this->getStack() == self::STACK_VOZ) && in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se um boletim pode ser enviado para a stack Voz
     *
     * @access public
     * @return boolean
     */
    public function canSendToVoz()
    {
        $status = $this->getStatus();
        return ($this->getStack() == self::STACK_SN1 || $this->getStack() == self::STACK_SN2 || $this->getStack() == self::STACK_SN3) && in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se pode comentar o boletim
     *
     * @access public
     * @return boolean
     */
    public function canComment()
    {
        $status = $this->getStatus();
        return in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO,self::RESOLVIDO));
    }

    /**
     * Valida se pode comentar o boletim
     *
     * @access public
     * @return boolean
     */
    public function canChat()
    {
        $status = $this->getStatus();
        return in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO, self::RESOLVIDO));
    }

    /**
     * Valida se o boletim pode ser vinculado a BI
     *
     * @access public
     * @return boolean
     */
    public function canLinkToBi()
    {
        $status = $this->getStatus();
        return in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));
    }

    /**
     * Valida se o usuário logado pode assumir o boletim
     *
     * @param mixed $session_user
     * @access public
     * @return boolean
     */
    public function canTakeOn($session_user = null)
    {
        $status = $this->getStatus();
        $reponsible = $this->getResponsible();

        $result = in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));

        if (!empty($session_user)) {
            $result = ($reponsible != $session_user) && $result;
        }
        return $result;
    }

    /**
     * Valida se pode visualizar os BAs relacionados
     *
     * @access public
     * @return boolean
     */
    public function canViewRelatedBa() {
        $status = $this->getStatus();
        $result = in_array($status, array(self::EM_ATENDIMENTO, self::PAUSADO));

        return $result;
    }

    /**
     * Valida se um boletim pode mudar de sintoma
     *
     * @access public
     * @return boolean
     */
    public function canChangeSymptom()
    {
        $status = $this->getStatus();
        return !in_array($status, array(self::CANCELADO));
    }

    /**
     * Verifica se o boletim possui subcasos abertos
     *
     * @access public
     * @return boolean
     */
    public function hasOpenedSubcases()
    {
        $result = false;
        foreach ($this->getSubcases() as $subcase) {
            if ($subcase->getStatus() != $subcase::FECHADO) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * Retorna o tempo médio de resposta do boletim através da soma das diferenças de datas dos time counters e que esteja em andamento ou fechado
     *
     * @access public
     * @return integer
     */
    public function getTMR()
    {
        $time_counters = $this->time_counters;
        $total = 0;

        $status = array(self::EM_ATENDIMENTO, self::FECHADO);
        foreach ($time_counters as $time) {
            if (in_array($time->getReportStatus(), $status)) {
                $initialDate = $time->getInitialDate();
                $finalDate = $time->getFinalDate();
                if (!$finalDate) {
                    $finalDate = new DateTime();
                }
                $total += $finalDate->getTimestamp() - $initialDate->getTimestamp();
            }
        }

        return $total;
    }

    /**
     * Retorna o tipo do boletim no formato visível para o usuário
     *
     * @access public
     * @return string
     */
    public function getTypeString()
    {
        $type = null;

        switch ($this->getType()) {
            case self::TYPE_BI:
                $type = 'BI';
                break;
            case self::TYPE_BS:
                $type = 'BS';
                break;
            case self::TYPE_BA:
                $type = 'BA';
                break;
        }

        return $type;
    }

    /**
     * Retorna os históricos
     *
     * @access public
     * @return ArrayCollection
     */
    public function getHistories()
    {
        return $this->histories;
    }

    /**
     * Retorna o último histórico
     *
     * @access public
     * @return History
     */
    public function getLastHistory()
    {
        $histories = $this->getHistories();
        return $histories[0];
    }

    /**
     * Retorna o último time counter considerando que possua subcaso ou não
     *
     * @param boolean $onlyReport
     * @access public
     * @return TimeCounters
     */
    public function getLastTimeCounter($onlyReport = false)
    {
        $criteria = Criteria::create();
        $criteria->where(Criteria::expr()->isNull('final_date'));
        if ($onlyReport === true) {
            $criteria->andWhere(Criteria::expr()->isNull('subcase_id'));
        }
        $timeCounters = $this->time_counters->matching($criteria);

        return $timeCounters[0];
    }

    /**
     * Retorna os históricos para demonstrar como comentários
     *
     * @param string $glue
     * @access public
     * @return type
     */
    public function getCommentsAsString($glue = "\n----\n")
    {
        $histories = $this->getHistories();
        $result = array();

        foreach ($histories as $history) {
            $comment = $history->getComment()." ".((trim($history->getReason() != "")?"\nMotivo: ".$history->getReason():""));

            $result[] = sprintf('%s: %s', $history->getDate()->format('d/m/Y H:i:s'), $comment);
        }

        return implode($result, $glue);
    }

    /**
     * Retorna os time counters
     *
     * @access public
     * @return ArrayCollection
     */
    public function getTimeCounters()
    {
        return $this->time_counters;
    }

    /**
     * Define os contadores
     *
     * @param array $times
     * @return Reports
     */
    public function setTimes($times)
    {
        foreach ($times as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    /**
     * Valida se pode abrir um subcaso
     *
     * if type is null then if one type of subcase can be opened so result is true
     * Se o tipo é null e se um tipo de subcaso pode ser aberto, então o result é true
     *
     * @param mixed $type
     * @access public
     * @return boolean
     */
    public function canOpenSubcase($type = null)
    {
        $result = $this->getStatus() == self::EM_ATENDIMENTO;

        if ($result) {
            $result = false;
            if (is_null($type) || $type == Subcases::TYPE_COC) {
                $coc = $this->getCOCSubcase();
                if (!$coc->getId() || $coc->getStatus() == Subcases::FECHADO) {
                    $result = true;
                }
            }

            if (is_null($type) || $type == Subcases::TYPE_MANTAINER) {
                $mantainer = $this->getMantainerSubcase();
                if (!$mantainer->getId() || $mantainer->getStatus() == Subcases::FECHADO) {
                    $result = true;
                }
            }
        }

        return $result;
    }

    /**
     * Retorna os subcasos do tipo COC
     *
     * @access public
     * @return Subcases | null if not exists
     */
    public function getCOCSubcase()
    {
        return $this->getSubcaseByType(Subcases::TYPE_COC);
    }

    /**
     * Retorna os subcasos do tipo mantainer
     *
     * @access public
     * @return Subcases
     */
    public function getMantainerSubcase()
    {
        return $this->getSubcaseByType(Subcases::TYPE_MANTAINER);
    }

    /**
     * Retorna o subcaso pelo tipo
     *
     * @param int $type
     * @access public
     * @return Subcases
     */
    public function getSubcaseByType($type)
    {
        $subcases = $this->getSubcases();
        $result = new Subcases();
        foreach ($subcases as $subcase) {
            if ($subcase->getType() != $type) {
                continue;
            }

            if (
                !$result->getId() ||
                $subcase->getStatus() != $subcase::FECHADO ||
                (
                    $result->getStatus() == $subcase::FECHADO &&
                    $result->getId() < $subcase->getId()
                )
            ) {
                $result = $subcase;
            }
        }
        return $result;
    }

    public function getOpenSubcaseByType($type)
    {
        $subcases = $this->getSubcases();
        $result = new Subcases();
        foreach ($subcases as $subcase) {
            if ($subcase->getType() != $type) {
                continue;
            }

            if (
                $subcase->getStatus() != $subcase::FECHADO
            ) {
                $result = $subcase;
            }
        }
        return $result;
    }

    /**
     * Set closeReason
     *
     * @param string $closeReason
     * @return Reports
     */
    public function setCloseReason($closeReason)
    {
        $this->closeReason = $closeReason;

        return $this;
    }

    /**
     * Get closeReason
     *
     * @return string
     */
    public function getCloseReason()
    {
        return $this->closeReason;
    }

    /**
     * Set symptom
     *
     * @param string $symptom
     * @return Reports
     */
    public function setSymptom($symptom)
    {
        $this->symptom = $symptom;

        return $this;
    }

    /**
     * Get symptom
     *
     * @return string
     */
    public function getSymptom()
    {
        return $this->symptom;
    }

    /**
     * Set stretch
     *
     * @param string $stretch
     * @return Reports
     */
    public function setStretch($stretch)
    {
        $this->stretch = $stretch;

        return $this;
    }

    /**
     * Get stretch
     *
     * @return string
     */
    public function getStretch()
    {
        return $this->stretch;
    }

    /**
     * Get symptom as string
     *
     * @return string
     */
    public function getSymptomAsString()
    {
        if ($this->symptom == 1) {
            return "Indisponibilidade";
        } else if ($this->symptom == 2) {
            return "Intermitência";
        } else if ($this->symptom == 3) {
            return "Teste";
        }
    }

    /**
     * Get severity as string
     *
     * @return string
     */
    public function getSeverityAsString()
    {
        if ($this->symptom == 1) {
            return "Crítica";
        } else if ($this->symptom == 2) {
            return "Alta";
        } else if ($this->symptom == 3) {
            return "Baixa";
        }
    }

    /**
     * Set issue
     *
     * @param integer $issue
     * @return Reports
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     * @return integer
     */
    public function getIssueString()
    {
        $issue = '';
        switch ($this->issue) {
            case 2:
                $issue = 'Totalmente Inoperante';
                break;
            case 1:
            default:
                $issue = 'Parcialmente Inoperante';
                break;
        }
        return $issue;
    }

    /**
     * Get issue
     *
     * @return string
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * Set createdByClient
     *
     * @param boolean $createdByClient
     * @return Reports
     */
    public function setCreatedByClient($createdByClient)
    {
        $this->createdByClient = $createdByClient;

        return $this;
    }

    /**
     * Get createdByClient
     *
     * @return boolean
     */
    public function getCreatedByClient()
    {
        return $this->createdByClient;
    }

    /**
     * Get element
     *
     * @return string
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Set element
     *
     * @param string $element
     *
     * @return self
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get structure
     *
     * @return string
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set structure
     *
     * @param string $structure
     *
     * @return self
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get closed_symptom
     *
     * @return integer
     */
    public function getClosedSymptom()
    {
        return $this->closed_symptom;
    }

    /**
     * Set closed_symptom
     *
     * @param integer $closed_symptom
     *
     * @return self
     */
    public function setClosedSymptom($closed_symptom)
    {
        $this->closed_symptom = $closed_symptom;

        return $this;
    }

    /**
     * Get incident
     *
     * @return string
     */
    public function getIncident()
    {
        return $this->incident;
    }

    /**
     * Set incident
     *
     * @param string $incident
     *
     * @return self
     */
    public function setIncident($incident)
    {
        $this->incident = $incident;

        return $this;
    }

    /**
     * Get pop_id
     *
     * @return integer
     */
    public function getPopId()
    {
        return $this->pop_id;
    }

    /**
     * Set pop_id
     *
     * @param integer $pop_id
     *
     * @return self
     */
    public function setPopId($pop_id)
    {
        $this->pop_id = $pop_id;

        return $this;
    }

    public function setPopCache(PopsCache $pop)
    {
        $this->popCache = $pop;

        return $this;
    }

    public function getPopCache()
    {
        return $this->popCache;
    }

    /**
     * Get provider_id
     *
     * @return integer
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * Set provider_id
     *
     * @param integer $provider_id
     *
     * @return self
     */
    public function setProviderId($provider_id)
    {
        $this->provider_id = $provider_id;

        return $this;
    }

    public function setProviderCache(ProvidersCache $provider)
    {
        $this->providerCache = $provider;

        return $this;
    }

    public function getProviderCache()
    {
        return $this->providerCache;
    }

    /**
     * Gets the Identificador do sistema que criou o boletim.
     *
     * @return integer
     */
    public function getCreatedBySystem()
    {
        return $this->created_by_system;
    }

    /**
     * Sets the Identificador do sistema que criou o boletim.
     *
     * @param integer $created_by_system the created by system
     *
     * @return self
     */
    public function setCreatedBySystem($created_by_system)
    {
        $this->created_by_system = $created_by_system;

        return $this;
    }
}
