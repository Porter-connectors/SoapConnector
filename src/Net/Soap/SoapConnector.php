<?php
namespace ScriptFUSION\Porter\Net\Soap;

use ScriptFUSION\Porter\Connector\Connector;
use ScriptFUSION\Porter\Connector\DataSource;

/**
 * Fetches data from a SOAP service.
 */
class SoapConnector implements Connector
{
    private $wsdl;

    public function __construct($wsdl = null)
    {
        $this->wsdl = $wsdl;
    }

    public function fetch(DataSource $source)
    {
        if (!$source instanceof SoapDataSource) {
            throw new \InvalidArgumentException('Options must be an instance of SoapDataSource.');
        }

        try {
            $response = $this->createClient($source->extractSoapClientOptions())
                ->{$source->getMethod()}($source->getParameters());
        } catch (\Exception $exception) {
            throw new SoapException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return $response;
    }

    private function createClient(array $options): \SoapClient
    {
        return new \SoapClient($this->wsdl, $options);
    }
}
