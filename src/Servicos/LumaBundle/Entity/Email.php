<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 */
class Email
{
    /**
     * @var integer
     */
    private $emailCodigoid;

    /**
     * @var integer
     */
    private $tipoCodigoid;

    /**
     * @var string
     */
    private $emailPagina;

    /**
     * @var string
     */
    private $emailAssunto;

    /**
     * @var string
     */
    private $emailCorpo;

    /**
     * @var string
     */
    private $emailDe;

    /**
     * @var string
     */
    private $emailPara;

    /**
     * @var string
     */
    private $emailCc;

    /**
     * @var string
     */
    private $emailBcc;

    /**
     * @var string
     */
    private $emailAnexo;

    /**
     * @var \DateTime
     */
    private $emailDataenvio;

    /**
     * @var \DateTime
     */
    private $emailDatainc;

    /**
     * @var integer
     */
    private $emailIdoperacao;

    /**
     * @var string
     */
    private $emailTipooperacao;

    /**
     * @var integer
     */
    private $emailPrioridade;


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
     * Set tipoCodigoid
     *
     * @param integer $tipoCodigoid
     * @return Email
     */
    public function setTipoCodigoid($tipoCodigoid)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return integer 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
     * Set emailPagina
     *
     * @param string $emailPagina
     * @return Email
     */
    public function setEmailPagina($emailPagina)
    {
        $this->emailPagina = $emailPagina;

        return $this;
    }

    /**
     * Get emailPagina
     *
     * @return string 
     */
    public function getEmailPagina()
    {
        return $this->emailPagina;
    }

    /**
     * Set emailAssunto
     *
     * @param string $emailAssunto
     * @return Email
     */
    public function setEmailAssunto($emailAssunto)
    {
        $this->emailAssunto = $emailAssunto;

        return $this;
    }

    /**
     * Get emailAssunto
     *
     * @return string 
     */
    public function getEmailAssunto()
    {
        return $this->emailAssunto;
    }

    /**
     * Set emailCorpo
     *
     * @param string $emailCorpo
     * @return Email
     */
    public function setEmailCorpo($emailCorpo)
    {
        $this->emailCorpo = $emailCorpo;

        return $this;
    }

    /**
     * Get emailCorpo
     *
     * @return string 
     */
    public function getEmailCorpo()
    {
        return $this->emailCorpo;
    }

    /**
     * Set emailDe
     *
     * @param string $emailDe
     * @return Email
     */
    public function setEmailDe($emailDe)
    {
        $this->emailDe = $emailDe;

        return $this;
    }

    /**
     * Get emailDe
     *
     * @return string 
     */
    public function getEmailDe()
    {
        return $this->emailDe;
    }

    /**
     * Set emailPara
     *
     * @param string $emailPara
     * @return Email
     */
    public function setEmailPara($emailPara)
    {
        $this->emailPara = $emailPara;

        return $this;
    }

    /**
     * Get emailPara
     *
     * @return string 
     */
    public function getEmailPara()
    {
        return $this->emailPara;
    }

    /**
     * Set emailCc
     *
     * @param string $emailCc
     * @return Email
     */
    public function setEmailCc($emailCc)
    {
        $this->emailCc = $emailCc;

        return $this;
    }

    /**
     * Get emailCc
     *
     * @return string 
     */
    public function getEmailCc()
    {
        return $this->emailCc;
    }

    /**
     * Set emailBcc
     *
     * @param string $emailBcc
     * @return Email
     */
    public function setEmailBcc($emailBcc)
    {
        $this->emailBcc = $emailBcc;

        return $this;
    }

    /**
     * Get emailBcc
     *
     * @return string 
     */
    public function getEmailBcc()
    {
        return $this->emailBcc;
    }

    /**
     * Set emailAnexo
     *
     * @param string $emailAnexo
     * @return Email
     */
    public function setEmailAnexo($emailAnexo)
    {
        $this->emailAnexo = $emailAnexo;

        return $this;
    }

    /**
     * Get emailAnexo
     *
     * @return string 
     */
    public function getEmailAnexo()
    {
        return $this->emailAnexo;
    }

    /**
     * Set emailDataenvio
     *
     * @param \DateTime $emailDataenvio
     * @return Email
     */
    public function setEmailDataenvio($emailDataenvio)
    {
        $this->emailDataenvio = $emailDataenvio;

        return $this;
    }

    /**
     * Get emailDataenvio
     *
     * @return \DateTime 
     */
    public function getEmailDataenvio()
    {
        return $this->emailDataenvio;
    }

    /**
     * Set emailDatainc
     *
     * @param \DateTime $emailDatainc
     * @return Email
     */
    public function setEmailDatainc($emailDatainc)
    {
        $this->emailDatainc = $emailDatainc;

        return $this;
    }

    /**
     * Get emailDatainc
     *
     * @return \DateTime 
     */
    public function getEmailDatainc()
    {
        return $this->emailDatainc;
    }

    /**
     * Set emailIdoperacao
     *
     * @param integer $emailIdoperacao
     * @return Email
     */
    public function setEmailIdoperacao($emailIdoperacao)
    {
        $this->emailIdoperacao = $emailIdoperacao;

        return $this;
    }

    /**
     * Get emailIdoperacao
     *
     * @return integer 
     */
    public function getEmailIdoperacao()
    {
        return $this->emailIdoperacao;
    }

    /**
     * Set emailTipooperacao
     *
     * @param string $emailTipooperacao
     * @return Email
     */
    public function setEmailTipooperacao($emailTipooperacao)
    {
        $this->emailTipooperacao = $emailTipooperacao;

        return $this;
    }

    /**
     * Get emailTipooperacao
     *
     * @return string 
     */
    public function getEmailTipooperacao()
    {
        return $this->emailTipooperacao;
    }

    /**
     * Set emailPrioridade
     *
     * @param integer $emailPrioridade
     * @return Email
     */
    public function setEmailPrioridade($emailPrioridade)
    {
        $this->emailPrioridade = $emailPrioridade;

        return $this;
    }

    /**
     * Get emailPrioridade
     *
     * @return integer 
     */
    public function getEmailPrioridade()
    {
        return $this->emailPrioridade;
    }
}
