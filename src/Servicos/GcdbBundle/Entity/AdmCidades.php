<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmCidades
 */
class AdmCidades
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $codigoIbge;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmUf
     */
    private $admUf;

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
     * Set nome
     *
     * @param string $nome
     * @return AdmCidades
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
     * Set admUf
     *
     * @param \Servicos\GcdbBundle\Entity\AdmUf $admUf
     * @return AdmCidades
     */
    public function setAdmUf(\Servicos\GcdbBundle\Entity\AdmUf $admUf = null)
    {
        $this->admUf = $admUf;

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
     * Gets the value of codigoIbge.
     *
     * @return integer
     */
    public function getCodigoIbge()
    {
        return $this->codigoIbge;
    }

    /**
     * Sets the value of codigoIbge.
     *
     * @param integer $codigoIbge the codigo ibge
     *
     * @return self
     */
    public function setCodigoIbge($codigoIbge)
    {
        $this->codigoIbge = $codigoIbge;

        return $this;
    }
}
