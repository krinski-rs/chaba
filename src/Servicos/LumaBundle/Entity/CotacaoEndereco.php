<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CotacaoEndereco
 */
class CotacaoEndereco
{
    /**
     * @var integer
     */
    private $cotaendeCodigoid;

    /**
     * @var \DateTime
     */
    private $cotaendeDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Endereco
     */
    private $endeCodigoid;


    /**
     * Get cotaendeCodigoid
     *
     * @return integer 
     */
    public function getCotaendeCodigoid()
    {
        return $this->cotaendeCodigoid;
    }

    /**
     * Set cotaendeDatainc
     *
     * @param \DateTime $cotaendeDatainc
     * @return CotacaoEndereco
     */
    public function setCotaendeDatainc($cotaendeDatainc)
    {
        $this->cotaendeDatainc = $cotaendeDatainc;

        return $this;
    }

    /**
     * Get cotaendeDatainc
     *
     * @return \DateTime 
     */
    public function getCotaendeDatainc()
    {
        return $this->cotaendeDatainc;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return CotacaoEndereco
     */
    public function setCotaCodigoid(\Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid = null)
    {
        $this->cotaCodigoid = $cotaCodigoid;

        return $this;
    }

    /**
     * Get cotaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacao 
     */
    public function getCotaCodigoid()
    {
        return $this->cotaCodigoid;
    }

    /**
     * Set endeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Endereco $endeCodigoid
     * @return CotacaoEndereco
     */
    public function setEndeCodigoid(\Servicos\LumaBundle\Entity\Endereco $endeCodigoid = null)
    {
        $this->endeCodigoid = $endeCodigoid;

        return $this;
    }

    /**
     * Get endeCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Endereco 
     */
    public function getEndeCodigoid()
    {
        return $this->endeCodigoid;
    }
}
