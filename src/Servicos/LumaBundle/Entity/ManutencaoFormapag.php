<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoFormapag
 */
class ManutencaoFormapag
{
    /**
     * @var integer
     */
    private $formapagCodigoid;

    /**
     * @var string
     */
    private $formaPagamento;


    /**
     * Get formapagCodigoid
     *
     * @return integer 
     */
    public function getFormapagCodigoid()
    {
        return $this->formapagCodigoid;
    }

    /**
     * Set formaPagamento
     *
     * @param string $formaPagamento
     * @return ManutencaoFormapag
     */
    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;

        return $this;
    }

    /**
     * Get formaPagamento
     *
     * @return string 
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }
}
