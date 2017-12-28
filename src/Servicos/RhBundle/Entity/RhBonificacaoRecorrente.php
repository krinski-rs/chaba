<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBonificacaoRecorrente
 */
class RhBonificacaoRecorrente
{
    /**
     * @var integer
     */
    private $idBonificacaoRecorrente;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var integer
     */
    private $percentual;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idBonificacaoRecorrente
     *
     * @return integer 
     */
    public function getIdBonificacaoRecorrente()
    {
        return $this->idBonificacaoRecorrente;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhBonificacaoRecorrente
     */
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return integer 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return RhBonificacaoRecorrente
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
     * Set percentual
     *
     * @param integer $percentual
     * @return RhBonificacaoRecorrente
     */
    public function setPercentual($percentual)
    {
        $this->percentual = $percentual;

        return $this;
    }

    /**
     * Get percentual
     *
     * @return integer 
     */
    public function getPercentual()
    {
        return $this->percentual;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhBonificacaoRecorrente
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhBonificacaoRecorrente
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhBonificacaoRecorrente
     */
    public function setRegistranteEdicao($registranteEdicao)
    {
        $this->registranteEdicao = $registranteEdicao;

        return $this;
    }

    /**
     * Get registranteEdicao
     *
     * @return integer 
     */
    public function getRegistranteEdicao()
    {
        return $this->registranteEdicao;
    }

    /**
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhBonificacaoRecorrente
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;

        return $this;
    }

    /**
     * Get dataEdicao
     *
     * @return \DateTime 
     */
    public function getDataEdicao()
    {
        return $this->dataEdicao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhBonificacaoRecorrente
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
