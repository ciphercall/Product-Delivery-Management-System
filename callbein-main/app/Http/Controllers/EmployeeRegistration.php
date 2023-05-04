<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class EmployeeRegistration extends Controller
{
    use PasswordValidationRules;
    

    /**
     *  Employee  registration page view
    */
    public function registration()
    {
        return view('admin.employee.employee_registration');
    }


    /**
     *  Employee registration for backend access
    */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role'  => 'required',
       ],
       [
           'role.required' =>"Employee Type Field is required !"
       ]
    );

        User::create([
            'name' => $request ->name,
            'email' => $request ->email,
            'password' => Hash::make($request ->password),
            'role' => $request->role
        ]);

        return redirect()-> back() -> with("success",'Data added Successfully');
    }
}
