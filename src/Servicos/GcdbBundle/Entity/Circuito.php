<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circuito
 */
class Circuito
{
    /**
     * @var integer
     */
    private $circCodigoid;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $usuaDesativacao;

    /**
     * @var integer
     */
    private $circOrdem;

    /**
     * @var integer
     */
    private $endeentrCodigoid;

    /**
     * @var string
     */
    private $circPontaa;

    /**
     * @var integer
     */
    private $circPopa;

    /**
     * @var string
     */
    private $circPontab;

    /**
     * @var integer
     */
    private $circPopb;

    /**
     * @var string
     */
    private $circMeiotransmissao;

    /**
     * @var string
     */
    private $circVelocidade;

    /**
     * @var string
     */
    private $circInterface;

    /**
     * @var string
     */
    private $circInformacoestecnicas;

    /**
     * @var string
     */
    private $circObservacao;

    /**
     * @var boolean
     */
    private $circAtivo;

    /**
     * @var \DateTime
     */
    private $circDatainc;

    /**
     * @var string
     */
    private $circMotivodesativado;

    /**
     * @var \DateTime
     */
    private $circDatadesativado;

    /**
     * @var integer
     */
    private $circBandaid;

    /**
     * @var \Servicos\GcdbBundle\Entity\Customerservico
     */
    private $custservCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentrega
     */
    private $enderecoentrega;
    

    /**
     * Get circCodigoid
     *
     * @return integer 
     */
    public function getCircCodigoid()
    {
        return $this->circCodigoid;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return Circuito
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set usuaDesativacao
     *
     * @param integer $usuaDesativacao
     * @return Circuito
     */
    public function setUsuaDesativacao($usuaDesativacao)
    {
        $this->usuaDesativacao = $usuaDesativacao;

        return $this;
    }

    /**
     * Get usuaDesativacao
     *
     * @return integer 
     */
    public function getUsuaDesativacao()
    {
        return $this->usuaDesativacao;
    }

    /**
     * Set circOrdem
     *
     * @param integer $circOrdem
     * @return Circuito
     */
    public function setCircOrdem($circOrdem)
    {
        $this->circOrdem = $circOrdem;

        return $this;
    }

    /**
     * Get circOrdem
     *
     * @return integer 
     */
    public function getCircOrdem()
    {
        return $this->circOrdem;
    }

    /**
     * Set endeentrCodigoid
     *
     * @param integer $endeentrCodigoid
     * @return Circuito
     */
    public function setEndeentrCodigoid($endeentrCodigoid)
    {
        $this->endeentrCodigoid = $endeentrCodigoid;

        return $this;
    }

    /**
     * Get endeentrCodigoid
     *
     * @return integer 
     */
    public function getEndeentrCodigoid()
    {
        return $this->endeentrCodigoid;
    }

    /**
     * Set circPontaa
     *
     * @param string $circPontaa
     * @return Circuito
     */
    public function setCircPontaa($circPontaa)
    {
        $this->circPontaa = $circPontaa;

        return $this;
    }

    /**
     * Get circPontaa
     *
     * @return string 
     */
    public function getCircPontaa()
    {
        return $this->circPontaa;
    }

    /**
     * Set circPopa
     *
     * @param integer $circPopa
     * @return Circuito
     */
    public function setCircPopa($circPopa)
    {
        $this->circPopa = $circPopa;

        return $this;
    }

    /**
     * Get circPopa
     *
     * @return integer 
     */
    public function getCircPopa()
    {
        return $this->circPopa;
    }

    /**
     * Set circPontab
     *
     * @param string $circPontab
     * @return Circuito
     */
    public function setCircPontab($circPontab)
    {
        $this->circPontab = $circPontab;

        return $this;
    }

    /**
     * Get circPontab
     *
     * @return string 
     */
    public function getCircPontab()
    {
        return $this->circPontab;
    }

    /**
     * Set circPopb
     *
     * @param integer $circPopb
     * @return Circuito
     */
    public function setCircPopb($circPopb)
    {
        $this->circPopb = $circPopb;

        return $this;
    }

    /**
     * Get circPopb
     *
     * @return integer 
     */
    public function getCircPopb()
    {
        return $this->circPopb;
    }

    /**
     * Set circMeiotransmissao
     *
     * @param string $circMeiotransmissao
     * @return Circuito
     */
    public function setCircMeiotransmissao($circMeiotransmissao)
    {
        $this->circMeiotransmissao = $circMeiotransmissao;

        return $this;
    }

    /**
     * Get circMeiotransmissao
     *
     * @return string 
     */
    public function getCircMeiotransmissao()
    {
        return $this->circMeiotransmissao;
    }

    /**
     * Set circVelocidade
     *
     * @param string $circVelocidade
     * @return Circuito
     */
    public function setCircVelocidade($circVelocidade)
    {
        $this->circVelocidade = $circVelocidade;

        return $this;
    }

    /**
     * Get circVelocidade
     *
     * @return string 
     */
    public function getCircVelocidade()
    {
        return $this->circVelocidade;
    }

    /**
     * Set circInterface
     *
     * @param string $circInterface
     * @return Circuito
     */
    public function setCircInterface($circInterface)
    {
        $this->circInterface = $circInterface;

        return $this;
    }

    /**
     * Get circInterface
     *
     * @return string 
     */
    public function getCircInterface()
    {
        return $this->circInterface;
    }

    /**
     * Set circInformacoestecnicas
     *
     * @param string $circInformacoestecnicas
     * @return Circuito
     */
    public function setCircInformacoestecnicas($circInformacoestecnicas)
    {
        $this->circInformacoestecnicas = $circInformacoestecnicas;

        return $this;
    }

    /**
     * Get circInformacoestecnicas
     *
     * @return string 
     */
    public function getCircInformacoestecnicas()
    {
        return $this->circInformacoestecnicas;
    }

    /**
     * Set circObservacao
     *
     * @param string $circObservacao
     * @return Circuito
     */
    public function setCircObservacao($circObservacao)
    {
        $this->circObservacao = $circObservacao;

        return $this;
    }

    /**
     * Get circObservacao
     *
     * @return string 
     */
    public function getCircObservacao()
    {
        return $this->circObservacao;
    }

    /**
     * Set circAtivo
     *
     * @param boolean $circAtivo
     * @return Circuito
     */
    public function setCircAtivo($circAtivo)
    {
        $this->circAtivo = $circAtivo;

        return $this;
    }

    /**
     * Get circAtivo
     *
     * @return boolean 
     */
    public function getCircAtivo()
    {
        return $this->circAtivo;
    }

    /**
     * Set circDatainc
     *
     * @param \DateTime $circDatainc
     * @return Circuito
     */
    public function setCircDatainc($circDatainc)
    {
        $this->circDatainc = $circDatainc;

        return $this;
    }

    /**
     * Get circDatainc
     *
     * @return \DateTime 
     */
    public function getCircDatainc()
    {
        return $this->circDatainc;
    }

    /**
     * Set circMotivodesativado
     *
     * @param string $circMotivodesativado
     * @return Circuito
     */
    public function setCircMotivodesativado($circMotivodesativado)
    {
        $this->circMotivodesativado = $circMotivodesativado;

        return $this;
    }

    /**
     * Get circMotivodesativado
     *
     * @return string 
     */
    public function getCircMotivodesativado()
    {
        return $this->circMotivodesativado;
    }

    /**
     * Set circDatadesativado
     *
     * @param \DateTime $circDatadesativado
     * @return Circuito
     */
    public function setCircDatadesativado($circDatadesativado)
    {
        $this->circDatadesativado = $circDatadesativado;

        return $this;
    }

    /**
     * Get circDatadesativado
     *
     * @return \DateTime 
     */
    public function getCircDatadesativado()
    {
        return $this->circDatadesativado;
    }

    /**
     * Set circBandaid
     *
     * @param integer $circBandaid
     * @return Circuito
     */
    public function setCircBandaid($circBandaid)
    {
        $this->circBandaid = $circBandaid;

        return $this;
    }

    /**
     * Get circBandaid
     *
     * @return integer 
     */
    public function getCircBandaid()
    {
        return $this->circBandaid;
    }

    /**
     * Set custservCodigoid
     *
     * @param \Servicos\GcdbBundle\Entity\Customerservico $custservCodigoid
     * @return Circuito
     */
    public function setCustservCodigoid(\Servicos\GcdbBundle\Entity\Customerservico $custservCodigoid = null)
    {
        $this->custservCodigoid = $custservCodigoid;

        return $this;
    }

    /**
     * Get custservCodigoid
     *
     * @return \Servicos\GcdbBundle\Entity\Customerservico 
     */
    public function getCustservCodigoid()
    {
        return $this->custservCodigoid;
    }

    /**
     * Set enderecoentrega
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentrega $enderecoentrega
     * @return Circuito
     */
    public function setEnderecoentrega(\Servicos\FinanceiroBundle\Entity\Enderecoentrega $enderecoentrega)
    {
        $this->enderecoentrega = $enderecoentrega;

        return $this;
    }

    /**
     * Get enderecoentrega
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentrega 
     */
    public function getEnderecoentrega()
    {
        return $this->enderecoentrega;
    }
}
