<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManutencaoClassificacao
 */
class ManutencaoClassificacao
{
    /**
     * @var integer
     */
    private $classCodigoid;

    /**
     * @var string
     */
    private $classificacao;


    /**
     * Get classCodigoid
     *
     * @return integer 
     */
    public function getClassCodigoid()
    {
        return $this->classCodigoid;
    }

    /**
     * Set classificacao
     *
     * @param string $classificacao
     * @return ManutencaoClassificacao
     */
    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;

        return $this;
    }

    /**
     * Get classificacao
     *
     * @return string 
     */
    public function getClassificacao()
    {
        return $this->classificacao;
    }
}
