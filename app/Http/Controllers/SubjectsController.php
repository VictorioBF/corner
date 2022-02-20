<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //Create
    public function CView()
    {
        return view('subjects.create');
    }

    public function CAction(Request $form)
    {
        $subject = new Subject();

        $subject->name = $form->name;

        $subject->save();

        return redirect()->route('subjects.index');
    }
    //Read
    public function index()
    {
        $subjects = Subject::orderBy('id', 'desc')->get();

        return view('subjects.index', ['subjects' => $subjects]);
    }
    //Update
    public function edit(Subject $subject)
    {
        return view('subjects.edit', ['subject' => $subject]);
    }

    public function update(Request $form, Subject $subject)
    {
        $subject->name = $form->name;

        $subject->save();

        return redirect()->route('subjects');
    }
    //Delete - never delete
}
