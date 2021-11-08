<?php

declare(strict_types=1);

namespace Sandbox\Response;

use Sandbox\Exceptions\ResponseException;
use Sandbox\Interfaces\ResponseInterface;

class ResponseHelper extends Response
{
    /**
     * @param  array|object $data
     * @return ResponseInterface
     * @throws ResponseException
     */
    public function respondWithJSON($data): ResponseInterface
    {
        $json = json_encode($data);

        if (false === $json) {
            throw new ResponseException('Cannot JSON encode data');
        }

        $this->setContent($json)
            ->setHeader('Content-Type: application/json')
            ->sendHeaders();
        return $this;
    }

    /**
     * Respond with a redirect.
     *
     * @param  string $location
     * @return ResponseInterface
     */
    public function respondWithRedirect(string $location): ResponseInterface
    {
        $this->setContent('')
            ->setHeader('Location: ' . $location)
            ->sendHeaders();
        return $this;
    }
}
