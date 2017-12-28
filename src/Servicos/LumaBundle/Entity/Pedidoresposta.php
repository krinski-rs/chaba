<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoresposta
 */
class Pedidoresposta
{
    /**
     * @var integer
     */
    private $pedirespCodigoid;

    /**
     * @var string
     */
    private $pedirespResposta;


    /**
     * Get pedirespCodigoid
     *
     * @return integer 
     */
    public function getPedirespCodigoid()
    {
        return $this->pedirespCodigoid;
    }

    /**
     * Set pedirespResposta
     *
     * @param string $pedirespResposta
     * @return Pedidoresposta
     */
    public function setPedirespResposta($pedirespResposta)
    {
        $this->pedirespResposta = $pedirespResposta;

        return $this;
    }

    /**
     * Get pedirespResposta
     *
     * @return string 
     */
    public function getPedirespResposta()
    {
        return $this->pedirespResposta;
    }
}
