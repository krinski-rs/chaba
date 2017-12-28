<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 */
class Pedido
{
    /**
     * @var integer
     */
    private $pediCodigoid;

    /**
     * @var string
     */
    private $pediNome;

    /**
     * @var \DateTime
     */
    private $pediDatainc;

    /**
     * @var \DateTime
     */
    private $pediDataprazo;

    /**
     * @var integer
     */
    private $autUsuario;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidoarea
     */
    private $pediareaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidostatus
     */
    private $pedistatCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $moviCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pedidoproduto;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moviCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pedidoproduto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get pediCodigoid
     *
     * @return integer 
     */
    public function getPediCodigoid()
    {
        return $this->pediCodigoid;
    }

    /**
     * Set pediNome
     *
     * @param string $pediNome
     * @return Pedido
     */
    public function setPediNome($pediNome)
    {
        $this->pediNome = $pediNome;

        return $this;
    }

    /**
     * Get pediNome
     *
     * @return string 
     */
    public function getPediNome()
    {
        return $this->pediNome;
    }

    /**
     * Set pediDatainc
     *
     * @param \DateTime $pediDatainc
     * @return Pedido
     */
    public function setPediDatainc($pediDatainc)
    {
        $this->pediDatainc = $pediDatainc;

        return $this;
    }

    /**
     * Get pediDatainc
     *
     * @return \DateTime 
     */
    public function getPediDatainc()
    {
        return $this->pediDatainc;
    }

    /**
     * Set pediDataprazo
     *
     * @param \DateTime $pediDataprazo
     * @return Pedido
     */
    public function setPediDataprazo($pediDataprazo)
    {
        $this->pediDataprazo = $pediDataprazo;

        return $this;
    }

    /**
     * Get pediDataprazo
     *
     * @return \DateTime 
     */
    public function getPediDataprazo()
    {
        return $this->pediDataprazo;
    }

    /**
     * Set autUsuario
     *
     * @param integer $autUsuario
     * @return Pedido
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
     * Set pediareaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidoarea $pediareaCodigoid
     * @return Pedido
     */
    public function setPediareaCodigoid(\Servicos\LumaBundle\Entity\Pedidoarea $pediareaCodigoid = null)
    {
        $this->pediareaCodigoid = $pediareaCodigoid;

        return $this;
    }

    /**
     * Get pediareaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedidoarea 
     */
    public function getPediareaCodigoid()
    {
        return $this->pediareaCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Pedido
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set pedistatCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidostatus $pedistatCodigoid
     * @return Pedido
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
     * Add moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return Pedido
     */
    public function addMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid)
    {
        $this->moviCodigoid[] = $moviCodigoid;

        return $this;
    }

    /**
     * Remove moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     */
    public function removeMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid)
    {
        $this->moviCodigoid->removeElement($moviCodigoid);
    }

    /**
     * Get moviCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Add projCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Projeto $projCodigoid
     * @return Pedido
     */
    public function addProjCodigoid(\Servicos\LumaBundle\Entity\Projeto $projCodigoid)
    {
        $this->projCodigoid[] = $projCodigoid;

        return $this;
    }

    /**
     * Remove projCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Projeto $projCodigoid
     */
    public function removeProjCodigoid(\Servicos\LumaBundle\Entity\Projeto $projCodigoid)
    {
        $this->projCodigoid->removeElement($projCodigoid);
    }

    /**
     * Get projCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjCodigoid()
    {
        return $this->projCodigoid;
    }

    /**
     * Add pedidoproduto
     *
     * @param \Servicos\LumaBundle\Entity\Pedidoproduto $pedidoproduto
     * @return Pedido
     */
    public function addPedidoproduto(\Servicos\LumaBundle\Entity\Pedidoproduto $pedidoproduto)
    {
        $this->pedidoproduto[] = $pedidoproduto;

        return $this;
    }

    /**
     * Remove pedidoproduto
     *
     * @param \Servicos\LumaBundle\Entity\Pedidoproduto $pedidoproduto
     */
    public function removePedidoproduto(\Servicos\LumaBundle\Entity\Pedidoproduto $pedidoproduto)
    {
        $this->pedidoproduto->removeElement($pedidoproduto);
    }

    /**
     * Get pedidoproduto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidoproduto()
    {
        return $this->pedidoproduto;
    }
}
