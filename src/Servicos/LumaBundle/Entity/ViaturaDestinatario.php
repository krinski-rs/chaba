<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaDestinatario
 */
class ViaturaDestinatario
{
    /**
     * @var integer
     */
    private $viatCadUsuarioid;


    /**
     * Get viatCadUsuarioid
     *
     * @return integer 
     */
    public function getViatCadUsuarioid()
    {
        return $this->viatCadUsuarioid;
    }
}
