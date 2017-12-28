<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhRespostaInformativaColaborador
 */
class RhRespostaInformativaColaborador
{
    /**
     * @var integer
     */
    private $idRespostaInformativaColaborador;

    /**
     * @var integer
     */
    private $idPerguntaInformativa;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $resposta;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;


    /**
     * Get idRespostaInformativaColaborador
     *
     * @return integer 
     */
    public function getIdRespostaInformativaColaborador()
    {
        return $this->idRespostaInformativaColaborador;
    }

    /**
     * Set idPerguntaInformativa
     *
     * @param integer $idPerguntaInformativa
     * @return RhRespostaInformativaColaborador
     */
    public function setIdPerguntaInformativa($idPerguntaInformativa)
    {
        $this->idPerguntaInformativa = $idPerguntaInformativa;

        return $this;
    }

    /**
     * Get idPerguntaInformativa
     *
     * @return integer 
     */
    public function getIdPerguntaInformativa()
    {
        return $this->idPerguntaInformativa;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhRespostaInformativaColaborador
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
     * Set resposta
     *
     * @param string $resposta
     * @return RhRespostaInformativaColaborador
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    /**
     * Get resposta
     *
     * @return string 
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhRespostaInformativaColaborador
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhRespostaInformativaColaborador
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
}
