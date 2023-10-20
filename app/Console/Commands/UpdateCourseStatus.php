<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Course;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;

class UpdateCourseStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of courses';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            if (Carbon::now()->greaterThan($course->data_scadenza)) {
                $course->status = 'scaduto';
                $course->save();
            }
        }

        $this->info('Course statuses updated successfully.');

        $expiry_courses = Course::whereDate('data_scadenza', Carbon::now()->subDays(8))->get();

        foreach ($expiry_courses as $course) {
            foreach ($course->customers as $customer) {
                $user = $customer->user;

                if ($user) {
                    // Invia la notifica all'utente
                }
            }
        }
    }
}

