<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Upgrade
 */
class Upgrade
{
    /**
     * @var integer
     */
    private $upgrCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentrega
     */
    private $endeentrCodigoid;

    /**
     * @var integer
     */
    private $upgrAposativacao;

    /**
     * @var \DateTime
     */
    private $upgrDatafixa;

    /**
     * @var \DateTime
     */
    private $upgrDataupgrade;

    /**
     * @var \DateTime
     */
    private $upgrDatainc;

    /**
     * @var integer
     */
    private $upgrUsuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $upgradevalor;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servicocapacidade
     */
    private $servcapaCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Upgrade
     */
    private $upgrProximocodigoid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->upgradevalor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get upgrCodigoid
     *
     * @return integer 
     */
    public function getUpgrCodigoid()
    {
        return $this->upgrCodigoid;
    }

    /**
     * Set endeentrCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid
     * @return Upgrade
     */
    public function setEndeentrCodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid)
    {
        $this->endeentrCodigoid = $endeentrCodigoid;

        return $this;
    }

    /**
     * Get endeentrCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentrega 
     */
    public function getEndeentrCodigoid()
    {
        return $this->endeentrCodigoid;
    }

    /**
     * Set upgrAposativacao
     *
     * @param integer $upgrAposativacao
     * @return Upgrade
     */
    public function setUpgrAposativacao($upgrAposativacao)
    {
        $this->upgrAposativacao = $upgrAposativacao;

        return $this;
    }

    /**
     * Get upgrAposativacao
     *
     * @return integer 
     */
    public function getUpgrAposativacao()
    {
        return $this->upgrAposativacao;
    }

    /**
     * Set upgrDatafixa
     *
     * @param \DateTime $upgrDatafixa
     * @return Upgrade
     */
    public function setUpgrDatafixa($upgrDatafixa)
    {
        $this->upgrDatafixa = $upgrDatafixa;

        return $this;
    }

    /**
     * Get upgrDatafixa
     *
     * @return \DateTime 
     */
    public function getUpgrDatafixa()
    {
        return $this->upgrDatafixa;
    }

    /**
     * Set upgrDataupgrade
     *
     * @param \DateTime $upgrDataupgrade
     * @return Upgrade
     */
    public function setUpgrDataupgrade($upgrDataupgrade)
    {
        $this->upgrDataupgrade = $upgrDataupgrade;

        return $this;
    }

    /**
     * Get upgrDataupgrade
     *
     * @return \DateTime 
     */
    public function getUpgrDataupgrade()
    {
        return $this->upgrDataupgrade;
    }

    /**
     * Set upgrDatainc
     *
     * @param \DateTime $upgrDatainc
     * @return Upgrade
     */
    public function setUpgrDatainc($upgrDatainc)
    {
        $this->upgrDatainc = $upgrDatainc;

        return $this;
    }

    /**
     * Get upgrDatainc
     *
     * @return \DateTime 
     */
    public function getUpgrDatainc()
    {
        return $this->upgrDatainc;
    }

    /**
     * Set upgrUsuario
     *
     * @param integer $upgrUsuario
     * @return Upgrade
     */
    public function setUpgrUsuario($upgrUsuario)
    {
        $this->upgrUsuario = $upgrUsuario;

        return $this;
    }

    /**
     * Get upgrUsuario
     *
     * @return integer 
     */
    public function getUpgrUsuario()
    {
        return $this->upgrUsuario;
    }

    /**
     * Add upgradevalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgradevalor $upgradevalor
     * @return Upgrade
     */
    public function addUpgradevalor(\Servicos\FinanceiroBundle\Entity\Upgradevalor $upgradevalor)
    {
        $this->upgradevalor[] = $upgradevalor;

        return $this;
    }

    /**
     * Remove upgradevalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgradevalor $upgradevalor
     */
    public function removeUpgradevalor(\Servicos\FinanceiroBundle\Entity\Upgradevalor $upgradevalor)
    {
        $this->upgradevalor->removeElement($upgradevalor);
    }

    /**
     * Get upgradevalor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUpgradevalor()
    {
        return $this->upgradevalor;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Upgrade
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set servcapaCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servicocapacidade $servcapaCodigoid
     * @return Upgrade
     */
    public function setServcapaCodigoid(\Servicos\FinanceiroBundle\Entity\Servicocapacidade $servcapaCodigoid = null)
    {
        $this->servcapaCodigoid = $servcapaCodigoid;

        return $this;
    }

    /**
     * Get servcapaCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Servicocapacidade 
     */
    public function getServcapaCodigoid()
    {
        return $this->servcapaCodigoid;
    }

    /**
     * Set upgrProximocodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgrade $upgrProximocodigoid
     * @return Upgrade
     */
    public function setUpgrProximocodigoid(\Servicos\FinanceiroBundle\Entity\Upgrade $upgrProximocodigoid = null)
    {
        $this->upgrProximocodigoid = $upgrProximocodigoid;

        return $this;
    }

    /**
     * Get upgrProximocodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Upgrade 
     */
    public function getUpgrProximocodigoid()
    {
        return $this->upgrProximocodigoid;
    }
    /**
     * @var integer
     */
    private $proposalId;


    /**
     * Set proposalId
     *
     * @param integer $proposalId
     * @return Upgrade
     */
    public function setProposalId($proposalId)
    {
        $this->proposalId = $proposalId;

        return $this;
    }

    /**
     * Get proposalId
     *
     * @return integer 
     */
    public function getProposalId()
    {
        return $this->proposalId;
    }
}
