<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDocumento
 */
class RhDocumento
{
    /**
     * @var integer
     */
    private $idDocumento;

    /**
     * @var \DateTime
     */
    private $dataExpedicao;

    /**
     * @var \DateTime
     */
    private $dataVencimento;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $urlDocumento;

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
    private $registrante;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;

    /**
     * @var \Servicos\RhBundle\Entity\RhDocumentoTipo
     */
    private $idDocumentoTipo;


    /**
     * Get idDocumento
     *
     * @return integer 
     */
    public function getIdDocumento()
    {
        return $this->idDocumento;
    }

    /**
     * Set dataExpedicao
     *
     * @param \DateTime $dataExpedicao
     * @return RhDocumento
     */
    public function setDataExpedicao($dataExpedicao)
    {
        $this->dataExpedicao = $dataExpedicao;

        return $this;
    }

    /**
     * Get dataExpedicao
     *
     * @return \DateTime 
     */
    public function getDataExpedicao()
    {
        return $this->dataExpedicao;
    }

    /**
     * Set dataVencimento
     *
     * @param \DateTime $dataVencimento
     * @return RhDocumento
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;

        return $this;
    }

    /**
     * Get dataVencimento
     *
     * @return \DateTime 
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return RhDocumento
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set urlDocumento
     *
     * @param string $urlDocumento
     * @return RhDocumento
     */
    public function setUrlDocumento($urlDocumento)
    {
        $this->urlDocumento = $urlDocumento;

        return $this;
    }

    /**
     * Get urlDocumento
     *
     * @return string 
     */
    public function getUrlDocumento()
    {
        return $this->urlDocumento;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhDocumento
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
     * @return RhDocumento
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhDocumento
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhDocumento
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhDocumento
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
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhDocumento
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
     * Set idDocumentoTipo
     *
     * @param \Servicos\RhBundle\Entity\RhDocumentoTipo $idDocumentoTipo
     * @return RhDocumento
     */
    public function setIdDocumentoTipo(\Servicos\RhBundle\Entity\RhDocumentoTipo $idDocumentoTipo = null)
    {
        $this->idDocumentoTipo = $idDocumentoTipo;

        return $this;
    }

    /**
     * Get idDocumentoTipo
     *
     * @return \Servicos\RhBundle\Entity\RhDocumentoTipo 
     */
    public function getIdDocumentoTipo()
    {
        return $this->idDocumentoTipo;
    }
}
