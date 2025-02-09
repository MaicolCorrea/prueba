<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        if (!$category->isEmpty()) {
            return response()->json(['message' => [
                'response' => "true",
                'data' => $category
            ]], 200);
        } else {
            return response()->json(['error' => "No hemos encontrado categorias."], 404);
        }
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
