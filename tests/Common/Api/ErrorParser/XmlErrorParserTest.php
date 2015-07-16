<?php namespace SellerCenter\Test\SDK\Common\Api\ErrorParser;

use SellerCenter\SDK\Common\Api\ErrorParser\XmlErrorParser;
use GuzzleHttp\Message\MessageFactory;
use SellerCenter\Test\SDK\SdkTestCase;

class XmlErrorParserTest extends SdkTestCase
{
    /**
     * @return array
     */
    public function xmlDataProvider()
    {
        return [
            [
                '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                '<ErrorResponse>' .
                '  <Head>' .
                '    <RequestAction>Price</RequestAction>' .
                '    <ErrorType>Sender</ErrorType>' .
                '    <ErrorCode>1000</ErrorCode>' .
                '    <ErrorMessage>Format Error Detected</ErrorMessage>' .
                '  </Head>' .
                '  <Body>' .
                '    <ErrorDetail>' .
                '      <Field>StandardPrice</Field>' .
                '      <Message>Field must contain a positive number with a dot as decimal separator and 2 decimals (e.g. 120.00)</Message>' .
                '      <Value>10.0x</Value>' .
                '    </ErrorDetail>' .
                '  </Body>' .
                '  <RequestID>xyz</RequestID>' .
                '</ErrorResponse>'
            ],
        ];
    }

    /**
     * @dataProvider xmlDataProvider
     */
    public function testParsesResponses($xml)
    {
        $this->markTestSkipped();

        $response = (new MessageFactory)->fromMessage(
            "HTTP/1.1 200 OK\r\n\r\n{$xml}"
        );
        $parser = new XmlErrorParser();
        /* @var ErrorResult $result */
        $result = $parser($response);
        $this->assertInstanceOf('SellerCenter\SDK\Common\ErrorResult', $result);
        $this->assertInstanceOf('SimpleXMLElement', $result->getPayload());
        $this->assertEquals(['code' => '200', 'message' => 'OK'], $result->getHeader());
        $this->assertEquals('Price', $result['action']);
        $this->assertNull($result['request_id']);
        $this->assertEquals('Sender', $result['type']);
        $this->assertEquals('1000', $result['code']);
        $this->assertEquals('Format Error Detected', $result['message']);
        $this->assertEquals('StandardPrice', $result['detail'][0]['field']);
        $this->assertEquals('Field must contain a positive number with a dot as decimal separator and 2 decimals (e.g. 120.00)', $result['detail'][0]['message']);
        $this->assertEquals('10.0x', $result['detail'][0]['value']);
    }

    public function testParsesResponsesWithNoBodyAndNoRequestId()
    {
        $this->markTestSkipped();

        $response = (new MessageFactory)->fromMessage(
            "HTTP/1.1 400 Bad Request\r\n\r\n"
        );
        $parser = new XmlErrorParser();
        /* @var ErrorResult $result */
        $result = $parser($response);
        $this->assertEquals('400', $result['code']);
        $this->assertEquals('Bad Request', $result['message']);
        $this->assertNull($result->getPayload());
    }
}
