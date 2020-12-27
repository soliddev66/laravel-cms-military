<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
    * Create an HTTP response that represents the object.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function toResponse($request)
    {
        $type = \Auth::user()->type;
        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        switch ($type) {
            case 3:
                return redirect()->intended('admin/dashboard');
            case 2:
                return redirect()->intended('admin/category/create');
            default:
                return redirect('/blogs');
        }
    }
}