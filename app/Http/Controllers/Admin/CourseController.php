<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Http;
use DOMDocument;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public $sharedData = [];

    public function submit(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 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',
            'Accept' => 'application/vnd.github.v3+json',
            
        ])
        ->withOptions(['verify' => false]) // Disable SSL verification
        ->post('https://api.github.com/repos/antoniogisondi/mgl-management-dashboard/actions/workflows/scrape-trigger.yml/dispatches', [
            'ref' => 'laravel-dev',
            'inputs' => [
                'payload' => 'Hello from API'
            ]
        ]);
        
        if ($response->successful()) {

            

            // Request was successful
            $responseData = $response->json();
            // Do something with the response data
            sleep(30);

            $filePath =  base_path('scripts/input.html'); 

            $html = file_get_contents($filePath);
    
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
    
            $tableRows = $dom->getElementsByTagName('tr');
    
            $tables = $dom->getElementsByTagName('table');
    $rows = $tables[0]->getElementsByTagName('tr');

    $courses = [];
    if ($tables->length > 0) {
        $rows = $tables[0]->getElementsByTagName('tr');

        foreach ($rows as $row) {
            $columns = $row->getElementsByTagName('td');
            
            // Check if the row has the expected number of columns
            if ($columns->length >= 6) {
                // Extract data based on the observed structure of the table
                $course_data = [
                    'nome_corso' => $columns[0]->nodeValue,
                    'numero_autorizzazione' => $columns[1]->nodeValue,
                    'genere_corso' => $columns[2]->nodeValue,
                    'indirizzo_di_svolgimento' => $columns[3]->nodeValue,
                    'inizio_di_svolgimento' => $columns[4]->nodeValue,
                    'fine_svolgimento' => $columns[5]->nodeValue,
                    // ... other fields ...
                ];
                
        
        $courses[] = $course_data;
    }

    // Refresh the course table
    Course::truncate();
    foreach ($courses as $course_data) {
        Course::create($course_data);
    }

        }
        return view('admin.courses.pipeline_triggered', compact('objects'));
    }
    }
    }
}
