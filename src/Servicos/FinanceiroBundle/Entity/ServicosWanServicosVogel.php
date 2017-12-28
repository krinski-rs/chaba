<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 23/05/17
 * Time: 10:17
 */

namespace Servicos\FinanceiroBundle\Entity;

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



class ServicosWanServicosVogel
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var integer
     */
    private $servicoWanId;

    /**
     * @var integer
     */
    private $servicoVogelId;

    /**
     * @var \DateTime
     */
    private $dataHoraCriacao;

    /**
     * @var  $TPR_IDSERVICO
     */
    private $tprIdServico;

    /**
     * @var integer
     */
    private $peso;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getServicoWanId()
    {
        return $this->servicoWanId;
    }

    /**
     * @param int $servicoWanId
     */
    public function setServicoWanId($servicoWanId)
    {
        $this->servicoWanId = $servicoWanId;
    }

    /**
     * @return int
     */
    public function getServicoVogelId()
    {
        return $this->servicoVogelId;
    }

    /**
     * @param int $servicoVogelId
     */
    public function setServicoVogelId($servicoVogelId)
    {
        $this->servicoVogelId = $servicoVogelId;
    }

    /**
     * @return \DateTime
     */
    public function getDataHoraCriacao()
    {
        return $this->dataHoraCriacao;
    }

    /**
     * @param \DateTime $dataHoraCriacao
     */
    public function setDataHoraCriacao($dataHoraCriacao)
    {
        $this->dataHoraCriacao = $dataHoraCriacao;
    }

    /**
     * @return mixed
     */
    public function getTprIdServico()
    {
        return $this->tprIdServico;
    }

    /**
     * @param mixed $tprIdServico
     */
    public function setTprIdServico($tprIdServico)
    {
        $this->tprIdServico = $tprIdServico;
    }

    /**
     * @return int
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param int $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
        return $this;
    }

    
}