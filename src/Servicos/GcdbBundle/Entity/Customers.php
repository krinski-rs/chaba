<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 */
class Customers
{
    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $first;

    /**
     * @var string
     */
    private $mid;

    /**
     * @var string
     */
    private $last;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $fantasia;

    /**
     * @var string
     */
    private $razao;

    /**
     * @var string
     */
    private $cnpj;

    /**
     * @var string
     */
    private $pais;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var string
     */
    private $emergencia;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $atpass;

    /**
     * @var boolean
     */
    private $tributaicms;

    /**
     * @var boolean
     */
    private $delin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadLigacaoC2u;

    /**
     * @var \Servicos\GcdbBundle\Entity\Origemexterna
     */
    private $origemexterna;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prioridade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $relGn;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cadLigacaoC2u = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cadUser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prioridade = new \Doctrine\Common\Collections\ArrayCollection();
        $this->relGn = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set first
     *
     * @param string $first
     * @return Customers
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return string 
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set mid
     *
     * @param string $mid
     * @return Customers
     */
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * Get mid
     *
     * @return string 
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Set last
     *
     * @param string $last
     * @return Customers
     */
    public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }

    /**
     * Get last
     *
     * @return string 
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Customers
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Customers
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Customers
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Customers
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Customers
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Customers
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Customers
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set fantasia
     *
     * @param string $fantasia
     * @return Customers
     */
    public function setFantasia($fantasia)
    {
        $this->fantasia = $fantasia;

        return $this;
    }

    /**
     * Get fantasia
     *
     * @return string 
     */
    public function getFantasia()
    {
        return $this->fantasia;
    }

    /**
     * Set razao
     *
     * @param string $razao
     * @return Customers
     */
    public function setRazao($razao)
    {
        $this->razao = $razao;

        return $this;
    }

    /**
     * Get razao
     *
     * @return string 
     */
    public function getRazao()
    {
        return $this->razao;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return Customers
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Customers
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set obs
     *
     * @param string $obs
     * @return Customers
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string 
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set emergencia
     *
     * @param string $emergencia
     * @return Customers
     */
    public function setEmergencia($emergencia)
    {
        $this->emergencia = $emergencia;

        return $this;
    }

    /**
     * Get emergencia
     *
     * @return string 
     */
    public function getEmergencia()
    {
        return $this->emergencia;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return Customers
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set atpass
     *
     * @param string $atpass
     * @return Customers
     */
    public function setAtpass($atpass)
    {
        $this->atpass = $atpass;

        return $this;
    }

    /**
     * Get atpass
     *
     * @return string 
     */
    public function getAtpass()
    {
        return $this->atpass;
    }

    /**
     * Set tributaicms
     *
     * @param boolean $tributaicms
     * @return Customers
     */
    public function setTributaicms($tributaicms)
    {
        $this->tributaicms = $tributaicms;

        return $this;
    }

    /**
     * Get tributaicms
     *
     * @return boolean 
     */
    public function getTributaicms()
    {
        return $this->tributaicms;
    }

    /**
     * Set delin
     *
     * @param boolean $delin
     * @return Customers
     */
    public function setDelin($delin)
    {
        $this->delin = $delin;

        return $this;
    }

    /**
     * Get delin
     *
     * @return boolean 
     */
    public function getDelin()
    {
        return $this->delin;
    }

    /**
     * Add cadLigacaoC2u
     *
     * @param \Servicos\GcdbBundle\Entity\CadLigacaoC2u $cadLigacaoC2u
     * @return Customers
     */
    public function addCadLigacaoC2u(\Servicos\GcdbBundle\Entity\CadLigacaoC2u $cadLigacaoC2u)
    {
        $this->cadLigacaoC2u[] = $cadLigacaoC2u;

        return $this;
    }

    /**
     * Remove cadLigacaoC2u
     *
     * @param \Servicos\GcdbBundle\Entity\CadLigacaoC2u $cadLigacaoC2u
     */
    public function removeCadLigacaoC2u(\Servicos\GcdbBundle\Entity\CadLigacaoC2u $cadLigacaoC2u)
    {
        $this->cadLigacaoC2u->removeElement($cadLigacaoC2u);
    }

    /**
     * Get cadLigacaoC2u
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadLigacaoC2u()
    {
        return $this->cadLigacaoC2u;
    }

    /**
     * Set origemexterna
     *
     * @param \Servicos\GcdbBundle\Entity\Origemexterna $origemexterna
     * @return Customers
     */
    public function setOrigemexterna(\Servicos\GcdbBundle\Entity\Origemexterna $origemexterna = null)
    {
        $this->origemexterna = $origemexterna;

        return $this;
    }

    /**
     * Get origemexterna
     *
     * @return \Servicos\GcdbBundle\Entity\Origemexterna 
     */
    public function getOrigemexterna()
    {
        return $this->origemexterna;
    }

    /**
     * Add cadUser
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUser
     * @return Customers
     */
    public function addCadUser(\Servicos\GcdbBundle\Entity\CadUsers $cadUser)
    {
        $this->cadUser[] = $cadUser;

        return $this;
    }

    /**
     * Remove cadUser
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUser
     */
    public function removeCadUser(\Servicos\GcdbBundle\Entity\CadUsers $cadUser)
    {
        $this->cadUser->removeElement($cadUser);
    }

    /**
     * Get cadUser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadUser()
    {
        return $this->cadUser;
    }

    /**
     * Add relGn
     *
     * @param \Servicos\GcdbBundle\Entity\RelGn $relGn
     * @return Customers
     */
    public function addRelGn(\Servicos\GcdbBundle\Entity\RelGn $relGn)
    {
    	$this->relGn[] = $relGn;
    
    	return $this;
    }
    
    /**
     * Remove relGn
     *
     * @param \Servicos\GcdbBundle\Entity\RelGn $relGn
     */
    public function removeRelGn(\Servicos\GcdbBundle\Entity\RelGn $relGn)
    {
    	$this->relGn->removeElement($relGn);
    }
    
    /**
     * Get relGn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRelGn()
    {
    	return $this->relGn;
    }

    /**
     * Add prioridade
     *
     * @param \Servicos\GcdbBundle\Entity\Prioridade $prioridade
     * @return Customers
     */
    public function addPrioridade(\Servicos\GcdbBundle\Entity\Prioridade $prioridade)
    {
        $this->prioridade[] = $prioridade;

        return $this;
    }

    /**
     * Remove prioridade
     *
     * @param \Servicos\GcdbBundle\Entity\Prioridade $prioridade
     */
    public function removePrioridade(\Servicos\GcdbBundle\Entity\Prioridade $prioridade)
    {
        $this->prioridade->removeElement($prioridade);
    }

    /**
     * Get prioridade
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrioridade()
    {
        return $this->prioridade;
    }
}
