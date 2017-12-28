<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoCustoItem
 */
class ManutencaoCustoItem
{
    /**
     * @var integer
     */
    private $custitemCodigoid;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoCausa
     */
    private $causaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoClassificacao
     */
    private $classCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoCusto
     */
    private $custCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pecaCodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pecaCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get custitemCodigoid
     *
     * @return integer 
     */
    public function getCustitemCodigoid()
    {
        return $this->custitemCodigoid;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return ManutencaoCustoItem
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
     * Set valor
     *
     * @param string $valor
     * @return ManutencaoCustoItem
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set causaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoCausa $causaCodigoid
     * @return ManutencaoCustoItem
     */
    public function setCausaCodigoid(\Servicos\LumaBundle\Entity\ManutencaoCausa $causaCodigoid = null)
    {
        $this->causaCodigoid = $causaCodigoid;

        return $this;
    }

    /**
     * Get causaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoCausa 
     */
    public function getCausaCodigoid()
    {
        return $this->causaCodigoid;
    }

    /**
     * Set classCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoClassificacao $classCodigoid
     * @return ManutencaoCustoItem
     */
    public function setClassCodigoid(\Servicos\LumaBundle\Entity\ManutencaoClassificacao $classCodigoid = null)
    {
        $this->classCodigoid = $classCodigoid;

        return $this;
    }

    /**
     * Get classCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoClassificacao 
     */
    public function getClassCodigoid()
    {
        return $this->classCodigoid;
    }

    /**
     * Set custCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoCusto $custCodigoid
     * @return ManutencaoCustoItem
     */
    public function setCustCodigoid(\Servicos\LumaBundle\Entity\ManutencaoCusto $custCodigoid = null)
    {
        $this->custCodigoid = $custCodigoid;

        return $this;
    }

    /**
     * Get custCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\ManutencaoCusto 
     */
    public function getCustCodigoid()
    {
        return $this->custCodigoid;
    }

    /**
     * Add pecaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoPecas $pecaCodigoid
     * @return ManutencaoCustoItem
     */
    public function addPecaCodigoid(\Servicos\LumaBundle\Entity\ManutencaoPecas $pecaCodigoid)
    {
        $this->pecaCodigoid[] = $pecaCodigoid;

        return $this;
    }

    /**
     * Remove pecaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoPecas $pecaCodigoid
     */
    public function removePecaCodigoid(\Servicos\LumaBundle\Entity\ManutencaoPecas $pecaCodigoid)
    {
        $this->pecaCodigoid->removeElement($pecaCodigoid);
    }

    /**
     * Get pecaCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPecaCodigoid()
    {
        return $this->pecaCodigoid;
    }
}
