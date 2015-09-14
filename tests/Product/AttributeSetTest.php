<?php namespace SellerCenter\Test\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Body;
use SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Response;
use SellerCenter\SDK\Product\AttributeSet;
use SellerCenter\SDK\Product\AttributeSetCollection;

class AttributeSetTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValue()
    {
        $attributeSet = new AttributeSet;
        $attributeSet
            ->setGlobalIdentifier('CLOSETS')
            ->setName('Closets')
            ->setAttributeSetId(4)
            ->setCategories(new ArrayCollection());
        $this->assertAttributeEquals('CLOSETS', 'globalIdentifier', $attributeSet);
        $this->assertAttributeEquals('Closets', 'name', $attributeSet);
        $this->assertAttributeEquals('4', 'attributeSetId', $attributeSet);
        $this->assertEquals('CLOSETS', $attributeSet->getGlobalIdentifier());
        $this->assertEquals('Closets', $attributeSet->getName());
        $this->assertEquals('4', $attributeSet->getAttributeSetId());
        $this->assertCount(0, $attributeSet->getCategories());
    }

    public function testGetCategoriesByAttributeSetResponse()
    {
        $collection = new AttributeSetCollection;

        $attributeSet = new AttributeSet;
        $attributeSet
            ->setAttributeSetId(4)
            ->setGlobalIdentifier('CLOSETS')
            ->setName('Closets');
        $collection->add($attributeSet);

        $attributeSet = new AttributeSet;
        $attributeSet
            ->setAttributeSetId(6)
            ->setGlobalIdentifier('DECORATION')
            ->setName('Decoration');
        $collection->add($attributeSet);

        $body = new Body;
        $body->setAttributeSets($collection);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals($attributeSet, $response->getBody()->getAttributeSets()->last());
        $this->assertEquals(
            [
                'DECORATION' => [
                    'attributeSetId' => 6,
                    'globalIdentifier' => 'DECORATION',
                    'name' => 'Decoration',
                    'categories' => null
                ],
                'CLOSETS' => [
                    'attributeSetId' => 4,
                    'globalIdentifier' => 'CLOSETS',
                    'name' => 'Closets',
                    'categories' => null
                ],
            ],
            $response->getBody()->toArray()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value is not an instance of AttributeSet
     */
    public function testAddInvalidAttributeSetShouldThrowInvalidArgumentException()
    {
        $collection = new AttributeSetCollection;
        $collection->add(1);
    }

}
