<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller
{

    public function profile () 
    {

        return view('site.profile.profile');

    }

    public function profileUpdate (UpdateProfileFormRequest $request) 
    {

        $user = auth()->user();

        //return view('site.profile.profile');
        //dd($request->all());
        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] =  bcrypt($data['password']);
        else 
            unset($data['password']);

        $data['image'] = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($user->image)
                $name = $user->image;
            else
                $name = kebab_case($user->name).$user->id;
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $data['image'] = $nameFile;

            $upload = $request->image->storeAs('users', $nameFile);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload da imagem!');
        }

        $update = $user->update($data);

        if($update)
            return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao atualizar!');

            return redirect()
                        ->back()
                        ->with('error', 'Falha ao atualizar o perfil');
    }

}
