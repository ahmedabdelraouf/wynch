<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;
use App\models\Offer;
use App\models\Notifications;
trait BasicTrait {


    public function traitIndex($model) {

        return $model->orderBy('id', 'desc')->get();
    }

    public function traitShow($model,$id){

      return  $model->find($id);
    }

    public function traitDelete($model ,$id){

        return $model->where('id',$id)->delete();
    }

    public function traitUpdateStatus($model ,$status,$id){

        return $model::where('id', $id)->update(['status' =>$status]);
    }

    public function traitupdate($model,$id,$arr){

        foreach($arr as $index=>$value){

            $model::where('id', $id)->update([$index =>$value]);
        }

    }

    public function traitChangePassword($model ,$id,$old_password ,$new_password ){

        $item = $this->model->where('id',$id)->first();


        if(Hash::check($old_password, $item->password)){


            $model::where('id', $id)->update(['password' =>bcrypt($new_password)]);

        }else{
            return 'error';
        }
    }

      public function addToNotification($to ,$message ,$url){

        $obj = new Notifications;

        $obj->to = $to;
        $obj->message = $message;
        $obj->url = $url;

        $obj->save();
      }

}
