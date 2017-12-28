<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoPecas
 */
class ManutencaoPecas
{
    /**
     * @var integer
     */
    private $pecaCodigoid;

    /**
     * @var string
     */
    private $peca;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoClassificacao
     */
    private $classCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $custitemCodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->custitemCodigoid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get pecaCodigoid
     *
     * @return integer 
     */
    public function getPecaCodigoid()
    {
        return $this->pecaCodigoid;
    }

    /**
     * Set peca
     *
     * @param string $peca
     * @return ManutencaoPecas
     */
    public function setPeca($peca)
    {
        $this->peca = $peca;

        return $this;
    }

    /**
     * Get peca
     *
     * @return string 
     */
    public function getPeca()
    {
        return $this->peca;
    }

    /**
     * Set classCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoClassificacao $classCodigoid
     * @return ManutencaoPecas
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
     * Add custitemCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoCustoItem $custitemCodigoid
     * @return ManutencaoPecas
     */
    public function addCustitemCodigoid(\Servicos\LumaBundle\Entity\ManutencaoCustoItem $custitemCodigoid)
    {
        $this->custitemCodigoid[] = $custitemCodigoid;

        return $this;
    }

    /**
     * Remove custitemCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoCustoItem $custitemCodigoid
     */
    public function removeCustitemCodigoid(\Servicos\LumaBundle\Entity\ManutencaoCustoItem $custitemCodigoid)
    {
        $this->custitemCodigoid->removeElement($custitemCodigoid);
    }

    /**
     * Get custitemCodigoid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustitemCodigoid()
    {
        return $this->custitemCodigoid;
    }
}
