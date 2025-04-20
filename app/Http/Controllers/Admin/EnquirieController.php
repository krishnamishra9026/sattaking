<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployerTicket;
use App\Models\EmployerTicketChat;
use App\Models\Employer;

class EnquirieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $employer_tickets = EmployerTicket::query();

        // Filter by date (assumes date format: YYYY-MM-DD)
        if (isset($request->date)) {
            $employer_tickets = $employer_tickets->whereDate('created_at', $request->date);
        }

        // Filter by department
        if (isset($request->department)) {
            $employer_tickets = $employer_tickets->where('department', $request->department);
        }

        // Filter by employer (exact match on employer ID or name depending on your schema)
        if (isset($request->employer)) {
            $employer_tickets = $employer_tickets->where('employer_id', $request->employer);
        }

        // Filter by priority
        if (isset($request->priority)) {
            $employer_tickets = $employer_tickets->where('priority', $request->priority);
        }

        $employer_tickets = $employer_tickets->orderBy('id', 'desc')->paginate(10);

        $employers = Employer::latest('id')->get();

        return view('admin.enquirie.list', compact('employer_tickets', 'employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        $employer_ticket = EmployerTicket::with('chats')->whereId($id)->first();
        if (is_null($employer_ticket)) {
            return redirect()->back()->with('error', 'Ticket not found');
        }
        return view('admin.enquirie.show', compact('employer_ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required'
        ], [
            'message.required' => 'Please enter message'
        ]);

        $employer_ticket = EmployerTicket::whereId($id)->first();
        if (is_null($employer_ticket)) {
            return redirect()->back()->with('error', 'Ticket not found');
        }

        $message = EmployerTicketChat::create([
            'employer_ticket_id' => $employer_ticket->id,
            'employer_id' => $employer_ticket->employer_id,
            'sender_type'        => 'admin',
            'message'   => $request->message
        ]);

        if ($request->hasFile('attachment')) {

            $image      = $request->file('attachment');

            $name       = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('uploads/employer/ticket/', $name, 'public');

            EmployerTicketChat::find($message->id)->update(['attachment' => $name]);
        }

        return redirect()->back()->with('info', 'Ticket response added successfully');
    }

    public function changeStatus(Request $request)
    {
    
        $employer_ticket = EmployerTicket::whereId($request->id)->first();
        $employer_ticket->status = $request->status;
        $employer_ticket->save();
      
        $employer_ticket->customer->notify(new Reminder(
            'Ticket has been'.( ($request->status == 0) ? 'closed' : 'Reopen' ),
             url('/customer/employer_ticket').'/'.$employer_ticket->id,
            'reminder',
             $employer_ticket->id,
             ''
         ));

        return redirect()->back()->with('info', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        EmployerTicket::whereId($id)->delete();

        return redirect()->back()->with('info', 'Ticket deleted successfully');
    }
}
