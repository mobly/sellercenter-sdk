<?php

namespace Mobly\SellerCenter\Entity;

use Mobly\SellerCenter\Collection\ProductAttributeCollection;

/**
 * Class ProductTest
 *
 * @package Mobly\SellerCenter\Entity
 * @author  Daniel Costa
 */
class ProductTest extends \PHPUnit_Framework_TestCase
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
        $product->setStatus('enabled');
        $this->assertAttributeEquals('enabled', 'status', $product);
        $this->assertEquals('enabled', $product->getStatus());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidStatusShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setStatus(1);
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
        $product->setSaleEndDate('2014-01-01');
    }

    public function testSetGetTaxClass()
    {
        $product = new Product;
        $product->setTaxClass('default');
        $this->assertAttributeEquals('default', 'taxClass', $product);
        $this->assertEquals('default', $product->getTaxClass());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidTaxClassShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setTaxClass(1);
    }

    public function testSetGetShipmentType()
    {
        $product = new Product;
        $product->setShipmentType('crossdocking');
        $this->assertAttributeEquals('crossdocking', 'shipmentType', $product);
        $this->assertEquals('crossdocking', $product->getShipmentType());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidShipmentTypeShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setShipmentType(1);
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
        $product->setCondition('new');
        $this->assertAttributeEquals('new', 'condition', $product);
        $this->assertEquals('new', $product->getCondition());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidConditionShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setCondition(1);
    }

    public function testSetGetProductData()
    {
        $productData = new ProductAttributeCollection;
        $productAttribute1 = new ProductAttribute('attribute_one', 'value_one');
        $productAttribute2 = new ProductAttribute('attribute_two', 'value_two');
        $productData->add($productAttribute1);
        $productData->add($productAttribute2);
        $product = new Product;
        $product->setProductData($productData);
        $this->assertAttributeEquals($productData, 'productData', $product);
        $this->assertEquals($productData, $product->getProductData());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidProductDataShouldThrowInvalidArgumentException()
    {
        $product = new Product;
        $product->setProductData(1);
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
}
