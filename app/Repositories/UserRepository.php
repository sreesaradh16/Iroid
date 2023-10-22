<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository
{
    public function create($data)
    {
        $path = (isset($data['image']) && $data['image']->isValid() ? $data['image']->store('user', 'public') : null);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $path,
            'password' => Hash::make($data['password'])
        ]);

        return $user;
    }

    public function update($data, $user)
    {
        $user->name  = $data['name'];
        $user->email  = $data['email'];

        if (isset($data['image']) && $data['image']->isValid()) {
            //delete old file
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            //store new file
            $path = $data['image']->store('user', 'public');

            $user->image = $path;
        }

        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();
        return $user;
    }

    public function delete($user)
    {
        $user->delete();
    }
}
