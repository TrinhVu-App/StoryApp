<?php
namespace App\Models;

class ClickAble {
    public static function onClick() {
        return [
            [
                'sound'=> 'thisSound',
                'text' => 'thisText'
            ]
        ];
    }
}
