<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poplocalizacao
 */
class Poplocalizacao
{
    /**
     * @var integer
     */
    private $idLocalizacao;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $latitudeMaps;

    /**
     * @var string
     */
    private $longitudeMaps;

    /**
     * @var string
     */
    private $telefone1;

    /**
     * @var string
     */
    private $telefone2;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $numero;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var string
     */
    private $complementoNumero;

    /**
     * @var integer
     */
    private $localeCodigoid;


    /**
     * Get idLocalizacao
     *
     * @return integer 
     */
    public function getIdLocalizacao()
    {
        return $this->idLocalizacao;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return Poplocalizacao
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return Poplocalizacao
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
     * Set bairro
     *
     * @param string $bairro
     * @return Poplocalizacao
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
     * Set referencia
     *
     * @param string $referencia
     * @return Poplocalizacao
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Poplocalizacao
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
     * @return Poplocalizacao
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
     * Set latitudeMaps
     *
     * @param string $latitudeMaps
     * @return Poplocalizacao
     */
    public function setLatitudeMaps($latitudeMaps)
    {
        $this->latitudeMaps = $latitudeMaps;

        return $this;
    }

    /**
     * Get latitudeMaps
     *
     * @return string 
     */
    public function getLatitudeMaps()
    {
        return $this->latitudeMaps;
    }

    /**
     * Set longitudeMaps
     *
     * @param string $longitudeMaps
     * @return Poplocalizacao
     */
    public function setLongitudeMaps($longitudeMaps)
    {
        $this->longitudeMaps = $longitudeMaps;

        return $this;
    }

    /**
     * Get longitudeMaps
     *
     * @return string 
     */
    public function getLongitudeMaps()
    {
        return $this->longitudeMaps;
    }

    /**
     * Set telefone1
     *
     * @param string $telefone1
     * @return Poplocalizacao
     */
    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;

        return $this;
    }

    /**
     * Get telefone1
     *
     * @return string 
     */
    public function getTelefone1()
    {
        return $this->telefone1;
    }

    /**
     * Set telefone2
     *
     * @param string $telefone2
     * @return Poplocalizacao
     */
    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;

        return $this;
    }

    /**
     * Get telefone2
     *
     * @return string 
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return Poplocalizacao
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
     * Set uf
     *
     * @param string $uf
     * @return Poplocalizacao
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string 
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Poplocalizacao
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
     * Set numero
     *
     * @param integer $numero
     * @return Poplocalizacao
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return Poplocalizacao
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set complementoNumero
     *
     * @param string $complementoNumero
     * @return Poplocalizacao
     */
    public function setComplementoNumero($complementoNumero)
    {
        $this->complementoNumero = $complementoNumero;

        return $this;
    }

    /**
     * Get complementoNumero
     *
     * @return string 
     */
    public function getComplementoNumero()
    {
        return $this->complementoNumero;
    }

    /**
     * Set localeCodigoid
     *
     * @param integer $localeCodigoid
     * @return Poplocalizacao
     */
    public function setLocaleCodigoid($localeCodigoid)
    {
        $this->localeCodigoid = $localeCodigoid;

        return $this;
    }

    /**
     * Get localeCodigoid
     *
     * @return integer 
     */
    public function getLocaleCodigoid()
    {
        return $this->localeCodigoid;
    }
}
