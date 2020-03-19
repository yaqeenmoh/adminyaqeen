<?php

class Custom_item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(rest_path('main/Custom_item_crud'));
        $this->load->model(rest_path('custom_item/Custom_item_model'));
    }

    public function index() {
        $data['title'] = $this->lang->line('admin_custom_item');
        $data['page'] = rest_path('custom_item/view_custom_item');
        $data['custom_item'] = $this->get_items();
        $data['custom_item_details'] = $this->get_custom_item();
        $this->load->view('index', $data);
    }

    public function get_items() {
        $data['custom_item'] = $this->Custom_item_model->get_items();
        return $data['custom_item'];
    }

    public function add_custom_option() {
        $item_id = $_GET['item_id'];
        $this->load->view('restaurant/custom_item/add_custom_option');
    }

    public function insert_custom_item() {
        $counter = count($_POST) / 8;
        $data = array();
        for ($i = 1; $i <= $counter; $i++) {
            if (!empty($_POST['recipe_id'])) {
                $recipe_id = $_POST['recipe_id'];
                $item_id = $_POST['item_id'];
                $minimum = $_POST['option_minimum_' . $i];
                $maxmimum = $_POST['option_maximum_' . $i];

                $option_1 = $_POST['option_1_' . $i];
                $option_1_price = $_POST['option1_price_' . $i];
                $option_2 = $_POST['option_2_' . $i];
                $option_2_price = $_POST['option2_price_' . $i];
                $option_3 = $_POST['option_3_' . $i];
                $option_3_price = $_POST['option3_price_' . $i];

                $options = array(
                    $_POST['option_1_' . $i] => $_POST['option1_price_' . $i],
                    $_POST['option_2_' . $i] => $_POST['option2_price_' . $i],
                    $_POST['option_3_' . $i] => $_POST['option3_price_' . $i]
                );

                $encode_data = json_encode($options);

                $sub_array = array('item_id' => $item_id, 'recipe_id' => $recipe_id, 'custom_option' => $encode_data, 'minimum' => $minimum, 'maximum' => $maxmimum);
                array_push($data, $sub_array);
            }
        }
        $recipe_options = $this->Custom_item_crud->insert_custom_item($data);
        if ($recipe_options == true) {
            redirect(rest_path('Custom_item'));
        }
    }

    public function search_recipe() {
        $term = $this->input->get('term');
        $this->db->like('en_name', $term);
        $this->db->or_like('ar_name', $term);
        $data = $this->db->get("recipe")->result();
        echo json_encode($data);
    }

    public function get_custom_item() {
        $data['custom_item_details'] = $this->Custom_item_model->get_custom_item();
        return $data['custom_item_details'];
    }

    public function delete_custom_item() {
        $custom_item_id = $_GET['custom_item_id'];
        $data['delete_custom'] = $this->Custom_item_model->get_custom_item_by_id($custom_item_id);
        $this->load->view('restaurant/custom_item/delete_custom_item', $data);

        if (isset($_POST['delete_custom_item'])) {
            $this->Custom_item_crud->delete_custom_item($custom_item_id);
            redirect(rest_path('Custom_item'));
        }
    }

    public function edit_custom_item() {
        $custom_item_id = $_GET['custom_item_id'];
        $data['edit_custom'] = $this->Custom_item_model->get_custom_item_by_id($custom_item_id);
        $data['custom_item'] = $this->get_items();
        $data['custom_recipe'] = $this->Custom_item_crud->get_recipe();
        $this->load->view('restaurant/custom_item/edit_custom_item', $data);


        if (isset($_POST['save_update_custome'])) {
            $options = array(
                $_POST['custom_item_option_1'] => $_POST['custom_item_option_price_1'],
                $_POST['custom_item_option_2'] => $_POST['custom_item_option_price_2'],
                $_POST['custom_item_option_3'] => $_POST['custom_item_option_price_3']
            );

            $encode_data = json_encode($options);

            $update_category = array(
                'custom_option' => $encode_data,
                'minimum' => $_POST['custom_item_minimum'],
                'maximum' => $_POST['custom_item_maximum']
            );
            
            $this->Custom_item_crud->update_custom_item($custom_item_id,$update_category);
            redirect(rest_path('Custom_item'));
        }
    }

}
