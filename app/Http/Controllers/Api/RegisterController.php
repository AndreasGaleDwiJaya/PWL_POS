<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'nama'      => 'required',
            'password'  => 'required|min:5|confirmed',
            'level_id'  => 'required',
            'avatar'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Upload file avatar dan dapatkan nama file yang disimpan
        $avatar = $request->file('avatar');
        $avatarName = $avatar->hashName();
        $avatar->storeAs('avatars', $avatarName, 'public');

        $user = UserModel::create([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => bcrypt($request->password),
            'level_id'  => $request->level_id,
            'avatar'    => $avatarName,
        ]);

        if ($user) {
            return response()->json([
                'success'   => true,
                'user'      => $user,
            ], 201);
        }

        return response()->json([
            'success'   => false,
        ], 409);
    }
}
