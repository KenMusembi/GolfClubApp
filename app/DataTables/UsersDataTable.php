<?php

namespace App\DataTables;

use App\User;
use App\Clubs;
use App\ClubsRegistration;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;
class UsersDataTable extends DataTable
{
protected $actions = ['print', 'excel', 'myCustomAction'];
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)->setRowId('id')->addColumn('password', '');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'name', 'email');

    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([

                        'dom' => 'Bfrtip',
                        'buttons'      => ['print', 'excel', 'myCustomAction'],
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
                    ])
                    ->addColumn('action', function($arrProduct){
          return
              '<center><a class="btn btn-success btn-sm"  href="'.route('packaging.edit',['id' => $arrProduct['id'], 'product_id'=> $arrProduct['product_id']]).'">
                  <i class="fa fa-refresh"></i>&nbsp;Proses</a></center>';
        })
        ->rawColumns(['action'])
         ->make(true)
                    ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
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
            'email',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . time();
    }

    public function myCustomAction()
    {
      echo "click";
      return "id";
    }
}
