<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projeto
 */
class Projeto
{
    /**
     * @var integer
     */
    private $projCodigoid;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \DateTime
     */
    private $projDatainc;

    /**
     * @var integer
     */
    private $autUsuario;

    /**
     * @var string
     */
    private $projObservacao;

    /**
     * @var string
     */
    private $projDocumento;

    /**
     * @var integer
     */
    private $desigCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidostatus
     */
    private $pedistatCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pediCodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pediCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get projCodigoid
     *
     * @return integer 
     */
    public function getProjCodigoid()
    {
        return $this->projCodigoid;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Projeto
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
     * Set projDatainc
     *
     * @param \DateTime $projDatainc
     * @return Projeto
     */
    public function setProjDatainc($projDatainc)
    {
        $this->projDatainc = $projDatainc;

        return $this;
    }

    /**
     * Get projDatainc
     *
     * @return \DateTime 
     */
    public function getProjDatainc()
    {
        return $this->projDatainc;
    }

    /**
     * Set autUsuario
     *
     * @param integer $autUsuario
     * @return Projeto
     */
    public function setAutUsuario($autUsuario)
    {
        $this->autUsuario = $autUsuario;

        return $this;
    }

    /**
     * Get autUsuario
     *
     * @return integer 
     */
    public function getAutUsuario()
    {
        return $this->autUsuario;
    }

    /**
     * Set projObservacao
     *
     * @param string $projObservacao
     * @return Projeto
     */
    public function setProjObservacao($projObservacao)
    {
        $this->projObservacao = $projObservacao;

        return $this;
    }

    /**
     * Get projObservacao
     *
     * @return string 
     */
    public function getProjObservacao()
    {
        return $this->projObservacao;
    }

    /**
     * Set projDocumento
     *
     * @param string $projDocumento
     * @return Projeto
     */
    public function setProjDocumento($projDocumento)
    {
        $this->projDocumento = $projDocumento;

        return $this;
    }

    /**
     * Get projDocumento
     *
     * @return string 
     */
    public function getProjDocumento()
    {
        return $this->projDocumento;
    }

    /**
     * Set desigCodigoid
     *
     * @param integer $desigCodigoid
     * @return Projeto
     */
    public function setDesigCodigoid($desigCodigoid)
    {
        $this->desigCodigoid = $desigCodigoid;

        return $this;
    }

    /**
     * Get desigCodigoid
     *
     * @return integer 
     */
    public function getDesigCodigoid()
    {
        return $this->desigCodigoid;
    }

    /**
     * Set pedistatCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidostatus $pedistatCodigoid
     * @return Projeto
     */
    public function setPedistatCodigoid(\Servicos\LumaBundle\Entity\Pedidostatus $pedistatCodigoid = null)
    {
        $this->pedistatCodigoid = $pedistatCodigoid;

        return $this;
    }

    /**
     * Get pedistatCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedidostatus 
     */
    public function getPedistatCodigoid()
    {
        return $this->pedistatCodigoid;
    }

    /**
     * Add pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     * @return Projeto
     */
    public function addPediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid)
    {
        $this->pediCodigoid[] = $pediCodigoid;

        return $this;
    }

    /**
     * Remove pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     */
    public function removePediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid)
    {
        $this->pediCodigoid->removeElement($pediCodigoid);
    }

    /**
     * Get pediCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPediCodigoid()
    {
        return $this->pediCodigoid;
    }
}
