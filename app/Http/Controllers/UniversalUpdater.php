<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class UniversalUpdater extends Controller
{

    /**
     * @param $obj  (object to be updated)
     * @param $data (data from forms)
     * @param $passwordEncrypt (if you want to encrypt passwords set this flag to true)
     *                         (will be true by default for security)
     * @param $passwordChange  (change passwords or not , default will be false for security)
     *
     */
    public function update($obj , $data, $passwordEncrypt = true, $passwordChange = false){

        $array = $obj->getFillable();
        foreach ($array as $keyFillable => $objAttr){
            foreach ($data as $keyData => $dataToFill){
                if($objAttr == $keyData){

                    if($objAttr == "password" && $passwordChange == true) {

                        if($passwordEncrypt == true ) {
                           $dataToFill = bcrypt($dataToFill);
                           $obj->$objAttr = $dataToFill;
                           break;
                       }else{
                            $obj->$objAttr = $dataToFill;
                            break;
                        }
                    }
                    if($objAttr == "password" && $passwordChange == false){
                        continue;
                    }

                    if($objAttr == "avatar") {
                        $st = Storage::disk('local')->put('public/users/', $dataToFill);
                        $arr = explode('/',$st);
                        $arr[0] = "";
                        $arr[1] = $arr[1].'/';
                        $arr[2] = '//';
                        $correct = implode('',$arr);
                        $dataToFill = $correct;
                    }
                    $obj->$objAttr = $dataToFill;
                    break;
                }
            }
        }
        $obj->save();
    }
}
