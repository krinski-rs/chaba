<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Viatura
 */
class Viatura
{
    /**
     * @var integer
     */
    private $viaturaid;

    /**
     * @var integer
     */
    private $viatCadUsuarioid;

    /**
     * @var integer
     */
    private $viatNumero;

    /**
     * @var integer
     */
    private $viatAnoFabricacao;

    /**
     * @var integer
     */
    private $viatAnoModelo;

    /**
     * @var integer
     */
    private $viatEspecieId;

    /**
     * @var integer
     */
    private $idViatCorPredominante;

    /**
     * @var string
     */
    private $viatPlaca;

    /**
     * @var string
     */
    private $viatRenavan;

    /**
     * @var string
     */
    private $viatChassi;

    /**
     * @var \DateTime
     */
    private $viatDatainc;

    /**
     * @var integer
     */
    private $viatPassageiro;

    /**
     * @var string
     */
    private $viatCombustivel;

    /**
     * @var boolean
     */
    private $viatAtivo;

    /**
     * @var boolean
     */
    private $viatReboque;

    /**
     * @var integer
     */
    private $viatIdEstado;

    /**
     * @var \Servicos\LumaBundle\Entity\ViaturaModelo
     */
    private $viatModeloid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $viatUnidadeid;


    /**
     * Get viaturaid
     *
     * @return integer 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }

    /**
     * Set viatCadUsuarioid
     *
     * @param integer $viatCadUsuarioid
     * @return Viatura
     */
    public function setViatCadUsuarioid($viatCadUsuarioid)
    {
        $this->viatCadUsuarioid = $viatCadUsuarioid;

        return $this;
    }

    /**
     * Get viatCadUsuarioid
     *
     * @return integer 
     */
    public function getViatCadUsuarioid()
    {
        return $this->viatCadUsuarioid;
    }

    /**
     * Set viatNumero
     *
     * @param integer $viatNumero
     * @return Viatura
     */
    public function setViatNumero($viatNumero)
    {
        $this->viatNumero = $viatNumero;

        return $this;
    }

    /**
     * Get viatNumero
     *
     * @return integer 
     */
    public function getViatNumero()
    {
        return $this->viatNumero;
    }

    /**
     * Set viatAnoFabricacao
     *
     * @param integer $viatAnoFabricacao
     * @return Viatura
     */
    public function setViatAnoFabricacao($viatAnoFabricacao)
    {
        $this->viatAnoFabricacao = $viatAnoFabricacao;

        return $this;
    }

    /**
     * Get viatAnoFabricacao
     *
     * @return integer 
     */
    public function getViatAnoFabricacao()
    {
        return $this->viatAnoFabricacao;
    }

    /**
     * Set viatAnoModelo
     *
     * @param integer $viatAnoModelo
     * @return Viatura
     */
    public function setViatAnoModelo($viatAnoModelo)
    {
        $this->viatAnoModelo = $viatAnoModelo;

        return $this;
    }

    /**
     * Get viatAnoModelo
     *
     * @return integer 
     */
    public function getViatAnoModelo()
    {
        return $this->viatAnoModelo;
    }

    /**
     * Set viatEspecieId
     *
     * @param integer $viatEspecieId
     * @return Viatura
     */
    public function setViatEspecieId($viatEspecieId)
    {
        $this->viatEspecieId = $viatEspecieId;

        return $this;
    }

    /**
     * Get viatEspecieId
     *
     * @return integer 
     */
    public function getViatEspecieId()
    {
        return $this->viatEspecieId;
    }

    /**
     * Set idViatCorPredominante
     *
     * @param integer $idViatCorPredominante
     * @return Viatura
     */
    public function setIdViatCorPredominante($idViatCorPredominante)
    {
        $this->idViatCorPredominante = $idViatCorPredominante;

        return $this;
    }

    /**
     * Get idViatCorPredominante
     *
     * @return integer 
     */
    public function getIdViatCorPredominante()
    {
        return $this->idViatCorPredominante;
    }

    /**
     * Set viatPlaca
     *
     * @param string $viatPlaca
     * @return Viatura
     */
    public function setViatPlaca($viatPlaca)
    {
        $this->viatPlaca = $viatPlaca;

        return $this;
    }

    /**
     * Get viatPlaca
     *
     * @return string 
     */
    public function getViatPlaca()
    {
        return $this->viatPlaca;
    }

    /**
     * Set viatRenavan
     *
     * @param string $viatRenavan
     * @return Viatura
     */
    public function setViatRenavan($viatRenavan)
    {
        $this->viatRenavan = $viatRenavan;

        return $this;
    }

    /**
     * Get viatRenavan
     *
     * @return string 
     */
    public function getViatRenavan()
    {
        return $this->viatRenavan;
    }

    /**
     * Set viatChassi
     *
     * @param string $viatChassi
     * @return Viatura
     */
    public function setViatChassi($viatChassi)
    {
        $this->viatChassi = $viatChassi;

        return $this;
    }

    /**
     * Get viatChassi
     *
     * @return string 
     */
    public function getViatChassi()
    {
        return $this->viatChassi;
    }

    /**
     * Set viatDatainc
     *
     * @param \DateTime $viatDatainc
     * @return Viatura
     */
    public function setViatDatainc($viatDatainc)
    {
        $this->viatDatainc = $viatDatainc;

        return $this;
    }

    /**
     * Get viatDatainc
     *
     * @return \DateTime 
     */
    public function getViatDatainc()
    {
        return $this->viatDatainc;
    }

    /**
     * Set viatPassageiro
     *
     * @param integer $viatPassageiro
     * @return Viatura
     */
    public function setViatPassageiro($viatPassageiro)
    {
        $this->viatPassageiro = $viatPassageiro;

        return $this;
    }

    /**
     * Get viatPassageiro
     *
     * @return integer 
     */
    public function getViatPassageiro()
    {
        return $this->viatPassageiro;
    }

    /**
     * Set viatCombustivel
     *
     * @param string $viatCombustivel
     * @return Viatura
     */
    public function setViatCombustivel($viatCombustivel)
    {
        $this->viatCombustivel = $viatCombustivel;

        return $this;
    }

    /**
     * Get viatCombustivel
     *
     * @return string 
     */
    public function getViatCombustivel()
    {
        return $this->viatCombustivel;
    }

    /**
     * Set viatAtivo
     *
     * @param boolean $viatAtivo
     * @return Viatura
     */
    public function setViatAtivo($viatAtivo)
    {
        $this->viatAtivo = $viatAtivo;

        return $this;
    }

    /**
     * Get viatAtivo
     *
     * @return boolean 
     */
    public function getViatAtivo()
    {
        return $this->viatAtivo;
    }

    /**
     * Set viatReboque
     *
     * @param boolean $viatReboque
     * @return Viatura
     */
    public function setViatReboque($viatReboque)
    {
        $this->viatReboque = $viatReboque;

        return $this;
    }

    /**
     * Get viatReboque
     *
     * @return boolean 
     */
    public function getViatReboque()
    {
        return $this->viatReboque;
    }

    /**
     * Set viatIdEstado
     *
     * @param integer $viatIdEstado
     * @return Viatura
     */
    public function setViatIdEstado($viatIdEstado)
    {
        $this->viatIdEstado = $viatIdEstado;

        return $this;
    }

    /**
     * Get viatIdEstado
     *
     * @return integer 
     */
    public function getViatIdEstado()
    {
        return $this->viatIdEstado;
    }

    /**
     * Set viatModeloid
     *
     * @param \Servicos\LumaBundle\Entity\ViaturaModelo $viatModeloid
     * @return Viatura
     */
    public function setViatModeloid(\Servicos\LumaBundle\Entity\ViaturaModelo $viatModeloid = null)
    {
        $this->viatModeloid = $viatModeloid;

        return $this;
    }

    /**
     * Get viatModeloid
     *
     * @return \Servicos\LumaBundle\Entity\ViaturaModelo 
     */
    public function getViatModeloid()
    {
        return $this->viatModeloid;
    }

    /**
     * Set viatUnidadeid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $viatUnidadeid
     * @return Viatura
     */
    public function setViatUnidadeid(\Servicos\LumaBundle\Entity\Unidade $viatUnidadeid = null)
    {
        $this->viatUnidadeid = $viatUnidadeid;

        return $this;
    }

    /**
     * Get viatUnidadeid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getViatUnidadeid()
    {
        return $this->viatUnidadeid;
    }
}
