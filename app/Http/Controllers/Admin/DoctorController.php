<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::doctors()->paginate(15);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
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
            'name.required' => 'The name of the doctor is necessary to place it 👤',
            'name.min' => 'The name of the doctor must have more than 3 characters ',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',

            'cedula.required' => 'the compulsory doctors certificate',
            'cedula.digits' => 'The doctors certificate must have more than 10 digits',
            
            'address.min' => 'the address must have more than 6 characters',
            
            'phone.requiret' => 'the phone number is required',
            

        ];

        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $user->Specialties()->attach($request->input('specialties'));

        $notification = 'the doctor has been registered correctly';
        return redirect('/medicos')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($id);

        $specialties = Specialty::all();
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');

        return view('doctors.edit', compact('doctor', 'specialties', 'specialty_ids'));
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
            'name.required' => 'The name of the doctor is necessary to place it 👤',
            'name.min' => 'The name of the doctor must have more than 3 characters ',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',

            'cedula.required' => 'the compulsory doctors certificate',
            'cedula.digits' => 'The doctors certificate must have more than 10 digits',
            
            'address.min' => 'the address must have more than 6 characters',
            
            'phone.requiret' => 'the phone number is required',
            

        ];

        $this->validate($request, $rules, $messages);
        $user = User::doctors()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');

        $password = $request->input('password');
        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        $user->specialties()->sync($request->input('specialties'));

        $notification = 'The doctors information has been updated correctly';
        return redirect('/medicos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::doctors()->findOrFail($id);

        $doctorName = $user->name;

        $user->delete();

        $notification = 'the following doctor $doctorName, has been removed from the registry';
        
        return redirect('/medicos')->with(compact('notification'));
    }
}
