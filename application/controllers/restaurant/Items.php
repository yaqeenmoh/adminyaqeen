<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(rest_path('main/Items_crud'));
        $this->load->model(rest_path('items/Items_model'));
        $this->load->model(rest_path('main/Category_crud'));
        $this->load->model(rest_path('main/Sub_category_crud'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_items');
        $data['page'] = rest_path('items/view_items');
        $data['brand'] = $this->get_brand();
        $data['supplier'] = $this->get_supplier();
        $data['get_category'] = $this->get_category();
        $data['sub_category_information'] = $this->get_sub_category();
        $data['get_branch_location'] = $this->get_branch_location();
        $data['get_size'] = $this->get_size();
        $data['get_color'] = $this->get_color();
        $data['get_item_type'] = $this->get_item_type();
        $data['get_item_information'] = $this->get_item_information();
        $this->load->view('index', $data);
    }

    //function to get brand 
    public function get_brand() {
        $data['brand'] = $this->Items_crud->get_brand();
        return $data['brand'];
    }

    //function to get supplier
    public function get_supplier() {
        $data['supplier'] = $this->Items_crud->get_supplier();
        return $data['supplier'];
    }

    //function to get category 
    public function get_category() {
        $data['get_category'] = $this->Category_crud->get_category();
        return $data['get_category'];
    }

    //function to get sub_category
    public function get_sub_category() {
        $data['sub_category_information'] = $this->Sub_category_crud->get_sub_category();
        return $data['sub_category_information'];
    }

    //function to get branch and location
    public function get_branch_location() {
        $data['get_branch_location'] = $this->Items_model->get_branch_location();
        return $data['get_branch_location'];
    }

    //function to get size 
    public function get_size() {
        $data['get_size'] = $this->Items_crud->get_size();
        return $data['get_size'];
    }

    //function to get color 
    public function get_color() {
        $data['get_color'] = $this->Items_crud->get_color();
        return $data['get_color'];
    }

    //function to get item type 
    public function get_item_type() {
        $data['get_item_type'] = $this->Items_crud->get_item_type();
        return $data['get_item_type'];
    }

    public function insert_items_information() {

        $ar_name = $_POST['items_ar_name'];
        $en_name = $_POST['items_en_name'];
        $details = $_POST['items_details'];
        $barcode = $_POST['items_barcode'];
        $invoice_number = $_POST['items_invoice_number'];
        $item_number = $_POST['items_item_number'];
        $tax = $_POST['items_tax'];
        $tax_2 = $_POST['items_tax_2'];
        $tax_3 = $_POST['items_tax_3'];

        if ($_POST['items_size'] == 0) {
            $size = NULL;
        } else {
            $size = $_POST['items_size'];
        }

        if ($_POST['items_color'] == 0) {
            $color = NULL;
        } else {
            $color = $_POST['items_color'];
        }

        $weight = $_POST['items_weight'];

        if ($_POST['items_brand'] == 0) {
            $brand = NULL;
        } else {
            $brand = $_POST['items_brand'];
        }

        $expiry_date = $_POST['items_expiry_date'];
        $cost_price = $_POST['items_cost_price'];
        $sale_price = $_POST['items_sale_price'];
        $whole_price = $_POST['items_whole_price'];
        $max_discount = $_POST['items_max_discount'];
        $discount = $_POST['items_discount'];
        $discount_statuts = $_POST['items_discount_status'];
        $qty = $_POST['items_qty'];
        $bg_color = $_POST['items_bg_color'];

        if (isset($_POST['items_custom'])) {
            $custom = $_POST['items_custom'];
        } else {
            $custom = 0;
        }

        if ($_POST['items_supplier'] == 0) {
            $supplier = NULL;
        } else {
            $supplier = $_POST['items_supplier'];
        }

        $category = $_POST['items_category'];

        if ($_POST['items_sub_category'] == 0) {
            $sub_category = NULL;
        } else {
            $sub_category = $_POST['items_sub_category'];
        }

        if ($_POST['items_type'] == 0) {
            $item_type = NULL;
        } else {
            $item_type = $_POST['items_type'];
        }



        if (isset($_POST['items_multi_category'])) {
            $multi = $_POST['items_multi_category'];
            $multi_category = json_encode($multi);
        } else {
            $multi_category = NULL;
        }

        $config['upload_path'] = "assets/lib/images/items/";
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        $image = $_FILES['items_image']['name'];
        $this->upload->initialize($config);


        if (!$this->upload->do_upload('items_image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $success = array('image_metadata' => $this->upload->data());
        }

        if (!isset($_POST['items_branch_location'])) {
            $branch_location = NULL;
            $this->Items_crud->insert_items_information($ar_name, $en_name, $details, $barcode, $invoice_number, $item_number, $tax, $tax_2, $tax_3, $size, $color, $weight, $brand, $expiry_date, $cost_price, $sale_price, $whole_price, $max_discount, $discount, $discount_statuts, $qty, $custom, $supplier, $category, $sub_category, $branch_location, $item_type, $image, $bg_color, $multi_category);
            redirect(rest_path('Items'));
        } else {
            $branch_location_id = $_POST['items_branch_location'];
            foreach ($branch_location_id as $key => $value) {
                $branch_location = $value;
                $this->Items_crud->insert_items_information($ar_name, $en_name, $details, $barcode, $invoice_number, $item_number, $tax, $tax_2, $tax_3, $size, $color, $weight, $brand, $expiry_date, $cost_price, $sale_price, $whole_price, $max_discount, $discount, $discount_statuts, $qty, $custom, $supplier, $category, $sub_category, $branch_location, $item_type, $image, $bg_color, $multi_category);
            }

            redirect(rest_path('Items'));
        }
    }

    public function get_item_information() {
        $data['get_item_information'] = $this->Items_model->get_item_information();
        return $data['get_item_information'];
    }

    //function to update item information
    public function update_item_information() {
        $item_id = $_GET['item_info_id'];
        $data['brand'] = $this->get_brand();
        $data['get_item_type'] = $this->get_item_type();
        $data['get_size'] = $this->get_size();
        $data['get_color'] = $this->get_color();
        $data['supplier'] = $this->get_supplier();
        $data['get_category'] = $this->get_category();
        $data['sub_category_information'] = $this->get_sub_category();
        $data['get_branch_location'] = $this->get_branch_location();
        $data['get_item_by_id'] = $this->Items_model->get_item_information_by_id($item_id);
        $this->load->view('restaurant/items/update_item', $data);


        if (isset($_POST['edit_items'])) {

            if ($_POST['items_type'] == 0) {
                $type_id = NULL;
            } else {
                $type_id = $_POST['items_type'];
            }

            if (isset($_POST['items_branch_location'])) {
                $branch_location_id = $_POST['items_branch_location'];
            } else {
                $branch_location_id = Null;
            }

            if ($_POST['items_size'] == 0) {
                $size_id = NULL;
            } else {
                $size_id = $_POST['items_size'];
            }

            if ($_POST['items_color'] == 0) {
                $color_id = NULL;
            } else {
                $color_id = $_POST['items_color'];
            }

            if ($_POST['items_brand'] == 0) {
                $brand_id = NULL;
            } else {
                $brand_id = $_POST['items_brand'];
            }

            if ($_POST['items_supplier'] == 0) {
                $supplier_id = NULL;
            } else {
                $supplier_id = $_POST['items_supplier'];
            }

            if ($_POST['items_sub_category'] == 0) {
                $sub_category_id = NULL;
            } else {
                $sub_category_id = $_POST['items_sub_category'];
            }



            $imagename = $_FILES['items_image']['name'];
            if (!empty($imagename)) {

                $config['upload_path'] = "assets/lib/images/items/";
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('items_image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $success = array('image_metadata' => $this->upload->data());
                }

                $update_item_information = array(
                    'ar_name' => $_POST['items_ar_name'],
                    'en_name' => $_POST['items_en_name'],
                    'details' => $_POST['items_details'],
                    'barcode' => $_POST['items_barcode'],
                    'invoice_number' => $_POST['items_invoice_number'],
                    'item_number' => $_POST['items_item_number'],
                    'tax_1' => $_POST['items_tax'],
                    'type_id' => $type_id,
                    'image' => $imagename,
                );
                $this->Items_crud->update_item_infomation($item_id, $update_item_information);
            } else {
                $update_item_information = array(
                    'ar_name' => $_POST['items_ar_name'],
                    'en_name' => $_POST['items_en_name'],
                    'details' => $_POST['items_details'],
                    'barcode' => $_POST['items_barcode'],
                    'invoice_number' => $_POST['items_invoice_number'],
                    'item_number' => $_POST['items_item_number'],
                    'tax_1' => $_POST['items_tax'],
                    'type_id' => $type_id,
                    'image' => $_POST['image_default'],
                );
                $this->Items_crud->update_item_infomation($item_id, $update_item_information);
            }

            $update_items = array(
                'size_id' => $size_id,
                'color_id' => $color_id,
                'weight' => $_POST['items_weight'],
                'brand_id' => $brand_id,
                'expiry_date' => $_POST['items_expiry_date'],
                'cost_price' => $_POST['items_cost_price'],
                'sale_price' => $_POST['items_sale_price'],
                'whole_price' => $_POST['items_whole_price'],
                'supplier_id' => $supplier_id,
                'category_id' => $_POST['items_category'],
                'sub_category_id' => $sub_category_id,
                'max_discount' => $_POST['items_max_discount'],
                'discount' => $_POST['items_discount'],
                'discount_status' => $_POST['items_discount_status'],
                'qty' => $_POST['items_qty'],
                'branch_location_id' => $branch_location_id,
                'custom' => $_POST['items_custom'],
                'bg_color' => $_POST['items_bg_color']
            );
            $this->Items_crud->update_items($item_id, $update_items);
            redirect(rest_path('Items'));
        }
    }

//function to delete item
    public function delete_item() {
        $item_id = $_GET['item_info_id'];
        $data['get_items_item_info'] = $this->Items_model->get_items_and_item_information_by_id($item_id);
        $this->load->view('restaurant/items/delete_item', $data);

        if (isset($_POST['delete_item'])) {
            $this->Items_crud->delete_item_information($item_id);
            redirect(rest_path('Items'));
        }
    }

    //function to download excel template for items
    public function download_items_excel() {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ar_name');
        $sheet->setCellValue('B1', 'en_name');
        $sheet->setCellValue('C1', 'barcode');
        $sheet->setCellValue('D1', 'details');
        $sheet->setCellValue('E1', 'invoice_number');
        $sheet->setCellValue('F1', 'item_number');
        $sheet->setCellValue('G1', 'tax_1');
        $sheet->setCellValue('H1', 'tax_2');
        $sheet->setCellValue('I1', 'tax_3');
        $sheet->setCellValue('J1', 'weight');
        $sheet->setCellValue('K1', 'cost_price');
        $sheet->setCellValue('L1', 'sale_price');
        $sheet->setCellValue('M1', 'whole_price');
        $sheet->setCellValue('N1', 'max_discount');
        $sheet->setCellValue('O1', 'discount');
        $sheet->setCellValue('P1', 'discount_status');
        $sheet->setCellValue('Q1', 'qty');

        $writer = new Xlsx($spreadsheet);

        $filename = 'add_item_template';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer->save('php://output');
    }

    //function to show excel data into table 
    public function upload_items_excel() {
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
                $createArray = array('ar_name', 'en_name', 'barcode', 'details', 'invoice_number', 'item_number', 'tax_1', 'tax_2', 'tax_3', 'weight', 'cost_price', 'sale_price', 'whole_price', 'max_discount', 'discount', 'discount_status', 'qty');
                $makeArray = array('ar_name' => 'ar_name', 'en_name' => 'en_name', 'barcode' => 'barcode', 'details' => 'details', 'invoice_number' => 'invoice_number', 'item_number' => 'item_number', 'tax_1' => 'tax_1', 'tax_2' => 'tax_2', 'tax_3' => 'tax_3', 'weight' => 'weight', 'cost_price' => 'cost_price', 'sale_price' => 'sale_price', 'whole_price' => 'whole_price', 'max_discount' => 'max_discount', 'discount' => 'discount', 'discount_status' => 'discount_status', 'qty' => 'qty');
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
                        $ar_name = $SheetDataKey['ar_name'];
                        $en_name = $SheetDataKey['en_name'];
                        $barcode = $SheetDataKey['barcode'];
                        $details = $SheetDataKey['details'];
                        $invoice_number = $SheetDataKey['invoice_number'];
                        $item_number = $SheetDataKey['item_number'];
                        $tax_1 = $SheetDataKey['tax_1'];
                        $tax_2 = $SheetDataKey['tax_2'];
                        $tax_3 = $SheetDataKey['tax_3'];
                        $weight = $SheetDataKey['weight'];
                        $cost_price = $SheetDataKey['cost_price'];
                        $sale_price = $SheetDataKey['sale_price'];
                        $whole_price = $SheetDataKey['whole_price'];
                        $max_discount = $SheetDataKey['max_discount'];
                        $discount = $SheetDataKey['discount'];
                        $discount_status = $SheetDataKey['discount_status'];
                        $qty = $SheetDataKey['qty'];


                        $ar_name = filter_var(trim($allDataInSheet[$i][$ar_name]), FILTER_SANITIZE_STRING);
                        $en_name = filter_var(trim($allDataInSheet[$i][$en_name]), FILTER_SANITIZE_STRING);
                        $barcode = filter_var(trim($allDataInSheet[$i][$barcode]), FILTER_SANITIZE_STRING);
                        $details = filter_var(trim($allDataInSheet[$i][$details]), FILTER_SANITIZE_STRING);
                        $invoice_number = filter_var(trim($allDataInSheet[$i][$invoice_number]), FILTER_SANITIZE_STRING);
                        $item_number = filter_var(trim($allDataInSheet[$i][$item_number]), FILTER_SANITIZE_STRING);
                        $tax_1 = filter_var(trim($allDataInSheet[$i][$tax_1]), FILTER_SANITIZE_STRING);
                        $tax_2 = filter_var(trim($allDataInSheet[$i][$tax_2]), FILTER_SANITIZE_STRING);
                        $tax_3 = filter_var(trim($allDataInSheet[$i][$tax_3]), FILTER_SANITIZE_STRING);
                        $weight = filter_var(trim($allDataInSheet[$i][$weight]), FILTER_SANITIZE_STRING);
                        $cost_price = filter_var(trim($allDataInSheet[$i][$cost_price]), FILTER_SANITIZE_STRING);
                        $sale_price = filter_var(trim($allDataInSheet[$i][$sale_price]), FILTER_SANITIZE_STRING);
                        $whole_price = filter_var(trim($allDataInSheet[$i][$whole_price]), FILTER_SANITIZE_STRING);
                        $max_discount = filter_var(trim($allDataInSheet[$i][$max_discount]), FILTER_SANITIZE_STRING);
                        $discount = filter_var(trim($allDataInSheet[$i][$discount]), FILTER_SANITIZE_STRING);
                        $discount_status = filter_var(trim($allDataInSheet[$i][$discount_status]), FILTER_SANITIZE_STRING);
                        $qty = filter_var(trim($allDataInSheet[$i][$qty]), FILTER_SANITIZE_STRING);

                        $fetchData = array('ar_name' => $ar_name, 'en_name' => $en_name, 'barcode' => $barcode, 'details' => $details, 'invoice_number' => $invoice_number, 'item_number' => $item_number, 'tax_1' => $tax_1, 'tax_2' => $tax_2, 'tax_3' => $tax_3, 'weight' => $weight, 'cost_price' => $cost_price, 'sale_price' => $sale_price, 'whole_price' => $whole_price, 'max_discount' => $max_discount, 'discount' => $discount, 'discount_status' => $discount_status, 'qty' => $qty);
                        $data['dataInfo'] = $fetchData;
                        array_push($mydata, $fetchData);
                    }
                }

                $data['mydata'] = $mydata;
                $data['title'] = $this->lang->line('admin_items');
                $data['page'] = rest_path('items/display_items_excel');
                $data['brand'] = $this->get_brand();
                $data['supplier'] = $this->get_supplier();
                $data['get_category'] = $this->get_category();
                $data['sub_category_information'] = $this->get_sub_category();
                $data['get_branch_location'] = $this->get_branch_location();
                $data['get_size'] = $this->get_size();
                $data['get_color'] = $this->get_color();
                $data['get_item_type'] = $this->get_item_type();
                $data['get_item_information'] = $this->get_item_information();
                $this->load->view('index', $data);
            }
        }
    }

    //function to check validation of excel extension
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
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    //function to insert excel data into database
    public function insert_item_excel() {

        $counter = count($_POST) / 31;
        for ($i = 0; $i < $counter; $i++) {

            $ar_name = $_POST['ar_name_' . $i];
            $en_name = $_POST['en_name_' . $i];
            $barcode = $_POST['barcode_' . $i];
            $details = $_POST['details_' . $i];


            $config['upload_path'] = "assets/lib/images/items/";
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            $image = $_FILES['image_' . $i]['name'];
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('image_' . $i)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $success = array('image_metadata' => $this->upload->data());
            }


            $invoice_number = $_POST['invoice_number_' . $i];

            if ($_POST['type_' . $i] == 0) {
                $type_id = NULL;
            } else {
                $type_id = $_POST['type_' . $i];
            }


            $item_number = $_POST['item_number_' . $i];
            $tax_1 = $_POST['tax_' . $i];
            $tax_2 = $_POST['tax_2_' . $i];
            $tax_3 = $_POST['tax_3_' . $i];

            if ($_POST['size_' . $i] == 0) {
                $size_id = NULL;
            } else {
                $size_id = $_POST['size_' . $i];
            }

            if ($_POST['color_' . $i] == 0) {
                $color_id = NULL;
            } else {
                $color_id = $_POST['color_' . $i];
            }

            $weight = $_POST['weight_' . $i];


            if ($_POST['brand_' . $i] == 0) {
                $brand_id = NULL;
            } else {
                $brand_id = $_POST['brand_' . $i];
            }

            $bg_color = $_POST['bg_color_' . $i];
            $expiry_date = $_POST['expiry_date_' . $i];
            $cost_price = $_POST['cost_price_' . $i];
            $sale_price = $_POST['sale_price_' . $i];
            $whole_price = $_POST['whole_price_' . $i];

            if ($_POST['supplier_' . $i] == 0) {
                $supplier_id = NULL;
            } else {
                $supplier_id = $_POST['supplier_' . $i];
            }

            $category_id = $_POST['category_' . $i];

            if ($_POST['sub_category_' . $i] == 0) {
                $sub_category_id = NULL;
            } else {
                $sub_category_id = $_POST['sub_category_' . $i];
            }

            if (isset($_POST['items_multi_category'])) {
                $multi = $_POST['items_multi_category'];
                $multi_category = json_encode($multi);
            } else {
                $multi_category = NULL;
            }


            $max_discount = $_POST['max_discount_' . $i];
            $discount = $_POST['discount_' . $i];
            $discount_statuts = $_POST['discount_status_' . $i];
            $qty = $_POST['qty_' . $i];

            if (isset($_POST['items_custom_' . $i])) {
                $custom = $_POST['items_custom_' . $i];
            } else {
                $custom = 0;
            }

            if (!isset($_POST['branch_location_' . $i])) {
                $branch_location_id = NULL;
                $this->Items_crud->insert_item_information_excel($ar_name, $en_name, $barcode, $details, $image, $invoice_number, $type_id, $item_number, $tax_1, $tax_2, $tax_3);
                $item_id = $this->db->insert_id();
                $this->Items_crud->insert_items_excel($item_id, $size_id, $color_id, $weight, $brand_id, $bg_color, $expiry_date, $cost_price, $sale_price, $whole_price, $supplier_id, $category_id, $sub_category_id, $max_discount, $discount, $discount_statuts, $qty, $branch_location_id, $custom, $multi_category);
            } else {
                $branch_location = $_POST['branch_location_' . $i];
                foreach ($branch_location as $key => $value) {
                    $branch_location_id = $value;
                    $this->Items_crud->insert_item_information_excel($ar_name, $en_name, $barcode, $details, $image, $invoice_number, $type_id, $item_number, $tax_1);
                    $item_id = $this->db->insert_id();
                    $this->Items_crud->insert_items_excel($item_id, $size_id, $color_id, $weight, $brand_id, $bg_color, $expiry_date, $cost_price, $sale_price, $whole_price, $supplier_id, $category_id, $sub_category_id, $max_discount, $discount, $discount_statuts, $qty, $branch_location_id, $custom, $multi_category);
                }
                redirect(rest_path('Items'));
            }
        }
        redirect(rest_path('Items'));
    }

}
