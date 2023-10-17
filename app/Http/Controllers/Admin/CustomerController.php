<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Course;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function assignCourses($id)
    {
        // RECUPERO IL CORSISTA TRAMITE L'ID
        $customer = Customer::find($id);

        // RECUPERO L'ARRAY DEI CORSI NEL FILE NELLA CARTELLA CONFIG
        $courses = config('courses_type');
        
        // PASSO ALLA VIEW LE VARIABILI CUSTOMER CON L'ID E COURSES
        return view('admin.customers.assign_courses', compact('customer', 'courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){
                    
                $img_path = Storage::put('customer_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }
        //

        $customer = new Customer();

        $customer->fill($form_data);

        $customer->save();

        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $courses = $customer->courses;
        return view('admin.customers.show', compact('customer', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){

                if($customer->cover_image){

                    Storage::delete($customer->cover_image);
                }
                
                $img_path = Storage::put('customer_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }

        $customer->update($form_data);

        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if($customer->cover_image){
            Storage::delete($product->cover_image);
        }

        $customer->courses()->detach();
    
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }
}
