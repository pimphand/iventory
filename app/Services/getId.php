<?php

namespace App\Services;

class getId
{
    public function id()
    {
        return request()->route()->parameter('user.id');
    }
}
