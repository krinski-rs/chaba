<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemessaRecebimentoOrdem
 */
class RemessaRecebimentoOrdem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordem
     */
    private $idOrdem;

    /**
     * @var \Servicos\LumaBundle\Entity\RemessaRecebimento
     */
    private $idRemessaRecebimento;


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
     * Set idOrdem
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $idOrdem
     * @return RemessaRecebimentoOrdem
     */
    public function setIdOrdem(\Servicos\LumaBundle\Entity\Ordem $idOrdem = null)
    {
        $this->idOrdem = $idOrdem;

        return $this;
    }

    /**
     * Get idOrdem
     *
     * @return \Servicos\LumaBundle\Entity\Ordem 
     */
    public function getIdOrdem()
    {
        return $this->idOrdem;
    }

    /**
     * Set idRemessaRecebimento
     *
     * @param \Servicos\LumaBundle\Entity\RemessaRecebimento $idRemessaRecebimento
     * @return RemessaRecebimentoOrdem
     */
    public function setIdRemessaRecebimento(\Servicos\LumaBundle\Entity\RemessaRecebimento $idRemessaRecebimento = null)
    {
        $this->idRemessaRecebimento = $idRemessaRecebimento;

        return $this;
    }

    /**
     * Get idRemessaRecebimento
     *
     * @return \Servicos\LumaBundle\Entity\RemessaRecebimento 
     */
    public function getIdRemessaRecebimento()
    {
        return $this->idRemessaRecebimento;
    }
}
