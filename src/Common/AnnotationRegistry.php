<?php namespace SellerCenter\SDK\Common;

class AnnotationRegistry
{
    public static function registerAutoloadNamespace()
    {
        $directoryTree = explode(DIRECTORY_SEPARATOR, __DIR__);
        $serializerDirectory = implode(DIRECTORY_SEPARATOR, $directoryTree);
        while (
            !is_dir($serializerDirectory . implode(DIRECTORY_SEPARATOR, ['', 'vendor', 'jms', 'serializer', 'src']))
        ) {
            array_pop($directoryTree);
            $serializerDirectory = implode(DIRECTORY_SEPARATOR, $directoryTree);
        }

        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            $serializerDirectory . implode(DIRECTORY_SEPARATOR, ['', 'vendor', 'jms', 'serializer', 'src'])
        );
    }
}
