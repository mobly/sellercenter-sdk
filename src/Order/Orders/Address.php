<?php namespace SellerCenter\SDK\Order\Orders;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\Order\Orders
 * @author Daniel Costa
 */
class Address
{
    /**
     * @var string
     * @JMS\SerializedName("FirstName")
     * @JMS\Type("string")
     */
    protected $firstName;

    /**
     * @var string
     * @JMS\SerializedName("LastName")
     * @JMS\Type("string")
     */
    protected $lastName;

    /**
     * @var string
     * @JMS\SerializedName("Phone")
     * @JMS\Type("string")
     */
    protected $phone;

    /**
     * @var string
     * @JMS\SerializedName("Phone2")
     * @JMS\Type("string")
     */
    protected $phone2;

    /**
     * @var string
     * @JMS\SerializedName("Address1")
     * @JMS\Type("string")
     */
    protected $address1;

    /**
     * @var string
     * @JMS\SerializedName("Address2")
     * @JMS\Type("string")
     */
    protected $address2;

    /**
     * @var string
     * @JMS\SerializedName("City")
     * @JMS\Type("string")
     */
    protected $city;

    /**
     * @var string
     * @JMS\SerializedName("Ward")
     * @JMS\Type("string")
     */
    protected $ward;

    /**
     * @var string
     * @JMS\SerializedName("Region")
     * @JMS\Type("string")
     */
    protected $region;

    /**
     * @var string
     * @JMS\SerializedName("PostCode")
     * @JMS\Type("string")
     */
    protected $postCode;

    /**
     * @var string
     * @JMS\SerializedName("Country")
     * @JMS\Type("string")
     */
    protected $country;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Address
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Address
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Address
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     *
     * @return Address
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     *
     * @return Address
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     *
     * @return Address
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getWard()
    {
        return $this->ward;
    }

    /**
     * @param string $ward
     *
     * @return Address
     */
    public function setWard($ward)
    {
        $this->ward = $ward;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return Address
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     *
     * @return Address
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
