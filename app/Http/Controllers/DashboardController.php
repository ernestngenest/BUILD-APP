<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $material = DB::table('categories')
            ->join('materials', 'categories.id', '=', 'materials.category_id')
            ->select('materials.material_name', 'materials.material_price', 'materials.material_price', 'materials.material_image', 'materials.material_description',)
            ->get();

        $worker = DB::table('categories')
            ->join('constructor_workers', 'categories.id', '=', 'constructor_workers.category_id')
            ->select(
                'constructor_workers.constructor_worker_name',
                'constructor_workers.constructor_worker_image',
                'constructor_workers.constructor_worker_price',
                'constructor_workers.constructor_worker_quantity'
            )
            ->get();
        $categories =  \App\Models\Category::all();
        if ($request->category_id != 0) {
            $material = DB::table('categories')
                ->join('materials', 'categories.id', '=', 'materials.category_id')
                ->select('materials.material_name', 'materials.material_price', 'materials.material_price', 'materials.material_image', 'materials.material_description',)
                ->where('materials.status', 'like', '%' . $request->status . '%')->get();
            $categories->materials = $material;
        }
        $temp = null;
        try {
            $getCategoryName = Category::find($request->category_id);
            $getCategoryName = $getCategoryName->catergory_name;
            $rows = [];
            $temp = null;
            foreach (explode(' ', $getCategoryName) as $row) {
                $rows[] = $row;
            }
            foreach ($rows as $row) {
                if ($row == last($rows)) {
                    $temp .= $row . 's';
                } else {
                    $temp .= $row . '_';
                }
            }
        } catch (Exception $e) {
            $temp = null;
        }
        $temp = strtolower($temp);
        $selected_id = [];
        $selected_id['category_id'] = $request->category_id;
        $selected_id['name'] = $temp;
        $selected_id['status'] = $request;
        return view('/dashboard/Components/dashboard', [
            'status' => 'Dashboard',
            'materials' => $material,
            'workers' => $worker,
            'category' => $categories,
            'selected_id' => $selected_id
        ])->with('success', 'Data berhasil ditambahkan');
    }

    public function __construct()
    {
    }
    public function render()
    {
    }
}
