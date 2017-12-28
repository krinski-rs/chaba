<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atendimento
 */
class Atendimento
{
    /**
     * @var integer
     */
    private $atid;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $urlobs;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var string
     */
    private $mostrar;


    /**
     * Get atid
     *
     * @return integer 
     */
    public function getAtid()
    {
        return $this->atid;
    }

    /**
     * Set customerid
     *
     * @param integer $customerid
     * @return Atendimento
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Atendimento
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set urlobs
     *
     * @param string $urlobs
     * @return Atendimento
     */
    public function setUrlobs($urlobs)
    {
        $this->urlobs = $urlobs;

        return $this;
    }

    /**
     * Get urlobs
     *
     * @return string 
     */
    public function getUrlobs()
    {
        return $this->urlobs;
    }

    /**
     * Set obs
     *
     * @param string $obs
     * @return Atendimento
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string 
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set mostrar
     *
     * @param string $mostrar
     * @return Atendimento
     */
    public function setMostrar($mostrar)
    {
        $this->mostrar = $mostrar;

        return $this;
    }

    /**
     * Get mostrar
     *
     * @return string 
     */
    public function getMostrar()
    {
        return $this->mostrar;
    }
}
