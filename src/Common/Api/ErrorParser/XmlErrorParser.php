<?php

namespace SellerCenter\SDK\Common\Api\ErrorParser;

use GuzzleHttp\Message\ResponseInterface;
use SellerCenter\SDK\Common\ErrorResult;
use SimpleXMLElement;

/**
 * Class XmlErrorParser
 *
 * @package SellerCenter\SDK\Common\Api\ErrorParser
 * @author  Daniel Costa
 */
class XmlErrorParser
{
    public function __invoke(ResponseInterface $response)
    {
        $data = [
            'action'      => null,
            'type'        => null,
            'code'        => null,
            'message'     => null,
            'parsed'      => null
        ];

        $this->parseHeaders($response, $data);

        $xml = $response->xml();
        $error = $xml->xpath('/ErrorResponse');
        if (count(($error))) {
            $this->parseSectionHead($response->xml(), $data);
            $this->parseSectionBody($response->xml(), $data);

        }

        return new ErrorResult($data);
    }

    private function parseHeaders(ResponseInterface $response, array &$data)
    {
        $data['code'] = $response->getStatusCode();
        $data['message'] = $response->getReasonPhrase();

        $data['header'] = [
            'code' => $response->getStatusCode(),
            'message' => $response->getReasonPhrase()
        ];
    }

    private function parseSectionHead(SimpleXMLElement $xml, array &$data)
    {
        $data['payload'] = $xml;

        $head = $xml->xpath('/ErrorResponse/Head');
        if (count($head)) {
            $data['action'] = (string) $xml->xpath('/ErrorResponse/Head/RequestAction')[0];
            $data['code'] = (string) $xml->xpath('/ErrorResponse/Head/ErrorCode')[0];
            $data['type'] = (string) $xml->xpath('/ErrorResponse/Head/ErrorType')[0];
            $data['message'] = (string) $xml->xpath('/ErrorResponse/Head/ErrorMessage')[0];
        }
    }

    private function parseSectionBody(SimpleXMLElement $xml, array &$data)
    {
        $body = $xml->xpath('/ErrorResponse/Body/ErrorDetail');
        if (count(($body))) {
            foreach ($body as $detail) {
                $data['detail'][] = [
                    'field' => (string) $detail->Field[0],
                    'message' => (string) $detail->Message[0],
                    'value' => (string) $detail->Value[0],
                ];
            }
        }
    }
}
