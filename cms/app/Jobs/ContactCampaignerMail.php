<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Models\Event;
use App\Models\CampaignContact;
use App\Models\Campaign;

class ContactCampaignerMail implements ShouldQueue
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

            $id=$parameter['id'];
            $type=$parameter['type'];

            if ($type=='CampaignerContact') {
                $dataDetails = CampaignContact::where('id', $id)->first();
                $name =  $dataDetails['name'];
                $senderemail =  $dataDetails['email'];
                $comment =  $dataDetails['comment'];
                $campaign_id =  $dataDetails['campaign_id'];

                $campaign_data = Campaign::with('getCreator')->where('id', $campaign_id)->first();

                $email = $campaign_data['getCreator']['email'];
                $campaign_name = $campaign_data['title'];

                $title = "$name wants contact you regarding $campaign_name";
                $subject = "$name wants contact you regarding $campaign_name";

                $line2 = "Dear  ,<br><br>
                            New Contact requrest arrive by <b>$name</b> .<br><br>
                            <b>Message : </b>
                            $comment
                            ";

                Mail::send('mailTemplate.CommonTemplate', ['line1' => $title, 'line2' => $line2], function ($message) use ($senderemail,$email,$subject) {
                    $message->from($senderemail, "iNNER-EYE");
                    $message->subject($subject);
                    $message->to($email, 'innerEye');
                    
                    $message->to(CONTACT_MAIL_ADMIN, 'innerEye');
                });
            }
        } catch (\Exception $e) {
            dd($e->getMessage().'#'.$e->getLine().'@'.$e->getFile());
        }
    }
}
