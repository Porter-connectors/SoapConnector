<?php
namespace ScriptFUSIONTest\Unit\Porter\Net\Soap;

use ScriptFUSION\Porter\Net\Soap\SoapDataSource;

final class SoapOptionsTest extends \PHPUnit_Framework_TestCase
{
    private $source;

    protected function setUp()
    {
        $this->source = new SoapDataSource('foo');
    }

    public function testOptionDefaults(): void
    {
        self::assertSame([], $this->source->getParameters());
    }

    public function testMethod(): void
    {
        self::assertSame('foo', $this->source->getMethod());
    }

    public function testParameters(): void
    {
        $options = (new SoapDataSource('foo', $params = ['foo' => 'bar']));

        self::assertSame($params, $options->getParameters());
    }

    public function testLocation(): void
    {
        self::assertSame($location = 'http://foo.com', $this->source->setLocation($location)->getLocation());
    }

    public function testUri(): void
    {
        self::assertSame($uri = 'http://foo.com', $this->source->setUri($uri)->getUri());
    }

    public function testVersion(): void
    {
        $options = $this->source->setVersion(SOAP_1_2);

        self::assertSame(SOAP_1_2, $options->getVersion());
    }

    public function testCompression(): void
    {
        $options = $this->source->setCompression(SOAP_COMPRESSION_ACCEPT);

        self::assertSame(SOAP_COMPRESSION_ACCEPT, $options->getCompression());
    }

    public function testKeepAlive(): void
    {
        $options = $this->source->setKeepAlive(true);

        self::assertTrue($options->getKeepAlive());
        self::assertFalse($options->setKeepAlive(false)->getKeepAlive());
    }

    public function testProxy(): void
    {
        $options = $this->source
            ->setProxyHost($host = 'foo.com')
            ->setProxyPort($port = 8080)
            ->setProxyLogin($login = 'foo')
            ->setProxyPassword($password = 'bar');

        self::assertSame($host, $options->getProxyHost());
        self::assertSame($port, $options->getProxyPort());
        self::assertSame($login, $options->getProxyLogin());
        self::assertSame($password, $options->getProxyPassword());
    }

    public function testEncoding(): void
    {
        self::assertSame($encoding = 'iso-8859-1', $this->source->setEncoding($encoding)->getEncoding());
    }

    public function testTrace(): void
    {
        $options = $this->source->setTrace(true);

        self::assertTrue($options->getTrace());
        self::assertFalse($options->setTrace(false)->getTrace());
    }

    public function testExceptions(): void
    {
        $options = $this->source->setExceptions(true);

        self::assertTrue($options->getExceptions());
        self::assertFalse($options->setExceptions(false)->getExceptions());
    }

    public function testClassmap(): void
    {
        $classmap = ['foo' => 'bar'];

        self::assertSame($classmap, $this->source->setClassmap($classmap)->getClassmap());
    }

    public function testConnectionTimeout(): void
    {
        self::assertSame($timeout = 45, $this->source->setConnectionTimeout($timeout)->getConnectionTimeout());
    }

    public function testTypemap(): void
    {
        $typemap = ['foo' => 'bar'];
        self::assertSame($typemap, $this->source->setTypemap($typemap)->getTypemap());
    }

    public function testCacheWsdl(): void
    {
        self::assertSame($option = WSDL_CACHE_MEMORY, $this->source->setCacheWsdl($option)->getCacheWsdl());
    }

    public function testUserAgent(): void
    {
        self::assertSame($userAgent = 'Foo/Bar', $this->source->setUserAgent($userAgent)->getUserAgent());
    }

    public function testFeatures(): void
    {
        self::assertSame($features = SOAP_USE_XSI_ARRAY_TYPE, $this->source->setFeatures($features)->getFeatures());
    }

    public function testSslMethod(): void
    {
        self::assertSame($method = SOAP_SSL_METHOD_SSLv2, $this->source->setSslMethod($method)->getSslMethod());
    }
}
