<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class campaignListResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
             'id'=>$this->id,
             'creator_id'=>$this->creator_id,
             'title'=>  $this->title,
             'slug'=>  $this->slug,
             'subtitle'=> $this->subtitle,
             'location'=> $this->location,
             // 'lat'=> $this->lat,
             // 'lng'=> $this->lng,
             'description'=> $this->description,
             'description_data'=> substr(htmlspecialchars(trim(strip_tags($this->description))), 0, 200).'...' ,
             'story'=> $this->story,
             'seats'=> $this->seats,
             'amount'=> $this->amount,
             'no_of_donor'=> $this->no_of_donor,
             'collect_percentage'=> $this->collect_percentage,
             'collect_amount'=> $this->collect_amount,
             'contributor'=> isset($this->getCampaignCollection)?count($this->getCampaignCollection):[],
             'daysleft' => Carbon::now()->diffInDays(Carbon::parse($this->end_date), false)<=0?'Today':Carbon::now()->diffInDays(Carbon::parse($this->end_date), false),
             'project_id'=> $this->project_id,
             'get_team'=> isset($this->getTeam)?$this->getTeam:[],
             'get_images'=> isset($this->getCampaignImages)?$this->getCampaignImages:[],
             'get_docs'=> isset($this->getCampaignDocs)?$this->getCampaignDocs:[],
             'creator'=>isset($this->getCreator)?$this->getCreator:[],
             'get_campaign_collection'=> isset($this->getCampaignCollection)?$this->getCampaignCollection:[],
             'start_date'=> Carbon::parse($this->start_date)->format('d-m-Y'),
             'end_date'=> Carbon::parse($this->end_date)->format('d-m-Y'),
             'status'=>$this->status,
             'tags'=> json_decode($this->tags, true) ,
             'created_at'=> Carbon::parse($this->created_at)->format('d-m-Y h:i A'),
             'updated_at'=> Carbon::parse($this->updated_at)->format('d-m-Y'),
             'project_name'=> isset($this->getProject->project_name)?$this->getProject->project_name:"",
       ];
    }
}
