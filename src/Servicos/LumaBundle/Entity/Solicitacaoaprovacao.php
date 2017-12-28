<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitacaoaprovacao
 */
class Solicitacaoaprovacao
{
    /**
     * @var integer
     */
    private $soliaproCodigoid;

    /**
     * @var integer
     */
    private $usrCodigoid;

    /**
     * @var string
     */
    private $soliaproMotivo;

    /**
     * @var \DateTime
     */
    private $soliaproData;

    /**
     * @var \DateTime
     */
    private $soliaproDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Solicitacao
     */
    private $soliCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\TipoAprovacao
     */
    private $tipoAprovacaoId;


    /**
     * Get soliaproCodigoid
     *
     * @return integer 
     */
    public function getSoliaproCodigoid()
    {
        return $this->soliaproCodigoid;
    }

    /**
     * Set usrCodigoid
     *
     * @param integer $usrCodigoid
     * @return Solicitacaoaprovacao
     */
    public function setUsrCodigoid($usrCodigoid)
    {
        $this->usrCodigoid = $usrCodigoid;

        return $this;
    }

    /**
     * Get usrCodigoid
     *
     * @return integer 
     */
    public function getUsrCodigoid()
    {
        return $this->usrCodigoid;
    }

    /**
     * Set soliaproMotivo
     *
     * @param string $soliaproMotivo
     * @return Solicitacaoaprovacao
     */
    public function setSoliaproMotivo($soliaproMotivo)
    {
        $this->soliaproMotivo = $soliaproMotivo;

        return $this;
    }

    /**
     * Get soliaproMotivo
     *
     * @return string 
     */
    public function getSoliaproMotivo()
    {
        return $this->soliaproMotivo;
    }

    /**
     * Set soliaproData
     *
     * @param \DateTime $soliaproData
     * @return Solicitacaoaprovacao
     */
    public function setSoliaproData($soliaproData)
    {
        $this->soliaproData = $soliaproData;

        return $this;
    }

    /**
     * Get soliaproData
     *
     * @return \DateTime 
     */
    public function getSoliaproData()
    {
        return $this->soliaproData;
    }

    /**
     * Set soliaproDatainc
     *
     * @param \DateTime $soliaproDatainc
     * @return Solicitacaoaprovacao
     */
    public function setSoliaproDatainc($soliaproDatainc)
    {
        $this->soliaproDatainc = $soliaproDatainc;

        return $this;
    }

    /**
     * Get soliaproDatainc
     *
     * @return \DateTime 
     */
    public function getSoliaproDatainc()
    {
        return $this->soliaproDatainc;
    }

    /**
     * Set soliCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Solicitacao $soliCodigoid
     * @return Solicitacaoaprovacao
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

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Solicitacaoaprovacao
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
    * Get tipoAprovacaoId
    *
    * @return \Servicos\LumaBundle\Entity\TipoAprovacao
    */

    public function getTipoAprovacaoId()
    {
        return $this->tipoAprovacaoId;
    }


    /**
     * Set tipoAprovacaoId
     *
     * @param \Servicos\LumaBundle\Entity\TipoAprovacao $tipoAprovacaoId
     * @return Solicitacaoaprovacao
     */
    public function setTipoAprovacaoId(\Servicos\LumaBundle\Entity\TipoAprovacao $tipoAprovacaoId)
    {
        $this->tipoAprovacaoId = $tipoAprovacaoId;
        return $this;
    }

}
