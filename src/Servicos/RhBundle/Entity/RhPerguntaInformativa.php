<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhPerguntaInformativa
 */
class RhPerguntaInformativa
{
    /**
     * @var integer
     */
    private $idPerguntaInformativa;

    /**
     * @var string
     */
    private $pergunta;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $ativo;


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
     * Set pergunta
     *
     * @param string $pergunta
     * @return RhPerguntaInformativa
     */
    public function setPergunta($pergunta)
    {
        $this->pergunta = $pergunta;

        return $this;
    }

    /**
     * Get pergunta
     *
     * @return string 
     */
    public function getPergunta()
    {
        return $this->pergunta;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhPerguntaInformativa
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhPerguntaInformativa
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
