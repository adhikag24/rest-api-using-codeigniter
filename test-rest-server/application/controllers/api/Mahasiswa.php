<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->methods['index_get']['limit'] = 100; //defaultnya per jam 
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null){
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }
        else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }
            
    
        if ($mahasiswa){
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'data not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null){
            $this->response([
                'status' => false,
                'message' => "Provide an id!"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        else {
            if($this->mahasiswa->deleteMahasiswa($id) > 0){

                $this->response([
                    'status' => true,
                    'message' => "ID deleted!"
                ], REST_Controller::HTTP_OK);

            }else {
                //id not found
                    $this->response([
                        'status' => false,
                        'message' => "ID not found!"
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }   
    }

    public function index_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa created!'
            ], REST_Controller::HTTP_CREATED);
        }else {
            //id not found
                $this->response([
                    'status' => false,
                    'message' => "Fail to create new data!"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'mahasiswa updated!'
            ], REST_Controller::HTTP_OK);
        }else {
            //id not found
                $this->response([
                    'status' => false,
                    'message' => "Fail to update!"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
    }

}

/* End of file Mahasiswa.php */
