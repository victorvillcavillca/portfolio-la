<?php

namespace App\DataTables;

use App\Management;
use Yajra\DataTables\Services\DataTable;

class ManagementsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // return datatables($query)
        //     ->addColumn('action', 'managements.action');

        return datatables($query)->setRowId('id')
            ->addColumn('btn', 'admin.managements.partials.actions')
            ->editColumn('status', 'admin.managements.datatables.status')
            ->rawColumns(['status','btn']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Management $model)
    {
        // return $model->newQuery()->select('id', 'name', 'email');
        return $model->newQuery()->select('id', 'name', 'status', 'created_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        // return $this->builder()
        //             ->columns($this->getColumns())
        //             ->minifiedAjax()
        //             ->addAction(['width' => '80px'])
        //             ->parameters($this->getBuilderParameters());

        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'order' => [1, 'asc'],
                        'select' => [
                            'style' => 'os',
                            'selector' => 'td:first-child',
                        ],
                        'buttons' => [
                            ['extend' => 'create', 'editor' => 'editor'],
                            ['extend' => 'edit', 'editor' => 'editor'],
                            ['extend' => 'remove', 'editor' => 'editor'],
                        ]
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        // return [
        //     'id',
        //     'add your columns',
        //     'created_at',
        //     'updated_at'
        // ];

        return [
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false
            ],
            'id',
            'name',
            'status',
            'created_at',
            'btn',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Managements_' . date('YmdHis');
    }
}
