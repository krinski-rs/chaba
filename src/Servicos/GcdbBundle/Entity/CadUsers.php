<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsers
 */
class CadUsers
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
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var integer
     */
    private $simples;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadUsersNome;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadLigacaoU2u;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadUsersEmail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cadUsersTelefone;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmLogradouro
     */
    private $admLogradouro;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmPais
     */
    private $admPais;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmUf
     */
    private $admUf;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmCidades
     */
    private $admCidades;
    
    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsersSegmento
     */
    private $segmento;

    /**
     * @var string
     */
    private $atividadeRamo;

    /**
     * @var string
     */
    private $tipoCliente;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cadUsersNome = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cadLigacaoU2u = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cadUsersEmail = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cadUsersTelefone = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * Set cep
     *
     * @param string $cep
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * Set site
     *
     * @param string $site
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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
     * @return CadUsers
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

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return CadUsers
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
     * @return CadUsers
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
     * Set simples
     *
     * @param integer $simples
     * @return CadUsers
     */
    public function setSimples($simples)
    {
        $this->simples = $simples;

        return $this;
    }

    /**
     * Get simples
     *
     * @return integer 
     */
    public function getSimples()
    {
        return $this->simples;
    }

    /**
     * Add cadUsersNome
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersNome $cadUsersNome
     * @return CadUsers
     */
    public function addCadUsersNome(\Servicos\GcdbBundle\Entity\CadUsersNome $cadUsersNome)
    {
        $this->cadUsersNome[] = $cadUsersNome;

        return $this;
    }

    /**
     * Remove cadUsersNome
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersNome $cadUsersNome
     */
    public function removeCadUsersNome(\Servicos\GcdbBundle\Entity\CadUsersNome $cadUsersNome)
    {
        $this->cadUsersNome->removeElement($cadUsersNome);
    }

    /**
     * Get cadUsersNome
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadUsersNome()
    {
        return $this->cadUsersNome;
    }

    public function getFullName()
    {
        $names = $this->getCadUsersNome();
        $fullName = array();

        foreach ($names as $name) {
            $key = (int)$name->getAdmTipoNome()->getId();
            $fullName[$key] = $name->getNome();
        }

        return implode(' ', $fullName);
    }

    /**
     * Add cadLigacaoU2u
     *
     * @param \Servicos\GcdbBundle\Entity\CadLigacaoU2u $cadLigacaoU2u
     * @return CadUsers
     */
    public function addCadLigacaoU2u(\Servicos\GcdbBundle\Entity\CadLigacaoU2u $cadLigacaoU2u)
    {
        $this->cadLigacaoU2u[] = $cadLigacaoU2u;

        return $this;
    }

    /**
     * Remove cadLigacaoU2u
     *
     * @param \Servicos\GcdbBundle\Entity\CadLigacaoU2u $cadLigacaoU2u
     */
    public function removeCadLigacaoU2u(\Servicos\GcdbBundle\Entity\CadLigacaoU2u $cadLigacaoU2u)
    {
        $this->cadLigacaoU2u->removeElement($cadLigacaoU2u);
    }

    /**
     * Get cadLigacaoU2u
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadLigacaoU2u()
    {
        return $this->cadLigacaoU2u;
    }

    /**
     * Add cadUsersEmail
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersEmail $cadUsersEmail
     * @return CadUsers
     */
    public function addCadUsersEmail(\Servicos\GcdbBundle\Entity\CadUsersEmail $cadUsersEmail)
    {
        $this->cadUsersEmail[] = $cadUsersEmail;

        return $this;
    }

    /**
     * Remove cadUsersEmail
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersEmail $cadUsersEmail
     */
    public function removeCadUsersEmail(\Servicos\GcdbBundle\Entity\CadUsersEmail $cadUsersEmail)
    {
        $this->cadUsersEmail->removeElement($cadUsersEmail);
    }

    /**
     * Get cadUsersEmail
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadUsersEmail()
    {
        return $this->cadUsersEmail;
    }

    /**
     * Add cadUsersTelefone
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersTelefone $cadUsersTelefone
     * @return CadUsers
     */
    public function addCadUsersTelefone(\Servicos\GcdbBundle\Entity\CadUsersTelefone $cadUsersTelefone)
    {
        $this->cadUsersTelefone[] = $cadUsersTelefone;

        return $this;
    }

    /**
     * Remove cadUsersTelefone
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersTelefone $cadUsersTelefone
     */
    public function removeCadUsersTelefone(\Servicos\GcdbBundle\Entity\CadUsersTelefone $cadUsersTelefone)
    {
        $this->cadUsersTelefone->removeElement($cadUsersTelefone);
    }

    /**
     * Get cadUsersTelefone
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadUsersTelefone()
    {
        return $this->cadUsersTelefone;
    }

    /**
     * Set admLogradouro
     *
     * @param \Servicos\GcdbBundle\Entity\AdmLogradouro $admLogradouro
     * @return CadUsers
     */
    public function setAdmLogradouro(\Servicos\GcdbBundle\Entity\AdmLogradouro $admLogradouro = null)
    {
        $this->admLogradouro = $admLogradouro;

        return $this;
    }

    /**
     * Get admLogradouro
     *
     * @return \Servicos\GcdbBundle\Entity\AdmLogradouro 
     */
    public function getAdmLogradouro()
    {
        return $this->admLogradouro;
    }

    /**
     * Set admPais
     *
     * @param \Servicos\GcdbBundle\Entity\AdmPais $admPais
     * @return CadUsers
     */
    public function setAdmPais(\Servicos\GcdbBundle\Entity\AdmPais $admPais = null)
    {
        $this->admPais = $admPais;

        return $this;
    }

    /**
     * Get admPais
     *
     * @return \Servicos\GcdbBundle\Entity\AdmPais 
     */
    public function getAdmPais()
    {
        return $this->admPais;
    }

    /**
     * Set admUf
     *
     * @param \Servicos\GcdbBundle\Entity\AdmUf $admUf
     * @return CadUsers
     */
    public function setAdmUf(\Servicos\GcdbBundle\Entity\AdmUf $admUf = null)
    {
        $this->admUf = $admUf;

        return $this;
    }

    /**
     * Get admUf
     *
     * @return \Servicos\GcdbBundle\Entity\AdmUf 
     */
    public function getAdmUf()
    {
        return $this->admUf;
    }

    /**
     * Set admCidades
     *
     * @param \Servicos\GcdbBundle\Entity\AdmCidades $admCidades
     * @return CadUsers
     */
    public function setAdmCidades(\Servicos\GcdbBundle\Entity\AdmCidades $admCidades = null)
    {
        $this->admCidades = $admCidades;

        return $this;
    }

    /**
     * Get admCidades
     *
     * @return \Servicos\GcdbBundle\Entity\AdmCidades 
     */
    public function getAdmCidades()
    {
        return $this->admCidades;
    }
    
    /**
     * Set segmento
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsersSegmento $segmento
     * @return CadUsers
     */
    public function setSegmento(\Servicos\GcdbBundle\Entity\CadUsersSegmento $segmento = null)
    {
    	$this->segmento = $segmento;
    
    	return $this;
    }
    
    /**
     * Get segmento
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsersSegmento
     */
    public function getSegmento()
    {
    	return $this->segmento;
    }


    /**
     * Set atividadeRamo
     *
     * @param string $atividadeRamo
     * @return CadUsers
     */
    public function setAtividadeRamo($atividadeRamo)
    {
        $this->atividadeRamo = $atividadeRamo;

        return $this;
    }

    /**
     * Get atividadeRamo
     *
     * @return string 
     */
    public function getAtividadeRamo()
    {
        return $this->atividadeRamo;
    }


    /**
     * Set tipoCliente
     *
     * @param string $tipoCliente
     * @return CadUsers
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;

        return $this;
    }

    /**
     * Get tipoCliente
     *
     * @return string 
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

}
