<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoCausa
 */
class ManutencaoCausa
{
    /**
     * @var integer
     */
    private $causaCodigoid;

    /**
     * @var string
     */
    private $causa;


    /**
     * Get causaCodigoid
     *
     * @return integer 
     */
    public function getCausaCodigoid()
    {
        return $this->causaCodigoid;
    }

    /**
     * Set causa
     *
     * @param string $causa
     * @return ManutencaoCausa
     */
    public function setCausa($causa)
    {
        $this->causa = $causa;

        return $this;
    }

    /**
     * Get causa
     *
     * @return string 
     */
    public function getCausa()
    {
        return $this->causa;
    }
}
