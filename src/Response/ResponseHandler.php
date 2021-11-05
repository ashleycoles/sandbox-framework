<?php


namespace Sandbox\Response;


use Sandbox\Interfaces\ResponseInterface;

// TODO: Is this now useless?
class ResponseHandler
{
    protected ResponseInterface $response;

    /**
     * ResponseHandler constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }


    /**
     * Sends the Response
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

}