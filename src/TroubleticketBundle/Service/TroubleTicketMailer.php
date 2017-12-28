<?php
namespace TroubleticketBundle\Service;


/**
 * Send mail class for troubleticket app
 *
 * @category Service
 * @package  Service
 * @author Matheus S. Fontana <matheus.stein@absoluta.net>
 */
class TroubleTicketMailer
{
    //const MAIL_FROM = 'no-reply@vogeltelecom.com';
    const MAIL_FROM = 'msteinfontana@gmail.com';
    const MAIL_FROM_NAME = 'TroubleTicket';

    /**
     * Mail subject
     *
     * @access private
     * @var string
     */
    private $mailSubject;

    /**
     * Mail to
     *
     * @access private
     * @var array
     */
    private $mailTo;

    /**
     * Mail body
     *
     * @access private
     * @var string
     */
    private $mailBody;

    /**
     * Symfony's container
     *
     * @var mixed
     * @access protected
     */
    protected $container;

    /**
     * Set a value for mailSubject
     *
     * @access public
     * @param string $mailSubject
     * @return TroubleTicketMailer
     */
    public function setMailSubject($mailSubject)
    {
        $this->mailSubject = $mailSubject;

        return $this;
    }

    /**
     * Returns setted value for mailSubject
     *
     * @access public
     * @return string
     */
    public function getMailSubject()
    {
        return $this->mailSubject;
    }

    /**
     * Set a value for mailTo
     *
     * @access public
     * @param array $mailTo
     * @return TroubleTicketMailer
     */
    public function setMailTo(array $mailTo)
    {
        $this->mailTo = $mailTo;

        return $this;
    }

    /**
     * Returns setted value for mailTo
     *
     * @access public
     * @return string
     */
    public function getMailTo()
    {
        return $this->mailTo;
    }

    /**
     * Set a value for mailBody
     *
     * @access public
     * @param string $mailBody
     * @return TroubleTicketMailer
     */
    public function setMailBody($mailBody)
    {
        $this->mailBody = $mailBody;

        return $this;
    }

    /**
     * Returns setted value for mailBody
     *
     * @access public
     * @return string
     */
    public function getMailBody()
    {
        return $this->mailBody;
    }

    /**
     * Class constructor
     *
     * @param mixed $container
     * @param array $data
     * @access public
     */
    public function __construct($container, array $data)
    {
        $this->container = $container;

        $this->setMailSubject($data['subject'])
            ->setMailTo($data['mail_to'])
            ->setMailBody($data['body']);
    }

    /**
     * Mail sender based on predefined parameters
     *
     * @param array $data
     * @access public
     */
    public function sendMailTroubleTicket()
    {
        $failures = null;
        $mailTo = $this->getMailTo();
        $mailer = $this->container->get('mailer');

        $message = \Swift_Message::newInstance()
            ->setSubject($this->getMailSubject())
            ->setFrom(array($this::MAIL_FROM => $this::MAIL_FROM_NAME))
            ->setTo(array($mailTo['email'] => $mailTo['name']))
            ->setBody($this->getMailBody(), 'text/html')
            ->addPart($this->getMailBody(), 'text/plain');

        if (!$mailer->send($message, $failures)) {
            throw new Exception($failures);

        } else {
            $spool = $mailer->getTransport()->getSpool();
            $transport = $this->container->get('swiftmailer.transport.real');
            $spool->flushQueue($transport);

        }
    }
}
