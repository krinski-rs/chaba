<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadUserHasComplemento
 */
class TempCadUserHasComplemento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadUsersId;

    /**
     * @var integer
     */
    private $admTipoComplementoId;

    /**
     * @var string
     */
    private $complemento;


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
     * Set cadUsersId
     *
     * @param integer $cadUsersId
     * @return TempCadUserHasComplemento
     */
    public function setCadUsersId($cadUsersId)
    {
        $this->cadUsersId = $cadUsersId;

        return $this;
    }

    /**
     * Get cadUsersId
     *
     * @return integer 
     */
    public function getCadUsersId()
    {
        return $this->cadUsersId;
    }

    /**
     * Set admTipoComplementoId
     *
     * @param integer $admTipoComplementoId
     * @return TempCadUserHasComplemento
     */
    public function setAdmTipoComplementoId($admTipoComplementoId)
    {
        $this->admTipoComplementoId = $admTipoComplementoId;

        return $this;
    }

    /**
     * Get admTipoComplementoId
     *
     * @return integer 
     */
    public function getAdmTipoComplementoId()
    {
        return $this->admTipoComplementoId;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return TempCadUserHasComplemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }
}
