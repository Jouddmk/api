<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض كل الفئات
    public function index()
    {
        return response()->json(Category::all());
    }

    // إنشاء فئة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return response()->json($category, 201);
    }

    // عرض فئة واحدة
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // تحديث فئة
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $category->image = $imagePath;
        }

        $category->update($request->only('name', 'description'));
        $category->save();

        return response()->json($category);
    }

    // حذف فئة
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
