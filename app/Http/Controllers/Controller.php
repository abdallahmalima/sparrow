<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function deleteFile($path){
        if(is_null($path)) return;
 
         if(file_exists($path)){
             unlink($path);
         }
     }

     protected function deleteWithImage($model){
         $this->deleteFile($model->image->url??null);
         $model->delete();
     }

     protected function updateImage($model){
         if($model->image){
            if(request()->hasFile('image')){
             $this->deleteFile($model->image->url??null);
             $model->image()->update(['url'=>request()->file('image')->store('images','public')]);
            }
         }else{
             $model->image()->create(['url'=>request()->file('image')->store('images','public')]); 
         }
     }

     protected function storeImage($model){
         $model->image()->create(['url'=>request()->file('image')->store('images','public')]);
     }
 
     protected function firstUpdateOrCreate($model,$data){
         $model_var=$model::first();
         if($model_var){
             $model_var->update($data);
         }else{
            $model_var=$model::create($data);
         }
         return $model_var;
     }

     protected function firstUpdateOrCreateWithImage($model,$data){
        $m_model=$model::first();
        if($m_model){
            $m_model->update($data);
            if(request()->hasFile('image')){
             $this->updateImage($m_model);
            }
        }else{
          
            $m_model=$model::create($data);
            if(request()->hasFile('image')){
               $this->storeImage($m_model);
            }
        }

        return $m_model;
     }
}
