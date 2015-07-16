<?php namespace SellerCenter\Test\SDK;

use Doctrine\Common\Annotations\AnnotationRegistry;

abstract class SdkTestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            implode(DIRECTORY_SEPARATOR, [getcwd(), 'vendor', 'jms', 'serializer', 'src'])
        );
    }
}
