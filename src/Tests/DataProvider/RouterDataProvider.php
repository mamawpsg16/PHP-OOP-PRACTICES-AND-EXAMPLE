<?php

namespace Tests\DataProvider;


class RouterDataProvider{
    public static function routeNotFoundCases():array{
        return [
            'route exists and request method not exists' => ['/users', 'put'],
            'route not exists and request method exists' =>['/invoices', 'post'],
            'is_class_exists' =>['/users', 'get'],
            'is_method_exists' => ['/users', 'post']

        ];
    }
}