<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Color extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = 0) {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        $data['title'] = $this->lang->line('title-color');
        $data['colors'] = $this->colors->getColor(0);
        $data['page'] = rest_path('color/view_color');
        $this->load->view('index', $data);
    }

    public function addNewColor() {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        $data['color_row_id'] = $_POST['id'];
        $data['colors'] = $this->colors->getColor(0);
        $this->load->view('restaurant/color/addNewColor', $data);
    }

    public function save_color() {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        if (isset($_POST['color_validation'])) {
            $counter = (count($_POST) - 1) / 2;
            $dataArray = array();
            for ($i = 1; $i <= $counter; $i++) {
                $ar_name = $_POST['ar_name_' . $i];
                $en_name = $_POST['en_name_' . $i];
                $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name);
                array_push($dataArray, $sub_array);
            }
            $this->colors->saveColor($dataArray);
            redirect(rest_path('Color'));
        }
    }

    // function to update color 
    public function update_color() {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        $color_id = $_GET['id'];
        $data['color'] = $this->colors->get_color_by_id($color_id);
        $this->load->view('restaurant/color/update_color_modal', $data);


        if (isset($_POST['update_color'])) {
            $colorArray = Array(
                'ar_name' => $this->input->post('color_ar_name'),
                'en_name' => $this->input->post('color_en_name'),
            );
            $this->colors->updatColorData($color_id, $colorArray);
            redirect(rest_path('Color'));
        }
    }

    // function to delete color whether delete items that depends on color or delete color only
    public function delete_color() {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        $color_id = $_GET['id'];
        $data['colorItems'] = $this->colors->get_color_by_id($color_id);
        $this->load->view('restaurant/color/color_delete_modal', $data);
        if (isset($_POST['delete_color'])) {
            if (isset($_POST['color'])) {
                $this->colors->deleteColorByColorId($color_id);
                $this->colors->deleteColorItems($color_id);
                redirect(rest_path('Color'));
            } else {
                $this->colors->deleteColorByColorId($color_id);
                $this->db->colors->updateItemsColorToDefault($color_id);
                redirect(rest_path('Color'));
            }
        }
    }

    public function download_color_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'arabic_name');
        $sheet->setCellValue('B1', 'english_name');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_color_template.Xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    public function upload_color_excel() {
        $data = array();
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {
            
        } else {
            if (!empty($_FILES['fileURL']['name'])) {
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('arabic_name', 'english_name');
                $makeArray = array('arabic_name' => 'arabic_name', 'english_name' => 'english_name');
                $SheetDataKey = array();
                $mydata = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $ar_name = $SheetDataKey['arabic_name'];
                        $en_name = $SheetDataKey['english_name'];

                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $fetchData = array('arabic_name' => $ar_name, 'english_name' => $en_name);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }
                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('title-color');
                $data['page'] = rest_path('color/dispaly_color_excel');
                $this->load->view('index', $data);
            }
        }
    }

    public function checkFileValidation($string) {
        $file_mimes = array('text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_correct_file'));
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', $this->lang->line('excel_choose_file'));
            return false;
        }
    }

    public function insert_color_excel() {
        $this->load->model(rest_path('main/Color_crud'), 'colors');
        $counter = $_POST['color_excel_form_number'];
        $data = array();
        for ($i = 0; $i < $counter; $i++) {
            $ar_name = $_POST['ar_name_' . $i];
            $en_name = $_POST['en_name_' . $i];

            $sub_array = array('ar_name' => $ar_name, 'en_name' => $en_name);
            array_push($data, $sub_array);
        }

        $this->colors->saveColor($data);
        redirect(rest_path('Color'));
    }

}
