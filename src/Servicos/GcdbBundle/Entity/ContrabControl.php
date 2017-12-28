<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContrabControl
 */
class ContrabControl
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tempo;

    /**
     * @var string
     */
    private $falhaSwitch;

    /**
     * @var \DateTime
     */
    private $execucao;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tempo
     *
     * @param string $tempo
     * @return ContrabControl
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;

        return $this;
    }

    /**
     * Get tempo
     *
     * @return string 
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * Set falhaSwitch
     *
     * @param string $falhaSwitch
     * @return ContrabControl
     */
    public function setFalhaSwitch($falhaSwitch)
    {
        $this->falhaSwitch = $falhaSwitch;

        return $this;
    }

    /**
     * Get falhaSwitch
     *
     * @return string 
     */
    public function getFalhaSwitch()
    {
        return $this->falhaSwitch;
    }

    /**
     * Set execucao
     *
     * @param \DateTime $execucao
     * @return ContrabControl
     */
    public function setExecucao($execucao)
    {
        $this->execucao = $execucao;

        return $this;
    }

    /**
     * Get execucao
     *
     * @return \DateTime 
     */
    public function getExecucao()
    {
        return $this->execucao;
    }
}
