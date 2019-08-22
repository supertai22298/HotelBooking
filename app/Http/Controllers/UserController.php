<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get method
     * View table user
     * @return view admin.user.index
     */
    public function view()
    { 
        return view('admin.user.index');
    }

    /**
     * Get method
     * View page add new user
     * @return view admin.user.add
     */
    public function create()
    { }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view admin.user.index with success| back() with error
     */
    public function store(Request $request)
    { }

    /**
     * Get method
     * @param $id
     * @return view admin.user.edit with infomation that owned by user has that id
     */
    public function edit($id, Request $request)
    { }
    /**
     * @param $id
     */
    public function update($id, Request $request)
    { }

    public function delete($id)
    { }
}
