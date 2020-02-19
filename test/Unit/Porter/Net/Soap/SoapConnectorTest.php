<?php
namespace ScriptFUSIONTest\Unit\Porter\Net\Soap;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use ScriptFUSION\Porter\Connector\DataSource;
use ScriptFUSION\Porter\Net\Soap\SoapConnector;

final class SoapConnectorTest extends \PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;

    public function testInvalidOptionsType(): void
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        (new SoapConnector('foo'))->fetch(\Mockery::mock(DataSource::class));
    }
}
