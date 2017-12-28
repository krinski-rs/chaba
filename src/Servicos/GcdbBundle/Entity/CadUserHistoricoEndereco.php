<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUserHistoricoEndereco
 */
class CadUserHistoricoEndereco
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadUserId;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var integer
     */
    private $admLogradouroId;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var integer
     */
    private $admPaisId;

    /**
     * @var integer
     */
    private $admUfId;

    /**
     * @var integer
     */
    private $admCidadeId;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var \DateTime
     */
    private $dataInc;


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
     * Set cadUserId
     *
     * @param integer $cadUserId
     * @return CadUserHistoricoEndereco
     */
    public function setCadUserId($cadUserId)
    {
        $this->cadUserId = $cadUserId;

        return $this;
    }

    /**
     * Get cadUserId
     *
     * @return integer 
     */
    public function getCadUserId()
    {
        return $this->cadUserId;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return CadUserHistoricoEndereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set admLogradouroId
     *
     * @param integer $admLogradouroId
     * @return CadUserHistoricoEndereco
     */
    public function setAdmLogradouroId($admLogradouroId)
    {
        $this->admLogradouroId = $admLogradouroId;

        return $this;
    }

    /**
     * Get admLogradouroId
     *
     * @return integer 
     */
    public function getAdmLogradouroId()
    {
        return $this->admLogradouroId;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return CadUserHistoricoEndereco
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return CadUserHistoricoEndereco
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
     * Set bairro
     *
     * @param string $bairro
     * @return CadUserHistoricoEndereco
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set admPaisId
     *
     * @param integer $admPaisId
     * @return CadUserHistoricoEndereco
     */
    public function setAdmPaisId($admPaisId)
    {
        $this->admPaisId = $admPaisId;

        return $this;
    }

    /**
     * Get admPaisId
     *
     * @return integer 
     */
    public function getAdmPaisId()
    {
        return $this->admPaisId;
    }

    /**
     * Set admUfId
     *
     * @param integer $admUfId
     * @return CadUserHistoricoEndereco
     */
    public function setAdmUfId($admUfId)
    {
        $this->admUfId = $admUfId;

        return $this;
    }

    /**
     * Get admUfId
     *
     * @return integer 
     */
    public function getAdmUfId()
    {
        return $this->admUfId;
    }

    /**
     * Set admCidadeId
     *
     * @param integer $admCidadeId
     * @return CadUserHistoricoEndereco
     */
    public function setAdmCidadeId($admCidadeId)
    {
        $this->admCidadeId = $admCidadeId;

        return $this;
    }

    /**
     * Get admCidadeId
     *
     * @return integer 
     */
    public function getAdmCidadeId()
    {
        return $this->admCidadeId;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return CadUserHistoricoEndereco
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return CadUserHistoricoEndereco
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return CadUserHistoricoEndereco
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
}
