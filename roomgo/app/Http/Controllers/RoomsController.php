<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoomsController extends Controller
{
    public function index()
    {
        return view('admin.rooms.index');  
    }

    public function getRooms(Request $request)
    {
        if ($request->ajax()) {
            $rooms = Room::select('id', 'address', 'city', 'beds', 'washrooms', 'guests', 'price', 'amenities', 'image', 'created_at', 'updated_at')
                ->get();

            return DataTables::of($rooms)
                ->addColumn('action', function($row) {
                    return '<a href="' . route('rooms.edit', $row->id) . '" class="btn btn-warning btn-sm m-1">Edit</a>
                            <a href="javascript:void(0)" onclick="deleteRoom(' . $row->id . ')" class="btn btn-danger btn-sm m-1">Delete</a>';
                })
                ->make(true);
        }
    }


    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'host_email' => 'required|email|exists:users,email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'beds' => 'required|integer',
            'washrooms' => 'required|integer',
            'guests' => 'required|integer',
            'price' => 'required|numeric',
            'amenities' => 'nullable|array',
            'amenities.*' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $host = User::where('email', $request->host_email)->firstOrFail();

        $data = [
            'host_id' => $host->id,
            'address' => $request->address,
            'city' => $request->city,
            'beds' => $request->beds,
            'washrooms' => $request->washrooms,
            'guests' => $request->guests,
            'price' => $request->price,
            'amenities' => json_encode($request->amenities ?? []),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('images', $imageName, 'public');
            $data['image'] = $path;
        } else {
            $path = null;
        }

        Room::create($data);

        return redirect()->route('rooms.index')->with('status', 'Room created successfully!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'beds' => 'required|integer',
            'washrooms' => 'required|integer',
            'guests' => 'required|integer',
            'price' => 'required|numeric',
            'amenities' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $room = Room::findOrFail($id);
        $data = [
            'address' => $request->address,
            'city' => $request->city,
            'beds' => $request->beds,
            'washrooms' => $request->washrooms,
            'guests' => $request->guests,
            'price' => $request->price,
            'amenities' => json_encode($request->amenities ?? []),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $data['image'] = $imageData;
        }

        $room->update($data);

        return redirect()->route('rooms.index')->with('status', 'Room updated successfully!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['success' => 'Room deleted successfully']);
    }
}
