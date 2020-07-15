<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ServerApi extends CI_Controller
    {
        // fungsi untuk CREATE
        public function addPasar(){
            // Deklarasi Variable
            $name = $this->input->post('name');
            $hp = $this->input->post('hp');
            $alamat = $this->input->post('alamat');

            //isikan variable dengan nama file
            $data['staff_name'] = $name;
            $hp['staff_name'] = $hp;
            $alamat['staff_name'] = $alamat;
            $q = $this->db->insert('tb_staff', $data);
            //check insert berhasil apa nggak
            if($q){
                $response['pesan'] = 'insert berhasil';
                $response['status'] = 200;
            }else{
                $response['pesan'] = 'insert error';
                $response['status'] = 404;
            }
            echo json_encode($response);
        }

        // fungsi untuk Read
        public function getDataPasar(){
            $q = $this->db->get('pasar');
            if($q ->num_rows() > 0){
                $response['pesan'] = 'data ada';
                $response['status'] = 200;
                // 1 row
                $response['staff']=$q->row();
                $response['staff']=$q->result();
            }else{
                $response['pesan']='data tidak ada';
                $response['status'] = 404;
            }
            echo json_encode($response);
        }
        // fungsi untuk delete
        public function deleteStaff(){
            $id = $this->input->post('id');
            $this->db->where('staff_id',$id);
            $status = $this->db->delete('tb_staff');
            if ($status == true) {
                $response['pesan'] = 'hapus berhasil';
                $response['status'] = 200;
            }else{
                $response['pesan'] = 'hapus eror';
                $response['status'] = 404;
            }
            echo json_encode($response);
        }
        // fungsi untuk update
        public function updatePasar(){
            // deklarasi variable
            $id = $this->input->post('id');
            $name = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $kontak = $this->input->post('kontak');
            $this->db->where('id', $id);
            // isikan variable dengan nama file
            $data['nama_pasar'] = $name;
            $data['alamat_pasar'] = $alamat;
            $data['kontak_pasar'] = $kontak;
            $q = $this->db->update('pasar',$data);
            // check insert berhasil apa nggak
            if($q){
                $response['pesan'] = 'update berhasil';
                $response['status'] = 200;
            }else{
                $response['pesan'] = 'update eror';
                $response['status'] = 404;
            }
            echo json_encode($response);
        }
    }
    

?>