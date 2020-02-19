<?php
declare(strict_types=1);

namespace ScriptFUSION\Porter\Net\Soap;

use ScriptFUSION\Porter\Connector\DataSource;

/**
 * Encapsulates SOAP context options.
 */
final class SoapDataSource implements DataSource
{
    private $method;
    private $params;
    private $location;
    private $uri;
    private $soapVersion;
    private $compression;
    private $keepAlive;
    private $proxyHost;
    private $proxyPort;
    private $proxyLogin;
    private $proxyPassword;
    private $encoding;
    private $trace;
    private $classmap;
    private $exceptions;
    private $connectionTimeout;
    private $typemap;
    private $cacheWsdl;
    private $userAgent;
    private $features;
    private $sslMethod;

    public function __construct(string $method, array $parameters = [])
    {
        $this->method = $method;
        $this->params = $parameters;
    }

    public function computeHash(): string
    {
        return md5($this->method . \json_encode($this->params) . implode($this->extractSoapClientOptions()), true);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getVersion(): int
    {
        return $this->soapVersion;
    }

    public function setVersion(int $version): self
    {
        $this->soapVersion = $version;

        return $this;
    }

    public function getCompression(): int
    {
        return $this->compression;
    }

    public function setCompression(int $compression): self
    {
        $this->compression = $compression;

        return $this;
    }

    public function getKeepAlive(): bool
    {
        return $this->keepAlive;
    }

    public function setKeepAlive(bool $keepAlive): self
    {
        $this->keepAlive = $keepAlive;

        return $this;
    }

    public function getProxyHost(): string
    {
        return $this->proxyHost;
    }

    public function setProxyHost(string $host): self
    {
        $this->proxyHost = $host;

        return $this;
    }

    public function getProxyPort(): int
    {
        return $this->proxyPort;
    }

    public function setProxyPort(int $port): self
    {
        $this->proxyPort = $port;

        return $this;
    }

    public function getProxyLogin(): string
    {
        return $this->proxyLogin;
    }

    public function setProxyLogin(string $login): self
    {
        $this->proxyLogin = $login;

        return $this;
    }

    public function getProxyPassword(): string
    {
        return $this->proxyPassword;
    }

    public function setProxyPassword($password): self
    {
        $this->proxyPassword = $password;

        return $this;
    }

    public function getEncoding(): string
    {
        return $this->encoding;
    }

    public function setEncoding(string $encoding): self
    {
        $this->encoding = $encoding;

        return $this;
    }

    public function getTrace(): bool
    {
        return $this->trace;
    }

    public function setTrace(bool $trace): self
    {
        $this->trace = $trace;

        return $this;
    }

    public function getExceptions(): bool
    {
        return $this->exceptions;
    }

    public function setExceptions(bool $exceptions): self
    {
        $this->exceptions = $exceptions;

        return $this;
    }

    public function getClassmap(): array
    {
        return $this->classmap;
    }

    public function setClassmap(array $classmap): self
    {
        $this->classmap = $classmap;

        return $this;
    }

    public function getConnectionTimeout(): int
    {
        return $this->connectionTimeout;
    }

    public function setConnectionTimeout(int $timeout): self
    {
        $this->connectionTimeout = $timeout;

        return $this;
    }

    public function getTypemap(): array
    {
        return $this->typemap;
    }

    public function setTypemap(array $typemap): self
    {
        $this->typemap = $typemap;

        return $this;
    }

    public function getCacheWsdl(): int
    {
        return $this->cacheWsdl;
    }

    public function setCacheWsdl(int $cacheMode): self
    {
        $this->cacheWsdl = $cacheMode;

        return $this;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getFeatures(): int
    {
        return $this->features;
    }

    public function setFeatures(int $features): self
    {
        $this->features = $features;

        return $this;
    }

    public function getSslMethod(): int
    {
        return $this->sslMethod;
    }

    public function setSslMethod(int $method): self
    {
        $this->sslMethod = $method;

        return $this;
    }

    /**
     * TODO: Implement missing options.
     */
    public function extractSoapClientOptions(): array
    {
        return [
            'location' => $this->location,
            'uri' => $this->uri,
            'soap_version' => $this->soapVersion,
            'proxy_host' => $this->proxyHost,
            'proxy_port' => $this->proxyPort,
            'proxy_login' => $this->proxyLogin,
            'proxy_password' => $this->proxyPassword,
            'compression' => $this->compression,
            'encoding' => $this->encoding,
            'trace' => $this->trace,
            'classmap' => $this->classmap,
            'exceptions' => $this->exceptions,
            'connection_timeout' => $this->connectionTimeout,
            'typemap' => $this->typemap,
            'cache_wsdl' => $this->cacheWsdl,
            'user_agent' => $this->userAgent,
            'features' => $this->features,
            'keep_alive' => $this->keepAlive,
            'ssl_method' => $this->sslMethod,
        ];
    }
}
