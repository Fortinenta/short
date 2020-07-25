<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class rabrawModel extends Model
{
    public function get_short($short){
        $query = DB::select("SELECT * FROM tb_short_url WHERE short = '$short'");
        if ($query->num_rows()==0) {
            return false;
        }else {
            return true;
        }
    }
    
    //ambil list
    public function search($option,$key,$divisi){
        $query = DB::select("SELECT * FROM tb_short_url WHERE divisi = '$divisi' AND $option LIKE '%$key%'");
        return $query->get();
    }
    
    public function get_list($divisi,$start,$list){
        $this->load->database();
        $query = DB::select("SELECT * FROM tb_short_url WHERE divisi = '$divisi' LIMIT $start,$list ");
        return $query->get();
    }
    
    public function get_page($divisi,$list){
        $this->load->database();
        $query = $this->db->query("SELECT ceil(COUNT(short)/$list) AS num FROM `tb_short_url` WHERE divisi ='$divisi'");
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        return $data;
    }
    
    //funsi delete
    public function delete($short) {
        DB::where('short', $short);
        DB::delete('tb_short_url');
    }
    
    public function go_link($short){
        $this->load->database();
        $query = $this->db->query("SELECT * FROM tb_short_url WHERE short = '$short'");
        if ($query->num_rows()==0) {
        return false;
        }else {
        foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function add($url,$short,$divisi){
        $this->load->database();
        $data = array(
            'url_asli'=>$url,
            'short'=>$short,
            'divisi'=>$divisi
            );
        DB::insert('tb_short_url',$data);
    }
}
