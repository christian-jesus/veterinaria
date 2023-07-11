<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function sendData(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        
        $messages = [
            'name.required' => 'The name of the specialty is mandatory.',
            'name.min' => 'It is mandatory that the name of the specialty has more than 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'The specialty has been successfully created 👍';

        return redirect('/Specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        
        $messages = [
            'name.required' => 'The name of the specialty is mandatory.',
            'name.min' => 'It is mandatory that the name of the specialty has more than 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = 'The new specialty has been successfully updated 👍';

        return redirect('/Specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deleteName = $specialty->name;
        $specialty->delete();
        $notification = 'the '. $deleteName .' specialty has been successfully removed👍';

        return redirect('/Specialties')->with(compact('notification'));
    }
}
