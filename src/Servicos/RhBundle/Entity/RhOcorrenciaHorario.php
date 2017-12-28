<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhOcorrenciaHorario
 */
class RhOcorrenciaHorario
{
    /**
     * @var integer
     */
    private $idocorrencia;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $horaEntrada;

    /**
     * @var string
     */
    private $intervaloInicio;

    /**
     * @var string
     */
    private $intervaloFim;

    /**
     * @var \DateTime
     */
    private $horaSaida;

    /**
     * @var integer
     */
    private $matricula;

    /**
     * @var integer
     */
    private $registranteLeitura;

    /**
     * @var string
     */
    private $observacao;

    /**
     * @var \DateTime
     */
    private $dataLeitura;

    /**
     * @var \Servicos\RhBundle\Entity\RhDocumentoGen
     */
    private $idDocumentoGen;

    /**
     * @var \Servicos\RhBundle\Entity\RhCategoriaOcorrencia
     */
    private $idCategoriaOcorrencia;


    /**
     * Get idocorrencia
     *
     * @return integer 
     */
    public function getIdocorrencia()
    {
        return $this->idocorrencia;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhOcorrenciaHorario
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
     * Set horaEntrada
     *
     * @param \DateTime $horaEntrada
     * @return RhOcorrenciaHorario
     */
    public function setHoraEntrada($horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;

        return $this;
    }

    /**
     * Get horaEntrada
     *
     * @return \DateTime 
     */
    public function getHoraEntrada()
    {
        return $this->horaEntrada;
    }

    /**
     * Set intervaloInicio
     *
     * @param string $intervaloInicio
     * @return RhOcorrenciaHorario
     */
    public function setIntervaloInicio($intervaloInicio)
    {
        $this->intervaloInicio = $intervaloInicio;

        return $this;
    }

    /**
     * Get intervaloInicio
     *
     * @return string 
     */
    public function getIntervaloInicio()
    {
        return $this->intervaloInicio;
    }

    /**
     * Set intervaloFim
     *
     * @param string $intervaloFim
     * @return RhOcorrenciaHorario
     */
    public function setIntervaloFim($intervaloFim)
    {
        $this->intervaloFim = $intervaloFim;

        return $this;
    }

    /**
     * Get intervaloFim
     *
     * @return string 
     */
    public function getIntervaloFim()
    {
        return $this->intervaloFim;
    }

    /**
     * Set horaSaida
     *
     * @param \DateTime $horaSaida
     * @return RhOcorrenciaHorario
     */
    public function setHoraSaida($horaSaida)
    {
        $this->horaSaida = $horaSaida;

        return $this;
    }

    /**
     * Get horaSaida
     *
     * @return \DateTime 
     */
    public function getHoraSaida()
    {
        return $this->horaSaida;
    }

    /**
     * Set matricula
     *
     * @param integer $matricula
     * @return RhOcorrenciaHorario
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return integer 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set registranteLeitura
     *
     * @param integer $registranteLeitura
     * @return RhOcorrenciaHorario
     */
    public function setRegistranteLeitura($registranteLeitura)
    {
        $this->registranteLeitura = $registranteLeitura;

        return $this;
    }

    /**
     * Get registranteLeitura
     *
     * @return integer 
     */
    public function getRegistranteLeitura()
    {
        return $this->registranteLeitura;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return RhOcorrenciaHorario
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string 
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set dataLeitura
     *
     * @param \DateTime $dataLeitura
     * @return RhOcorrenciaHorario
     */
    public function setDataLeitura($dataLeitura)
    {
        $this->dataLeitura = $dataLeitura;

        return $this;
    }

    /**
     * Get dataLeitura
     *
     * @return \DateTime 
     */
    public function getDataLeitura()
    {
        return $this->dataLeitura;
    }

    /**
     * Set idDocumentoGen
     *
     * @param \Servicos\RhBundle\Entity\RhDocumentoGen $idDocumentoGen
     * @return RhOcorrenciaHorario
     */
    public function setIdDocumentoGen(\Servicos\RhBundle\Entity\RhDocumentoGen $idDocumentoGen = null)
    {
        $this->idDocumentoGen = $idDocumentoGen;

        return $this;
    }

    /**
     * Get idDocumentoGen
     *
     * @return \Servicos\RhBundle\Entity\RhDocumentoGen 
     */
    public function getIdDocumentoGen()
    {
        return $this->idDocumentoGen;
    }

    /**
     * Set idCategoriaOcorrencia
     *
     * @param \Servicos\RhBundle\Entity\RhCategoriaOcorrencia $idCategoriaOcorrencia
     * @return RhOcorrenciaHorario
     */
    public function setIdCategoriaOcorrencia(\Servicos\RhBundle\Entity\RhCategoriaOcorrencia $idCategoriaOcorrencia = null)
    {
        $this->idCategoriaOcorrencia = $idCategoriaOcorrencia;

        return $this;
    }

    /**
     * Get idCategoriaOcorrencia
     *
     * @return \Servicos\RhBundle\Entity\RhCategoriaOcorrencia 
     */
    public function getIdCategoriaOcorrencia()
    {
        return $this->idCategoriaOcorrencia;
    }
}
