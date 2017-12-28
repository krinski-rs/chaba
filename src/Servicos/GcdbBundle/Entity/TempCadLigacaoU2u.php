<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadLigacaoU2u
 */
class TempCadLigacaoU2u
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
    private $cadUsersId2;

    /**
     * @var integer
     */
    private $admTipoLigacaoId;

    /**
     * @var \DateTime
     */
    private $dtInicio;

    /**
     * @var \DateTime
     */
    private $dtFim;

    /**
     * @var string
     */
    private $temp;


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
     * @return TempCadLigacaoU2u
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
     * Set cadUsersId2
     *
     * @param integer $cadUsersId2
     * @return TempCadLigacaoU2u
     */
    public function setCadUsersId2($cadUsersId2)
    {
        $this->cadUsersId2 = $cadUsersId2;

        return $this;
    }

    /**
     * Get cadUsersId2
     *
     * @return integer 
     */
    public function getCadUsersId2()
    {
        return $this->cadUsersId2;
    }

    /**
     * Set admTipoLigacaoId
     *
     * @param integer $admTipoLigacaoId
     * @return TempCadLigacaoU2u
     */
    public function setAdmTipoLigacaoId($admTipoLigacaoId)
    {
        $this->admTipoLigacaoId = $admTipoLigacaoId;

        return $this;
    }

    /**
     * Get admTipoLigacaoId
     *
     * @return integer 
     */
    public function getAdmTipoLigacaoId()
    {
        return $this->admTipoLigacaoId;
    }

    /**
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return TempCadLigacaoU2u
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return TempCadLigacaoU2u
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * Set temp
     *
     * @param string $temp
     * @return TempCadLigacaoU2u
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;

        return $this;
    }

    /**
     * Get temp
     *
     * @return string 
     */
    public function getTemp()
    {
        return $this->temp;
    }
}
