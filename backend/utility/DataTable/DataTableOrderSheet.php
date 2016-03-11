<?php
namespace backend\utility\DataTable;

use backend\models\OrderSheet;

class DataTableOrderSheet extends DataTable
{
    private function getColumn()
    {
        switch ($this->column) {
            case 1:
                $field = 'code';
                break;
            case 2:
                $field = 'country.name';
                break;
            default:
                $field = 'code';
                break;
        }
        return $field;
    }

    public function getData()
    {
        $order_sheets = $this->getModels();
        $dataArray = [];
        foreach ($order_sheets as $order_sheet) {
        	// trước thuế
        	$beforeTax = "";
            foreach ($order_sheet->orderSheetDetails as $c) {
                if($c->is_delete == 0){
                    $beforeTax += $c->total_price;
                }
            }
            //end


            $tempArray = array();

            $tempArray[] = '<input class="ace cb_order_sheet" type="checkbox" id="' . $order_sheet->id . '"/>';
            $tempArray[] = $order_sheet->code;
            $tempArray[] = $order_sheet->country->name;
            $tempArray[] = date('d-m-Y',$order_sheet->order_date);
            $tempArray[] = date('d-m-Y',$order_sheet->delivery_date);
            $tempArray[] = $order_sheet->customer->name;
            $tempArray[] = $beforeTax;
            $tempArray[] = $order_sheet->total_price;
            $tempArray[] = 'load auto';
            $htmlAction = '<td class="center">';
            $htmlAction .= '<button class="btn btn-gold" type="button" onclick="viewOrderSheet('.$order_sheet->id.')">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </button>&nbsp;';
            $htmlAction .= '<button class="btn btn-success" type="button" onclick="updateOrderSheet('.$order_sheet->id.')">
                                <i class="glyphicon glyphicon-edit"></i>
                            </button>&nbsp;';
            $htmlAction .= '<button class="btn btn-danger" type="button" onclick="deleteOrderSheet('.$order_sheet->id.')">
                                 <i class="glyphicon glyphicon-trash"></i>
                            </button>&nbsp;';
            $htmlAction .= '</td>';
            $tempArray[] = $htmlAction;
            $dataArray[] = $tempArray;
        }
        return $dataArray;
    }

    private function getModels()
    {
        $column = $this->getColumn();
        $srderSheets = OrderSheet::find()
            ->where(['is_delete' => 0]);

        $this->totalRecords = $srderSheets->count();

        $srderSheets = $srderSheets
            ->with('country')
            ->andFilterWhere(['or', ['like', 'name', $this->searchValue]])
            ->limit($this->length)
            ->offset($this->start)
            ->orderBy([$column => $this->direction])
            ->all();
        return $srderSheets;
    }
}

?>
