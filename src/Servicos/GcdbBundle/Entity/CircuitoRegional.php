<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CircuitoRegional
 */
class CircuitoRegional
{
    /**
     * @var integer
     */
    private $regional;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var integer
     */
    private $circuitos;


    /**
     * Set regional
     *
     * @param integer $regional
     * @return CircuitoRegional
     */
    public function setRegional($regional)
    {
        $this->regional = $regional;

        return $this;
    }

    /**
     * Get regional
     *
     * @return integer 
     */
    public function getRegional()
    {
        return $this->regional;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return CircuitoRegional
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set circuitos
     *
     * @param integer $circuitos
     * @return CircuitoRegional
     */
    public function setCircuitos($circuitos)
    {
        $this->circuitos = $circuitos;

        return $this;
    }

    /**
     * Get circuitos
     *
     * @return integer 
     */
    public function getCircuitos()
    {
        return $this->circuitos;
    }
}
