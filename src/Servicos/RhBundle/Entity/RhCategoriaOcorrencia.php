<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhCategoriaOcorrencia
 */
class RhCategoriaOcorrencia
{
    /**
     * @var integer
     */
    private $idCategoriaOcorrencia;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var boolean
     */
    private $advertencia;

    /**
     * @var boolean
     */
    private $emailGestor;

    /**
     * @var boolean
     */
    private $emailRh;


    /**
     * Get idCategoriaOcorrencia
     *
     * @return integer 
     */
    public function getIdCategoriaOcorrencia()
    {
        return $this->idCategoriaOcorrencia;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhCategoriaOcorrencia
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set advertencia
     *
     * @param boolean $advertencia
     * @return RhCategoriaOcorrencia
     */
    public function setAdvertencia($advertencia)
    {
        $this->advertencia = $advertencia;

        return $this;
    }

    /**
     * Get advertencia
     *
     * @return boolean 
     */
    public function getAdvertencia()
    {
        return $this->advertencia;
    }

    /**
     * Set emailGestor
     *
     * @param boolean $emailGestor
     * @return RhCategoriaOcorrencia
     */
    public function setEmailGestor($emailGestor)
    {
        $this->emailGestor = $emailGestor;

        return $this;
    }

    /**
     * Get emailGestor
     *
     * @return boolean 
     */
    public function getEmailGestor()
    {
        return $this->emailGestor;
    }

    /**
     * Set emailRh
     *
     * @param boolean $emailRh
     * @return RhCategoriaOcorrencia
     */
    public function setEmailRh($emailRh)
    {
        $this->emailRh = $emailRh;

        return $this;
    }

    /**
     * Get emailRh
     *
     * @return boolean 
     */
    public function getEmailRh()
    {
        return $this->emailRh;
    }
}
