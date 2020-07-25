<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rabrawModel;

class rabrawController extends Controller
{
    public function __construct(){
        session(['paging' => 10]);
        session(['divisi' => "PIT"]);
    }
    public function index(){
        session(['paging' => 10]);
        session(['divisi' => "PIT"]);
        $this->show(1);

    }
    public function show($page){
        $paging = session('paging');
        $divisi = session('divisi');
        $model = new rabrawModel();
        $divisi = $model->get_list($divisi,(($page-1)*$paging),$paging);
		$data['posts'] = $divisi;
		$count =$model->get_paging($divisi,$paging);
		$data['page'] = $count[0]->num;
		return view('Home',$data);
    }

    public function paging($page){
        session(['paging' => $page]);
        $this->show(1);
    }

    public function search(Request $request){
        $option = $request->option;
        $key = $request->key;

    }

    public function short($paging){

    }
}
