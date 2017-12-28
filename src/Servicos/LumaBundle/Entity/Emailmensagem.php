<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailmensagem
 */
class Emailmensagem
{
    /**
     * @var integer
     */
    private $emailmensagemCodigoid;

    /**
     * @var integer
     */
    private $emailCodigoid;

    /**
     * @var string
     */
    private $emailmensagemMensagem;

    /**
     * @var \DateTime
     */
    private $emailmensagemDatainc;


    /**
     * Get emailmensagemCodigoid
     *
     * @return integer 
     */
    public function getEmailmensagemCodigoid()
    {
        return $this->emailmensagemCodigoid;
    }

    /**
     * Set emailCodigoid
     *
     * @param integer $emailCodigoid
     * @return Emailmensagem
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
     * Set emailmensagemMensagem
     *
     * @param string $emailmensagemMensagem
     * @return Emailmensagem
     */
    public function setEmailmensagemMensagem($emailmensagemMensagem)
    {
        $this->emailmensagemMensagem = $emailmensagemMensagem;

        return $this;
    }

    /**
     * Get emailmensagemMensagem
     *
     * @return string 
     */
    public function getEmailmensagemMensagem()
    {
        return $this->emailmensagemMensagem;
    }

    /**
     * Set emailmensagemDatainc
     *
     * @param \DateTime $emailmensagemDatainc
     * @return Emailmensagem
     */
    public function setEmailmensagemDatainc($emailmensagemDatainc)
    {
        $this->emailmensagemDatainc = $emailmensagemDatainc;

        return $this;
    }

    /**
     * Get emailmensagemDatainc
     *
     * @return \DateTime 
     */
    public function getEmailmensagemDatainc()
    {
        return $this->emailmensagemDatainc;
    }
}
