<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //C
    public function create()
    {
        return view('app');
    }

    public function insert(Request $form)
    {
        $subject = new Subject();

        $subject->name = $form->name;

        $subject->save();

        return redirect()->route('subjects.index');
    }
    //R
    public function index()
    {
        $subjects = Subject::orderBy('id', 'desc')->get();

        return view('app', ['subjects' => $subjects]);
    }
    //U
    public function edit(Subject $subject)
    {
        return view('app', ['subject' => $subject]);
    }

    public function update(Request $form, Subject $subject)
    {
        $subject->name = $form->name;

        $subject->save();

        return redirect()->route('subjects');
    }
    //D - never delete
}
