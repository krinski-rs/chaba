<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaborador
 */
class RhColaborador
{
    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var integer
     */
    private $idCadUserSistech;

    /**
     * @var integer
     */
    private $idAltUsuarioSistech;

    /**
     * @var integer
     */
    private $unidCodigoid;

    /**
     * @var integer
     */
    private $matricula;

    /**
     * @var string
     */
    private $fone;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var \DateTime
     */
    private $dataNascimento;

    /**
     * @var integer
     */
    private $localNascimento;

    /**
     * @var string
     */
    private $estadoCivil;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $filiacaoProfissao;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaboradorPai;

    /**
     * @var \Servicos\RhBundle\Entity\RhTipoColaborador
     */
    private $idTipoColaborador;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaboradorAnterior;

    /** 
     * @var \Servicos\RhBundle\Entity\RhColaboradorFilial
     */
    private $colaboradorFilial;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuarios;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colaboradorCargo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colaboradorDepartamento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colaboradorCargo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->colaboradorDepartamento = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idCadUserSistech
     *
     * @param integer $idCadUserSistech
     * @return RhColaborador
     */
    public function setIdCadUserSistech($idCadUserSistech)
    {
        $this->idCadUserSistech = $idCadUserSistech;

        return $this;
    }

    /**
     * Get idCadUserSistech
     *
     * @return integer 
     */
    public function getIdCadUserSistech()
    {
        return $this->idCadUserSistech;
    }

    /**
     * Set idAltUsuarioSistech
     *
     * @param integer $idAltUsuarioSistech
     * @return RhColaborador
     */
    public function setIdAltUsuarioSistech($idAltUsuarioSistech)
    {
        $this->idAltUsuarioSistech = $idAltUsuarioSistech;

        return $this;
    }

    /**
     * Get idAltUsuarioSistech
     *
     * @return integer 
     */
    public function getIdAltUsuarioSistech()
    {
        return $this->idAltUsuarioSistech;
    }

    /**
     * Set unidCodigoid
     *
     * @param integer $unidCodigoid
     * @return RhColaborador
     */
    public function setUnidCodigoid($unidCodigoid)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return integer 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set matricula
     *
     * @param integer $matricula
     * @return RhColaborador
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
     * Set fone
     *
     * @param string $fone
     * @return RhColaborador
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get fone
     *
     * @return string 
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return RhColaborador
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
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     * @return RhColaborador
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime 
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set localNascimento
     *
     * @param integer $localNascimento
     * @return RhColaborador
     */
    public function setLocalNascimento($localNascimento)
    {
        $this->localNascimento = $localNascimento;

        return $this;
    }

    /**
     * Get localNascimento
     *
     * @return integer 
     */
    public function getLocalNascimento()
    {
        return $this->localNascimento;
    }

    /**
     * Set estadoCivil
     *
     * @param string $estadoCivil
     * @return RhColaborador
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return string 
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return RhColaborador
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
     * Set filiacaoProfissao
     *
     * @param string $filiacaoProfissao
     * @return RhColaborador
     */
    public function setFiliacaoProfissao($filiacaoProfissao)
    {
        $this->filiacaoProfissao = $filiacaoProfissao;

        return $this;
    }

    /**
     * Get filiacaoProfissao
     *
     * @return string 
     */
    public function getFiliacaoProfissao()
    {
        return $this->filiacaoProfissao;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return RhColaborador
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaborador
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
     * Set cpf
     *
     * @param string $cpf
     * @return RhColaborador
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaborador
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhColaborador
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
     * Set idColaboradorPai
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaboradorPai
     * @return RhColaborador
     */
    public function setIdColaboradorPai(\Servicos\RhBundle\Entity\RhColaborador $idColaboradorPai = null)
    {
        $this->idColaboradorPai = $idColaboradorPai;

        return $this;
    }

    /**
     * Get idColaboradorPai
     *
     * @return \Servicos\RhBundle\Entity\RhColaborador 
     */
    public function getIdColaboradorPai()
    {
        return $this->idColaboradorPai;
    }

    /**
     * Set idTipoColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhTipoColaborador $idTipoColaborador
     * @return RhColaborador
     */
    public function setIdTipoColaborador(\Servicos\RhBundle\Entity\RhTipoColaborador $idTipoColaborador = null)
    {
        $this->idTipoColaborador = $idTipoColaborador;

        return $this;
    }

    /**
     * Get idTipoColaborador
     *
     * @return \Servicos\RhBundle\Entity\RhTipoColaborador 
     */
    public function getIdTipoColaborador()
    {
        return $this->idTipoColaborador;
    }

    /**
     * Set idColaboradorAnterior
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaboradorAnterior
     * @return RhColaborador
     */
    public function setIdColaboradorAnterior(\Servicos\RhBundle\Entity\RhColaborador $idColaboradorAnterior = null)
    {
        $this->idColaboradorAnterior = $idColaboradorAnterior;

        return $this;
    }

    /**
     * Get idColaboradorAnterior
     *
     * @return \Servicos\RhBundle\Entity\RhColaborador 
     */
    public function getIdColaboradorAnterior()
    {
        return $this->idColaboradorAnterior;
    }
    

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return RhColaborador
     */
    public function setCadUsers(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers = null)
    {
        $this->cadUsers = $cadUsers;

        return $this;
    }

    /**
     * Get cadUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers()
    {
        return $this->cadUsers;
    }

    /**
     * Set autUsuarios
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios
     * @return RhColaborador
     */
    public function setAutUsuarios(\Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios = null)
    {
        $this->autUsuarios = $autUsuarios;

        return $this;
    }

    /**
     * Get autUsuarios
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getAutUsuarios()
    {
        return $this->autUsuarios;
    }

    /**
     * Set unidade
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidade
     * @return RhColaborador
     */
    public function setUnidade(\Servicos\LumaBundle\Entity\Unidade $unidade = null)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * Add colaboradorCargo
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo
     * @return RhColaborador
     */
    public function addColaboradorCargo(\Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo)
    {
        $this->colaboradorCargo[] = $colaboradorCargo;

        return $this;
    }

    /**
     * Remove colaboradorCargo
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo
     */
    public function removeColaboradorCargo(\Servicos\RhBundle\Entity\RhColaboradorCargo $colaboradorCargo)
    {
        $this->colaboradorCargo->removeElement($colaboradorCargo);
    }

    /**
     * Get colaboradorCargo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColaboradorCargo()
    {
        return $this->colaboradorCargo;
    }

    /**
     * Add colaboradorDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento
     * @return RhColaborador
     */
    public function addColaboradorDepartamento(\Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento)
    {
        $this->colaboradorDepartamento[] = $colaboradorDepartamento;

        return $this;
    }

    /**
     * Remove colaboradorDepartamento
     *
     * @param \Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento
     */
    public function removeColaboradorDepartamento(\Servicos\RhBundle\Entity\RhColaboradorDepartamento $colaboradorDepartamento)
    {
        $this->colaboradorDepartamento->removeElement($colaboradorDepartamento);
    }

    /**
     * Get colaboradorDepartamento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColaboradorDepartamento()
    {
        return $this->colaboradorDepartamento;
    }

    public function getColaboradorFilial()
    {
        return $this->colaboradorFilial;
    }
}
