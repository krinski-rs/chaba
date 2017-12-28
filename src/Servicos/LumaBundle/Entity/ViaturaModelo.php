<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaModelo
 */
class ViaturaModelo
{
    /**
     * @var integer
     */
    private $viatModeloid;

    /**
     * @var integer
     */
    private $modelCadUsuarioid;

    /**
     * @var string
     */
    private $modelCnh;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var \DateTime
     */
    private $modelDatainc;

    /**
     * @var string
     */
    private $modelImagem;

    /**
     * @var boolean
     */
    private $modelAtivo;

    /**
     * @var \Servicos\LumaBundle\Entity\ViaturaMarca
     */
    private $viatMarcaid;


    /**
     * Get viatModeloid
     *
     * @return integer 
     */
    public function getViatModeloid()
    {
        return $this->viatModeloid;
    }

    /**
     * Set modelCadUsuarioid
     *
     * @param integer $modelCadUsuarioid
     * @return ViaturaModelo
     */
    public function setModelCadUsuarioid($modelCadUsuarioid)
    {
        $this->modelCadUsuarioid = $modelCadUsuarioid;

        return $this;
    }

    /**
     * Get modelCadUsuarioid
     *
     * @return integer 
     */
    public function getModelCadUsuarioid()
    {
        return $this->modelCadUsuarioid;
    }

    /**
     * Set modelCnh
     *
     * @param string $modelCnh
     * @return ViaturaModelo
     */
    public function setModelCnh($modelCnh)
    {
        $this->modelCnh = $modelCnh;

        return $this;
    }

    /**
     * Get modelCnh
     *
     * @return string 
     */
    public function getModelCnh()
    {
        return $this->modelCnh;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return ViaturaModelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set modelDatainc
     *
     * @param \DateTime $modelDatainc
     * @return ViaturaModelo
     */
    public function setModelDatainc($modelDatainc)
    {
        $this->modelDatainc = $modelDatainc;

        return $this;
    }

    /**
     * Get modelDatainc
     *
     * @return \DateTime 
     */
    public function getModelDatainc()
    {
        return $this->modelDatainc;
    }

    /**
     * Set modelImagem
     *
     * @param string $modelImagem
     * @return ViaturaModelo
     */
    public function setModelImagem($modelImagem)
    {
        $this->modelImagem = $modelImagem;

        return $this;
    }

    /**
     * Get modelImagem
     *
     * @return string 
     */
    public function getModelImagem()
    {
        return $this->modelImagem;
    }

    /**
     * Set modelAtivo
     *
     * @param boolean $modelAtivo
     * @return ViaturaModelo
     */
    public function setModelAtivo($modelAtivo)
    {
        $this->modelAtivo = $modelAtivo;

        return $this;
    }

    /**
     * Get modelAtivo
     *
     * @return boolean 
     */
    public function getModelAtivo()
    {
        return $this->modelAtivo;
    }

    /**
     * Set viatMarcaid
     *
     * @param \Servicos\LumaBundle\Entity\ViaturaMarca $viatMarcaid
     * @return ViaturaModelo
     */
    public function setViatMarcaid(\Servicos\LumaBundle\Entity\ViaturaMarca $viatMarcaid = null)
    {
        $this->viatMarcaid = $viatMarcaid;

        return $this;
    }

    /**
     * Get viatMarcaid
     *
     * @return \Servicos\LumaBundle\Entity\ViaturaMarca 
     */
    public function getViatMarcaid()
    {
        return $this->viatMarcaid;
    }
}
