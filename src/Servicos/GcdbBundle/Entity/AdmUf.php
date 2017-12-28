<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmUf
 */
class AdmUf
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmPais
     */
    private $admPais;


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
     * Set sigla
     *
     * @param string $sigla
     * @return AdmUf
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return AdmUf
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
     * Set admPais
     *
     * @param \Servicos\GcdbBundle\Entity\AdmPais $admPais
     * @return AdmUf
     */
    public function setAdmPais(\Servicos\GcdbBundle\Entity\AdmPais $admPais = null)
    {
        $this->admPais = $admPais;

        return $this;
    }

    /**
     * Get admPais
     *
     * @return \Servicos\GcdbBundle\Entity\AdmPais 
     */
    public function getAdmPais()
    {
        return $this->admPais;
    }
}
