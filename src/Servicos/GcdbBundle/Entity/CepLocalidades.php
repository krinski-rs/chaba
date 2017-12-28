<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CepLocalidades
 */
class CepLocalidades
{
    /**
     * @var integer
     */
    private $idlocalidades;

    /**
     * @var string
     */
    private $localidade;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $uf;

    /**
     * @var integer
     */
    private $situacao;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $idlocalidadessub;


    /**
     * Get idlocalidades
     *
     * @return integer 
     */
    public function getIdlocalidades()
    {
        return $this->idlocalidades;
    }

    /**
     * Set localidade
     *
     * @param string $localidade
     * @return CepLocalidades
     */
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;

        return $this;
    }

    /**
     * Get localidade
     *
     * @return string 
     */
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return CepLocalidades
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
     * @return CepLocalidades
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
     * Set situacao
     *
     * @param integer $situacao
     * @return CepLocalidades
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

    /**
     * Get situacao
     *
     * @return integer 
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return CepLocalidades
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
     * Set idlocalidadessub
     *
     * @param integer $idlocalidadessub
     * @return CepLocalidades
     */
    public function setIdlocalidadessub($idlocalidadessub)
    {
        $this->idlocalidadessub = $idlocalidadessub;

        return $this;
    }

    /**
     * Get idlocalidadessub
     *
     * @return integer 
     */
    public function getIdlocalidadessub()
    {
        return $this->idlocalidadessub;
    }
}
