<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaosolicitacao
 */
class Cotacaosolicitacao
{
    /**
     * @var integer
     */
    private $cotasoliCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Solicitacao
     */
    private $soliCodigoid;


    /**
     * Get cotasoliCodigoid
     *
     * @return integer 
     */
    public function getCotasoliCodigoid()
    {
        return $this->cotasoliCodigoid;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return Cotacaosolicitacao
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
     * Set soliCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Solicitacao $soliCodigoid
     * @return Cotacaosolicitacao
     */
    public function setSoliCodigoid(\Servicos\LumaBundle\Entity\Solicitacao $soliCodigoid = null)
    {
        $this->soliCodigoid = $soliCodigoid;

        return $this;
    }

    /**
     * Get soliCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Solicitacao 
     */
    public function getSoliCodigoid()
    {
        return $this->soliCodigoid;
    }
}
