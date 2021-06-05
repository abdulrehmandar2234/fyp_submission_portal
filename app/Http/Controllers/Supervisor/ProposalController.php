<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Proposal;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $proposals = Proposal::with('user')->where('supervisor_id', auth()->id())->get();
            return view('supervisor.proposal.index', compact('proposals'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

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
    public function store(Request $request)
    {
        //
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
        $proposal = Proposal::findOrFail($id);
        if ($proposal->is_accepted == 1) {
            $proposal->update(['is_accepted' => 2]);
            Supervisor::where('id', $proposal->supervisor_id)->update(['pending_proposals' => 1]);

            return back()->with('success', 'Proposal Cancelled Successfully');
        } else {
            $proposal->update(['is_accepted' => 1]);
            return back()->with('success', 'Proposal Accepted Successfully');
        }

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
