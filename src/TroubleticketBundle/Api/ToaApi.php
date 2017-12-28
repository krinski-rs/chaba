<?php

namespace TroubleticketBundle\Api;

use Symfony\Component\HttpFoundation\Response;

/**
 * Classe genérica para a realização da comunicação com as APIs do Sistech
 *
 * @abstract
 */
abstract class ToaApi
{
    /**
     * Base url to do requests
     *
     * @var string
     * @access private
     */
	//Modificar para o parameters
    private $url_base = 'https://api.etadirect.com/rest/ofscCore/v1/activities?COMPANY=vogeltelecom2.test';
    
    /**
     * Caminho adicional à url da api
     *
     * @var string
     * @access protected
     */
    protected $url_path;

    /**
     * Default registries limit
     *
     * @var int
     * @access private
     */
    private $limit = 500;

    /**
     * Logger object
     *
     * @var mixed
     * @access protected
     */
    protected $logger;

    /**
     * Class constructor
     *
     * @param array $config
     * @access public
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * Set Configuration
     *
     * @param array $config
     * @access public
     * @return $this
     */
    public function setConfig(array $config)
    {
        if (isset($config['url'])) {
            $this->setUrlBase($config['url']);
        }
        
        if (isset($config['url_corp'])) {
        	$this->setUrlBase($config['url_corp']);
        }

        return $this;
    }

    /**
     * Set Logger
     *
     * @param mixed $logger
     * @access public
     * @return $this
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Register some log
     *
     * @param string $level
     * @param string $message
     * @access public
     * @return $this
     */
    public function log($level, $message)
    {
        if ($this->logger) {
            $this->logger->$level($message);
        }

        return $this;
    }


    /**
     * Get Url Base
     *
     * @access public
     * @return string
     */
    public function getUrlBase()
    {
        return $this->url_base;
    }

    /**
     * Set Url Base
     *
     * @param string $url_base
     * @access public
     * @return $this
     */
    public function setUrlBase($url_base)
    {
        $this->url_base = $url_base;
    }
    
    /**
     * Obtem o caminho adicional
     *
     * @access public
     * @return string
     */
    public function getUrlPath()
    {
    	return $this->url_path;
    }
    
    /**
     * Define o caminho adicional à url
     *
     * @param string $url_path
     * @access public
     * @return $this
     */
    public function setUrlPath($url_path)
    {
    	$this->url_path = (string)$url_path;
    	
    	return $this;
    }

    /**
     * Do Http Requests
     *
     * Today only GET is available
     *
     * @param string $url
     * @param string $method
     * @param array $params
     * @access protected
     * @return Response
     */
    
    protected function doRequest($url, $method = 'GET', $params = array())
    {
        $curl = curl_init();
        switch (strtoupper($method)) {
            case 'GET':
            default:
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                if (!empty($params)) {
                    $url .= '?' . http_build_query($params);
                }
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                if (!empty($params)) {
                    $params = json_encode($params);
                }
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
        }

        $this->log('info', sprintf('%s:%d Requested URL: %s', __FILE__, __LINE__, $url));
        if($method == "POST"){
			$username = 'integracao@vogeltelecom';
			$password = '8XpYhyHe';
			curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, true);
        $content = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($content, 0, $header_size);
        $body = substr($content, $header_size);

        curl_close($curl);

        $responseHeader = explode("\n",trim($header));
        $arrayHeader = array();
        reset($responseHeader);
        while($header = current($responseHeader)){
            if(explode(':',$header,2) == 2){
                list($key,$val) = explode(':',$header,2);
                $arrayHeader[strtolower(trim($key))] = trim($val);
            }
            next($responseHeader);
        }
        if (empty($statusCode)) {
            $statusCode = 500;
        }
        $this->log('debug', sprintf('%s:%d Result Content: %s', __FILE__, __LINE__, $content));
        return new Response($body, $statusCode, $arrayHeader);
    }
 
}