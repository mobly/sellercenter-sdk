<?php namespace SellerCenter\Test\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use SellerCenter\SDK\Product\Api\GetCategoryAttributes\Attribute;
use SellerCenter\SDK\Product\Api\GetCategoryAttributes\Option;
use SellerCenter\SDK\Product\Api\GetCategoryTree\Body;
use SellerCenter\SDK\Product\Api\GetCategoryTree\Response;
use SellerCenter\SDK\Product\Category;
use SellerCenter\SDK\Product\CategoryCollection;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValue()
    {
        $category = new Category;
        $category->setCategoryId(504)
            ->setGlobalIdentifier('CADEIRA')
            ->setName('Cadeira')
            ->setChildren(new ArrayCollection());
        $this->assertAttributeEquals('504', 'categoryId', $category);
        $this->assertAttributeEquals('CADEIRA', 'globalIdentifier', $category);
        $this->assertAttributeEquals('Cadeira', 'name', $category);
        $this->assertEquals(504, $category->getCategoryId());
        $this->assertEquals('CADEIRA', $category->getGlobalIdentifier());
        $this->assertEquals('Cadeira', $category->getName());
        $this->assertCount(0, $category->getChildren());
    }

    public function testGetCategoryTree()
    {
        $collection = new CategoryCollection;
        $childCollection = new CategoryCollection;

        $childCategory = new Category;
        $childCategory->setCategoryId(1980)
                 ->setGlobalIdentifier('SOFAS')
                 ->setName('Sofas');
        $childCollection->add($childCategory);

        $childCategory = new Category;
        $childCategory->setCategoryId(1983)
                 ->setGlobalIdentifier('RACKS')
                 ->setName('Racks');
        $childCollection->add($childCategory);

        $category = new Category;
        $category->setCategoryId(504)
                 ->setGlobalIdentifier('MOVEIS')
                 ->setName('Moveis')
                 ->setChildren($childCollection);
        $collection->add($category);

        $body = new Body;
        $body->setCategories($collection);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals($category, $response->getBody()->getCategories()->first());
        $this->assertEquals(
            [
                'MOVEIS' => [
                    'categoryId' => 504,
                    'globalIdentifier' => 'MOVEIS',
                    'name' => 'Moveis',
                    'children' => [
                        'SOFAS' => [
                            'categoryId' => 1980,
                            'globalIdentifier' => 'SOFAS',
                            'name' => 'Sofas',
                            'children' => []
                        ],
                        'RACKS' => [
                            'categoryId' => 1983,
                            'globalIdentifier' => 'RACKS',
                            'name' => 'Racks',
                            'children' => []
                        ],
                    ]
                ],
            ],
            $response->getBody()->toArray()
        );
    }

    public function testGetCategoryAttributes()
    {
        $attribute = new Attribute;
        $attribute->setLabel('voltagem')
            ->setName('Voltagem')
            ->setGlobalIdentifier('VOLTAGEM')
            ->setAttributeType('option')
            ->setIsMandatory(1)
            ->setOptions(new ArrayCollection)
            ->setDescription('Voltagem do produto')
            ->setExampleValue('110v')
        ;

        $option = new Option;
        $option->setGlobalIdentifier('110V')->setName('110v')->setIsDefault(1);
        $attribute->getOptions()->add($option);

        $option = new Option;
        $option->setGlobalIdentifier('220V')->setName('220v')->setIsDefault(0);
        $attribute->getOptions()->add($option);

        $this->assertEquals('voltagem', $attribute->getLabel());
        $this->assertEquals('Voltagem', $attribute->getName());
        $this->assertEquals('VOLTAGEM', $attribute->getGlobalIdentifier());
        $this->assertEquals('option', $attribute->getAttributeType());
        $this->assertEquals(1, $attribute->isMandatory());
        $this->assertEquals('Voltagem do produto', $attribute->getDescription());
        $this->assertEquals('110v', $attribute->getExampleValue());
        $this->assertCount(2, $attribute->getOptions());

        $this->assertEquals('110V', $attribute->getOptions()->first()->getGlobalIdentifier());
        $this->assertEquals('110v', $attribute->getOptions()->first()->getName());
        $this->assertEquals(1, $attribute->getOptions()->first()->isDefault());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value is not an instance of Category
     */
    public function testAddInvalidCategoryShouldThrowInvalidArgumentException()
    {
        $collection = new CategoryCollection;
        $collection->add(1);
    }
}
