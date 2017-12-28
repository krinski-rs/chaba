<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrato
 */
class Contrato
{
    /**
     * @var integer
     */
    private $contCodigoid;

    /**
     * @var integer
     */
    private $clieCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var integer
     */
    private $contNumero;

    /**
     * @var integer
     */
    private $contLimiteatraso;

    /**
     * @var boolean
     */
    private $contMenorprazo;

    /**
     * @var integer
     */
    private $contPrazorescisao;

    /**
     * @var \DateTime
     */
    private $contDataassinatura;

    /**
     * @var \DateTime
     */
    private $contDatainc;

    /**
     * @var string
     */
    private $contIndicereajuste;

    /**
     * @var integer
     */
    private $contPrazoreajuste;

    /**
     * @var string
     */
    private $contIndisponibilidade;

    /**
     * @var integer
     */
    private $contDependentecodigoid;

    /**
     * @var integer
     */
    private $bancCodigoid;

    /**
     * @var \DateTime
     */
    private $contDatacancelamento;

    /**
     * @var \DateTime
     */
    private $contDatacancelado;

    /**
     * @var \DateTime
     */
    private $contDatareajustado;

    /**
     * @var integer
     */
    private $contUnidArquivado;

    /**
     * @var string
     */
    private $contClienteFinal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ativacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cancelamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratobloqueio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratocontato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratoservico;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratoticket;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratovalor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $desativacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $documento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $duracaocontrato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $enderecocobranca;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $impostoscontrato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reativacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rescisao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $restricao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suspencao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $upgrade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratoFilho;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $enderecoentregaatributovalor;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Envio
     */
    private $enviCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contSubstituircodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contProximocodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contPaicodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Designacao
     */
    private $desigCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentrega
     */
    private $endeentrCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Modelo
     */
    private $modeCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Multas
     */
    private $multCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Sla
     */
    private $slaCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Status
     */
    private $statCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ativacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cancelamento = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratobloqueio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratocontato = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratoservico = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratoticket = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratovalor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->desativacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documento = new \Doctrine\Common\Collections\ArrayCollection();
        $this->duracaocontrato = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enderecocobranca = new \Doctrine\Common\Collections\ArrayCollection();
        $this->impostoscontrato = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reativacao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rescisao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->restricao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->suspencao = new \Doctrine\Common\Collections\ArrayCollection();
        $this->upgrade = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contratoFilho = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enderecoentregaatributovalor = new \Doctrine\Common\Collections\ArrayCollection();
   }

    /**
     * Get contCodigoid
     *
     * @return integer
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set clieCodigoid
     *
     * @param integer $clieCodigoid
     * @return Contrato
     */
    public function setClieCodigoid($clieCodigoid)
    {
        $this->clieCodigoid = $clieCodigoid;

        return $this;
    }

    /**
     * Get clieCodigoid
     *
     * @return integer
     */
    public function getClieCodigoid()
    {
        return $this->clieCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Contrato
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
     * Set contNumero
     *
     * @param integer $contNumero
     * @return Contrato
     */
    public function setContNumero($contNumero)
    {
        $this->contNumero = $contNumero;

        return $this;
    }

    /**
     * Get contNumero
     *
     * @return integer
     */
    public function getContNumero()
    {
        return $this->contNumero;
    }

    /**
     * Set contLimiteatraso
     *
     * @param integer $contLimiteatraso
     * @return Contrato
     */
    public function setContLimiteatraso($contLimiteatraso)
    {
        $this->contLimiteatraso = $contLimiteatraso;

        return $this;
    }

    /**
     * Get contLimiteatraso
     *
     * @return integer
     */
    public function getContLimiteatraso()
    {
        return $this->contLimiteatraso;
    }

    /**
     * Set contMenorprazo
     *
     * @param boolean $contMenorprazo
     * @return Contrato
     */
    public function setContMenorprazo($contMenorprazo)
    {
        $this->contMenorprazo = $contMenorprazo;

        return $this;
    }

    /**
     * Get contMenorprazo
     *
     * @return boolean
     */
    public function getContMenorprazo()
    {
        return $this->contMenorprazo;
    }

    /**
     * Set contPrazorescisao
     *
     * @param integer $contPrazorescisao
     * @return Contrato
     */
    public function setContPrazorescisao($contPrazorescisao)
    {
        $this->contPrazorescisao = $contPrazorescisao;

        return $this;
    }

    /**
     * Get contPrazorescisao
     *
     * @return integer
     */
    public function getContPrazorescisao()
    {
        return $this->contPrazorescisao;
    }

    /**
     * Set contDataassinatura
     *
     * @param \DateTime $contDataassinatura
     * @return Contrato
     */
    public function setContDataassinatura($contDataassinatura)
    {
        $this->contDataassinatura = $contDataassinatura;

        return $this;
    }

    /**
     * Get contDataassinatura
     *
     * @return \DateTime
     */
    public function getContDataassinatura()
    {
        return $this->contDataassinatura;
    }

    /**
     * Set contDatainc
     *
     * @param \DateTime $contDatainc
     * @return Contrato
     */
    public function setContDatainc($contDatainc)
    {
        $this->contDatainc = $contDatainc;

        return $this;
    }

    /**
     * Get contDatainc
     *
     * @return \DateTime
     */
    public function getContDatainc()
    {
        return $this->contDatainc;
    }

    /**
     * Set contIndicereajuste
     *
     * @param string $contIndicereajuste
     * @return Contrato
     */
    public function setContIndicereajuste($contIndicereajuste)
    {
        $this->contIndicereajuste = $contIndicereajuste;

        return $this;
    }

    /**
     * Get contIndicereajuste
     *
     * @return string
     */
    public function getContIndicereajuste()
    {
        return $this->contIndicereajuste;
    }

    /**
     * Set contPrazoreajuste
     *
     * @param integer $contPrazoreajuste
     * @return Contrato
     */
    public function setContPrazoreajuste($contPrazoreajuste)
    {
        $this->contPrazoreajuste = $contPrazoreajuste;

        return $this;
    }

    /**
     * Get contPrazoreajuste
     *
     * @return integer
     */
    public function getContPrazoreajuste()
    {
        return $this->contPrazoreajuste;
    }

    /**
     * Set contIndisponibilidade
     *
     * @param string $contIndisponibilidade
     * @return Contrato
     */
    public function setContIndisponibilidade($contIndisponibilidade)
    {
        $this->contIndisponibilidade = $contIndisponibilidade;

        return $this;
    }

    /**
     * Get contIndisponibilidade
     *
     * @return string
     */
    public function getContIndisponibilidade()
    {
        return $this->contIndisponibilidade;
    }

    /**
     * Set contDependentecodigoid
     *
     * @param integer $contDependentecodigoid
     * @return Contrato
     */
    public function setContDependentecodigoid($contDependentecodigoid)
    {
        $this->contDependentecodigoid = $contDependentecodigoid;

        return $this;
    }

    /**
     * Get contDependentecodigoid
     *
     * @return integer
     */
    public function getContDependentecodigoid()
    {
        return $this->contDependentecodigoid;
    }

    /**
     * Set bancCodigoid
     *
     * @param integer $bancCodigoid
     * @return Contrato
     */
    public function setBancCodigoid($bancCodigoid)
    {
        $this->bancCodigoid = $bancCodigoid;

        return $this;
    }

    /**
     * Get bancCodigoid
     *
     * @return integer
     */
    public function getBancCodigoid()
    {
        return $this->bancCodigoid;
    }

    /**
     * Set contDatacancelamento
     *
     * @param \DateTime $contDatacancelamento
     * @return Contrato
     */
    public function setContDatacancelamento($contDatacancelamento)
    {
        $this->contDatacancelamento = $contDatacancelamento;

        return $this;
    }

    /**
     * Get contDatacancelamento
     *
     * @return \DateTime
     */
    public function getContDatacancelamento()
    {
        return $this->contDatacancelamento;
    }

    /**
     * Set contDatacancelado
     *
     * @param \DateTime $contDatacancelado
     * @return Contrato
     */
    public function setContDatacancelado($contDatacancelado)
    {
        $this->contDatacancelado = $contDatacancelado;

        return $this;
    }

    /**
     * Get contDatacancelado
     *
     * @return \DateTime
     */
    public function getContDatacancelado()
    {
        return $this->contDatacancelado;
    }

    /**
     * Set contDatareajustado
     *
     * @param \DateTime $contDatareajustado
     * @return Contrato
     */
    public function setContDatareajustado($contDatareajustado)
    {
        $this->contDatareajustado = $contDatareajustado;

        return $this;
    }

    /**
     * Get contDatareajustado
     *
     * @return \DateTime
     */
    public function getContDatareajustado()
    {
        return $this->contDatareajustado;
    }

    /**
     * Set contUnidArquivado
     *
     * @param integer $contUnidArquivado
     * @return Contrato
     */
    public function setContUnidArquivado($contUnidArquivado)
    {
        $this->contUnidArquivado = $contUnidArquivado;

        return $this;
    }

    /**
     * Get contUnidArquivado
     *
     * @return integer
     */
    public function getContUnidArquivado()
    {
        return $this->contUnidArquivado;
    }

    /**
     * Set contClienteFinal
     *
     * @param string contClienteFinal
     * @return Contrato
     */
    public function setContClienteFinal($contClienteFinal)
    {
        $this->contClienteFinal = $contClienteFinal;

        return $this;
    }

    /**
     * Get contClienteFinal
     *
     * @return string
     */
    public function getContClienteFinal()
    {
        return $this->contClienteFinal;
    }

    /**
     * Add ativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Ativacao $ativacao
     * @return Contrato
     */
    public function addAtivacao(\Servicos\FinanceiroBundle\Entity\Ativacao $ativacao)
    {
        $this->ativacao[] = $ativacao;

        return $this;
    }

    /**
     * Remove ativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Ativacao $ativacao
     */
    public function removeAtivacao(\Servicos\FinanceiroBundle\Entity\Ativacao $ativacao)
    {
        $this->ativacao->removeElement($ativacao);
    }

    /**
     * Get ativacao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAtivacao()
    {
        return $this->ativacao;
    }

    /**
     * Add cancelamento
     *
     * @param \Servicos\FinanceiroBundle\Entity\Cancelamento $cancelamento
     * @return Contrato
     */
    public function addCancelamento(\Servicos\FinanceiroBundle\Entity\Cancelamento $cancelamento)
    {
        $this->cancelamento[] = $cancelamento;

        return $this;
    }

    /**
     * Remove cancelamento
     *
     * @param \Servicos\FinanceiroBundle\Entity\Cancelamento $cancelamento
     */
    public function removeCancelamento(\Servicos\FinanceiroBundle\Entity\Cancelamento $cancelamento)
    {
        $this->cancelamento->removeElement($cancelamento);
    }

    /**
     * Get cancelamento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCancelamento()
    {
        return $this->cancelamento;
    }

    /**
     * Add contratobloqueio
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratobloqueio $contratobloqueio
     * @return Contrato
     */
    public function addContratobloqueio(\Servicos\FinanceiroBundle\Entity\Contratobloqueio $contratobloqueio)
    {
        $this->contratobloqueio[] = $contratobloqueio;

        return $this;
    }

    /**
     * Remove contratobloqueio
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratobloqueio $contratobloqueio
     */
    public function removeContratobloqueio(\Servicos\FinanceiroBundle\Entity\Contratobloqueio $contratobloqueio)
    {
        $this->contratobloqueio->removeElement($contratobloqueio);
    }

    /**
     * Get contratobloqueio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratobloqueio()
    {
        return $this->contratobloqueio;
    }

    /**
     * Add contratocontato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratocontato $contratocontato
     * @return Contrato
     */
    public function addContratocontato(\Servicos\FinanceiroBundle\Entity\Contratocontato $contratocontato)
    {
        $this->contratocontato[] = $contratocontato;

        return $this;
    }

    /**
     * Remove contratocontato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratocontato $contratocontato
     */
    public function removeContratocontato(\Servicos\FinanceiroBundle\Entity\Contratocontato $contratocontato)
    {
        $this->contratocontato->removeElement($contratocontato);
    }

    /**
     * Get contratocontato
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratocontato()
    {
        return $this->contratocontato;
    }

    /**
     * Add contratoservico
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratoservico $contratoservico
     * @return Contrato
     */
    public function addContratoservico(\Servicos\FinanceiroBundle\Entity\Contratoservico $contratoservico)
    {
        $this->contratoservico[] = $contratoservico;

        return $this;
    }

    /**
     * Remove contratoservico
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratoservico $contratoservico
     */
    public function removeContratoservico(\Servicos\FinanceiroBundle\Entity\Contratoservico $contratoservico)
    {
        $this->contratoservico->removeElement($contratoservico);
    }

    /**
     * Get contratoservico
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratoservico()
    {
        return $this->contratoservico;
    }

    /**
     * Add contratoticket
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratoticket $contratoticket
     * @return Contrato
     */
    public function addContratoticket(\Servicos\FinanceiroBundle\Entity\Contratoticket $contratoticket)
    {
        $this->contratoticket[] = $contratoticket;

        return $this;
    }

    /**
     * Remove contratoticket
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratoticket $contratoticket
     */
    public function removeContratoticket(\Servicos\FinanceiroBundle\Entity\Contratoticket $contratoticket)
    {
        $this->contratoticket->removeElement($contratoticket);
    }

    /**
     * Get contratoticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratoticket()
    {
        return $this->contratoticket;
    }

    /**
     * Add contratovalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contratovalor
     * @return Contrato
     */
    public function addContratovalor(\Servicos\FinanceiroBundle\Entity\Contratovalor $contratovalor)
    {
        $this->contratovalor[] = $contratovalor;

        return $this;
    }

    /**
     * Remove contratovalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contratovalor $contratovalor
     */
    public function removeContratovalor(\Servicos\FinanceiroBundle\Entity\Contratovalor $contratovalor)
    {
        $this->contratovalor->removeElement($contratovalor);
    }

    /**
     * Get contratovalor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratovalor()
    {
        return $this->contratovalor;
    }

    /**
     * Add desativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Desativacao $desativacao
     * @return Contrato
     */
    public function addDesativacao(\Servicos\FinanceiroBundle\Entity\Desativacao $desativacao)
    {
        $this->desativacao[] = $desativacao;

        return $this;
    }

    /**
     * Remove desativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Desativacao $desativacao
     */
    public function removeDesativacao(\Servicos\FinanceiroBundle\Entity\Desativacao $desativacao)
    {
        $this->desativacao->removeElement($desativacao);
    }

    /**
     * Get desativacao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDesativacao()
    {
        return $this->desativacao;
    }

    /**
     * Add enderecoentregaatributovalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $enderecoentregaatributovalor
     * @return Contrato
     */
    public function addEnderecoentregaatributovalor(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $enderecoentregaatributovalor)
    {
        $this->enderecoentregaatributovalor[] = $enderecoentregaatributovalor;

        return $this;
    }

    /**
     * Remove enderecoentregaatributovalor
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $enderecoentregaatributovalor
     */
    public function removeEnderecoentregaatributovalor(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $enderecoentregaatributovalor)
    {
        $this->enderecoentregaatributovalor->removeElement($enderecoentregaatributovalor);
    }

    /**
     * Get enderecoentregaatributovalor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnderecoentregaatributovalor()
    {
        return $this->enderecoentregaatributovalor;
    }

    /**
     * Add documento
     *
     * @param \Servicos\FinanceiroBundle\Entity\Documento $documento
     * @return Contrato
     */
    public function addDocumento(\Servicos\FinanceiroBundle\Entity\Documento $documento)
    {
        $this->documento[] = $documento;

        return $this;
    }

    /**
     * Remove documento
     *
     * @param \Servicos\FinanceiroBundle\Entity\Documento $documento
     */
    public function removeDocumento(\Servicos\FinanceiroBundle\Entity\Documento $documento)
    {
        $this->documento->removeElement($documento);
    }

    /**
     * Get documento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Add duracaocontrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracaocontrato
     * @return Contrato
     */
    public function addDuracaocontrato(\Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracaocontrato)
    {
        $this->duracaocontrato[] = $duracaocontrato;

        return $this;
    }

    /**
     * Remove duracaocontrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracaocontrato
     */
    public function removeDuracaocontrato(\Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracaocontrato)
    {
        $this->duracaocontrato->removeElement($duracaocontrato);
    }

    /**
     * Get duracaocontrato
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDuracaocontrato()
    {
        return $this->duracaocontrato;
    }

    /**
     * Add enderecocobranca
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecocobranca $enderecocobranca
     * @return Contrato
     */
    public function addEnderecocobranca(\Servicos\FinanceiroBundle\Entity\Enderecocobranca $enderecocobranca)
    {
        $this->enderecocobranca[] = $enderecocobranca;

        return $this;
    }

    /**
     * Remove enderecocobranca
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecocobranca $enderecocobranca
     */
    public function removeEnderecocobranca(\Servicos\FinanceiroBundle\Entity\Enderecocobranca $enderecocobranca)
    {
        $this->enderecocobranca->removeElement($enderecocobranca);
    }

    /**
     * Get enderecocobranca
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnderecocobranca()
    {
        return $this->enderecocobranca;
    }

    /**
     * Add impostoscontrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Impostoscontrato $impostoscontrato
     * @return Contrato
     */
    public function addImpostoscontrato(\Servicos\FinanceiroBundle\Entity\Impostoscontrato $impostoscontrato)
    {
        $this->impostoscontrato[] = $impostoscontrato;

        return $this;
    }

    /**
     * Remove impostoscontrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Impostoscontrato $impostoscontrato
     */
    public function removeImpostoscontrato(\Servicos\FinanceiroBundle\Entity\Impostoscontrato $impostoscontrato)
    {
        $this->impostoscontrato->removeElement($impostoscontrato);
    }

    /**
     * Get impostoscontrato
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImpostoscontrato()
    {
        return $this->impostoscontrato;
    }

    /**
     * Add reativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Reativacao $reativacao
     * @return Contrato
     */
    public function addReativacao(\Servicos\FinanceiroBundle\Entity\Reativacao $reativacao)
    {
        $this->reativacao[] = $reativacao;

        return $this;
    }

    /**
     * Remove reativacao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Reativacao $reativacao
     */
    public function removeReativacao(\Servicos\FinanceiroBundle\Entity\Reativacao $reativacao)
    {
        $this->reativacao->removeElement($reativacao);
    }

    /**
     * Get reativacao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReativacao()
    {
        return $this->reativacao;
    }

    /**
     * Add rescisao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Rescisao $rescisao
     * @return Contrato
     */
    public function addRescisao(\Servicos\FinanceiroBundle\Entity\Rescisao $rescisao)
    {
        $this->rescisao[] = $rescisao;

        return $this;
    }

    /**
     * Remove rescisao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Rescisao $rescisao
     */
    public function removeRescisao(\Servicos\FinanceiroBundle\Entity\Rescisao $rescisao)
    {
        $this->rescisao->removeElement($rescisao);
    }

    /**
     * Get rescisao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRescisao()
    {
        return $this->rescisao;
    }

    /**
     * Add restricao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Restricao $restricao
     * @return Contrato
     */
    public function addRestricao(\Servicos\FinanceiroBundle\Entity\Restricao $restricao)
    {
        $this->restricao[] = $restricao;

        return $this;
    }

    /**
     * Remove restricao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Restricao $restricao
     */
    public function removeRestricao(\Servicos\FinanceiroBundle\Entity\Restricao $restricao)
    {
        $this->restricao->removeElement($restricao);
    }

    /**
     * Get restricao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRestricao()
    {
        return $this->restricao;
    }

    /**
     * Add suspencao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Suspencao $suspencao
     * @return Contrato
     */
    public function addSuspencao(\Servicos\FinanceiroBundle\Entity\Suspencao $suspencao)
    {
        $this->suspencao[] = $suspencao;

        return $this;
    }

    /**
     * Remove suspencao
     *
     * @param \Servicos\FinanceiroBundle\Entity\Suspencao $suspencao
     */
    public function removeSuspencao(\Servicos\FinanceiroBundle\Entity\Suspencao $suspencao)
    {
        $this->suspencao->removeElement($suspencao);
    }

    /**
     * Get suspencao
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuspencao()
    {
        return $this->suspencao;
    }

    /**
     * Add upgrade
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgrade $upgrade
     * @return Contrato
     */
    public function addUpgrade(\Servicos\FinanceiroBundle\Entity\Upgrade $upgrade)
    {
        $this->upgrade[] = $upgrade;

        return $this;
    }

    /**
     * Remove upgrade
     *
     * @param \Servicos\FinanceiroBundle\Entity\Upgrade $upgrade
     */
    public function removeUpgrade(\Servicos\FinanceiroBundle\Entity\Upgrade $upgrade)
    {
        $this->upgrade->removeElement($upgrade);
    }

    /**
     * Get upgrade
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUpgrade()
    {
        return $this->upgrade;
    }

    /**
     * Add contratoFilho
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contratoFilho
     * @return Contrato
     */
    public function addContratoFilho(\Servicos\FinanceiroBundle\Entity\Contrato $contratoFilho)
    {
    	$this->contratoFilho[] = $contratoFilho;

    	return $this;
    }

    /**
     * Remove contratoFilho
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contratoFilho
     */
    public function removeContratoFilho(\Servicos\FinanceiroBundle\Entity\Contrato $contratoFilho)
    {
    	$this->contratoFilho->removeElement($contratoFilho);
    }

    /**
     * Get contratoFilho
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratoFilho()
    {
    	return $this->contratoFilho;
    }

    /**
     * Set enviCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Envio $enviCodigoid
     * @return Contrato
     */
    public function setEnviCodigoid(\Servicos\FinanceiroBundle\Entity\Envio $enviCodigoid = null)
    {
        $this->enviCodigoid = $enviCodigoid;

        return $this;
    }

    /**
     * Get enviCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Envio
     */
    public function getEnviCodigoid()
    {
        return $this->enviCodigoid;
    }

    /**
     * Set contSubstituircodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contSubstituircodigoid
     * @return Contrato
     */
    public function setContSubstituircodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contSubstituircodigoid = null)
    {
        $this->contSubstituircodigoid = $contSubstituircodigoid;

        return $this;
    }

    /**
     * Get contSubstituircodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato
     */
    public function getContSubstituircodigoid()
    {
        return $this->contSubstituircodigoid;
    }

    /**
     * Set contProximocodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contProximocodigoid
     * @return Contrato
     */
    public function setContProximocodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contProximocodigoid = null)
    {
        $this->contProximocodigoid = $contProximocodigoid;

        return $this;
    }

    /**
     * Get contProximocodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato
     */
    public function getContProximocodigoid()
    {
        return $this->contProximocodigoid;
    }

    /**
     * Set contPaicodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contPaicodigoid
     * @return Contrato
     */
    public function setContPaicodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contPaicodigoid = null)
    {
        $this->contPaicodigoid = $contPaicodigoid;

        return $this;
    }

    /**
     * Get contPaicodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato
     */
    public function getContPaicodigoid()
    {
        return $this->contPaicodigoid;
    }

    /**
     * Set desigCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Designacao $desigCodigoid
     * @return Contrato
     */
    public function setDesigCodigoid(\Servicos\FinanceiroBundle\Entity\Designacao $desigCodigoid = null)
    {
        $this->desigCodigoid = $desigCodigoid;

        return $this;
    }

    /**
     * Get desigCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Designacao
     */
    public function getDesigCodigoid()
    {
        return $this->desigCodigoid;
    }

    /**
     * Set endeentrCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid
     * @return Contrato
     */
    public function setEndeentrCodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentrega $endeentrCodigoid = null)
    {
        $this->endeentrCodigoid = $endeentrCodigoid;

        return $this;
    }

    /**
     * Get endeentrCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentrega
     */
    public function getEndeentrCodigoid()
    {
        return $this->endeentrCodigoid;
    }

    /**
     * Set modeCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Modelo $modeCodigoid
     * @return Contrato
     */
    public function setModeCodigoid(\Servicos\FinanceiroBundle\Entity\Modelo $modeCodigoid = null)
    {
        $this->modeCodigoid = $modeCodigoid;

        return $this;
    }

    /**
     * Get modeCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Modelo
     */
    public function getModeCodigoid()
    {
        return $this->modeCodigoid;
    }

    /**
     * Set multCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Multas $multCodigoid
     * @return Contrato
     */
    public function setMultCodigoid(\Servicos\FinanceiroBundle\Entity\Multas $multCodigoid = null)
    {
        $this->multCodigoid = $multCodigoid;

        return $this;
    }

    /**
     * Get multCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Multas
     */
    public function getMultCodigoid()
    {
        return $this->multCodigoid;
    }

    /**
     * Set slaCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Sla $slaCodigoid
     * @return Contrato
     */
    public function setSlaCodigoid(\Servicos\FinanceiroBundle\Entity\Sla $slaCodigoid = null)
    {
        $this->slaCodigoid = $slaCodigoid;

        return $this;
    }

    /**
     * Get slaCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Sla
     */
    public function getSlaCodigoid()
    {
        return $this->slaCodigoid;
    }

    /**
     * Set statCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Status $statCodigoid
     * @return Contrato
     */
    public function setStatCodigoid(\Servicos\FinanceiroBundle\Entity\Status $statCodigoid = null)
    {
        $this->statCodigoid = $statCodigoid;

        return $this;
    }

    /**
     * Get statCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Status
     */
    public function getStatCodigoid()
    {
        return $this->statCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Contrato
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
    
    /**
     * @var \Servicos\GcdbBundle\Entity\Customers
     */
    private $customers;

    /**
     * Set customers
     *
     * @param \Servicos\GcdbBundle\Entity\Customers $customers
     * @return Contrato
     */
    public function setCustomers(\Servicos\GcdbBundle\Entity\Customers $customers = null)
    {
        $this->customers = $customers;
        if(!is_null($customers))
        	$this->clieCodigoid = $customers->getCustomerid();

        return $this;
    }

    /**
     * Get customers
     *
     * @return \Servicos\GcdbBundle\Entity\Customers
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Set autUsuarios
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios
     * @return Contrato
     */
    public function setAutUsuarios(\Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios = null)
    {
    	$this->autUsuarios = $autUsuarios;
    	//$this->usuaCodigoid = $autUsuarios->getId();

    	return $this;
    }

    /**
     * Get autUsuarios
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    public function getAutUsuarios()
    {
    	return $this->autUsuarios;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contratoDependente;

    /**
     * Add contratoDependente
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contratoDependente
     * @return Contrato
     */
    public function addContratoDependente(\Servicos\FinanceiroBundle\Entity\Contrato $contratoDependente)
    {
        $this->contratoDependente[] = $contratoDependente;

        return $this;
    }

    /**
     * Remove contratoDependente
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contratoDependente
     */
    public function removeContratoDependente(\Servicos\FinanceiroBundle\Entity\Contrato $contratoDependente)
    {
        $this->contratoDependente->removeElement($contratoDependente);
    }

    /**
     * Get contratoDependente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratoDependente()
    {
        return $this->contratoDependente;
    }
}
