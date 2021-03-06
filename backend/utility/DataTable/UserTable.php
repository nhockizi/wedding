<?php
    namespace backend\utility\DataTable;
    use backend\models\User;
    use backend\models\Employee;
    class UserTable extends DataTable
    {
        private function getColumn()
        {
            switch ($this->column) {
                default:
                    $field = 'user.id';
                break;
            }
            return $field;
        }
        public function getData()
        {
            $sql = $this->getModels();
            $dataArray = [];
            foreach ($sql as $data) {
                $arr_data = array();
                $arr_data[] = '<td><input class="ace cb_customer" type="checkbox"></td>';
                $arr_data[] = $data->employee->full_name;
                $arr_data[] = $data->user_name;
                $arr_data[] = $data->employee->email;
                $arr_data[] = $data->employee->phone;
                $arr_data[] = $data->employee->address;
                $arr_data[] = 'Chua cap nhat';
                $html_action = '<button class="btn btn-gold" type="button">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </button>&nbsp;';
                $html_action .= '<button class="btn btn-success" type="button">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </button>&nbsp;';
                $html_action .= '<button class="btn btn-danger" type="button">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>';
                $arr_data[] = $html_action;
                $dataArray[] = $arr_data;
            }
            return $dataArray;
        }
        private function getModels()
        {
            $column = $this->getColumn();
            $sql = User::find()->joinWith('employee')->where(['user.is_admin'=>0,'employee.is_delete'=>0]);
            $this->totalRecords = $sql->count();
            $sql = $sql
                ->andFilterWhere(['or',
                                    ['like', 'employee.full_name', $this->searchValue],
                                    ['like', 'user.user_name', $this->searchValue]
                                ])
                ->limit($this->length)
                ->offset($this->start)
                ->orderBy([$column => $this->direction])
                ->all();
            return $sql;
        }
    }
?>