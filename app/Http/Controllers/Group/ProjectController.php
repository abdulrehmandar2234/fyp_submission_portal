<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\ProjectRequest;
use App\Models\MidTermReport;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = MidTermReport::where(['user_id' => auth()->id(), 'is_accepted' => 1])->first()->supervisor_id;
        return view('group.project.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status()
    {
        $is_accepted = Project::where('user_id', auth()->id())->first()->is_accepted;
        $project = Project::with('supervisor')->where('user_id', auth()->id())->first();
        return view('group.project.report', compact('project', 'is_accepted'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $proposal = Project::create($request->except(['document', 'project']) + ['user_id' => auth()->id(), 'is_accepted' => 0]);
        $proposal->addMediaFromRequest('document')->toMediaCollection('mid_term_report');
        $proposal->addMediaFromRequest('project')->toMediaCollection('project');

        return redirect()->route('project.index')->with('success', 'Project submitted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
