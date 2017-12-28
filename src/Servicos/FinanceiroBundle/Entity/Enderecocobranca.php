<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enderecocobranca
 */
class Enderecocobranca
{
    /**
     * @var integer
     */
    private $endecobrCodigoid;

    /**
     * @var integer
     */
    private $endecobrPais;

    /**
     * @var string
     */
    private $endecobrEstado;

    /**
     * @var string
     */
    private $endecobrCidade;

    /**
     * @var string
     */
    private $endecobrBairro;

    /**
     * @var string
     */
    private $endecobrLogradouro;

    /**
     * @var string
     */
    private $endecobrCep;

    /**
     * @var string
     */
    private $endecobrNumero;

    /**
     * @var string
     */
    private $endecobrComplemento;

    /**
     * @var string
     */
    private $endecobrLatitude;

    /**
     * @var string
     */
    private $endecobrLongitude;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get endecobrCodigoid
     *
     * @return integer 
     */
    public function getEndecobrCodigoid()
    {
        return $this->endecobrCodigoid;
    }

    /**
     * Set endecobrPais
     *
     * @param integer $endecobrPais
     * @return Enderecocobranca
     */
    public function setEndecobrPais($endecobrPais)
    {
        $this->endecobrPais = $endecobrPais;

        return $this;
    }

    /**
     * Get endecobrPais
     *
     * @return integer 
     */
    public function getEndecobrPais()
    {
        return $this->endecobrPais;
    }

    /**
     * Set endecobrEstado
     *
     * @param string $endecobrEstado
     * @return Enderecocobranca
     */
    public function setEndecobrEstado($endecobrEstado)
    {
        $this->endecobrEstado = $endecobrEstado;

        return $this;
    }

    /**
     * Get endecobrEstado
     *
     * @return string 
     */
    public function getEndecobrEstado()
    {
        return $this->endecobrEstado;
    }

    /**
     * Set endecobrCidade
     *
     * @param string $endecobrCidade
     * @return Enderecocobranca
     */
    public function setEndecobrCidade($endecobrCidade)
    {
        $this->endecobrCidade = $endecobrCidade;

        return $this;
    }

    /**
     * Get endecobrCidade
     *
     * @return string 
     */
    public function getEndecobrCidade()
    {
        return $this->endecobrCidade;
    }

    /**
     * Set endecobrBairro
     *
     * @param string $endecobrBairro
     * @return Enderecocobranca
     */
    public function setEndecobrBairro($endecobrBairro)
    {
        $this->endecobrBairro = $endecobrBairro;

        return $this;
    }

    /**
     * Get endecobrBairro
     *
     * @return string 
     */
    public function getEndecobrBairro()
    {
        return $this->endecobrBairro;
    }

    /**
     * Set endecobrLogradouro
     *
     * @param string $endecobrLogradouro
     * @return Enderecocobranca
     */
    public function setEndecobrLogradouro($endecobrLogradouro)
    {
        $this->endecobrLogradouro = $endecobrLogradouro;

        return $this;
    }

    /**
     * Get endecobrLogradouro
     *
     * @return string 
     */
    public function getEndecobrLogradouro()
    {
        return $this->endecobrLogradouro;
    }

    /**
     * Set endecobrCep
     *
     * @param string $endecobrCep
     * @return Enderecocobranca
     */
    public function setEndecobrCep($endecobrCep)
    {
        $this->endecobrCep = $endecobrCep;

        return $this;
    }

    /**
     * Get endecobrCep
     *
     * @return string 
     */
    public function getEndecobrCep()
    {
        return $this->endecobrCep;
    }

    /**
     * Set endecobrNumero
     *
     * @param string $endecobrNumero
     * @return Enderecocobranca
     */
    public function setEndecobrNumero($endecobrNumero)
    {
        $this->endecobrNumero = $endecobrNumero;

        return $this;
    }

    /**
     * Get endecobrNumero
     *
     * @return string 
     */
    public function getEndecobrNumero()
    {
        return $this->endecobrNumero;
    }

    /**
     * Set endecobrComplemento
     *
     * @param string $endecobrComplemento
     * @return Enderecocobranca
     */
    public function setEndecobrComplemento($endecobrComplemento)
    {
        $this->endecobrComplemento = $endecobrComplemento;

        return $this;
    }

    /**
     * Get endecobrComplemento
     *
     * @return string 
     */
    public function getEndecobrComplemento()
    {
        return $this->endecobrComplemento;
    }

    /**
     * Set endecobrLatitude
     *
     * @param string $endecobrLatitude
     * @return Enderecocobranca
     */
    public function setEndecobrLatitude($endecobrLatitude)
    {
        $this->endecobrLatitude = $endecobrLatitude;

        return $this;
    }

    /**
     * Get endecobrLatitude
     *
     * @return string 
     */
    public function getEndecobrLatitude()
    {
        return $this->endecobrLatitude;
    }

    /**
     * Set endecobrLongitude
     *
     * @param string $endecobrLongitude
     * @return Enderecocobranca
     */
    public function setEndecobrLongitude($endecobrLongitude)
    {
        $this->endecobrLongitude = $endecobrLongitude;

        return $this;
    }

    /**
     * Get endecobrLongitude
     *
     * @return string 
     */
    public function getEndecobrLongitude()
    {
        return $this->endecobrLongitude;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Enderecocobranca
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
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
}
