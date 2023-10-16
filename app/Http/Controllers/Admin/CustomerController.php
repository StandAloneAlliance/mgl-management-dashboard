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
        $types = config('courses_type');
        return view('admin.customers.create', compact('types'));
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

        // GESTIONE RELAZIONE MANY-TO-MANY (RESTAURANTS - TYPES)

            // if ($request->has('types')){
                
            //     $restaurant->types()->attach($request->types);
            // }

        //

        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function assignCourses($id)
    {
        $customer = Customer::find($id);
        $courses = config('courses_type');
        
        return view('admin.customers.assign_courses', compact('customer', 'courses'));
    }

    public function storeAssignCourses(StoreCourseRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->corsi()->sync($request->input('corsi')); // Assumendo che la select abbia un attributo 'name' di 'corsi[]'

        return redirect()->route('admin.customers.index')->with('success', 'Corsi assegnati con successo');
    }
}
