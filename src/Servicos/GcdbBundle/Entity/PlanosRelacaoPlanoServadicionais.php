<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosRelacaoPlanoServadicionais
 */
class PlanosRelacaoPlanoServadicionais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $planosServicosAdicionaisId;

    /**
     * @var integer
     */
    private $accountid;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set planosServicosAdicionaisId
     *
     * @param integer $planosServicosAdicionaisId
     * @return PlanosRelacaoPlanoServadicionais
     */
    public function setPlanosServicosAdicionaisId($planosServicosAdicionaisId)
    {
        $this->planosServicosAdicionaisId = $planosServicosAdicionaisId;

        return $this;
    }

    /**
     * Get planosServicosAdicionaisId
     *
     * @return integer 
     */
    public function getPlanosServicosAdicionaisId()
    {
        return $this->planosServicosAdicionaisId;
    }

    /**
     * Set accountid
     *
     * @param integer $accountid
     * @return PlanosRelacaoPlanoServadicionais
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return integer 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }
}
