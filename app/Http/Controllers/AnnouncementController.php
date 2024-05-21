<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category = null)
    {
        $query = Announcement::where('is_accepted', true)->with('category')->orderBy('created_at', 'desc')->paginate(9);

        if ($category) {
            $categoryId = $category->id; // Assuming a category_id column
            $query->where('category_id', $categoryId);
        }

        $announcements = $query->get();

        return view('announcements.index', compact('announcements'));
    }

    public function indexAll()
    {
        $announcements = Announcement::with('category')->orderBy('created_at', 'desc')->get();



        return view('announcements.index', compact('announcements'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
