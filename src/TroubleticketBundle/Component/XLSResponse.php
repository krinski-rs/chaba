<?php

namespace TroubleticketBundle\Component;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Classe criação e retorno de arquivos XLS
 * 
 * Exemplo de uso:
 *      $response = new XLSResponse('nomeArquivo');
 *      $response->setHeaderColumns($arrayCabecalhoColunas);
 *      $response->setBody($matrizValores);
 */
class XLSResponse extends Response
{
    /**
     * Objeto gerador do XLS
     *
     * @var PHPExcel
     * @access protected
     */
    protected $xlsDocument = null;

    /**
     * Cabeçalhos da planilha
     *
     * @var PHPExcel
     * @access protected
     */
    protected $headerColumns = null;

    /**
     * Tipo da planilha
     *
     * @var string
     * @access protected
     */
    protected $type;

    /**
     * Estilo do cabeçalho
     *
     * @var array
     * @access protected
     */
    protected $style = array(
         array(
            'sheet' => 'Sheet1',
            'allfilleddata' => true,
            'border' => array(
                'style' => 'thin'
            )
        ),
        array(
            'sheet' => 'Sheet1',
            'font' => array(
                'bold' => true,
                'color' => 'FFFFFF',
                'size' => '11',
                'name' => 'Calibri'
            ),
            'verticalAlign' => 'center',
            'horizontalAlign' => 'center',
            'border' => array(
                'style' => 'thin',
                'color' => '000000'
            ),
            'fill' => array(
                'type' => 'solid',
                'color' => 'CCCCCC'
            ),
            'rows' => array('0')
        )
    );

    /**
     * Método construtor sobrescrevendo o construtor do Response
     * 
     * @param string $filename      Nome do arquivo
     * @param integer $status       Código de status da response
     * @param array $headers        Cabeçalhos da response
     */
    public function __construct($filename, $status = 200, $headers = array())
    {
        $this->type = 'Excel2007';
        $headers = array_merge($this->getDefaulHeaders($filename), $headers);

        parent::__construct('', $status, $headers);

    }

    /**
     * {@inheritDoc}
     */
    public function prepare(Request $request)
    {
        parent::prepare($request);

        parent::setContent($this->getContent());

        return $this;
    }

    public function setHeaderColumns(array $names) {
        $this->headerColumns = $names;

        return $this;
    }

    /**
     * Retorna o objeto do Excel
     * 
     * Caso não tenha sido inicializado, é instanciado um novo
     *
     * @access public
     * @return XLSXWriter
     */
    public function getXlsDocument()
    {
        if (is_null($this->xlsDocument)) {
            $document = new XLSXWriter();
            
            $this->xlsDocument = $document;
        }
        return $this->xlsDocument;
    }

    /**
     * Define os valores do corpo do arquivo e qual posição inicia
     *
     * @param array $data Uma matriz de valores do corpo
     * @param int $x      Posição inicial na coluna
     * @param int $y      Posição inicial na linha
     * @access public
     * @return XLSXResponse
     */
    public function setBody(array $data)
    {
        $document = $this->getXlsDocument();
        $document->writeSheet($data, '', $this->headerColumns, $this->style);
        
        return $this;
    }

    /**
     * Retorna os headers padrões
     * 
     * @param string $filename
     * @access protected
     * @return array
     */
    protected function getDefaulHeaders($filename)
    {
        $extension = $this->getExtensionByVersion();

        return array(
            'Content-Type' => 'text/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment;filename=' . $filename . '.' . $extension,
            'Pragma' => 'public',
            'Cache-Control' => 'maxage=1',
        );
    }

    /**
     * Retorna o tipo do arquivo XLS a ser gerado
     * 
     * @access public
     * @return string
     */
    public function getXLSType()
    {
        return $this->type;
    }

    /**
     * Define o tipo do arquivo XLS a ser gerado
     * 
     * @param string $type
     * @access public
     * @return XLSResponse
     */
    public function setXLSType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * 
     */
    protected function getExtensionByVersion()
    {
        $extension = 'xlsx';
        switch ($this->type) {
            case 'Excel2007':
                $extension = 'xlsx';
                break;
            case 'Excel5':
                $extension = 'xls';
                break;
            case 'Excel2003XML':
                $extension = 'xls';
                break;
            case 'CSV':
                $extension = 'csv';
                break;
            case 'OpenDocument':
                $extension = 'ods';
                break;
        }

        return $extension;
    }

    /**
     * Retorna o conteúdo do arquivo de XLS
     * 
     * @access public
     * @return string
     */
    public function getContent()
    {
        $document = $this->getXlsDocument();
        $result = $document->writeToString();

        return $result;
    }
}