<?php

namespace ScriptFUSIONTest\Functional;

use ScriptFUSION\Porter\Net\Soap\SoapConnector;
use ScriptFUSION\Porter\Net\Soap\SoapDataSource;

final class SoapConnectorTest extends \PHPUnit_Framework_TestCase
{
    public function test(): void
    {
        $connector = new SoapConnector('http://www.dataaccess.com/webservicesserver/numberconversion.wso?WSDL');
        $response = $connector->fetch(new SoapDataSource('NumberToWords', ['ubiNum' => 123]));

        self::assertInternalType('object', $response);
        self::assertObjectHasAttribute('NumberToWordsResult', $response);
        self::assertSame('one hundred and twenty three ', $response->NumberToWordsResult);
    }
}
