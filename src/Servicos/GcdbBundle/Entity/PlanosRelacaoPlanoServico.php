<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosRelacaoPlanoServico
 */
class PlanosRelacaoPlanoServico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $planosTipoServicoId;

    /**
     * @var integer
     */
    private $planosServicosId;

    /**
     * @var string
     */
    private $quantidade;


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
     * Set planosTipoServicoId
     *
     * @param integer $planosTipoServicoId
     * @return PlanosRelacaoPlanoServico
     */
    public function setPlanosTipoServicoId($planosTipoServicoId)
    {
        $this->planosTipoServicoId = $planosTipoServicoId;

        return $this;
    }

    /**
     * Get planosTipoServicoId
     *
     * @return integer 
     */
    public function getPlanosTipoServicoId()
    {
        return $this->planosTipoServicoId;
    }

    /**
     * Set planosServicosId
     *
     * @param integer $planosServicosId
     * @return PlanosRelacaoPlanoServico
     */
    public function setPlanosServicosId($planosServicosId)
    {
        $this->planosServicosId = $planosServicosId;

        return $this;
    }

    /**
     * Get planosServicosId
     *
     * @return integer 
     */
    public function getPlanosServicosId()
    {
        return $this->planosServicosId;
    }

    /**
     * Set quantidade
     *
     * @param string $quantidade
     * @return PlanosRelacaoPlanoServico
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return string 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }
}
