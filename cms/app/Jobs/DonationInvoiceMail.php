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
use App\Models\CampaignCollection;
use App\Models\Campaign;

class DonationInvoiceMail implements ShouldQueue
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
            $fileUrl=$parameter['fileUrl'];

            if ($type=='DonationInvoice') {
                $dataDetails = CampaignCollection::where('id', $id)->first();
                $name =  $dataDetails['txtfirstname'];
                $email =  $dataDetails['txtemail'];
                $phone=  $dataDetails['txtphone'];
                $amount=  $dataDetails['amount'];

                $campaign_id =  $dataDetails['campaign_id'];
                $campaign_data = Campaign::with('getCreator')->where('id', $campaign_id)->first();
                $email = $campaign_data['getCreator']['email'];
                $campaign_name = $campaign_data['title'];

                $itemArray['name'] = $dataDetails['txtfirstname'].' '.$dataDetails['txtlastname'];
                $itemArray['project_name'] = 'iNNER-EYE';
                $itemArray['campaign_name'] = $campaign_name;
                $itemArray['amount'] = $amount;
                $itemArray['invoice'] = '000'.$id;
                $date = \Carbon\Carbon::parse(now(), 'UTC');
                $itemArray['datetime'] = $date->Format('jS \\of F Y h:i:s A');


                Mail::send('mailTemplate.DonationInvoice', ['data' => $itemArray], function ($message) use ($email,$fileUrl) {
                    $message->from(FromMail, FromMailTitle);
                    $message->subject("Donation Invoice");
                    $message->to($email, 'innerEye');
                    $message->attach($fileUrl);
                    if (TESTMAILActive) {
                        $message->to(TESTMAIL, 'innerEye');
                    }
                });
                if (Mail::failures()) {
                    dd("Mail sending Fail!!!!");
                } else {
                    echo "sent successfully";
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage().'#'.$e->getLine().'@'.$e->getFile());
        }
    }
}
