<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function login()
    {
        $data = [
            'title' => ('Login Page')
        ];
        
        return view('login', $data);
    }

    public function signup()
    {
        $data = [
            'title' => ('Sign Up Page')
        ];
        
        return view('signup', $data);
    }

    public function forgot_password()
    {
        $data = [
            'title' => ('Forgot Password Page')
        ];

        return view('forgot_password', $data);
    }
 
    public function reset()
    {
        $data = [
            'title' => ('Reset Password Page')
        ];

        return view('reset', $data);
    } 

    public function dashboard()
    {
        $data = [
            'title' => ('Dashboard')
        ];

        return view('dashboard', $data);
    }  

    public function employee()
    {
        $data = [
            'title' => ('Emloyee Data')
        ];

        return view('employee', $data);
    }  

    public function addemployee()
    {
        $data = [
            'title' => ('Emloyee Data')
        ];

        return view('addemployee', $data);
    }  
}
