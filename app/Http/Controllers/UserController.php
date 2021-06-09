<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DirectAdminHelper;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $daHelper = new DirectAdminHelper();
    public function listUsers()
    {
        return view('listUsers');        
    }

    public function addUser(Request $request)
    {
        $packages = $this->daHelper->getUserPackages($request->cookie('auth'));
        return view('addUser', ['packages' => $packages]);
    }

    public function createUser(Request $request)
    {
        $message = rawurldecode($this->daHelper->createUser($request));
        $packages = $this->daHelper->getUserPackages($request->cookie('auth'));
        return view('addUser', ['packages' => $packages, 'message' => $message]);
    }
}
