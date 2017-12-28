<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enderecoentrega
 */
class Enderecoentrega
{
    /**
     * @var integer
     */
    private $endeentrCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var boolean
     */
    private $endeentrConcentrador;

    /**
     * @var integer
     */
    private $endeentrPais;

    /**
     * @var integer
     */
    private $endeentrEstado;

    /**
     * @var integer
     */
    private $endeentrCidade;

    /**
     * @var string
     */
    private $endeentrBairro;

    /**
     * @var string
     */
    private $endeentrLogradouro;

    /**
     * @var string
     */
    private $endeentrCep;

    /**
     * @var integer
     */
    private $endeentrNumero;

    /**
     * @var string
     */
    private $endeentrComplemento;

    /**
     * @var string
     */
    private $endeentrPonta;

    /**
     * @var string
     */
    private $endeentrLatitude;

    /**
     * @var string
     */
    private $endeentrLongitude;

    /**
     * @var string
     */
    private $endeentrDesignadorOld;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contrato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuito;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contrato = new \Doctrine\Common\Collections\ArrayCollection();
        $this->circuito = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get endeentrCodigoid
     *
     * @return integer 
     */
    public function getEndeentrCodigoid()
    {
        return $this->endeentrCodigoid;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Enderecoentrega
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set endeentrConcentrador
     *
     * @param boolean $endeentrConcentrador
     * @return Enderecoentrega
     */
    public function setEndeentrConcentrador($endeentrConcentrador)
    {
        $this->endeentrConcentrador = $endeentrConcentrador;

        return $this;
    }

    /**
     * Get endeentrConcentrador
     *
     * @return boolean 
     */
    public function getEndeentrConcentrador()
    {
        return $this->endeentrConcentrador;
    }

    /**
     * Set endeentrPais
     *
     * @param integer $endeentrPais
     * @return Enderecoentrega
     */
    public function setEndeentrPais($endeentrPais)
    {
       $this->endeentrPais = $endeentrPais;
    	
        return $this;
    }

    /**
     * Get endeentrPais
     *
     * @return integer 
     */
    public function getEndeentrPais()
    {
        return $this->endeentrPais;
    }

    /**
     * Set endeentrEstado
     *
     * @param integer $endeentrEstado
     * @return Enderecoentrega
     */
    public function setEndeentrEstado($endeentrEstado)
    {
        $this->endeentrEstado = $endeentrEstado;

        return $this;
    }

    /**
     * Get endeentrEstado
     *
     * @return integer 
     */
    public function getEndeentrEstado()
    {
        return $this->endeentrEstado;
    }

    /**
     * Set endeentrCidade
     *
     * @param integer $endeentrCidade
     * @return Enderecoentrega
     */
    public function setEndeentrCidade($endeentrCidade)
    {
        $this->endeentrCidade = $endeentrCidade;

        return $this;
    }

    /**
     * Get endeentrCidade
     *
     * @return integer 
     */
    public function getEndeentrCidade()
    {
        return $this->endeentrCidade;
    }

    /**
     * Set endeentrBairro
     *
     * @param string $endeentrBairro
     * @return Enderecoentrega
     */
    public function setEndeentrBairro($endeentrBairro)
    {
        $this->endeentrBairro = $endeentrBairro;

        return $this;
    }

    /**
     * Get endeentrBairro
     *
     * @return string 
     */
    public function getEndeentrBairro()
    {
        return $this->endeentrBairro;
    }

    /**
     * Set endeentrLogradouro
     *
     * @param string $endeentrLogradouro
     * @return Enderecoentrega
     */
    public function setEndeentrLogradouro($endeentrLogradouro)
    {
        $this->endeentrLogradouro = $endeentrLogradouro;

        return $this;
    }

    /**
     * Get endeentrLogradouro
     *
     * @return string 
     */
    public function getEndeentrLogradouro()
    {
        return $this->endeentrLogradouro;
    }

    /**
     * Set endeentrCep
     *
     * @param string $endeentrCep
     * @return Enderecoentrega
     */
    public function setEndeentrCep($endeentrCep)
    {
        $this->endeentrCep = $endeentrCep;

        return $this;
    }

    /**
     * Get endeentrCep
     *
     * @return string 
     */
    public function getEndeentrCep()
    {
        return $this->endeentrCep;
    }

    /**
     * Set endeentrNumero
     *
     * @param integer $endeentrNumero
     * @return Enderecoentrega
     */
    public function setEndeentrNumero($endeentrNumero)
    {
        $this->endeentrNumero = $endeentrNumero;

        return $this;
    }

    /**
     * Get endeentrNumero
     *
     * @return integer 
     */
    public function getEndeentrNumero()
    {
        return $this->endeentrNumero;
    }

    /**
     * Set endeentrComplemento
     *
     * @param string $endeentrComplemento
     * @return Enderecoentrega
     */
    public function setEndeentrComplemento($endeentrComplemento)
    {
        $this->endeentrComplemento = $endeentrComplemento;

        return $this;
    }

    /**
     * Get endeentrComplemento
     *
     * @return string 
     */
    public function getEndeentrComplemento()
    {
        return $this->endeentrComplemento;
    }

    /**
     * Set endeentrPonta
     *
     * @param string $endeentrPonta
     * @return Enderecoentrega
     */
    public function setEndeentrPonta($endeentrPonta)
    {
        $this->endeentrPonta = $endeentrPonta;

        return $this;
    }

    /**
     * Get endeentrPonta
     *
     * @return string 
     */
    public function getEndeentrPonta()
    {
        return $this->endeentrPonta;
    }

    /**
     * Set endeentrLatitude
     *
     * @param string $endeentrLatitude
     * @return Enderecoentrega
     */
    public function setEndeentrLatitude($endeentrLatitude)
    {
        $this->endeentrLatitude = $endeentrLatitude;

        return $this;
    }

    /**
     * Get endeentrLatitude
     *
     * @return string 
     */
    public function getEndeentrLatitude()
    {
        return $this->endeentrLatitude;
    }

    /**
     * Set endeentrLongitude
     *
     * @param string $endeentrLongitude
     * @return Enderecoentrega
     */
    public function setEndeentrLongitude($endeentrLongitude)
    {
        $this->endeentrLongitude = $endeentrLongitude;

        return $this;
    }

    /**
     * Get endeentrLongitude
     *
     * @return string 
     */
    public function getEndeentrLongitude()
    {
        return $this->endeentrLongitude;
    }

    /**
     * Set endeentrDesignadorOld
     *
     * @param string $endeentrDesignadorOld
     * @return Enderecoentrega
     */
    public function setEndeentrDesignadorOld($endeentrDesignadorOld)
    {
        $this->endeentrDesignadorOld = $endeentrDesignadorOld;

        return $this;
    }

    /**
     * Get endeentrDesignadorOld
     *
     * @return string 
     */
    public function getEndeentrDesignadorOld()
    {
        return $this->endeentrDesignadorOld;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Enderecoentrega
     */
    public function addContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato[] = $contrato;

        return $this;
    }

    /**
     * Remove contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     */
    public function removeContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato->removeElement($contrato);
    }

    /**
     * Get contrato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Add circuito
     *
     * @param \Servicos\GcdbBundle\Entity\Circuito $circuito
     * @return Enderecoentrega
     */
    public function addCircuito(\Servicos\GcdbBundle\Entity\Circuito $circuito)
    {
    	$this->circuito[] = $circuito;
    
    	return $this;
    }
    
    /**
     * Remove circuito
     *
     * @param \Servicos\GcdbBundle\Entity\Circuito $circuito
     */
    public function removeCircuito(\Servicos\GcdbBundle\Entity\Circuito $circuito)
    {
    	$this->circuito->removeElement($circuito);
    }
    
    /**
     * Get circuito
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCircuito()
    {
    	return $this->circuito;
    }
    
    /**
     * Set AdmPais
     *
     * @param \Servicos\GcdbBundle\Entity\AdmPais $admPais
     * @return Enderecoentrega
     */
    public function setAdmPais(\Servicos\GcdbBundle\Entity\AdmPais $admPais = null)
    {
        $this->admPais = $admPais;
        return $this;
    }

    /**
     * Get AdmPais
     *
     * @return \Servicos\GcdbBundle\Entity\AdmPais 
     */
    public function getAdmPais()
    {
        return $this->admPais;
    }
    /**
     * @var \Servicos\GcdbBundle\Entity\AdmPais
     */
    private $admPais;


    /**
     * @var \Servicos\GcdbBundle\Entity\AdmUf
     */
    private $admUf;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmCidades
     */
    private $admCidades;


    /**
     * Set admUf
     *
     * @param \Servicos\GcdbBundle\Entity\AdmUf $admUf
     * @return Enderecoentrega
     */
    public function setAdmUf(\Servicos\GcdbBundle\Entity\AdmUf $admUf = null)
    {
        $this->admUf = $admUf;
        $this->endeentrEstado = $admUf->getId();
        
        return $this;
    }

    /**
     * Get admUf
     *
     * @return \Servicos\GcdbBundle\Entity\AdmUf 
     */
    public function getAdmUf()
    {
        return $this->admUf;
    }

    /**
     * Set admCidades
     *
     * @param \Servicos\GcdbBundle\Entity\AdmCidades $admCidades
     * @return Enderecoentrega
     */
    public function setAdmCidades(\Servicos\GcdbBundle\Entity\AdmCidades $admCidades = null)
    {
        $this->admCidades = $admCidades;
        $this->endeentrCidade = $admCidades->getId();

        return $this;
    }

    /**
     * Get admCidades
     *
     * @return \Servicos\GcdbBundle\Entity\AdmCidades 
     */
    public function getAdmCidades()
    {
        return $this->admCidades;
    }
}
