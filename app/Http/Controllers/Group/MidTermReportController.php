<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\MidTermReport\MidTermReportRequest;
use App\Models\MidTermReport;
use App\Models\Proposal;
use Illuminate\Http\Request;

class MidTermReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Proposal::where(['user_id' => auth()->id(), 'is_accepted' => 1])->first()->supervisor_id;
        return view('group.mid_term_report.index', compact('id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MidTermReportRequest $request)
    {
        $proposal = MidTermReport::create($request->except(['document']) + ['user_id' => auth()->id(), 'is_accepted' => 0]);
        $proposal->addMediaFromRequest('document')->toMediaCollection('mid_term_report');
        return redirect()->route('supervisors.index')->with('success', 'Mid Term Report send successfully');

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
