<?php

namespace Clarkeash\Converter\Exceptions;

class BadMethodCallException extends \BadMethodCallException
{
    public static function throw($method, $class, $via = null)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $message = sprintf('Method: %s does not exist on class: %s', $method, $class);

        if (is_object($via)) {
            $via = get_class($via);
        }

        if ($via) {
            $message .= sprintf(' via: %s', $via);
        }

        throw new BadMethodCallException($message);
    }
}
