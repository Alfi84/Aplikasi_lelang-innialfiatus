 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_model
{
    public function proses_login($username, $password){ 
        // proses login
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $query = $this->db->get_where('tb_petugas', ['username' => $username, 'password' => $password]);
        $query2 = $this->db->get_where('tb_masyarakat', ['username' => $username, 'password' => $password]);


        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                // apabila login sebagai admin/petugas
                $sess = array(
                    'id_petugas' => $row->id_petugas,
                    'nama_petugas' => $row->nama_petugas,
                    'username' => $row->username,
                    'password' => $row->password,
                    'id_level' => $row->id_level,
                );


                $this->session->set_userdata($sess);
                if($row->id_level == 1){
                    return redirect('admin/dashboard');
                }else if($row->id_level == 2){
                    redirect('petugas/dashboard');
                }
            }
        }else if ($query2->num_rows()>0){
            foreach ($query2->result() as $row){
                $sess = array(
                    'id_user' => $row->id_user,
                    'username' => $row->username,
                    'password' => $row->password,
                    'id_level' => $row->id_level,
                );
                
                $this->session->set_userdata($sess);
                if($row->id_level == 3){
                    return redirect('welcome');
                }
            }
        }
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Login Gagal,
            silahkan periksa kembali Username dan Password Anda ! </div>');
            redirect('auth');
        }
       
    } 
}

        // proses login
        // $username = $this->input->post('username');
        // $password = $this->input->post('password');
        // $query = $this->db->get_where('tb_petugas', ['username' => $username]);
        // $query2 = $this->db->get_where('tb_masyarakat', ['username' => $username]);


        // if($query->num_rows()>0){
        //     foreach ($query->result() as $row){
        //         if (password_verify($password, $row->password)) {
                // apabila login sebagai admin/petugas
//                     $sess = array(
//                     'id_petugas' => $row->id_petugas,
//                     'nama_petugas' => $row->nama_petugas,
//                     'username' => $row->username,
//                     'password' => $row->password,
//                     'id_level' => $row->id_level,
//                     );


//                     $this->session->set_userdata($sess);
//                     if($row->id_level == 1){
//                         return redirect('admin/dashboard');
//                     }else if($row->id_level == 2){
//                      redirect('petugas/dashboard');
//                     }
//                 }
//                 else{
//                     $this->session->set_flashdata('message', '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
//                     <strong>Password Anda Salah!</strong>
//                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true>$times;</span>
//                         </button>
//                     </div>');
//                     redirect('auth');
//                 }
//             }
//         }

//         else if ($query2->num_rows()>0)
//         {
//             foreach ($query2->result() as $row){
//                 if (password_verify($password, $row->password)) {
//                     $sess = array(
//                     'id_user' => $row->id_user,
//                     'username' => $row->username,
//                     'nama_lengkap' => $row->nama_lengkap,
//                     'password' => $row->password,
//                     'id_level' => $row->id_level,
//                     );
                
//                     $this->session->set_userdata($sess);
//                     if($row->id_level == 3){
//                         return redirect('welcome');
//                     }
//                 }else {
//                     $this->session->set_flashdata('message', '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
//                     <strong>Password Anda Salah!</strong>
//                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                         <span aria-hidden="true>$times;</span>
//                     </button>
//                     </div>');
//                         redirect('auth/index');
//                 }
//             }
//         }
//          else {
//             $this->session->set_flashdata('message', '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
//                 <strong>Username Anda Salah!</strong>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true>$times;</span>
//                 </button>
//                 </div>');
//             redirect('auth/index');
//         }
//     }
// }