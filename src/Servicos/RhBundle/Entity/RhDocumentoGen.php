<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDocumentoGen
 */
class RhDocumentoGen
{
    /**
     * @var integer
     */
    private $idDocumentoGen;

    /**
     * @var integer
     */
    private $sistechTmpId;

    /**
     * @var integer
     */
    private $sistechTmpHistoricoId;

    /**
     * @var string
     */
    private $sessao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $registranteRetorno;

    /**
     * @var \DateTime
     */
    private $dataRetorno;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;

    /**
     * @var \Servicos\RhBundle\Entity\RhDocumento
     */
    private $idDocumento;


    /**
     * Get idDocumentoGen
     *
     * @return integer 
     */
    public function getIdDocumentoGen()
    {
        return $this->idDocumentoGen;
    }

    /**
     * Set sistechTmpId
     *
     * @param integer $sistechTmpId
     * @return RhDocumentoGen
     */
    public function setSistechTmpId($sistechTmpId)
    {
        $this->sistechTmpId = $sistechTmpId;

        return $this;
    }

    /**
     * Get sistechTmpId
     *
     * @return integer 
     */
    public function getSistechTmpId()
    {
        return $this->sistechTmpId;
    }

    /**
     * Set sistechTmpHistoricoId
     *
     * @param integer $sistechTmpHistoricoId
     * @return RhDocumentoGen
     */
    public function setSistechTmpHistoricoId($sistechTmpHistoricoId)
    {
        $this->sistechTmpHistoricoId = $sistechTmpHistoricoId;

        return $this;
    }

    /**
     * Get sistechTmpHistoricoId
     *
     * @return integer 
     */
    public function getSistechTmpHistoricoId()
    {
        return $this->sistechTmpHistoricoId;
    }

    /**
     * Set sessao
     *
     * @param string $sessao
     * @return RhDocumentoGen
     */
    public function setSessao($sessao)
    {
        $this->sessao = $sessao;

        return $this;
    }

    /**
     * Get sessao
     *
     * @return string 
     */
    public function getSessao()
    {
        return $this->sessao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhDocumentoGen
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
     * @return RhDocumentoGen
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
     * Set registranteRetorno
     *
     * @param integer $registranteRetorno
     * @return RhDocumentoGen
     */
    public function setRegistranteRetorno($registranteRetorno)
    {
        $this->registranteRetorno = $registranteRetorno;

        return $this;
    }

    /**
     * Get registranteRetorno
     *
     * @return integer 
     */
    public function getRegistranteRetorno()
    {
        return $this->registranteRetorno;
    }

    /**
     * Set dataRetorno
     *
     * @param \DateTime $dataRetorno
     * @return RhDocumentoGen
     */
    public function setDataRetorno($dataRetorno)
    {
        $this->dataRetorno = $dataRetorno;

        return $this;
    }

    /**
     * Get dataRetorno
     *
     * @return \DateTime 
     */
    public function getDataRetorno()
    {
        return $this->dataRetorno;
    }

    /**
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhDocumentoGen
     */
    public function setIdColaborador(\Servicos\RhBundle\Entity\RhColaborador $idColaborador = null)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return \Servicos\RhBundle\Entity\RhColaborador 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set idDocumento
     *
     * @param \Servicos\RhBundle\Entity\RhDocumento $idDocumento
     * @return RhDocumentoGen
     */
    public function setIdDocumento(\Servicos\RhBundle\Entity\RhDocumento $idDocumento = null)
    {
        $this->idDocumento = $idDocumento;

        return $this;
    }

    /**
     * Get idDocumento
     *
     * @return \Servicos\RhBundle\Entity\RhDocumento 
     */
    public function getIdDocumento()
    {
        return $this->idDocumento;
    }
}
