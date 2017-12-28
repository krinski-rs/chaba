<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 */
class Endereco
{
    /**
     * @var integer
     */
    private $endeCodigoid;

    /**
     * @var string
     */
    private $endeUf;

    /**
     * @var string
     */
    private $endeCidade;

    /**
     * @var string
     */
    private $endeEndereco;

    /**
     * @var string
     */
    private $endeNumero;

    /**
     * @var string
     */
    private $endeBairro;

    /**
     * @var string
     */
    private $endeCep;

    /**
     * @var string
     */
    private $endeLongitude;

    /**
     * @var string
     */
    private $endeLatitude;

    /**
     * @var string
     */
    private $endeReferencia;

    /**
     * @var integer
     */
    private $localeCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ordeCodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordeCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get endeCodigoid
     *
     * @return integer 
     */
    public function getEndeCodigoid()
    {
        return $this->endeCodigoid;
    }

    /**
     * Set endeUf
     *
     * @param string $endeUf
     * @return Endereco
     */
    public function setEndeUf($endeUf)
    {
        $this->endeUf = $endeUf;

        return $this;
    }

    /**
     * Get endeUf
     *
     * @return string 
     */
    public function getEndeUf()
    {
        return $this->endeUf;
    }

    /**
     * Set endeCidade
     *
     * @param string $endeCidade
     * @return Endereco
     */
    public function setEndeCidade($endeCidade)
    {
        $this->endeCidade = $endeCidade;

        return $this;
    }

    /**
     * Get endeCidade
     *
     * @return string 
     */
    public function getEndeCidade()
    {
        return $this->endeCidade;
    }

    /**
     * Set endeEndereco
     *
     * @param string $endeEndereco
     * @return Endereco
     */
    public function setEndeEndereco($endeEndereco)
    {
        $this->endeEndereco = $endeEndereco;

        return $this;
    }

    /**
     * Get endeEndereco
     *
     * @return string 
     */
    public function getEndeEndereco()
    {
        return $this->endeEndereco;
    }

    /**
     * Set endeNumero
     *
     * @param string $endeNumero
     * @return Endereco
     */
    public function setEndeNumero($endeNumero)
    {
        $this->endeNumero = $endeNumero;

        return $this;
    }

    /**
     * Get endeNumero
     *
     * @return string 
     */
    public function getEndeNumero()
    {
        return $this->endeNumero;
    }

    /**
     * Set endeBairro
     *
     * @param string $endeBairro
     * @return Endereco
     */
    public function setEndeBairro($endeBairro)
    {
        $this->endeBairro = $endeBairro;

        return $this;
    }

    /**
     * Get endeBairro
     *
     * @return string 
     */
    public function getEndeBairro()
    {
        return $this->endeBairro;
    }

    /**
     * Set endeCep
     *
     * @param string $endeCep
     * @return Endereco
     */
    public function setEndeCep($endeCep)
    {
        $this->endeCep = $endeCep;

        return $this;
    }

    /**
     * Get endeCep
     *
     * @return string 
     */
    public function getEndeCep()
    {
        return $this->endeCep;
    }

    /**
     * Set endeLongitude
     *
     * @param string $endeLongitude
     * @return Endereco
     */
    public function setEndeLongitude($endeLongitude)
    {
        $this->endeLongitude = $endeLongitude;

        return $this;
    }

    /**
     * Get endeLongitude
     *
     * @return string 
     */
    public function getEndeLongitude()
    {
        return $this->endeLongitude;
    }

    /**
     * Set endeLatitude
     *
     * @param string $endeLatitude
     * @return Endereco
     */
    public function setEndeLatitude($endeLatitude)
    {
        $this->endeLatitude = $endeLatitude;

        return $this;
    }

    /**
     * Get endeLatitude
     *
     * @return string 
     */
    public function getEndeLatitude()
    {
        return $this->endeLatitude;
    }

    /**
     * Set endeReferencia
     *
     * @param string $endeReferencia
     * @return Endereco
     */
    public function setEndeReferencia($endeReferencia)
    {
        $this->endeReferencia = $endeReferencia;

        return $this;
    }

    /**
     * Get endeReferencia
     *
     * @return string 
     */
    public function getEndeReferencia()
    {
        return $this->endeReferencia;
    }

    /**
     * Set localeCodigoid
     *
     * @param integer $localeCodigoid
     * @return Endereco
     */
    public function setLocaleCodigoid($localeCodigoid)
    {
        $this->localeCodigoid = $localeCodigoid;

        return $this;
    }

    /**
     * Get localeCodigoid
     *
     * @return integer 
     */
    public function getLocaleCodigoid()
    {
        return $this->localeCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Endereco
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Add ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return Endereco
     */
    public function addOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid)
    {
        $this->ordeCodigoid[] = $ordeCodigoid;

        return $this;
    }

    /**
     * Remove ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     */
    public function removeOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid)
    {
        $this->ordeCodigoid->removeElement($ordeCodigoid);
    }

    /**
     * Get ordeCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }
}
