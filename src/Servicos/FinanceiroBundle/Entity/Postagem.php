<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postagem
 */
class Postagem
{
    /**
     * @var integer
     */
    private $postCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $postDatainc;

    /**
     * @var \DateTime
     */
    private $postDatarecebimento;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Ar
     */
    private $arCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Fatura
     */
    private $fatuCodigoid;


    /**
     * Get postCodigoid
     *
     * @return integer 
     */
    public function getPostCodigoid()
    {
        return $this->postCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Postagem
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
     * Set postDatainc
     *
     * @param \DateTime $postDatainc
     * @return Postagem
     */
    public function setPostDatainc($postDatainc)
    {
        $this->postDatainc = $postDatainc;

        return $this;
    }

    /**
     * Get postDatainc
     *
     * @return \DateTime 
     */
    public function getPostDatainc()
    {
        return $this->postDatainc;
    }

    /**
     * Set postDatarecebimento
     *
     * @param \DateTime $postDatarecebimento
     * @return Postagem
     */
    public function setPostDatarecebimento($postDatarecebimento)
    {
        $this->postDatarecebimento = $postDatarecebimento;

        return $this;
    }

    /**
     * Get postDatarecebimento
     *
     * @return \DateTime 
     */
    public function getPostDatarecebimento()
    {
        return $this->postDatarecebimento;
    }

    /**
     * Set arCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Ar $arCodigoid
     * @return Postagem
     */
    public function setArCodigoid(\Servicos\FinanceiroBundle\Entity\Ar $arCodigoid = null)
    {
        $this->arCodigoid = $arCodigoid;

        return $this;
    }

    /**
     * Get arCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Ar 
     */
    public function getArCodigoid()
    {
        return $this->arCodigoid;
    }

    /**
     * Set fatuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid
     * @return Postagem
     */
    public function setFatuCodigoid(\Servicos\FinanceiroBundle\Entity\Fatura $fatuCodigoid = null)
    {
        $this->fatuCodigoid = $fatuCodigoid;

        return $this;
    }

    /**
     * Get fatuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Fatura 
     */
    public function getFatuCodigoid()
    {
        return $this->fatuCodigoid;
    }
}
