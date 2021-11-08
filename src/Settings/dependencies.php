<?php

return function (\Sandbox\Interfaces\ContainerInterface $container) {
    $container->add('RequestCreator', new \Sandbox\Factories\Request\RequestCreatorFactory());
    $container->add('Response', new \Sandbox\Factories\Response\ResponseFactory());
    $container->add('ResponseHelper', new \Sandbox\Factories\Response\ResponseHelperFactory());
    $container->add('Renderer', new \Sandbox\Factories\Renderer\RendererFactory());
};
