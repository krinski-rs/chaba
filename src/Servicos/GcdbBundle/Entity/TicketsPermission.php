<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsPermission
 */
class TicketsPermission
{
    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $status;


    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return TicketsPermission
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
