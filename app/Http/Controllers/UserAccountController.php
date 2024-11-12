<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function portal(){
        return view('Users.Page.Portal');
    }
    public function profile(){
        return view('Users.Page.Profile');
    }
    public function petProfile($code){
        return view('Users.Page.PetProfile',['code'=>$code]);
    }
    public function HealthInfo($code){
        return view('Users.Page.HealthInfo',['code'=>$code]);
    }
    public function VaccinationHistort($code){
        return view('Users.Page.VaccinationHistort',['code'=>$code]);
    }
    public function VaccinationHistort_create($code){
        return view('Users.Page.VaccinationHistort_create',['code'=>$code]);
    }
    public function VaccinationHistort_edit($code,$id){
        return view('Users.Page.VaccinationHistort_edit',['code'=>$code,'id'=>$id]);
    }
    public function HealthIssuesHistort($code){
        return view('Users.Page.HealthIssuesHistort',['code'=>$code]);
    }
    public function HealthIssuesHistort_create($code){
        return view('Users.Page.HealthIssuesHistort_create',['code'=>$code]);
    }
    public function HealthIssuesHistort_edit($code,$id){
        return view('Users.Page.HealthIssuesHistort_edit',['code'=>$code,'id'=>$id]);
    }
    public function AllergiesHistory($code){
        return view('Users.Page.AllergiesHistory',['code'=>$code]);
    }
    public function AllergiesHistory_create($code){
        return view('Users.Page.AllergiesHistory_create',['code'=>$code]);
    }
    public function AllergiesHistory_edit($code,$id){
        return view('Users.Page.AllergiesHistory_edit',['code'=>$code,'id'=>$id]);
    }
    public function MedicalHistory($code){
        return view('Users.Page.MedicalHistory',['code'=>$code]);
    }
    public function MedicalHistory_create($code){
        return view('Users.Page.MedicalHistory_create',['code'=>$code]);
    }
    public function MedicalHistory_edit($code,$id){
        return view('Users.Page.MedicalHistory_edit',['code'=>$code,'id'=>$id]);
    }
    public function WeightRecord($code){
        return view('Users.Page.WeightRecord',['code'=>$code]);
    }
    public function WeightRecord_create($code){
        return view('Users.Page.WeightRecord_create',['code'=>$code]);
    }
    public function WeightRecord_edit($code,$id){
        return view('Users.Page.WeightRecord_edit',['code'=>$code,'id'=>$id]);
    }
    
}

