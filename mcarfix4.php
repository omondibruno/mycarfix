<?php

JsonApi::register('default', ['namespace' => 'Api'], function ($api, $router) {
    $api->resource('posts', [
        'has-one' => 'author',
        'has-many' => 'tags'
    ]);
}
GET /api/posts HTTP/1.1
Accept: application/vnd.api+json

{
    "data": [
        {
            "type": "posts",
            "id": "1",
            "attributes": {
                "title": "My First Post",
                "slug": "my-first-post"
            },
            "links": {
                "self": "/api/posts/1"
            }
        },
        {
            "type": "posts",
            "id": "2",
            "attributes": {
                "title": "mechanic mcar fix",
                "slug": "mcarfix"
            },
            "links": {
                "self": "/api/posts/1"
            }
        }
    ]
}