<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTablesEditor;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.matters.read');
    }

    public function store(UsersDataTablesEditor $editor)
    {
        return $editor->process(request());
    }
}
