<?php


namespace Sandbox\Exceptions;


use Throwable;

class ContainerException extends \Exception
{
    /**
     * ContainerException constructor.
     * Overrides the parent constructor to make message required.
     * @param $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}