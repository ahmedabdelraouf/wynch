<?php
namespace App\Http\Traits;

trait ResponseTraits {


    public function prepare_response($error = false, $errors = null, $message = '', $data = null ,$status = 0 ,$server_status) {

        $array = array(
            'status'  =>$status,
            'error'   => $error,
            'errors'  => $errors,
            'message' => $message,
            'data'    => $data
        );


        return response()->json($array ,$server_status);
    }

    public function getFullObjects($objects, $unsetObject = null){
        $data = [];
        if(!is_null($objects)) {
            foreach ($objects as $object) {
                $result = $object->getFullObj();
//            unset($result['pharmacy']);
                if (!is_null($unsetObject)) {
                    unset($result[$unsetObject]);
                }
//                unset($result['doctor']);
                $data[] = $result;
//            $data[] = $object->getFullObj();
            }
        }
        return $data;
    }
}
