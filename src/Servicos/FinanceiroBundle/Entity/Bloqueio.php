<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloqueio
 */
class Bloqueio
{
    /**
     * @var integer
     */
    private $bloqCodigoid;

    /**
     * @var string
     */
    private $bloqAcao;


    /**
     * Get bloqCodigoid
     *
     * @return integer 
     */
    public function getBloqCodigoid()
    {
        return $this->bloqCodigoid;
    }

    /**
     * Set bloqAcao
     *
     * @param string $bloqAcao
     * @return Bloqueio
     */
    public function setBloqAcao($bloqAcao)
    {
        $this->bloqAcao = $bloqAcao;

        return $this;
    }

    /**
     * Get bloqAcao
     *
     * @return string 
     */
    public function getBloqAcao()
    {
        return $this->bloqAcao;
    }
}
