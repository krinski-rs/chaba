<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaSaldo
 */
class ViaturaSaldo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $viaturaPlaca;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var \DateTime
     */
    private $dateRecord;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viatura;


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
     * Set viaturaPlaca
     *
     * @param string $viaturaPlaca
     * @return ViaturaSaldo
     */
    public function setViaturaPlaca($viaturaPlaca)
    {
        $this->viaturaPlaca = $viaturaPlaca;

        return $this;
    }

    /**
     * Get viaturaPlaca
     *
     * @return string 
     */
    public function getViaturaPlaca()
    {
        return $this->viaturaPlaca;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return ViaturaSaldo
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set dateRecord
     *
     * @param \DateTime $dateRecord
     * @return ViaturaSaldo
     */
    public function setDateRecord($dateRecord)
    {
        $this->dateRecord = $dateRecord;

        return $this;
    }

    /**
     * Get dateRecord
     *
     * @return \DateTime 
     */
    public function getDateRecord()
    {
        return $this->dateRecord;
    }

    /**
     * Set viatura
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viatura
     * @return ViaturaSaldo
     */
    public function setViatura(\Servicos\LumaBundle\Entity\Viatura $viatura = null)
    {
        $this->viatura = $viatura;

        return $this;
    }

    /**
     * Get viatura
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViatura()
    {
        return $this->viatura;
    }
}
