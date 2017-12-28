<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoStatus
 */
class ManutencaoStatus
{
    /**
     * @var integer
     */
    private $statusCodigoid;

    /**
     * @var string
     */
    private $status;


    /**
     * Get statusCodigoid
     *
     * @return integer 
     */
    public function getStatusCodigoid()
    {
        return $this->statusCodigoid;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ManutencaoStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
