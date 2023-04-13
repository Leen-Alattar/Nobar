<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'name' =>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
        ]);
        if ($request->file('logo')) {
            $destination_path = 'public/images';
            $image = $request->file('logo');
            $image_name = uniqid().'.'.$image->getClientOriginalName();
            $path = $request
                ->file('logo')
                ->storeAs($destination_path, $image_name);
            $input['logo'] = $image_name;
        }

        Company::create([
            'name' => $request->name,
            'email' => $request->email?? null,
            'website' => $request->website?? null,
            'logo' => $image_name?? null,
        ]);

        return redirect()
            ->route('company.index')
            ->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' =>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
        ]);
        if ($request->file('logo')) {
            $destination_path = 'public/images';
            $image = $request->file('logo');
            $image_name = uniqid().'.'.$image->getClientOriginalName();
            $path = $request
                ->file('logo')
                ->storeAs($destination_path, $image_name);
            $input['logo'] = $image_name;
        }
        Company::where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email?? null,
            'website' => $request->website?? null,
            'logo' => $image_name,
        ]);

        return redirect()
            ->route('company.index')
            ->with('message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $company = Company::find($id);
        $company->destroy($id);
        return redirect()
            ->route('company.index')
            ->with('delete', 'Deleted Successfully');
    }
}
