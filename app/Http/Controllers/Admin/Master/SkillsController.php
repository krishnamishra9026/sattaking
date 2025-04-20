<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Skills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::paginate(10);

        return view('admin.master.skills.list',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $skill = new Skills();
        $skill->title       = $request->title;
        $skill->sort_order  = $request->sort_order;
        $skill->status      = $request->status;
        $skill->save();

        return redirect()->route('admin.master.skills.index')->with('success', 'Skill saved Successfully');
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
    public function edit(Skills $skill)
    {
        return view('admin.master.skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skills $skill)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $skill->title       = $request->title;
        $skill->sort_order  = $request->sort_order;
        $skill->status      = $request->status;
        $skill->save();

        return redirect()->route('admin.master.skills.index')->with('success', 'Skill updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skill)
    {
        $skill->delete();
        return redirect()->route('admin.master.skills.index')->with('success', 'Skill deleted Successfully');
    }
}
