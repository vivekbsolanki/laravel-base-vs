<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = 'id';
        $orderBy = 'desc';
        $perPage = 2;
        $q = null;
        
        if($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if($request->has('perPage')) $perPage = $request->query('perPage');
        if($request->has('q')) $q = $request->query('q');

        $users = User::searchScope(new User, $q)->orderBy($sortBy, $orderBy)->paginate($perPage);
        return view('user.index', compact('users'));
    }
}
