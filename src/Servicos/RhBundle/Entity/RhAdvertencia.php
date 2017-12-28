<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhAdvertencia
 */
class RhAdvertencia
{
    /**
     * @var integer
     */
    private $idAdvertencia;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInc;


    /**
     * Get idAdvertencia
     *
     * @return integer 
     */
    public function getIdAdvertencia()
    {
        return $this->idAdvertencia;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhAdvertencia
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhAdvertencia
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }
}
