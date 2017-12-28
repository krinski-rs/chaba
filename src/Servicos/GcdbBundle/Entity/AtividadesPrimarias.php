<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AtividadesPrimarias
 */
class AtividadesPrimarias
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
    private $paiId;

    /**
     * @var integer
     */
    private $nivel;

    /**
     * @var string
     */
    private $codCnae;


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
     * @return AtividadesPrimarias
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
     * Set paiId
     *
     * @param integer $paiId
     * @return AtividadesPrimarias
     */
    public function setPaiId($paiId)
    {
        $this->paiId = $paiId;

        return $this;
    }

    /**
     * Get paiId
     *
     * @return integer 
     */
    public function getPaiId()
    {
        return $this->paiId;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     * @return AtividadesPrimarias
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set codCnae
     *
     * @param string $codCnae
     * @return AtividadesPrimarias
     */
    public function setCodCnae($codCnae)
    {
        $this->codCnae = $codCnae;

        return $this;
    }

    /**
     * Get codCnae
     *
     * @return string 
     */
    public function getCodCnae()
    {
        return $this->codCnae;
    }
}
