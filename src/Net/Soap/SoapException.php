<?php
declare(strict_types=1);

namespace ScriptFUSION\Porter\Net\Soap;

use ScriptFUSION\Porter\Connector\Recoverable\RecoverableException;

class SoapException extends \RuntimeException implements RecoverableException
{
    // Intentionally empty.
}
