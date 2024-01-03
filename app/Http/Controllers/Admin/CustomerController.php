<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function assignCourses($id)
    {
        // RECUPERO IL CORSISTA TRAMITE L'ID
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->back()->with('errore', 'Corsista non trovato');
        }

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
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $surname = $request->input('surname');
        $fiscal_code = $request->input('fiscal_code');

        $customer_query = Customer::query();

        if($keyword){
            $customer_query->where('name', 'like', "%$keyword%");
        }

        if($surname){
            $customer_query->where('surname', 'like', "%$surname%");
        }

        if($fiscal_code){
            $customer_query->where('cfr', 'like', "%$fiscal_code%");
        }

        $customers = $customer_query->orderBy('created_at', 'desc')->get();

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

        $user = auth()->user();

        $customer->user_id = $user->id;

        $customer->fill($form_data);

        $customer->save();

        return redirect()->route('admin.customers.index')->with('message', 'Hai creato un nuovo corsista, assegnali subito un corso');
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

        if($customer && $customer->courses()->exists()){
            $courses = $customer->courses;
            foreach($courses as $course){
                $formatted_start_date = Carbon::parse($course->inizio_di_svolgimento)->format('d-m-Y');
                $formatted_end_date = Carbon::parse($course->fine_svolgimento)->format('d-m-Y');         
                $formatted_expiry_date = Carbon::parse($course->data_scadenza)->format('d-m-Y');       
            }
            return view('admin.customers.show', compact('customer', 'courses', 'formatted_start_date', 'formatted_end_date', 'formatted_expiry_date'));
        } else {
            return redirect()->back()->with('error', 'Operazione non autorizzata');

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if(isset($customer)){
            return view('admin.customers.edit', compact('customer'));
        } else {
            return redirect()->back()->with('error', 'Operazione non autorizzata');
        }
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

        return redirect()->route('admin.customers.index')->with('message', 'Hai modificato il corsista correttamente');
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
            Storage::delete($customer->cover_image);
        }

        $customer->courses()->detach();
    
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }
}
