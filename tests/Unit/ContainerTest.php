<?php

use App\Providers\Container;

test('It can resolve something in the container', function () {
    
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');
});
