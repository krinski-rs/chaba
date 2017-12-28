<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersImagem
 */
class CadUsersImagem
{
    /**
     * @var integer
     */
    private $idImagem;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $urlImagem;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \DateTime
     */
    private $dataFoto;

    /**
     * @var boolean
     */
    private $principal;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $idCadUser;


    /**
     * Get idImagem
     *
     * @return integer 
     */
    public function getIdImagem()
    {
        return $this->idImagem;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return CadUsersImagem
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
     * Set descricao
     *
     * @param string $descricao
     * @return CadUsersImagem
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set urlImagem
     *
     * @param string $urlImagem
     * @return CadUsersImagem
     */
    public function setUrlImagem($urlImagem)
    {
        $this->urlImagem = $urlImagem;

        return $this;
    }

    /**
     * Get urlImagem
     *
     * @return string 
     */
    public function getUrlImagem()
    {
        return $this->urlImagem;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return CadUsersImagem
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
     * Set dataFoto
     *
     * @param \DateTime $dataFoto
     * @return CadUsersImagem
     */
    public function setDataFoto($dataFoto)
    {
        $this->dataFoto = $dataFoto;

        return $this;
    }

    /**
     * Get dataFoto
     *
     * @return \DateTime 
     */
    public function getDataFoto()
    {
        return $this->dataFoto;
    }

    /**
     * Set principal
     *
     * @param boolean $principal
     * @return CadUsersImagem
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean 
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set idCadUser
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $idCadUser
     * @return CadUsersImagem
     */
    public function setIdCadUser(\Servicos\GcdbBundle\Entity\CadUsers $idCadUser = null)
    {
        $this->idCadUser = $idCadUser;

        return $this;
    }

    /**
     * Get idCadUser
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getIdCadUser()
    {
        return $this->idCadUser;
    }
}
