<?php


namespace Sandbox\Response;


class ResponseHandler
{
    protected Response $response;

    /**
     * ResponseHandler constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Sets the Response ContentType header as well as Response content
     * @param string $content
     * @param string $contentType
     */
    public function setResponseContent(string $content, string $contentType = 'Content-Type: application/json'): ResponseHandler
    {
        $this->response->setContent($content)
            ->setHeader($contentType);
        return $this;
    }

    /**
     * Sends the Response
     */
    public function sendResponse()
    {
        echo $this->response->sendHeaders()->getContent();
    }

}