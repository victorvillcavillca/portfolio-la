<?php

namespace App\Http\Controllers\Admin;

use App\Matter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MatterRequest;
use App\Http\Requests\Admin\MatterUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /*Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matter = Matter::find(100);
        $user = $Matter->users()->find(3);
        $final_score = 100;

        $matter->users()->updateExistingPivot($user->id, compact('final_score'));
        // $user->roles()->updateExistingPivot($roleId, $attributes);
        return view('admin.inscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterRequest $request)
    {
        $matter = new Matter($request->all());
        $matter->user_id = Auth::id();
        $matter->save();

        return redirect()->route('inscriptions.index')
                        ->with('info','Materia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function show(Matter $Matter)
    {
        return view('admin.inscriptions.show', compact('Matter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersSelected = [];
        $users = User::pluck('name', 'id')->toArray();
     //    count($users->count()); die();
     // echo count($users); die();

        $matter = Matter::findOrFail($id);
        return view('admin.inscriptions.edit', compact('matter','users'));
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
        $matter = Matter::find($id);
        $matter->update($request->except('users'));

        $users = $request->input('users');
        if ($users != NULL) {
            foreach ($users as $userId) {
                // $user = User::find((int)$userId);
                if (! $matter->users->contains($userId)) {
                    $matter->users()->attach((int)$userId, [
                    // $Matter->users()->save($user, [
                        'accepted' => true,
                        'approved' => false,
                        'evaluation_date' => now(),
                    ]);
                }

            }
        }

        return redirect()->route('inscriptions.index')
                        ->with('info','Materia Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matter::find($id)->delete();
        return;
    }

    /**
     * Show a list of all the Expenses posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $query = Matter::select('id', 'name', 'description', 'created_at');

        return datatables()
            ->eloquent($query)
            ->addColumn('btn', 'admin.inscriptions.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
