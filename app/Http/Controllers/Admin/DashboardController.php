<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Import the File facade
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // Generate the full file path using base_path()
        $filePath = base_path('scripts/input.html');

        // Check if the file exists
        if (File::exists($filePath)) {
            // Read the HTML content from the file
            $htmlContent = file_get_contents($filePath);

            
        } else {
            // Handle the case where the file doesn't exist
            $htmlContent = '<p>No HTML content available.</p>';
        }

        if ($request->isMethod('post')) {
            // Execute bash commands when form is submitted
            $process = new Process(['bash', '-c', 'sleep 30 && git pull']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

                        // Log the event
                        Log::info('Bash commands executed successfully', [
                            'user_id' => auth()->id() ?? 'guest',
                        ]);
        }

        $user = auth()->user();
        
        return view('admin.dashboard', ['htmlContent' => $htmlContent], compact('user'));
    }
}
