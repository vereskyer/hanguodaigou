<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rules;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->orderBy('created_at', 'desc')->get();
        return Inertia::render('ManageTenants/Index', [
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ManageTenants/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validation
        $validateData = $request->validate([
            "name"=> "required|string|max:255",
            "email"=> "required|email|max:255|unique:tenants",
            "domain"=> "required|string|max:255|unique:domains",
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($validateData);
        $tenant = Tenant::create($validateData);
        $tenant->domains()->create([
            "domain" => $validateData["domain"].'.'.config('app.domain'),
        ]);

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
