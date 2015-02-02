<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\Attribute;
use SellerCenter\SDK\Product\AttributeCollection;
use SellerCenter\SDK\Product\Enum\ConditionEnum;
use SellerCenter\SDK\Product\Enum\ShipmentTypeEnum;
use SellerCenter\SDK\Product\Enum\StatusEnum;
use SellerCenter\SDK\Product\Enum\TaxClassEnum;
use SellerCenter\SDK\Product\Product;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class ProductTest
 *
 * @package SellerCenter\SDK\Entity
 * @author  Daniel Costa
 */
class ProductTest extends SdkTestCase
{
    public function testSetGetSellerSku()
    {
        $product = new Product;
        $product->setSellerSku('SUP12345-ABC');
        $this->assertAttributeEquals('SUP12345-ABC', 'sellerSku', $product);
        $this->assertEquals('SUP12345-ABC', $product->getSellerSku());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSellerSkuShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setSellerSku(1);
    }

    public function testSetGetParentSku()
    {
        $product = new Product;
        $product->setParentSku('SUP12345');
        $this->assertAttributeEquals('SUP12345', 'parentSku', $product);
        $this->assertEquals('SUP12345', $product->getParentSku());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidParentSkuShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setParentSku(1);
    }

    public function testSetGetStatus()
    {
        $product = new Product;
        $product->setStatus(StatusEnum::ACTIVE());
        $this->assertAttributeEquals('active', 'status', $product);
        $this->assertEquals('active', $product->getStatus());
    }

    public function testSetGetName()
    {
        $product = new Product;
        $product->setName('Product Name');
        $this->assertAttributeEquals('Product Name', 'name', $product);
        $this->assertEquals('Product Name', $product->getName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidNameShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setName(1);
    }

    public function testSetGetVariation()
    {
        $product = new Product;
        $product->setVariation('MOB12345-XXX');
        $this->assertAttributeEquals('MOB12345-XXX', 'variation', $product);
        $this->assertEquals('MOB12345-XXX', $product->getVariation());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidVariationShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setVariation(1);
    }

    public function testSetGetPrimaryCategory()
    {
        $product = new Product;
        $product->setPrimaryCategory(1234);
        $this->assertAttributeEquals(1234, 'primaryCategory', $product);
        $this->assertEquals(1234, $product->getPrimaryCategory());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidPrimaryCategoryShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setPrimaryCategory('1234');
    }

    public function testSetGetCategories()
    {
        $product = new Product;
        $product->setCategories('12,33,127');
        $this->assertAttributeEquals('12,33,127', 'categories', $product);
        $this->assertEquals('12,33,127', $product->getCategories());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidCategoriesShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setCategories(1234);
    }

    /**
     * @expectedException \OverflowException
     */
    public function testSetMoreThan3CategoriesShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setCategories('12,33,127,258');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSetDuplicatedCategoriesShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setCategories('12,33,12');
    }

    public function testSetGetDescription()
    {
        $product = new Product;
        $product->setDescription('Here is the product description');
        $this->assertAttributeEquals('Here is the product description', 'description', $product);
        $this->assertEquals('Here is the product description', $product->getDescription());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidDescriptionShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setDescription(1234);
    }

    /**
     * @expectedException \LengthException
     */
    public function testSmallDescriptionSizeShouldThrowLengthException()
    {
        $product = new Product;
        $product->setDescription(str_pad('', Product::DESCRIPTION_MIN_LENGTH - 1, 'x'));
    }

    /**
     * @expectedException \LengthException
     */
    public function testBigDescriptionSizeShouldThrowLengthException()
    {
        $product = new Product;
        $product->setDescription(str_pad('', Product::DESCRIPTION_MAX_LENGTH + 1, 'x'));
    }

    public function testSetGetBrand()
    {
        $product = new Product;
        $product->setBrand('The Brand');
        $this->assertAttributeEquals('The Brand', 'brand', $product);
        $this->assertEquals('The Brand', $product->getBrand());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidBrandShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setBrand(1);
    }

    public function testSetGetPrice()
    {
        $product = new Product;
        $product->setPrice(239.49);
        $this->assertAttributeEquals(239.49, 'price', $product);
        $this->assertEquals(239.49, $product->getPrice());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidPriceShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setPrice('239.49');
    }

    public function testSetGetSalePrice()
    {
        $product = new Product;
        $product->setSalePrice(239.49);
        $this->assertAttributeEquals(239.49, 'salePrice', $product);
        $this->assertEquals(239.49, $product->getSalePrice());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSalePriceShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setSalePrice('239.49');
    }

    public function testSetGetSaleStartDate()
    {
        $product = new Product;
        $product->setSaleStartDate(new \DateTime());
        $this->assertInstanceOf('DateTime', $product->getSaleStartDate());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSaleStartDateShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        /** @noinspection PhpParamsInspection */
        $product->setSaleStartDate('2014-01-01');
    }

    public function testSetGetSaleEndDate()
    {
        $product = new Product;
        $product->setSaleEndDate(new \DateTime());
        $this->assertInstanceOf('DateTime', $product->getSaleEndDate());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSaleEndDateShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        /** @noinspection PhpParamsInspection */
        $product->setSaleEndDate('2014-01-01');
    }

    public function testSetGetTaxClass()
    {
        $product = new Product;
        $product->setTaxClass(TaxClassEnum::DEFAULT_CLASS());
        $this->assertAttributeEquals('default', 'taxClass', $product);
        $this->assertEquals('default', $product->getTaxClass());
    }

    public function testSetGetShipmentType()
    {
        $product = new Product;
        $product->setShipmentType(ShipmentTypeEnum::CROSSDOCKING());
        $this->assertAttributeEquals('crossdocking', 'shipmentType', $product);
        $this->assertEquals('crossdocking', $product->getShipmentType());
    }

    public function testSetGetProductId()
    {
        $product = new Product;
        $product->setProductId('EANUPCISBN');
        $this->assertAttributeEquals('EANUPCISBN', 'productId', $product);
        $this->assertEquals('EANUPCISBN', $product->getProductId());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidProductIdShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setProductId(1);
    }

    public function testSetGetCondition()
    {
        $product = new Product;
        $product->setCondition(ConditionEnum::NEW_PRODUCT());
        $this->assertAttributeEquals('new', 'condition', $product);
        $this->assertEquals('new', $product->getCondition());
    }

    public function testSetGetProductData()
    {
        $productData = new AttributeCollection;
        $productAttribute1 = new Attribute('attribute_one', 'value_one');
        $productAttribute2 = new Attribute('attribute_two', 'value_two');
        $productData->add($productAttribute1);
        $productData->add($productAttribute2);
        $product = new Product;
        $product->setProductData($productData);
        $this->assertAttributeEquals($productData, 'productData', $product);
        $this->assertEquals($productData, $product->getProductData());
    }

    public function testSetGetQuantity()
    {
        $product = new Product;
        $product->setQuantity(1);
        $this->assertAttributeEquals(1, 'quantity', $product);
        $this->assertEquals(1, $product->getQuantity());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidQuantityShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setQuantity('1');
    }

    public function testToArray()
    {
        $productData = new AttributeCollection;
        $productAttribute1 = new Attribute('attribute_one', 'value_one');
        $productAttribute2 = new Attribute('attribute_two', 'value_two');
        $productData->add($productAttribute1);
        $productData->add($productAttribute2);
        $product = new Product;
        $product->setSellerSku('MOB123456');
        $product->setProductData($productData);
        $product->setParentSku('ABC998877');
        $product->setStatus(StatusEnum::ACTIVE());
        $product->setName('Product Name');
        $product->setVariation('VariationX');
        $product->setPrimaryCategory(1);
        $product->setCategories('1,2,3');
        $product->setDescription('Product description goes here...');
        $product->setBrand('Major Brand');
        $product->setPrice(129.99);
        $product->setSalePrice(99.99);
        $product->setSaleStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-01 10:00:00'));
        $product->setSaleEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-10 23:59:59'));
        $product->setTaxClass(TaxClassEnum::DEFAULT_CLASS());
        $product->setShipmentType(ShipmentTypeEnum::DROPSHIPPING());
        $product->setProductId('78900112233');
        $product->setCondition(ConditionEnum::NEW_PRODUCT());
        $product->setQuantity(1);

        $expected = [
            'SellerSku' => 'MOB123456',
            'ParentSku' => 'ABC998877',
            'Status' => 'active',
            'Name' => 'Product Name',
            'Variation' => 'VariationX',
            'PrimaryCategory' => '1',
            'Categories' => '1,2,3',
            'Description' => 'Product description goes here...',
            'Brand' => 'Major Brand',
            'Price' => '129.99',
            'SalePrice' => '99.99',
            'SaleFromDate' => '2015-01-01T10:00:00+0000',
            'SaleToDate' => '2015-01-10T23:59:59+0000',
            'TaxClass' => 'default',
            'ShipmentType' => 'dropshipping',
            'ProductId' => '78900112233',
            'Condition' => 'new',
            'ProductData' => [
                'attribute_one' => 'value_one',
                'attribute_two' => 'value_two'
            ],
            'Quantity' => 1
        ];
        $this->assertEquals($expected, $product->toArray());
    }
}
