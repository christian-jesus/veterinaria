<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::patients()->paginate(15);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages = [
            'name.required' => 'The patient name is required',
            'name.min' => 'Patient name must have more than 3 characters',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',

            'cedula.required' => 'the compulsory doctors certificate',
            'cedula.digits' => 'The doctors certificate must have more than 10 digits',
            
            'address.min' => 'the address must have more than 6 characters',
            
            'phone.requiret' => 'the phone number is required',
            

        ];

        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'paciente',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = 'the patient has been successfully registered';
        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = User::Patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages = [
            'name.required' => 'The patient name is required',
            'name.min' => 'Patient name must have more than 3 characters',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',

            'cedula.required' => 'the compulsory doctors certificate',
            'cedula.digits' => 'The doctors certificate must have more than 10 digits',
            
            'address.min' => 'the address must have more than 6 characters',
            
            'phone.requiret' => 'the phone number is required',
            

        ];

        $this->validate($request, $rules, $messages);
        $user = User::Patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');

        $password = $request->input('password');
        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'The patient has been successfully registered';
        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::Patients()->findOrFail($id);

        $PacienteName = $user->name;

        $user->delete();

        $notification = 'the following doctor $PacienteName, has been removed from the registry';
        
        return redirect('/pacientes')->with(compact('notification'));
    }
}
