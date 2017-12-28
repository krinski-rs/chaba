<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailleitura
 */
class Emailleitura
{
    /**
     * @var integer
     */
    private $emailleituraCodigoid;

    /**
     * @var integer
     */
    private $emailCodigoid;

    /**
     * @var \DateTime
     */
    private $emailleituraDatainc;

    /**
     * @var string
     */
    private $emailleituraIp;

    /**
     * @var string
     */
    private $emailleituraInformacao;


    /**
     * Get emailleituraCodigoid
     *
     * @return integer 
     */
    public function getEmailleituraCodigoid()
    {
        return $this->emailleituraCodigoid;
    }

    /**
     * Set emailCodigoid
     *
     * @param integer $emailCodigoid
     * @return Emailleitura
     */
    public function setEmailCodigoid($emailCodigoid)
    {
        $this->emailCodigoid = $emailCodigoid;

        return $this;
    }

    /**
     * Get emailCodigoid
     *
     * @return integer 
     */
    public function getEmailCodigoid()
    {
        return $this->emailCodigoid;
    }

    /**
     * Set emailleituraDatainc
     *
     * @param \DateTime $emailleituraDatainc
     * @return Emailleitura
     */
    public function setEmailleituraDatainc($emailleituraDatainc)
    {
        $this->emailleituraDatainc = $emailleituraDatainc;

        return $this;
    }

    /**
     * Get emailleituraDatainc
     *
     * @return \DateTime 
     */
    public function getEmailleituraDatainc()
    {
        return $this->emailleituraDatainc;
    }

    /**
     * Set emailleituraIp
     *
     * @param string $emailleituraIp
     * @return Emailleitura
     */
    public function setEmailleituraIp($emailleituraIp)
    {
        $this->emailleituraIp = $emailleituraIp;

        return $this;
    }

    /**
     * Get emailleituraIp
     *
     * @return string 
     */
    public function getEmailleituraIp()
    {
        return $this->emailleituraIp;
    }

    /**
     * Set emailleituraInformacao
     *
     * @param string $emailleituraInformacao
     * @return Emailleitura
     */
    public function setEmailleituraInformacao($emailleituraInformacao)
    {
        $this->emailleituraInformacao = $emailleituraInformacao;

        return $this;
    }

    /**
     * Get emailleituraInformacao
     *
     * @return string 
     */
    public function getEmailleituraInformacao()
    {
        return $this->emailleituraInformacao;
    }
}
