<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/22/2015
 * Time: 11:40 AM
 */

namespace lib\http;

/**
 * Class Response
 * @package lib\http
 */
class Response
{
    /**
     * HTTP protocol version
     * @var string
     */
    protected $protocol = 'HTTP/1.0';

    /**
     * HTTP Phrase
     * @var string|null
     */
    protected $phrase = array(
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESS CODES
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        // SERVER ERROR
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        511 => 'Network Authentication Required',
    );

    /**
     * @var int
     */
    protected $code = 200;

    /**
     * @var array
     */
    protected $headers = array();

    /**
     * @var mixed
     */
    protected $body;


    /**
     * setting http protocol
     * @param $protocol
     * @return $this
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * set header and it's value
     * @param $name
     * @param $value
     * @return $this
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * @param $code
     * @return $this|bool
     */
    public function setCode($code)
    {
        if (!is_int($code)) {
            return false;
        }
        $this->code = $code;
        return $this;
    }

    /**
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * getting body
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * send response to the browser
     */
    public function send()
    {
        header($this->protocol.' '.$this->code.' '.$this->getReasonPhrase());
        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }
        echo $this->body;
    }

    /**
     * getting code phrase of code
     * @return string
     */
    public function getReasonPhrase()
    {
        if (isset($this->phrase[$this->code])) {
            return $this->phrase[$this->code];
        }
        return '';
    }

} 