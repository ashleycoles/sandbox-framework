<?php

declare(strict_types=1);

namespace Sandbox\Response;


use Exception;
use Sandbox\Interfaces\ResponseInterface;

class ResponseHelper extends Response
{
    /**
     * @param array|object $data
     * @return ResponseInterface
     * @throws Exception
     */
    public function respondWithJSON($data): ResponseInterface
    {
        $json = json_encode($data);

        if (false === $json) {
            throw new Exception('Cannot JSON encode data');
        }

        $this->setContent($json)
            ->setHeader('Content-Type: application/json')
            ->sendHeaders();
        return $this;
    }
}