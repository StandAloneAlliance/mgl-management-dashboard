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
       // Ottieni tutti i corsi che sono in scadenza esattamente 8 giorni dopo la data attuale
        $courses = Course::whereDate('data_scadenza', now()->addDays(8)->toDateString())->get();

        foreach ($courses as $course) {
            // Cambio lo status del corso in 'sta per scadere'
            $course->update(['status' => 'In Scadenza']);

            }

            // Ottieni tutti gli amministratori della piattaforma
            $adminUsers = User::all();
            // Invia l'e-mail agli amministratori della piattaforma

            foreach ($adminUsers as $adminUser) {
                Mail::to('info@mglconsultingsrls.it')->send(new MailForUsers($adminUser, $course));
                // Registra l'invio dell'e-mail nel database
                Lead::create([
                    'name' => $adminUser->name,
                    'surname' => $adminUser->surname,
                    'email' => $adminUser->email,
                    'description' => 'Corso in scadenza tra 8gg'
                ]);
            }
        }
    }

