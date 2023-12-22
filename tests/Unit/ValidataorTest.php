<?php

use App\Services\Validator;

it('validates a string', function() {
    
    $result = Validator::string('foobar');

    expect($result)->toBeTrue();
});

it('validates an email', function() {
    
    $result = Validator::email('foo@example.com');

    expect($result)->toBeTrue();
});