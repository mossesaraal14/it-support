<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index() {
        $assets = Asset::all();
        return view('index', compact('assets'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request, Asset $asset) {
        $asset->create([
            'category' => $request->category,
            'type' => $request->type,
            'serial_number' => $request->serial_number,
            'user' => $request->user,
            'department' => $request->department,
            'info' => $request->info,
        ]);

        return redirect()->route('asset.index')->with('success', 'Asset has been added successfully');
    }

    public function destroy($id) {
        $asset = Asset::findOrFail($id);
        
        $asset->delete();

        return redirect()->route('asset.index')->with('success', 'Asset has been deleted successfully');
    }

    public function edit($id) {
        $asset = Asset::findOrFail($id);

        return view('edit', compact('asset'));
    }

    public function update(Request $request, $id) {
        $asset = Asset::findOrFail($id);

        $asset->update([
            'category' => $request->category,
            'type' => $request->type,
            'serial_number' => $request->serial_number,
            'user' => $request->user,
            'department' => $request->department,
            'info' => $request->info,
        ]);

        return redirect()->route('asset.index')->with('success', 'Asset has been updated successfully');
    }
}
