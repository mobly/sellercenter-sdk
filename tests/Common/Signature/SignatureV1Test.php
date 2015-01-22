<?php

namespace SellerCenter\Test\SDK\Common\Signature;

require_once __DIR__ . '/sig_hack.php';

use GuzzleHttp\Command\Command;
use SellerCenter\SDK\Common\Credentials\Credentials;
use GuzzleHttp\Message\MessageFactory;
use SellerCenter\SDK\Common\Signature\SignatureV1;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class SignatureV1Test
 *
 * @package SellerCenter\SDK\Common\Signature
 * @author  Daniel Costa
 */
class SignatureV1Test extends SdkTestCase
{
    const DEFAULT_KEY = 'admin@sellercenter.net';
    const DEFAULT_SECRET = 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b';
    const DEFAULT_DATETIME = 'Fri, 20 Jul 2014 23:36:00 GMT';

    public function testSignsRequestsWithSecurityToken()
    {
        $_SERVER['sdk_test_time'] = true;
        $request = (new MessageFactory)->createRequest(
            'POST',
            'http://foo.com',
            ['body' => ['Test' => '123', 'Other' => '456']]
        );
        $request->getConfig()->add('command', new Command('test'));
        $request->removeHeader('User-Agent');
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = new SignatureV1();
        $signature->signRequest($request, $credentials);
        $request->getBody()->applyRequestHeaders($request);

        $expected = "POST /?Action=test&Timestamp=Fri%2C%2020%20Jul%202014%2023%3A36%3A00%20GMT"
            . "&UserID=admin%40sellercenter.net"
            . "&Version=1.0"
            . "&Signature=02815c9a18c5c45ee5f6af8fc9ee0a02b65aef1c55003574690f4d80efbefe80 HTTP/1.1\r\n"
            . "Host: foo.com\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n"
            . "Content-Length: 18\r\n\r\n"
            . "Test=123&Other=456";
        $this->assertEquals($expected, (string) $request);
    }
}
