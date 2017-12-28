<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slanivel
 */
class Slanivel
{
    /**
     * @var integer
     */
    private $slaniveCodigoid;

    /**
     * @var integer
     */
    private $slaniveRespostacomercial;

    /**
     * @var integer
     */
    private $slaniveResolucaocomercial;

    /**
     * @var integer
     */
    private $slaniveResolucaoextra;

    /**
     * @var integer
     */
    private $slaniveRespostaextra;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Nivel
     */
    private $niveCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Sla
     */
    private $slaCodigoid;


    /**
     * Get slaniveCodigoid
     *
     * @return integer 
     */
    public function getSlaniveCodigoid()
    {
        return $this->slaniveCodigoid;
    }

    /**
     * Set slaniveRespostacomercial
     *
     * @param integer $slaniveRespostacomercial
     * @return Slanivel
     */
    public function setSlaniveRespostacomercial($slaniveRespostacomercial)
    {
        $this->slaniveRespostacomercial = $slaniveRespostacomercial;

        return $this;
    }

    /**
     * Get slaniveRespostacomercial
     *
     * @return integer 
     */
    public function getSlaniveRespostacomercial()
    {
        return $this->slaniveRespostacomercial;
    }

    /**
     * Set slaniveResolucaocomercial
     *
     * @param integer $slaniveResolucaocomercial
     * @return Slanivel
     */
    public function setSlaniveResolucaocomercial($slaniveResolucaocomercial)
    {
        $this->slaniveResolucaocomercial = $slaniveResolucaocomercial;

        return $this;
    }

    /**
     * Get slaniveResolucaocomercial
     *
     * @return integer 
     */
    public function getSlaniveResolucaocomercial()
    {
        return $this->slaniveResolucaocomercial;
    }

    /**
     * Set slaniveResolucaoextra
     *
     * @param integer $slaniveResolucaoextra
     * @return Slanivel
     */
    public function setSlaniveResolucaoextra($slaniveResolucaoextra)
    {
        $this->slaniveResolucaoextra = $slaniveResolucaoextra;

        return $this;
    }

    /**
     * Get slaniveResolucaoextra
     *
     * @return integer 
     */
    public function getSlaniveResolucaoextra()
    {
        return $this->slaniveResolucaoextra;
    }

    /**
     * Set slaniveRespostaextra
     *
     * @param integer $slaniveRespostaextra
     * @return Slanivel
     */
    public function setSlaniveRespostaextra($slaniveRespostaextra)
    {
        $this->slaniveRespostaextra = $slaniveRespostaextra;

        return $this;
    }

    /**
     * Get slaniveRespostaextra
     *
     * @return integer 
     */
    public function getSlaniveRespostaextra()
    {
        return $this->slaniveRespostaextra;
    }

    /**
     * Set niveCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Nivel $niveCodigoid
     * @return Slanivel
     */
    public function setNiveCodigoid(\Servicos\FinanceiroBundle\Entity\Nivel $niveCodigoid = null)
    {
        $this->niveCodigoid = $niveCodigoid;

        return $this;
    }

    /**
     * Get niveCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Nivel 
     */
    public function getNiveCodigoid()
    {
        return $this->niveCodigoid;
    }

    /**
     * Set slaCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Sla $slaCodigoid
     * @return Slanivel
     */
    public function setSlaCodigoid(\Servicos\FinanceiroBundle\Entity\Sla $slaCodigoid = null)
    {
        $this->slaCodigoid = $slaCodigoid;

        return $this;
    }

    /**
     * Get slaCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Sla 
     */
    public function getSlaCodigoid()
    {
        return $this->slaCodigoid;
    }
}
