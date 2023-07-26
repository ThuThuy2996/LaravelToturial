<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService {

    public function Create($request)
    {
        try{

            Menu::create([
                'name' =>(string) $request->input('name'),
                'parent_id' =>(int) $request->input('parent_id'),
                'description' =>(string) $request->input('description'),
                'content' =>(string) $request->input('content'),
                'active' =>(int) $request->input('active'),
                'slug' =>Str::slug($request->input('name'), '-')

            ]);
        }
        catch(Exception $ex){
            return false;
        }
       return true;
    }

    public function getByParentID($parent_id = '') {

        return Menu::when($parent_id != '', function($query) use ($parent_id){
            $query->where('parent_id', $parent_id);
        })
        ->orderBy('id','desc');
    }

    public function getAll(){
        return Menu::orderBy('id','desc')->paginate(20);
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }
}
