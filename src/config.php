<?php

return [
    /*
        |-------------------------------------------------------------------------|
        | Icon component alias                                                    |
        |-------------------------------------------------------------------------|
        | The component alias to import in the blade/livewire component           |
        | Set to false to disable the component.                                  |
        |-------------------------------------------------------------------------|
        | Example                                                                 |
        | <x-breadcrumb />                                                        |
        |-------------------------------------------------------------------------|
    */
    'alias' => 'breadcrumb',

    /*
        |-------------------------------------------------------------------------|
        | Home route                                                              |
        |-------------------------------------------------------------------------|
        | Define a home route to use as the first breadcrumb.                     |
        | You can pass a string value or a closure that returns a string value.   |
        |-------------------------------------------------------------------------|
        | Example                                                                 |
        | 'home' => 'home',                                                       |
        | 'home' => fn() => route('my-route'),                                    |
        |-------------------------------------------------------------------------|
    */
    'home' => '/',
];