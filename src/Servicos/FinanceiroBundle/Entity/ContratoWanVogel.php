<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 10/07/17
 * Time: 10:21
 */

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class ContratoWanVogel
{

    /***
     * integer $id
     */
    protected $id;

    /**
     * \DateTime $dataInc
     */
    protected $dataInc;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * @param mixed $dataInc
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;
    }

    /**
     * @return mixed
     */
    public function getCtrCodigo()
    {
        return $this->ctrCodigo;
    }

    /**
     * @param mixed $ctrCodigo
     */
    public function setCtrCodigo($ctrCodigo)
    {
        $this->ctrCodigo = $ctrCodigo;
    }

    /**
     * integer $ctrCodigo
     */
    private $ctrCodigo;


    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return $this
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
}