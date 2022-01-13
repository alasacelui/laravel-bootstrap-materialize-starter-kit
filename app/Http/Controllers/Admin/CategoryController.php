<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Category::all())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "<a href='javascript:void(0)' class='btn btn-sm btn-warning' onclick='c_edit(`#m_category`, `.category_form :input`, [`#m_category_title`, `Edit Category`], [`.btn_add_category`, `.btn_update_category`], $row)'><i class='fas fa-edit fa-lg'></i></a>";

                    $btn .= " <a href='javascript:void(0)' class='text-decoration-none btn  btn-sm btn-danger' 
                    onclick='c_destroy($row->id,`admin.category.destroy`,`.category_dt`)'><i class='fas fa-trash fa-lg'></i></a>"; // crud destroy param [row or model ID, route name, datatableID]
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.category.index');
    }

    public function store(CategoryRequest $request)
    {
       Category::create($request->validated());

       return $this->res(['message' => 'Category Added Successfully']);
    }

    public function update(CategoryRequest $request, Category $category)
    {
       $category->update($request->validated());

       return $this->res(['message' => 'Category Updated Successfully']);
    }

    public function destroy(Category $category)
    {
        $category->delete();

       return $this->res(['message' => 'Category Deleted Successfully']);
    }
}
