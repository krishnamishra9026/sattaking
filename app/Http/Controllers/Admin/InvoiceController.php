<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Employer;
use App\Models\Package;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fromDate   = request()->input('from_date');
        $toDate     = request()->input('to_date');
        $employerId = request()->input('employer');
        $packageId  = request()->input('package');

        $invoices = Invoice::when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            })
            ->when($employerId, function ($query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })
            ->when($packageId, function ($query) use ($packageId) {
                $query->where('package_id', $packageId);
            })
            ->latest()
            ->paginate(20);

        $employers = Employer::latest()->get();
        $packages = Package::latest()->get();

        return view('admin.invoice.list', compact('invoices', 'employers', 'packages'));
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
        $invoice = Invoice::find($id);

        return view('admin.invoice.show', compact('invoice'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
