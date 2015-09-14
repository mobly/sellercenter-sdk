<?php namespace SellerCenter\SDK\Console;

use JMS\Serializer\Serializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateSerializedFixturesFromXmlCommand
 *
 * @package SellerCenter\SDK\Console
 * @codeCoverageIgnore
 */
class UpdateSerializedFixturesFromXmlCommand extends Command
{
    /**
     * @var array
     */
    private $sources = [
        // feed
        'FeedList'                    => \SellerCenter\SDK\Feed\FeedList::class,
        'FeedOffsetList'              => \SellerCenter\SDK\Feed\FeedList::class,
        'FeedCount'                   => \SellerCenter\SDK\Feed\FeedCount::class,
        'FeedCancel'                  => \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
        'GetFeedRawInput'             => \SellerCenter\SDK\Feed\Api\GetFeedRawInput\Response::class,
        'FeedStatus'                  => \SellerCenter\SDK\Feed\FeedStatus::class,
        'FeedStatusWithErrors'        => \SellerCenter\SDK\Feed\FeedStatus::class,

        // product
        'GetProducts'                 => \SellerCenter\SDK\Product\Api\GetProducts\Response::class,
        'GetBrands'                   => \SellerCenter\SDK\Product\Api\GetBrands\Response::class,
        'GetCategoryTree'             => \SellerCenter\SDK\Product\Api\GetCategoryTree\Response::class,
        'GetCategoryAttributes'       => \SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection::class,
        'GetCategoriesByAttributeSet' => \SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Response::class,

        // shipment providers
        'GetShipmentProviders'        => \SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders\Response::class,
    ];

    /**
     * @var Serializer
     */
    private $serializer;

    protected function configure()
    {
        $this
            ->setName('sdk:fixtures')
            ->setDescription('Update fixtures files for unit tests')
        ;

        \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->sources as $name => $class) {
            $result = $this->serializer->deserialize(
                file_get_contents(getcwd() . '/tests/Common/Api/test_cases/protocols/output/fixtures/'.$name.'.xml'),
                $class,
                'xml'
            );

            file_put_contents(
                getcwd() . '/tests/Common/Api/test_cases/protocols/output/fixtures/'.$name.'.serialized',
                serialize($result->getBody())
            );

            $output->writeln('Processed '.$name.' serialized file.');
        }
    }
}
