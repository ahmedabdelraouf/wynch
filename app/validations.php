<?php
return [
    'category' => [
        'store' => [
            'name' => 'required|unique:categories',
            'ar_name' => 'required',
            'description' => 'string|min:10',
            'ar_description' => 'string|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], 'update' => [
            'name' => 'required|unique:categories',
            'ar_name' => 'required',
            'description' => 'string|min:10',
            'ar_description' => 'string|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
    ]
];
