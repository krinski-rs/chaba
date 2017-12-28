<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDocumentoAtributo
 */
class RhDocumentoAtributo
{
    /**
     * @var integer
     */
    private $idDocumentoAtributo;

    /**
     * @var integer
     */
    private $idTipoAtributo;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var integer
     */
    private $pagina;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var integer
     */
    private $refenciaHistorico;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhDocumento
     */
    private $idDocumento;


    /**
     * Get idDocumentoAtributo
     *
     * @return integer 
     */
    public function getIdDocumentoAtributo()
    {
        return $this->idDocumentoAtributo;
    }

    /**
     * Set idTipoAtributo
     *
     * @param integer $idTipoAtributo
     * @return RhDocumentoAtributo
     */
    public function setIdTipoAtributo($idTipoAtributo)
    {
        $this->idTipoAtributo = $idTipoAtributo;

        return $this;
    }

    /**
     * Get idTipoAtributo
     *
     * @return integer 
     */
    public function getIdTipoAtributo()
    {
        return $this->idTipoAtributo;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return RhDocumentoAtributo
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
     * Set pagina
     *
     * @param integer $pagina
     * @return RhDocumentoAtributo
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get pagina
     *
     * @return integer 
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhDocumentoAtributo
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
     * @return RhDocumentoAtributo
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
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhDocumentoAtributo
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhDocumentoAtributo
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
     * Set refenciaHistorico
     *
     * @param integer $refenciaHistorico
     * @return RhDocumentoAtributo
     */
    public function setRefenciaHistorico($refenciaHistorico)
    {
        $this->refenciaHistorico = $refenciaHistorico;

        return $this;
    }

    /**
     * Get refenciaHistorico
     *
     * @return integer 
     */
    public function getRefenciaHistorico()
    {
        return $this->refenciaHistorico;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhDocumentoAtributo
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

    /**
     * Set idDocumento
     *
     * @param \Servicos\RhBundle\Entity\RhDocumento $idDocumento
     * @return RhDocumentoAtributo
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
