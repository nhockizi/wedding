<?php
namespace backend\utility\DataTable;

/**
 *
 */
class DataTable
{
    public $draw = 0;
    public $length = 0;
    public $start = 0;
    public $searchValue = '';
    public $column = 0;
    public $direction = SORT_DESC;
    public $totalRecords = 0;

    public function __construct($argument)
    {
        $this->draw = $argument['draw'];
        $this->length = $argument['length'];
        $this->start = $argument['start'];
        $this->searchValue = $argument['search']['value'];
        $this->column = $argument['order'][0]['column'];
        if ($argument['order'][0]['dir'] == 'asc') {
            $this->direction = SORT_ASC;
        }
    }
}

?>