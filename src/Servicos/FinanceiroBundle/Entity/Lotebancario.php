<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lotebancario
 */
class Lotebancario
{
    /**
     * @var integer
     */
    private $lotebancCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $lotebancDatainc;

    /**
     * @var string
     */
    private $lotebancTexto;

    /**
     * @var string
     */
    private $lotebancNome;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Banco
     */
    private $bancCodigoid;


    /**
     * Get lotebancCodigoid
     *
     * @return integer 
     */
    public function getLotebancCodigoid()
    {
        return $this->lotebancCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Lotebancario
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set lotebancDatainc
     *
     * @param \DateTime $lotebancDatainc
     * @return Lotebancario
     */
    public function setLotebancDatainc($lotebancDatainc)
    {
        $this->lotebancDatainc = $lotebancDatainc;

        return $this;
    }

    /**
     * Get lotebancDatainc
     *
     * @return \DateTime 
     */
    public function getLotebancDatainc()
    {
        return $this->lotebancDatainc;
    }

    /**
     * Set lotebancTexto
     *
     * @param string $lotebancTexto
     * @return Lotebancario
     */
    public function setLotebancTexto($lotebancTexto)
    {
        $this->lotebancTexto = $lotebancTexto;

        return $this;
    }

    /**
     * Get lotebancTexto
     *
     * @return string 
     */
    public function getLotebancTexto()
    {
        return $this->lotebancTexto;
    }

    /**
     * Set lotebancNome
     *
     * @param string $lotebancNome
     * @return Lotebancario
     */
    public function setLotebancNome($lotebancNome)
    {
        $this->lotebancNome = $lotebancNome;

        return $this;
    }

    /**
     * Get lotebancNome
     *
     * @return string 
     */
    public function getLotebancNome()
    {
        return $this->lotebancNome;
    }

    /**
     * Set bancCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Banco $bancCodigoid
     * @return Lotebancario
     */
    public function setBancCodigoid(\Servicos\FinanceiroBundle\Entity\Banco $bancCodigoid = null)
    {
        $this->bancCodigoid = $bancCodigoid;

        return $this;
    }

    /**
     * Get bancCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Banco 
     */
    public function getBancCodigoid()
    {
        return $this->bancCodigoid;
    }
}
