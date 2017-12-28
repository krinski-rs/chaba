<?php

namespace TroubleticketBundle\Api;

use Symfony\Component\HttpFoundation\Response;

/**
 * Classe genérica para a realização da comunicação com as APIs do Sistech
 *
 * @abstract
 */
abstract class SistechApi
{
    /**
     * Base url to do requests
     *
     * @var string
     * @access private
     */
    private $url_base = 'http://dev.vogeltelecom.com:5001/vogel/web/rest/';

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

        if (isset($config['limit'])) {
            $this->setLimit($config['limit']);
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
     * Get Limit
     *
     * @access public
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set Limit
     *
     * @param int $limit
     * @access public
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
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
        // workaround to prevent api errors
        $this->restartOriginalPath();

        $curl = curl_init();
        switch (strtoupper($method)) {
            case 'GET':
            default:
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                if (!empty($params)) {
                    $url .= '?' . http_build_query($params);
                }
                break;
        }

        $this->log('info', sprintf('%s:%d Requested URL: %s', __FILE__, __LINE__, $url));

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, true);
        $content = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data = explode("\r\n\r\n", $content);
        curl_close($curl);

        $content = count($data) > 1 ? $data[1] : '';
        $headers = explode("\r\n", $data[0]);

        if (empty($statusCode)) {
            $statusCode = 500;
        }
        $this->log('debug', sprintf('%s:%d Result Content: %s', __FILE__, __LINE__, $content));

        return new Response($content, $statusCode, $headers);
    }

    /**
     * Get original path
     *
     * @abstract
     * @access protected
     * @return string
     */
    abstract protected function getOriginalPath();

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
     * Workaround to prevent erros when url was changed
     *
     * @access protected
     * @return $this
     */
    protected function restartOriginalPath()
    {
        $original = $this->getOriginalPath();
        $this->setUrlPath($original);

        return $this;
    }
}
