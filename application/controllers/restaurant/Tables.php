<?php

class Tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Tables_crud'));
        $this->load->model(rest_path('tables/Tables_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('tables');
        $data['floor'] = $this->get_floor();
        $data['table'] = $this->get_table();
        $data['page'] = rest_path('tables/view_tables');
        $this->load->view('index', $data);
    }

    public function get_floor() {
        $data['floor'] = $this->Tables_crud->get_floor();
        return $data['floor'];
    }

    public function get_tables_form_by_ajax() {
        $tables_count = $_POST['id'];
        $data['tables_id'] = $tables_count;
        $data['floor'] = $this->get_floor();
        $this->load->view('restaurant/tables/insert_tables_form', $data);
    }

    public function insert_tables() {
        $counter = $_POST['tables_form_number'];
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {
            
                $table_name = $_POST['table_name_' .$i];
                $chair_number = $_POST['table_chair_number_' . $i];
                $table_floor = $_POST['table_floor_' .$i];
                $table_image = $_POST['table_image_' .$i];

                $sub_array = array('name' => $table_name, 'chair_number' => $chair_number, 'floor_id' => $table_floor, 'image' => $table_image . '.png');
                array_push($data, $sub_array);
            
        }
         $this->Tables_crud->insert_tables($data);
         redirect(rest_path('Tables'));
    }

    public function get_tables_floor() {
        $floor_id = $_GET['floor'];
        $data['floor_id'] = $this->Tables_model->get_tables_floor_by_id($floor_id);
        $this->load->view('restaurant/tables/view_tables_floor', $data);
    }

    public function update_x_y() {
        $table_id = $_GET['table_id'];
        $x = $_GET['top'];
        $y = $_GET['left'];

        $update_x_y = array(
            'position_x' => $x,
            'position_y' => $y
        );
        $this->Tables_crud->update_table($table_id, $update_x_y);
        redirect(rest_path('Tables'));
    }

    public function get_table() {
        $data['table'] = $this->Tables_model->get_table();
        return $data['table'];
    }

    public function update_table() {
        $table_id = $_GET['table_id'];
        $data['update_table'] = $this->Tables_crud->get_table_by_id($table_id);
        $data['floor'] = $this->get_floor();
        $this->load->view('restaurant/tables/update_table', $data);

        if (isset($_POST['save_update_table'])) {
            $update_table = array(
                'name' => $_POST['table_name'],
                'chair_number' => $_POST['table_chair_number'],
                'floor_id' => $_POST['table_floor'],
                'image' => $_POST['table_image']
            );
            $this->Tables_crud->update_table($table_id, $update_table);
            redirect(rest_path('Tables'));
        }
    }

    public function delete_table() {
        $table_id = $_GET['table_id'];
        $data['delete_table'] = $this->Tables_crud->get_table_by_id($table_id);
        $this->load->view('restaurant/tables/delete_table', $data);


        if (isset($_POST['delete_table_yes'])) {
            $this->Tables_crud->delete_table($table_id);
            redirect(rest_path('Tables'));
        }
    }

}
