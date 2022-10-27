<?php

namespace Omnipay\Mgurush\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Cybersource Response
 */
class Response extends AbstractResponse implements RedirectResponseInterface
{
    public function __construct(RequestInterface $request, $data, $headers)
    {
        $this->request = $request;
        $this->data = json_decode($data,true);
        $this->headers = $headers;
    }

    public function isSuccessful()
    {
        return isset($this->data['status']['StatusCode']) && 0 === $this->data['status']['StatusCode'];
    }

    public function isRedirect()
    {
        return false;
    }

    public function getTransactionReference()
    {
        return isset($this->data['message']['"txnRefNumber":']) ? $this->data['message']['"txnRefNumber":'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['message']['requestSource']) ? $this->data['message']['requestSource'] : null;
    }

    public function getRedirectUrl()
    {
        $data = $this->data ? http_build_query($this->data, '', '&') : null;
        return $this->redirectUrl.'?'.$data;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->getData();
    }

}
