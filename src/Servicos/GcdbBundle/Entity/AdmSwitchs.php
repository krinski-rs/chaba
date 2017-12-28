<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmSwitchs
 */
class AdmSwitchs
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $qtdPortas;

    /**
     * @var string
     */
    private $cmdAdmStatus;

    /**
     * @var string
     */
    private $cmdOpeStatus;

    /**
     * @var string
     */
    private $cmdTrafficIn;

    /**
     * @var string
     */
    private $cmdTrafficOu;

    /**
     * @var string
     */
    private $communittyRead;

    /**
     * @var string
     */
    private $communittyWrite;

    /**
     * @var string
     */
    private $cmdNomePort;

    /**
     * @var boolean
     */
    private $inversao;

    /**
     * @var boolean
     */
    private $ativo;


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
     * Set ip
     *
     * @param string $ip
     * @return AdmSwitchs
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return AdmSwitchs
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set qtdPortas
     *
     * @param integer $qtdPortas
     * @return AdmSwitchs
     */
    public function setQtdPortas($qtdPortas)
    {
        $this->qtdPortas = $qtdPortas;

        return $this;
    }

    /**
     * Get qtdPortas
     *
     * @return integer 
     */
    public function getQtdPortas()
    {
        return $this->qtdPortas;
    }

    /**
     * Set cmdAdmStatus
     *
     * @param string $cmdAdmStatus
     * @return AdmSwitchs
     */
    public function setCmdAdmStatus($cmdAdmStatus)
    {
        $this->cmdAdmStatus = $cmdAdmStatus;

        return $this;
    }

    /**
     * Get cmdAdmStatus
     *
     * @return string 
     */
    public function getCmdAdmStatus()
    {
        return $this->cmdAdmStatus;
    }

    /**
     * Set cmdOpeStatus
     *
     * @param string $cmdOpeStatus
     * @return AdmSwitchs
     */
    public function setCmdOpeStatus($cmdOpeStatus)
    {
        $this->cmdOpeStatus = $cmdOpeStatus;

        return $this;
    }

    /**
     * Get cmdOpeStatus
     *
     * @return string 
     */
    public function getCmdOpeStatus()
    {
        return $this->cmdOpeStatus;
    }

    /**
     * Set cmdTrafficIn
     *
     * @param string $cmdTrafficIn
     * @return AdmSwitchs
     */
    public function setCmdTrafficIn($cmdTrafficIn)
    {
        $this->cmdTrafficIn = $cmdTrafficIn;

        return $this;
    }

    /**
     * Get cmdTrafficIn
     *
     * @return string 
     */
    public function getCmdTrafficIn()
    {
        return $this->cmdTrafficIn;
    }

    /**
     * Set cmdTrafficOu
     *
     * @param string $cmdTrafficOu
     * @return AdmSwitchs
     */
    public function setCmdTrafficOu($cmdTrafficOu)
    {
        $this->cmdTrafficOu = $cmdTrafficOu;

        return $this;
    }

    /**
     * Get cmdTrafficOu
     *
     * @return string 
     */
    public function getCmdTrafficOu()
    {
        return $this->cmdTrafficOu;
    }

    /**
     * Set communittyRead
     *
     * @param string $communittyRead
     * @return AdmSwitchs
     */
    public function setCommunittyRead($communittyRead)
    {
        $this->communittyRead = $communittyRead;

        return $this;
    }

    /**
     * Get communittyRead
     *
     * @return string 
     */
    public function getCommunittyRead()
    {
        return $this->communittyRead;
    }

    /**
     * Set communittyWrite
     *
     * @param string $communittyWrite
     * @return AdmSwitchs
     */
    public function setCommunittyWrite($communittyWrite)
    {
        $this->communittyWrite = $communittyWrite;

        return $this;
    }

    /**
     * Get communittyWrite
     *
     * @return string 
     */
    public function getCommunittyWrite()
    {
        return $this->communittyWrite;
    }

    /**
     * Set cmdNomePort
     *
     * @param string $cmdNomePort
     * @return AdmSwitchs
     */
    public function setCmdNomePort($cmdNomePort)
    {
        $this->cmdNomePort = $cmdNomePort;

        return $this;
    }

    /**
     * Get cmdNomePort
     *
     * @return string 
     */
    public function getCmdNomePort()
    {
        return $this->cmdNomePort;
    }

    /**
     * Set inversao
     *
     * @param boolean $inversao
     * @return AdmSwitchs
     */
    public function setInversao($inversao)
    {
        $this->inversao = $inversao;

        return $this;
    }

    /**
     * Get inversao
     *
     * @return boolean 
     */
    public function getInversao()
    {
        return $this->inversao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return AdmSwitchs
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
