<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GerenciaCrontab
 */
class GerenciaCrontab
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
     * @var string
     */
    private $caminho;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $maxDuracao;

    /**
     * @var string
     */
    private $frequencia;

    /**
     * @var integer
     */
    private $tempoFrequencia;

    /**
     * @var string
     */
    private $horaRodara;

    /**
     * @var \DateTime
     */
    private $ultimoRoda;


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
     * @return GerenciaCrontab
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
     * Set caminho
     *
     * @param string $caminho
     * @return GerenciaCrontab
     */
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }

    /**
     * Get caminho
     *
     * @return string 
     */
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return GerenciaCrontab
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
     * Set maxDuracao
     *
     * @param \DateTime $maxDuracao
     * @return GerenciaCrontab
     */
    public function setMaxDuracao($maxDuracao)
    {
        $this->maxDuracao = $maxDuracao;

        return $this;
    }

    /**
     * Get maxDuracao
     *
     * @return \DateTime 
     */
    public function getMaxDuracao()
    {
        return $this->maxDuracao;
    }

    /**
     * Set frequencia
     *
     * @param string $frequencia
     * @return GerenciaCrontab
     */
    public function setFrequencia($frequencia)
    {
        $this->frequencia = $frequencia;

        return $this;
    }

    /**
     * Get frequencia
     *
     * @return string 
     */
    public function getFrequencia()
    {
        return $this->frequencia;
    }

    /**
     * Set tempoFrequencia
     *
     * @param integer $tempoFrequencia
     * @return GerenciaCrontab
     */
    public function setTempoFrequencia($tempoFrequencia)
    {
        $this->tempoFrequencia = $tempoFrequencia;

        return $this;
    }

    /**
     * Get tempoFrequencia
     *
     * @return integer 
     */
    public function getTempoFrequencia()
    {
        return $this->tempoFrequencia;
    }

    /**
     * Set horaRodara
     *
     * @param string $horaRodara
     * @return GerenciaCrontab
     */
    public function setHoraRodara($horaRodara)
    {
        $this->horaRodara = $horaRodara;

        return $this;
    }

    /**
     * Get horaRodara
     *
     * @return string 
     */
    public function getHoraRodara()
    {
        return $this->horaRodara;
    }

    /**
     * Set ultimoRoda
     *
     * @param \DateTime $ultimoRoda
     * @return GerenciaCrontab
     */
    public function setUltimoRoda($ultimoRoda)
    {
        $this->ultimoRoda = $ultimoRoda;

        return $this;
    }

    /**
     * Get ultimoRoda
     *
     * @return \DateTime 
     */
    public function getUltimoRoda()
    {
        return $this->ultimoRoda;
    }
}
