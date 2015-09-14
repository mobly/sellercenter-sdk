<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Feed\Api\GetFeedRawInput\Body;
use SellerCenter\SDK\Feed\Api\GetFeedRawInput\FeedRawInput;
use SellerCenter\SDK\Feed\Api\GetFeedRawInput\RawInputFile;
use SellerCenter\SDK\Feed\Api\GetFeedRawInput\Response;

class FeedRawInputTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFeedRawInputResponse()
    {
        $file = new RawInputFile;
        $file->setFile('filename.csv')->setMimeType('text/csv');

        $input = new FeedRawInput;
        $input->setFeed('639426e2-794e-46c9-b7ea-cb03c7132dd0')->setRawInputFile($file);

        $body = new Body;
        $body->setFeedRawInput($input);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals($file, $response->getBody()->getFeedRawInput()->getRawInputFile());
        $this->assertEquals('639426e2-794e-46c9-b7ea-cb03c7132dd0', $response->getBody()->getFeedRawInput()->getFeed());
        $this->assertEquals('filename.csv', $response->getBody()->getFeedRawInput()->getRawInputFile()->getFile());
        $this->assertEquals('text/csv', $response->getBody()->getFeedRawInput()->getRawInputFile()->getMimeType());
    }
}
