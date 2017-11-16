<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;


class LogsController extends Controller
{

    public function __construct()

    {

        $this->middleware('guest')->except('destroy');

    }


    /********************
    view Login/signup form
    **************************/
    public function viewForm()
    {
    	
    	return view('login');

    }


    /************************
    authenticate Users 
    **********************/
    public function restore(){

    	if(auth()->attempt(request(['name', 'password'])))

			return redirect('/');

		else

			return back()->withErrors('wrong data!');

    }


    /**************************************************
    Regesterin users using RegisterRequest form Request 
    ***************************************************/
    public function store(RegisterRequest $form)

    {

        if(User::where('name',request('u_name'))->first()){

            return back()->withErrors('User is Already Exist');

        }

        $form->register();

        return redirect('/');

    }



    /************
        logout
    ****************/
    public function destroy()
    {
        
        auth()->logout();

        session()->forget('products');
        
        return redirect('/');
        
    }

}
