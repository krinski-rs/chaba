<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 22/05/17
 * Time: 16:30
 */

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class IntegracaoWanLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $contratoWanId;


    /**
     * @var integer
     */
    private $contratoVogelId;

    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var integer
     */
    private $customerIdWan;


    /**
     * @var boolean
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $dataHoraCriacao;

    /**
     * @var string
     */
    private $message;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getContratoWanId()
    {
        return $this->contratoWanId;
    }

    /**
     * @param int $contratoWanId
     */
    public function setContratoWanId($contratoWanId)
    {
        $this->contratoWanId = $contratoWanId;
        return $this;
    }

    /**
     * @return int
     */
    public function getContratoVogelId()
    {
        return $this->contratoVogelId;
    }

    /**
     * @param int $contratoVogelId
     */
    public function setContratoVogelId($contratoVogelId)
    {
        $this->contratoVogelId = $contratoVogelId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }



    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataHoraCriacao()
    {
        return $this->dataHoraCriacao;
    }

    /**
     * @param \DateTime $dataHoraCriacao
     */
    public function setDataHoraCriacao($dataHoraCriacao)
    {
        $this->dataHoraCriacao = $dataHoraCriacao;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerIdWan()
    {
        return $this->customerIdWan;
    }

    /**
     * @param int $customerIdWan
     */
    public function setCustomerIdWan($customerIdWan)
    {
        $this->customerIdWan = $customerIdWan;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }





}