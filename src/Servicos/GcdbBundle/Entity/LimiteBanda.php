<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LimiteBanda
 */
class LimiteBanda
{
    /**
     * @var integer
     */
    private $circBandaid;

    /**
     * @var string
     */
    private $circLimite;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataEdit;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get circBandaid
     *
     * @return integer 
     */
    public function getCircBandaid()
    {
        return $this->circBandaid;
    }

    /**
     * Set circLimite
     *
     * @param string $circLimite
     * @return LimiteBanda
     */
    public function setCircLimite($circLimite)
    {
        $this->circLimite = $circLimite;

        return $this;
    }

    /**
     * Get circLimite
     *
     * @return string 
     */
    public function getCircLimite()
    {
        return $this->circLimite;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return LimiteBanda
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set dataEdit
     *
     * @param \DateTime $dataEdit
     * @return LimiteBanda
     */
    public function setDataEdit($dataEdit)
    {
        $this->dataEdit = $dataEdit;

        return $this;
    }

    /**
     * Get dataEdit
     *
     * @return \DateTime 
     */
    public function getDataEdit()
    {
        return $this->dataEdit;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return LimiteBanda
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
