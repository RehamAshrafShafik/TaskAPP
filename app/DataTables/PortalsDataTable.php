<?php

namespace App\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
// Models
use App\Models\Portal;
class PortalsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row){return '
                <a href="portals/'.$row->id.'" class="btn btn-sm btn-clean btn-icon mr-2"><span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                            <rect x="0" y="0" width="24" height="24"></rect>	                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>	                                        </g>	                                    </svg>	                                </span>	                            </a>
                <a href="portals/'.$row->id.'/edit" class="btn btn-sm btn-clean btn-icon mr-2"> <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	 <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path><rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect></g></svg> </span>	</a>
                ';})
            ->rawColumns(['action'])
            ->setRowClass('sorting_1')
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PortalsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Portal $model)
    {
        return $model->newQuery();
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
            // ->addAction(['width' => '80px'])
            ->parameters([
                'lengthMenu' => [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                'dom' => 'Bfrtip',
                'order' => [[0, 'desc']],
                'buttons' => [
                    'pageLength',
                    ['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> ' . trans("dataTable.create"),],
                    //['extend' => 'export', 'text' => '<i class="fa fa-save"></i> '.trans("dataTable.export"),],
                    ['extend' => 'reload', 'text' => '<i class="fa fa-sync"></i> ' . trans("dataTable.reload"),],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-cog"></i> ' . trans("dataTable.reset"),],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> ' . trans("dataTable.print"),],
                    ['extend' => 'excel', 'text' => '<i class="fas fa-file-excel"></i> excel'],
                    ['extend' => 'csv', 'text' => '<i class="fas fa-file-csv"></i> csv'],
                ],
                'language' => [
                    "sProcessing" => trans("dataTable.sProcessing"),
                    "sLengthMenu" => trans("dataTable.sLengthMenu"),
                    "sZeroRecords" => trans("dataTable.sZeroRecords"),
                    "sEmptyTable" => trans("dataTable.sEmptyTable"),
                    "sInfo" => trans("dataTable.sInfo"),
                    "sInfoEmpty" => trans("dataTable.sInfoEmpty"),
                    "sInfoFiltered" => trans("dataTable.dataTable"),
                    "sInfoPostFix" => "",
                    "sSearch" => trans("dataTable.sSearch"),
                    "sUrl" => trans("dataTable.sUrl"),
                    "sInfoThousands" => trans("dataTable.sInfoThousands"),
                    "sLoadingRecords" => trans("dataTable.sLoadingRecords"),
                    "oPaginate" => [
                        "sFirst" => trans("dataTable.sFirst"),
                        "sLast" => trans("dataTable.sLast"),
                        "sNext" => trans("dataTable.sNext"),
                        "sPrevious" => trans("dataTable.sPrevious"),
                    ],
                    "oAria" => [
                        "sSortAscending" => trans("dataTable.sSortAscending"),
                        "sSortDescending" => trans("dataTable.sSortDescending"),
                    ],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            str_replace(' ', '_', trans("dashboard.ID")) => ['data'=>'id','name'=>'id','searchable'=>false],
            str_replace(' ', '_', trans("dashboard.Title")) => ['data'=>'title','name'=>'title'],
            str_replace(' ', '_', trans("dashboard.Description"))  => ['data'=>'description','name'=>'description'],
            str_replace(' ', '_', trans("dashboard.Type"))  => ['data'=>'type','name'=>'type'],
            str_replace(' ', '_', trans("dashboard.Action")) => ['data'=>'action','name'=>'action','searchable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Portals_' . date('YmdHis');
    }
}
