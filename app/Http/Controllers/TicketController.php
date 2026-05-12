<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::all();

        return view('ticketIndex', compact('tickets'));
    }

    public function create() {
        return view('ticketCreate');
    }

    public function store(Request $request, Ticket $ticket) {
        $ticket->create([
            'user' => $request->user,
            'department' => $request->department,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return redirect()->route('ticket.index')->with('success', 'Ticket has been added successfully');
    }

    public function destroy($id) {
        $ticket = Ticket::findOrFail($id);
        
        $ticket->delete();

        return redirect()->route('ticket.index')->with('success', 'Ticket has been deleted successfully');
    }

    public function edit($id) {
        $ticket = Ticket::findOrFail($id);

        return view('ticketEdit', compact('ticket'));
    }

    public function update(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);

        $ticket->update([
            'user' => $request->user,
            'department' => $request->department,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return redirect()->route('ticket.index')->with('success', 'Ticket has been updated successfully');
    }

    public function search(Request $request) {
        $search = $request->search;

        $tickets = Ticket::where('user', 'LIKE', "%{$search}%")->orWhere('department', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->orWhere('location', 'LIKE', "%{$search}%")->get();

        return view('ticketIndex', compact('tickets'));
    }
}
