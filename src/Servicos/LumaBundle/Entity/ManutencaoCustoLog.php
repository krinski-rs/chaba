<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoCustoLog
 */
class ManutencaoCustoLog
{
    /**
     * @var integer
     */
    private $custlogCodigoid;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var string
     */
    private $acao;

    /**
     * @var string
     */
    private $motivo;

    /**
     * @var \Servicos\LumaBundle\Entity\ManutencaoCusto
     */
    private $custCodigoid;


    /**
     * Get custlogCodigoid
     *
     * @return integer 
     */
    public function getCustlogCodigoid()
    {
        return $this->custlogCodigoid;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return ManutencaoCustoLog
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return ManutencaoCustoLog
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set acao
     *
     * @param string $acao
     * @return ManutencaoCustoLog
     */
    public function setAcao($acao)
    {
        $this->acao = $acao;

        return $this;
    }

    /**
     * Get acao
     *
     * @return string 
     */
    public function getAcao()
    {
        return $this->acao;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return ManutencaoCustoLog
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set custCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\ManutencaoCusto $custCodigoid
     * @return ManutencaoCustoLog
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
}
