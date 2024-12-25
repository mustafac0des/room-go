<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('bookings')->where('host_id', auth()->id())->get();
        return view('rooms.manage', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'beds' => 'required|integer',
            'washrooms' => 'required|integer',
            'guests' => 'required|integer',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'amenities' => 'nullable|array',
            'amenities.*' => 'nullable|string'
        ]);

        $user_id = Auth::id();

        $room = Room::create([
            'host_id' => $user_id,
            'beds' => $validated['beds'],
            'washrooms' => $validated['washrooms'],
            'guests' => $validated['guests'],
            'address' => $validated['address'],
            'price' => $validated['price'],
            'amenities' => json_encode($validated['amenities'] ?? []),
        ]);

        return redirect('/')->with('status', 'Room added successfully!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        if ($room->host_id != auth()->id()) {
            return redirect()->route('rooms.index')->with('error', 'You can only edit your own rooms.');
        }

        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'address' => 'required|string|max:255',
            'beds' => 'required|integer|min:1',
            'washrooms' => 'required|integer|min:1',
            'guests' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'amenities' => 'nullable|array',
        ]);

        // Find the room and update it
        $room = Room::findOrFail($id);

        // Optional: Ensure only the owner can update the room
        if ($room->host_id != auth()->id()) {
            return redirect()->route('rooms.index')->with('error', 'You can only update your own rooms.');
        }

        // Update the room details
        $room->update([
            'address' => $request->address,
            'beds' => $request->beds,
            'washrooms' => $request->washrooms,
            'guests' => $request->guests,
            'price' => $request->price,
            'amenities' => json_encode($request->amenities),  // If amenities are an array, store them as JSON
        ]);

        // Redirect with success message
        return redirect()->route('rooms.index')->with('status', 'Room updated successfully!');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $hasNonOccupiedBookings = $room->bookings->where('status', '!=', 'occupied')->isNotEmpty();

        if ($hasNonOccupiedBookings) {
            return redirect()->route('rooms.manage')->with('error', 'Room cannot be deleted because it has non-occupied bookings.');
        }

        $room->delete();

        return redirect()->route('rooms.index')->with('status', 'Room deleted successfully!');
    }

    public function availableRooms()
    {
        // Get all rooms that are not hosted by the currently authenticated user
        $rooms = Room::with('bookings')
                    ->where('host_id', '!=', auth()->id()) // Exclude rooms hosted by the logged-in user
                    ->get();

        return view('rooms.view', compact('rooms'));
    }
}
