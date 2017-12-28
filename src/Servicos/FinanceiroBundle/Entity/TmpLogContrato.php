<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpLogContrato
 */
class TmpLogContrato
{
    /**
     * @var integer
     */
    private $idLog;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\TmpContrato
     */
    private $idTmpContrato;


    /**
     * Get idLog
     *
     * @return integer 
     */
    public function getIdLog()
    {
        return $this->idLog;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return TmpLogContrato
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
     * Set obs
     *
     * @param string $obs
     * @return TmpLogContrato
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string 
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set idTmpContrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\TmpContrato $idTmpContrato
     * @return TmpLogContrato
     */
    public function setIdTmpContrato(\Servicos\FinanceiroBundle\Entity\TmpContrato $idTmpContrato = null)
    {
        $this->idTmpContrato = $idTmpContrato;

        return $this;
    }

    /**
     * Get idTmpContrato
     *
     * @return \Servicos\FinanceiroBundle\Entity\TmpContrato 
     */
    public function getIdTmpContrato()
    {
        return $this->idTmpContrato;
    }
}
