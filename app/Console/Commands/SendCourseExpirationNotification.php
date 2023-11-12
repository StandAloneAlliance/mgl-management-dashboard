<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Course;
use App\Models\Customers;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailForUsers;

class SendCourseExpirationNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:course-expiration-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invia notifiche 8 giorni prima della scadenza del corso';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiry_courses = Course::with('customers.user')->whereDate('data_scadenza', Carbon::now()->subDays(8))->get();

        foreach ($expiry_courses as $course) {
            foreach ($course->customers as $customer) {
                $user = $customer->user()->first(); // Otteni il primo utente

                if ($user) {
                    Mail::to($user->email)->send(new MailForUsers($user));
                }
            }
        }
    }
}
