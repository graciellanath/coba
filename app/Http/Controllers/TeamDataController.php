<?php

namespace App\Http\Controllers;

use App\Models\rac_teams;
use Illuminate\Http\Request;

class TeamDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rac_teams = rac_teams::all();
        return view('teams.index', ['rac_teams'=>$rac_teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validData = $request->validate([
            'tim1_penyiar1' => 'required|max:255',
            'tim1_penyiar2' => 'required|max:255',
            'tim1_operator' => 'required|max:255',
            'tim1_institusi' => 'required|max:255',
            'tim1_nims1' => 'required|max:255',
            'tim1_nims2' => 'required|max:255',
            'tim1_nimop' => 'required|max:255',
            'tim1_contact_wa' => 'required|max:255',
            'tim1_contact_line' => 'required|max:255',

            'tim2_penyiar1' => 'max:255',
            'tim2_penyiar2' => 'max:255',
            'tim2_operator' => 'max:255',
            'tim2_institusi' => 'max:255',
            'tim2_nims1' => 'max:255',
            'tim2_nims2' => 'max:255',
            'tim2_nimop' => 'max:255',
            'tim2_contact_wa' => 'max:255',
            'tim2_contact_line' => 'max:255',

            'tim3_penyiar1' => 'max:255',
            'tim3_penyiar2' => 'max:255',
            'tim3_operator' => 'max:255',
            'tim3_institusi' => 'max:255',
            'tim3_nims1' => 'max:255',
            'tim3_nims2' => 'max:255',
            'tim3_nimop' => 'max:255',
            'tim3_contact_wa' => 'max:255',
            'tim3_contact_line' => 'max:255',

            'payment_proof' => 'required|image|file|max:10240'
        ]);

        // $team = new rac_teams();
        rac_teams::create([
            'tim1_penyiar1'=>$request->tim1_penyiar1,
            'tim1_penyiar2'=>$request->tim1_penyiar2,
            'tim1_operator'=>$request->tim1_operator,
            'tim1_institusi'=>$request->tim1_institusi,
            'tim1_nims1'=>$request->tim1_nims1,
            'tim1_nims2'=>$request->tim1_nims2,
            'tim1_nimop'=>$request->tim1_nimop,
            'tim1_contact_wa'=>$request->tim1_contact_wa,
            'tim1_contact_line'=>$request->tim1_contact_line,

            'tim2_penyiar1'=>$request->tim2_penyiar1,
            'tim2_penyiar2'=>$request->tim2_penyiar2,
            'tim2_operator'=>$request->tim2_operator,
            'tim2_institusi'=>$request->tim2_institusi,
            'tim2_nims1'=>$request->tim2_nims1,
            'tim2_nims2'=>$request->tim2_nims2,
            'tim2_nimop'=>$request->tim2_nimop,
            'tim2_contact_wa'=>$request->tim2_contact_wa,
            'tim2_contact_line'=>$request->tim2_contact_line,

            'tim3_penyiar1'=>$request->tim3_penyiar1,
            'tim3_penyiar2'=>$request->tim3_penyiar2,
            'tim3_operator'=>$request->tim3_operator,
            'tim3_institusi'=>$request->tim3_institusi,
            'tim3_nims1'=>$request->tim3_nims1,
            'tim3_nims2'=>$request->tim3_nims2,
            'tim3_nimop'=>$request->tim3_nimop,
            'tim3_contact_wa'=>$request->tim3_contact_wa,
            'tim3_contact_line'=>$request->tim3_contact_line,

            'payment_proof'=>$request->file('payment_proof')->storePublicly('payment_images', 'public'),
            'status'=>'Pending'
        ]);
        // $team->tim1_penyiar1 = $request->tim1_penyiar1;
        // $team->tim1_penyiar2 = $request->tim1_penyiar2;
        // $team->tim1_operator = $request->tim1_operator;
        // $team->tim1_institusi = $request->tim1_institusi;
        // $team->tim1_nims1 = $request->tim1_nims1;
        // $team->tim1_nims2 = $request->tim1_nims2;
        // $team->tim1_nimop = $request->tim1_nimop;
        // $team->tim1_contact_wa = $request->tim1_contact_wa;
        // $team->tim1_contact_line = $request->tim1_contact_line;
        // $team->payment_proof = $request->file('payment_proof')->storePublicly('payment_images', 'public');
        // $team->save();
        return redirect('/teams/create')->with('success', "Pendaftaran berhasil.");
    }

    /**
     * Display the specified resource.
     */
    public function show(rac_teams $rac_teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $team = rac_teams::findOrFail($id);
        return view('teams.edit',[
            'team'=>$team
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rac_teams $rac_teams, $id)
    {
        //
        $rules = $request->validate([
            'status' => 'required|max:255'
        ]);

        $target_team = rac_teams::findOrFail($id);
        $target_team->status = $request->status;
        $target_team->save();
        return redirect('/teams');

        // rac_teams::where('id', $request->id)->update([
        //     'status'=>$request->status
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rac_teams $rac_teams)
    {
        //
    }

    public function form($amount){
        return view('teams.form', compact("amount"));
    }
}