<?php namespace SellerCenter\SDK\Common;

use GuzzleHttp\HasDataTrait;
use SimpleXMLElement;
use JmesPath\Env as JmesPath;

/**
 * Class Result
 *
 * @package SellerCenter\SDK\Common\Api
 * @author  Daniel Costa
 */
class Result implements ResultInterface
{
    use HasDataTrait;

    protected $header;

    /**
     * @var SimpleXMLElement
     */
    protected $payload;

    public function __construct(
        array $data
    ) {
        if (isset($data['payload'])) {
            $this->payload = $data['payload'];
            unset($data['payload']);
        }

        if (isset($data['header'])) {
            $this->header = $data['header'];
            unset($data['header']);
        }

        $this->data = $data;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return array
     */
    public function getHeader()
    {
        return $this->header;
    }

    public function hasKey($name)
    {
        return isset($this->data[$name]);
    }

    public function get($key)
    {
        return $this[$key];
    }

    public function search($expression)
    {
        return JmesPath::search($expression, $this->toArray());
    }

    public function __toString()
    {
        $jsonData = json_encode($this->toArray(), JSON_PRETTY_PRINT);
        return <<<EOT
Model Data
----------
Data can be retrieved from the model object using the get() method of the
model (e.g., `\$result->get(\$key)`) or "accessing the result like an
associative array (e.g. `\$result['key']`). You can also execute JMESPath
expressions on the result data using the search() method.

{$jsonData}

EOT;
    }
}
