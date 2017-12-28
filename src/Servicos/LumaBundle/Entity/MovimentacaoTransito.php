<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovimentacaoTransito
 */
class MovimentacaoTransito
{
    const EM_TRANSITO = 0;
    const ENTREGUE    = 1;
    

    
    /** 
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /** 
     * @var Luma\Entity\Movimentacao $moviCodigoid
     *
     * @ORM\OneToOne(targetEntity="Luma\Entity\Movimentacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="movi_codigoid", referencedColumnName="movi_codigoid", unique=true)
     * })
     */
    private $moviCodigoid;

    /**
     * @var Luma\Entity\Unidade
     *
     * @ORM\OneToOne(targetEntity="Luma\Entity\Unidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unid_codigoid", referencedColumnName="unid_codigoid", unique=true)
     * })
     */
    private $unidCodigoid;
    
    /**
     * @var datetime $movitransDataInc
     *
     * @ORM\Column(name="movitrans_data_inc", type="datetime", nullable=false)
     */
    private $movitransDataInc;

    /**
     * @var integer $moviMotivo
     *
     * @ORM\Column(name="movitrans_status", type="integer", nullable=false)
     */
    private $movitransStatus;


    public function __construct()
    {
    }
    
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
     * Set usrResponsavel
     *
     * @param Movimentacao $moviCodigoid
     * @return MovimentacaoTransito
     */
    public function setMoviCodigoid(Movimentacao $moviCodigoid)
    {
        $this->moviCodigoid = $moviCodigoid;
        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return integer 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }


    /**
     * Set unidCodigoid
     *
     * @param Luma\Entity\Unidade $unidCodigoid
     * @return MovimentacaoTransito
     */
    public function setUnidCodigoid(Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;
        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return Luma\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
    
    /**
     * Set movitransDataInc
     *
     * @param Luma\Entity\Unidade $movitransDataInc
     * @return MovimentacaoTransito
     */
    public function setMovitransDataInc($movitransDataInc)
    {
        $this->movitransDataInc = $movitransDataInc;
        return $this;
    }

    /**
     * Get movitransDataInc
     *
     * @return datetime 
     */
    public function getMovitransDataInc()
    {
        return $this->movitransDataInc;
    }

    /**
     * Set movitransStatus
     *
     * @param int $movitransStatus
     * @return Movimentacao
     */
    public function setMovitransStatus($movitransStatus)
    {
        $this->movitransStatus = $movitransStatus;
        return $this;
    }

    /**
     * Get movitransStatus
     *
     * @return int 
     */
    public function getMovitransStatus()
    {
        return $this->movitransStatus;
    }
}
