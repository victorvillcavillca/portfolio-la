<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\CamporiClubRequest;
use App\CamporiClub;
use App\Requirement;
use App\Requirementarea;
use App\Qualification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ScoreController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'score');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', 38)
                ->where('requirement_area_id', '=', 1)
                ->sum('score_reached');

                //var_dump($total_score_reached); exit();
        return view('admin.score.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.score.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CamporiClubRequest $request)
    {
        $camporiClub = new CamporiClub($request->all());
        $camporiClub->user_id = Auth::id();
        $camporiClub->save();

        $request->session()->flash('status', trans('modal.saved_successfully'));

        return redirect('/admin/scores');
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
    public function edit(CamporiClub $score)
    {
        $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->sum('score_reached');
            
        $qualification = Qualification::find(1);
        $category = $score->category;
        //$maximum_score = $qualification->maximum_score;
        $requirementareas =  Requirementarea::all();
        $requirements_club = $score->requirements;
        return view('admin.score.create_edit',compact('score', 'requirementareas', 'requirements_club', 'qualification', 'total_score_reached', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  camporiclub  $camporiclub
     * @return \Illuminate\Http\Response
     */
    public function update(CamporiClubRequest $request, CamporiClub $camporiClub)
    {
        $camporiClub->user_id_edited = Auth::id();
        $camporiClub->update($request->all());

        $request->session()->flash('status', trans('modal.edited_successfully'));

        return redirect('/admin/scores');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  camporiclub  $camporiclub
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $qualification = Qualification::find(1);
        $requirement_score_Array = $request->all();
        $requirementareas =  Requirementarea::all();
        $campori_club_id = $requirement_score_Array['campori_club_id'];
        $score = CamporiClub::find((int)$campori_club_id);
        $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->sum('score_reached');
        $category = $score->category;

        if ((count($requirement_score_Array) > 1) && ($score != NULL)) {
            $requirementArray = $requirement_score_Array['requirement_id'];
            $scoresArray = $requirement_score_Array['scores'];
            $observationsArray = $requirement_score_Array['observations'];
            $score_index = 0;
            foreach ($requirementArray as $requirement_id) {
                $requirement = Requirement::find((int)$requirement_id);

                $score->requirements()->detach($requirement_id);

                $score->requirements()->save($requirement, [
                    'score_reached' => $scoresArray[$score_index],
                    'observations' => $observationsArray[$score_index],
                    'user_id' => Auth::id(),
                    'requirement_area_id' => $requirement->requirementarea->id,
                ]);
                $score_index++;
            }  
          
            $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->sum('score_reached');
            
            $qualification_current = Qualification::where('initial_score', '<=', $total_score_reached)->where('final_score', '>=', $total_score_reached)->firstOrFail();
            if ($qualification_current != NULL) {
                $score->category = $qualification_current->category;
                $category = $qualification_current->category;
            }

            /*if ($total_score_reached <= 74000) {
                $qualification_current = Qualification::where('initial_score', '<=', $total_score_reached)->where('final_score', '>=', $total_score_reached)->firstOrFail();
            } elseif ($total_score_reached > 74000) {
                $score->category = 'Cinco estrellas';
            }*/

            $score->total_score = $total_score_reached;
            $score->user_id_edited = Auth::id();
            $score->update();
            $request->session()->flash('status', '¡Los puntajes fueron guardados exitosamente!');
            //$request->session()->flash('error', '¡Existe un error al momento de guardar los puntajes!');

            $requirements_club = $score->requirements;
            //return redirect('/admin/scores');
            return view('admin.score.create_edit',compact('score', 'requirementareas', 'requirements_club', 'qualification', 'total_score_reached', 'category'));
        } else {
            //return view('admin.score.create_edit',compact('score', 'requirementareas'));
            $request->session()->flash('error', '¡Existe un error al momento de guardar los puntajes!');

            $requirements_club = $score->requirements;

            return view('admin.score.create_edit',compact('score', 'requirementareas', 'requirements_club', 'qualification', 'total_score_reached', 'category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  camporiclub  $camporiclub
     * @return \Illuminate\Http\Response
     */
    public function saveclose(Request $request)
    {
        $qualification = Qualification::find(1);
        $requirement_score_Array = $request->all();
        $requirementareas =  Requirementarea::all();
        $campori_club_id = $requirement_score_Array['campori_club_id'];
        $score = CamporiClub::find((int)$campori_club_id);
        $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->sum('score_reached');
        $category = $score->category;

        if ((count($requirement_score_Array) > 1) && ($score != NULL)) {
            $requirementArray = $requirement_score_Array['requirement_id'];
            $scoresArray = $requirement_score_Array['scores'];
            $observationsArray = $requirement_score_Array['observations'];
            $score_index = 0;
            foreach ($requirementArray as $requirement_id) {
                $requirement = Requirement::find((int)$requirement_id);

                $score->requirements()->detach($requirement_id);

                $score->requirements()->save($requirement, [
                    'score_reached' => $scoresArray[$score_index],
                    'observations' => $observationsArray[$score_index],
                    'user_id' => Auth::id(),
                    'requirement_area_id' => $requirement->requirementarea->id,
                ]);
                $score_index++;
            }  
          
            $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->sum('score_reached');
            
            $qualification_current = Qualification::where('initial_score', '<=', $total_score_reached)->where('final_score', '>=', $total_score_reached)->firstOrFail();
            if ($qualification_current != NULL) {
                $score->category = $qualification_current->category;
            }

            $score->total_score = $total_score_reached;
            $score->user_id_edited = Auth::id();
            $score->update();
            $request->session()->flash('status', '¡Los puntajes fueron guardados exitosamente!');

            $requirements_club = $score->requirements;

            return redirect('/admin/scores');
            //return view('admin.score.create_edit',compact('score', 'requirementareas', 'requirements_club'));
        } else {
            //return view('admin.score.create_edit',compact('score', 'requirementareas'));
            $request->session()->flash('error', '¡Existe un error al momento de guardar los puntajes!');

            $requirements_club = $score->requirements;
            return view('admin.score.create_edit',compact('score', 'requirementareas', 'requirements_club', 'qualification', 'total_score_reached', 'category'));
        }
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

    /**
     * Remove the specified camporiclub from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function remove($id)
    {
        $camporiClub = CamporiClub::find($id);
        $message = trans('admin/camporiclub.camporiclub').': <b>'.$camporiclub->name.'</b> '.trans('words.removed');
        $camporiClub->delete();
        return array('message' => $message);
    }
   
    /**
     * Show a list of all the camporiclubs posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $camporiClubs = CamporiClub::whereNull('campori_clubs.deleted_at')
            ->select(array('campori_clubs.id', 'campori_clubs.name', 'campori_clubs.district', 'campori_clubs.region','campori_clubs.total_score', 'campori_clubs.category'));
        return Datatables::of($camporiClubs)
            ->add_column('actions', '')
            ->make();
    }
}