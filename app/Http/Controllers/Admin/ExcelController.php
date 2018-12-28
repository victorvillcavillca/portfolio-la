<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\CamporiClub;
use App\Expense;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends AdminController
{
    public function __construct()
    {
        view()->share('type', 'excel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scoreclubs(Request $request)
    {
         $start_date = $request->input('sd');
        $end_date = $request->input('ed');

        //die($_GET['sd']);
        //var_dump($_GET['sd'])); exit();
        if((isset($_GET['sd']) && $_GET['sd'] != '') && (isset($_GET['ed']) && $_GET['ed'] != '')) {
            $start_date = $_GET['sd'];
            $end_date = $_GET['ed'];
        } else {
            Excel::create('puntaje_clubes_campori_mob'.date('Ymd-His'), function($excel) {
                $excel->sheet('Puntajes Clubes Campori MOB', function($sheet) {
                    /*$bath_incomes = CamporiClub::whereNull('campori_clubs.deleted_at')
                        ->select(array('campori_clubs.id', 'campori_clubs.code', 'campori_clubs.name', 'campori_clubs.church', 'campori_clubs.district', 'campori_clubs.region' ,'campori_clubs.total_score', 'campori_clubs.category', 'campori_clubs.payment', 'campori_clubs.inscribed', 'campori_clubs.support'))->get()->toArray();*/

                    $bath_incomes = CamporiClub::whereNull('campori_clubs.deleted_at')
                        ->select(array('campori_clubs.id', 'campori_clubs.code', 'campori_clubs.name', 'campori_clubs.church', 'campori_clubs.district', 'campori_clubs.region' ,'campori_clubs.total_score', 'campori_clubs.category'))->get()->toArray();

                    $sheet->setOrientation('landscape');
                    //$sheet->setPageMargin(0.25);
                    
                    //$sheet->row(1, ['A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1', 'I1', 'J1', 'K1']); 
                    $sheet->row(1, ['A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1']); 
                    $sheet->row(1, function($row) {
                        $row->setBackground('#4472C4');
                        $row->setFontColor('#ffffff');
                        $row->setFontWeight('bold');
                    });

                    $sheet->fromArray($bath_incomes);

                    //$sheet->setAllBorders('thin');

                    $sheet->cell('A1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.id'));
                    });
                    $sheet->cell('B1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.code'));
                    });
                    $sheet->cell('C1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.name'));
                    });
                    $sheet->cell('D1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.church'));
                    });
                    $sheet->cell('E1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.district'));
                    });
                    $sheet->cell('F1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.region'));
                    });
                    $sheet->cell('G1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.total_score'));
                    });
                    $sheet->cell('H1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.category'));
                    });
                    /*$sheet->cell('I1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.payment'));
                    });
                    $sheet->cell('J1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.inscribed'));
                    });
                    $sheet->cell('K1', function($cell) {
                        $cell->setValue(trans('admin/camporiclub.support'));
                    });*/
                });
            })->export('xls');
        }
    }

    /**
     * Generate a list expenses at format Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function expenses(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $total = 0;

        Excel::create('registro_gastos_articulos_'.date('Ymd-His'), function($excel) use($start_date, $end_date){
            $excel->sheet('Registro Gastos', function($sheet) use($start_date, $end_date){
                
                if ($start_date == NULL && $end_date == NULL) {
                    $expenses = Expense::whereNull('expenses.deleted_at')
                        ->select(array('expenses.id', 'expenses.number', 'expenses.description', 'expenses.total', 'expenses.expense_date'))->get()->toArray();

                    $total = DB::table('expenses')->where('deleted_at', '=', NULL)->sum('total');
                } elseif ($start_date != NULL && $end_date == NULL) {
                    $expenses = Expense::whereNull('expenses.deleted_at')
                        ->where('expense_date', '>=', $start_date)
                        ->select(array('expenses.id', 'expenses.number', 'expenses.description', 'expenses.total', 'expenses.expense_date'))->get()->toArray();

                    $total = DB::table('expenses')->where('deleted_at', '=', NULL)->where('expense_date', '>=', $start_date)->sum('total');
                } elseif ($start_date == NULL && $end_date != NULL) {
                    $expenses = Expense::whereNull('expenses.deleted_at')
                        ->where('expense_date', '<=', $end_date)
                        ->select(array('expenses.id', 'expenses.number', 'expenses.description', 'expenses.total', 'expenses.expense_date'))->get()->toArray();

                    $total = DB::table('expenses')->where('deleted_at', '=', NULL)->where('expense_date', '<=', $end_date)->sum('total');
                } elseif ($start_date != NULL && $end_date != NULL) {
                    $expenses = Expense::whereNull('expenses.deleted_at')
                        ->where('expense_date', '>=', $start_date)
                        ->where('expense_date', '<=', $end_date)
                        ->select(array('expenses.id', 'expenses.number', 'expenses.description', 'expenses.total', 'expenses.expense_date'))->get()->toArray();

                    $total = DB::table('expenses')->where('deleted_at', '=', NULL)->where('expense_date', '>=', $start_date)->where('expense_date', '<=', $end_date)->sum('total');
                }

                $sheet->setOrientation('landscape');
                
                $sheet->row(1, ['A1', 'B1', 'C1', 'D1', 'E1']);
                $sheet->row(1, function($row) {
                    $row->setBackground('#4472C4');
                    $row->setFontColor('#ffffff');
                    $row->setFontWeight('bold');
                });

                array_push($expenses, array(
                    '', '', '', $total
                ));

                $sheet->fromArray($expenses);

                $sheet->cell('A1', function($cell) {
                    $cell->setValue('Id');
                });
                $sheet->cell('B1', function($cell) {
                    $cell->setValue(trans('admin/expense.number'));
                });
                $sheet->cell('C1', function($cell) {
                    $cell->setValue(trans('admin/expense.description'));
                });
                $sheet->cell('D1', function($cell) {
                    $cell->setValue(trans('admin/expense.total'));
                });
                $sheet->cell('E1', function($cell) {
                    $cell->setValue(trans('admin/expense.expense_date'));
                });
            });
        })->export('xls');
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
