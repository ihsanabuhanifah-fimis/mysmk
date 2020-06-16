<?php 

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform( User $users)
    {
        return [
            'name' => $users->name,
            'email' => $users ->email,
        ];
    }
}

