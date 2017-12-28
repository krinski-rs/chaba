<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Natureza
 */
class Natureza
{
    /**
     * @var integer
     */
    private $natuCodigoid;

    /**
     * @var string
     */
    private $natuDescricao;


    /**
     * Get natuCodigoid
     *
     * @return integer 
     */
    public function getNatuCodigoid()
    {
        return $this->natuCodigoid;
    }

    /**
     * Set natuDescricao
     *
     * @param string $natuDescricao
     * @return Natureza
     */
    public function setNatuDescricao($natuDescricao)
    {
        $this->natuDescricao = $natuDescricao;

        return $this;
    }

    /**
     * Get natuDescricao
     *
     * @return string 
     */
    public function getNatuDescricao()
    {
        return $this->natuDescricao;
    }
}
