<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::simplePaginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        //The request is validated using FormRequest Class
        $path = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = Str::random(20) . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('uploads', $fileName, 'public');
        }
        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo'=>$path
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = Str::random(20) . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('uploads', $fileName, 'public');

            // Delete old logo file if exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }

            $company->logo = $path;
        }
        // Update other fields
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Delete the company's logo from storage if it exists
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
