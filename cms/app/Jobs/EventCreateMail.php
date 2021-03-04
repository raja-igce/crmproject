<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Models\Event;
use App\Models\EventTeam;

class EventCreateMail implements ShouldQueue
{
    use   Dispatchable,InteractsWithQueue, Queueable, SerializesModels;
    public $parameter;
    public function __construct($parameter)
    {
        $this->parameter =$parameter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $parameter = $this->parameter;

            $project_id=$parameter['project_id'];


            $projectDetails = Event::where('id', $project_id)->first();
            $teamMemeber = EventTeam::with('getTeamMemeber')->where('event_id', $project_id)->get()->toArray();
            $projectName =  $projectDetails['title'];



            foreach ($teamMemeber as $key => $value) {
                $firstname = $value['get_team_memeber']['first_name'];
                $lastname = $value['get_team_memeber']['last_name'];
                $email = $value['get_team_memeber']['email'];

                $title = "Project $projectName created";
                $subject = "Project $projectName created";

                $line2 = "Dear Mr./Ms $firstname $lastname,<br><br>
                    New Project created $projectName .<br><br>
                    <br><br>
                    iNNER-EYE is a charitable organization to enable helpless/support-less people to have sustainable Livelihood,
                    Health and Education for progressive individual and social development.";


                Mail::send('mailTemplate.CommonTemplate', ['line1' => $title, 'line2' => $line2], function ($message) use ($email,$subject) {
                    $message->from(FromMail, "iNNER-EYE");
                    $message->subject($subject);
                    $message->to($email, 'innerEye');
                });
            }
        } catch (\Exception $e) {
            dd($e->getMessage().'#'.$e->getLine().'@'.$e->getFile());
        }
    }
}
