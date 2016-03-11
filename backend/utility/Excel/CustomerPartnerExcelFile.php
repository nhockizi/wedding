<?php
/**
 * Created by PhpStorm.
 * User: Team
 * Date: 2/25/2016
 * Time: 1:46 PM
 */

namespace backend\utility\Excel;


use backend\models\CustomerPartner;
use Yii;
use yii\db\Exception;

class CustomerPartnerExcelFile extends ExcelFileInfo implements IExcelFile
{
    private $type;

    public function __construct($params, $files, $type)
    {
        parent::__construct($files);
        $this->getFileColumn($params);
        $this->row_begin = $params['row_header'] + 1;
        $this->sheetData($params['sheet_name']);
        $this->option = $params['option'];
        $this->type = $type;
        $this->restrictColumn = $params['restrict_column'];
        $this->type = $type == 1 ? 'Bên nhận hàng' : 'Bên giao hàng';
    }

    public function getFileColumn($params)
    {
        $name = strtoupper($params['name_column']);
        $website = strtoupper($params['website_column']);
        $address = strtoupper($params['address_column']);
        $fax = strtoupper($params['fax_column']);
        $code = strtoupper($params['post_code_column']);
        $phone = strtoupper($params['phone_column']);
        $this->columns = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'code' => $code,
            'fax' => $fax,
            'website' => $website,
        ];
    }

    public function importData()
    {
        $sheetData = $this->data;
        $rowBegin = $this->row_begin;
        $option = $this->option;
        $columns = $this->columns;
        $restrictColumn = $this->restrictColumn;
        $count = count($sheetData);
        //1: đè lại dữ liệu cũ, 0: ghi thêm
        for (; $rowBegin <= $count; $rowBegin++) {
            $customerPartner = CustomerPartner::find()
                ->where([
                    'is_delete' => 0,
                    $restrictColumn => $sheetData[$rowBegin][$columns[$restrictColumn]]
                ])
                ->one();
            $customerPartner = ($customerPartner !== null && $option == 1) ? $customerPartner : new CustomerPartner();
            $customerPartner->phone = $sheetData[$rowBegin][$columns['phone']];
            $customerPartner->name = $sheetData[$rowBegin][$columns['name']];
            $customerPartner->website = (!empty($sheetData[$rowBegin][$columns['website']])) ? $sheetData[$rowBegin][$columns['website']] : '';
            $customerPartner->address = (!empty($sheetData[$rowBegin][$columns['address']])) ? $sheetData[$rowBegin][$columns['address']] : '';
            $customerPartner->fax = (!empty($sheetData[$rowBegin][$columns['fax']])) ? $sheetData[$rowBegin][$columns['fax']] : '';
            $customerPartner->code = (!empty($sheetData[$rowBegin][$columns['code']])) ? $sheetData[$rowBegin][$columns['code']] : '';
            $customerPartner->type = $this->type;
            $customerPartner->created_user = Yii::$app->user->id;
            try {
                $customerPartner->save(false);
                $this->success++;
            } catch (Exception $e) {
                $this->error++;
                array_merge($this->exceptions, ['row' => $rowBegin, 'message' => $e->getName()]);
            }
        }
    }
}