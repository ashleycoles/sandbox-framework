<?php


namespace Sandbox\Response;


use Exception;

class ResponseHelper extends Response
{
    public function respondWithJSON(string $data)
    {
        $json = json_encode($data);

        if (false === $json) {
            throw new Exception('Cannot JSON encode data');
        }

        $this->sendHeaders();
    }
}