<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use Session;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }
    public function create()
    {
        $menus = $this->menuService->getByParentID(0);
        return view('admin.menu.addmenu',[
            'title' => 'Thêm Danh Mục',
            'menus' => $menus
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        if($this->menuService->create($request)){
            return redirect()->back()->with('success','Tạo mới danh mục thành công');
        }
        else {
            return redirect()->back()->with('error','Tạo mới danh mục lỗi');
        }

    }
    public function index() {
        return view('admin.menu.list',[
            'title' => 'Danh Sách Danh Mục',
            'menus' => $this->menuService->getByParentID()
        ]);
    }
}
