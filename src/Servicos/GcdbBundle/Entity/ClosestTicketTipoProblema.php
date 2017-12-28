<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClosestTicketTipoProblema
 */
class ClosestTicketTipoProblema
{
    /**
     * @var integer
     */
    private $closestTicketTipoProblemaId;

    /**
     * @var string
     */
    private $closestTicketTipoProblemaDescricao;


    /**
     * Get closestTicketTipoProblemaId
     *
     * @return integer 
     */
    public function getClosestTicketTipoProblemaId()
    {
        return $this->closestTicketTipoProblemaId;
    }

    /**
     * Set closestTicketTipoProblemaDescricao
     *
     * @param string $closestTicketTipoProblemaDescricao
     * @return ClosestTicketTipoProblema
     */
    public function setClosestTicketTipoProblemaDescricao($closestTicketTipoProblemaDescricao)
    {
        $this->closestTicketTipoProblemaDescricao = $closestTicketTipoProblemaDescricao;

        return $this;
    }

    /**
     * Get closestTicketTipoProblemaDescricao
     *
     * @return string 
     */
    public function getClosestTicketTipoProblemaDescricao()
    {
        return $this->closestTicketTipoProblemaDescricao;
    }
}
