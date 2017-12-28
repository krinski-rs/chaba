<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadUsers
 */
class TempCadUsers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cnpj;

    /**
     * @var integer
     */
    private $cpf;

    /**
     * @var string
     */
    private $inscEst;

    /**
     * @var string
     */
    private $inscMun;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var \DateTime
     */
    private $dtAbertura;

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
    private $endereco;

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
    private $admCidadesId;

    /**
     * @var string
     */
    private $site;

    /**
     * @var \DateTime
     */
    private $dtCadastro;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $qtfoto;


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
     * Set cnpj
     *
     * @param integer $cnpj
     * @return TempCadUsers
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return integer 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set cpf
     *
     * @param integer $cpf
     * @return TempCadUsers
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return integer 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set inscEst
     *
     * @param string $inscEst
     * @return TempCadUsers
     */
    public function setInscEst($inscEst)
    {
        $this->inscEst = $inscEst;

        return $this;
    }

    /**
     * Get inscEst
     *
     * @return string 
     */
    public function getInscEst()
    {
        return $this->inscEst;
    }

    /**
     * Set inscMun
     *
     * @param string $inscMun
     * @return TempCadUsers
     */
    public function setInscMun($inscMun)
    {
        $this->inscMun = $inscMun;

        return $this;
    }

    /**
     * Get inscMun
     *
     * @return string 
     */
    public function getInscMun()
    {
        return $this->inscMun;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return TempCadUsers
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set dtAbertura
     *
     * @param \DateTime $dtAbertura
     * @return TempCadUsers
     */
    public function setDtAbertura($dtAbertura)
    {
        $this->dtAbertura = $dtAbertura;

        return $this;
    }

    /**
     * Get dtAbertura
     *
     * @return \DateTime 
     */
    public function getDtAbertura()
    {
        return $this->dtAbertura;
    }

    /**
     * Set admLogradouroId
     *
     * @param integer $admLogradouroId
     * @return TempCadUsers
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
     * @return TempCadUsers
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
     * Set endereco
     *
     * @param string $endereco
     * @return TempCadUsers
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
     * Set numero
     *
     * @param string $numero
     * @return TempCadUsers
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
     * @return TempCadUsers
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
     * @return TempCadUsers
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
     * @return TempCadUsers
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
     * Set admCidadesId
     *
     * @param integer $admCidadesId
     * @return TempCadUsers
     */
    public function setAdmCidadesId($admCidadesId)
    {
        $this->admCidadesId = $admCidadesId;

        return $this;
    }

    /**
     * Get admCidadesId
     *
     * @return integer 
     */
    public function getAdmCidadesId()
    {
        return $this->admCidadesId;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return TempCadUsers
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return TempCadUsers
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;

        return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return \DateTime 
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return TempCadUsers
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set qtfoto
     *
     * @param integer $qtfoto
     * @return TempCadUsers
     */
    public function setQtfoto($qtfoto)
    {
        $this->qtfoto = $qtfoto;

        return $this;
    }

    /**
     * Get qtfoto
     *
     * @return integer 
     */
    public function getQtfoto()
    {
        return $this->qtfoto;
    }
}
