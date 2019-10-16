<?php
namespace BlogApi\V1\Rest\Posts;

class PostsResourceFactory
{
    public function __invoke($services)
    {
        return new PostsResource($services->get('PostService'));
    }
}
