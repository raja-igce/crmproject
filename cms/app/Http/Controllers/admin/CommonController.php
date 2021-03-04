<?php

namespace App\Http\Controllers\admin;

use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Models\CampaignCollection;
use App\Models\Campaign;
use App\Models\ProjectDocuments;
use App\User;

use File;
use PDF;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public static function SendSMS($phone, $msg)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsapi.edumarcsms.com/api/v1/sendsms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"message\":\"$msg\",\"senderId\":\"iNNERi\",\"number\":[\"$phone\"],\"dlr_method\":\"POST\"}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Postman-Token: 10005057-675f-40fd-bd42-1f6ee522966c",
                "apikey: cjn0g3v3j000aumqur032tpf2",
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
    public function downloadPDF($itemArray, $type = 'DonationInvoice')
    {
        if ($type == 'DonationInvoice') {
            $id = $itemArray['id'];
            $dataDetails = CampaignCollection::where('id', $id)->first();
            $campaign_id =  $dataDetails['campaign_id'];
            $email =  $dataDetails['txtemail'];
            $phone =  $dataDetails['txtphone'];
            $amount =  $dataDetails['amount'];


            $file_path = 'public/PDFs/DonationInvoice/InvoiceDonation_.' . time() . '.pdf';
            $campaign_data = Campaign::with('getCreator')->where('id', $campaign_id)->first();
            //$email = $campaign_data['getCreator']['email'];
            $campaign_name = $campaign_data['title'];

            $itemArray['name'] = $dataDetails['txtfirstname'] . ' ' . $dataDetails['txtlastname'];
            $itemArray['project_name'] = 'iNNER-EYE';
            $itemArray['campaign_name'] = $campaign_name;
            $itemArray['amount'] = $amount;
            $itemArray['invoice'] = '000' . $id;
            $date = \Carbon\Carbon::parse(now(), 'UTC');
            $itemArray['datetime'] = $date->Format('jS \\of F Y h:i:s A');

            $html =  view('mailTemplate.DonationInvoice', ['data' => $itemArray])->render();
            $pdf = PDF::loadHTML($html)->save($file_path);
            return $file_path;
        } else {
        }
    }
    public function uploadfile()
    {
        if (Input::all()) {
            $parameter = Input::all();
            if (Input::hasFile('imagefile')) {
                $file = Input::file('imagefile');
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                if (!File::exists(ABS_PATH . 'Temp/Thumb/')) {
                    File::makeDirectory(ABS_PATH . 'Temp/Thumb/', 0777, true);
                }
                $savepath = ABS_PATH . 'Temp/';
                $file->move($savepath, $filename);
                $filesize = "";

                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    $icon = "<i class='fa fa-file-image-o iconsize'></i>";
                } elseif (in_array(strtolower($file->getClientOriginalExtension()), ['pdf'])) {
                    $icon = "<i class='fa fa-file-pdf-o iconsize'></i>";
                } elseif (in_array(strtolower($file->getClientOriginalExtension()), ['ppt', 'pptx'])) {
                    $icon = "<i class='fa fa-file-powerpoint-o iconsize'></i>";
                } elseif (in_array(strtolower($file->getClientOriginalExtension()), ['doc', 'docx'])) {
                    $icon = "<i class='fa fa-file-word-o iconsize'></i>";
                } else {
                    $icon = "<i class='fa fa-file-o iconsize'></i>";
                }

                $default = Assets . 'images/attachment.png';
                $extention = strtoupper($file->getClientOriginalExtension());
                /*
                echo "<div  title='".$Orgfilename."' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                                          . "<input type='hidden' value='".$filename."' name='imagename[]'  id='imagename' >
                                          <input type='hidden' value='".$Orgfilename."' name='orgimagename[]'  id='orgimagename' >"
                                          . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                                          . "<a href='".env("APP_URL").$savepath.$filename."'>$icon<img id='galimg$imgname' src='".$default."'  class='profile-picImg' style='height:150px;'></a>"
                                          . "</div>";
                */
                echo "<div title='" . $Orgfilename . "' id='GalleryBox$imgname' class='profile-picImg GalleryBox clearimx'><input type='hidden' value='" . $filename . "' name='imagename[]'  id='imagename'><div class='iconclose' onclick='deletegalleryimage(\"$imgname\");' >X</div><input type='hidden'  value='" . $Orgfilename . "'  name='orgimagename[]' id='orgimagename'><div class='iconfile'  ><a href='" . env("APP_URL") . $savepath . $filename . "' target='_blank' style='float: left;'>$icon</a></div><div class='icontitle'><a  href='" . env("APP_URL") . $savepath . $filename . "'  target='_blank'>$Orgfilename</a></div><div></div><div class='iconsubtitle'> $filesize $extention</div></div><div class='clearfix'></div>";
            }
        }
    }

    public function uploadimagethumb()
    {
        if (Input::all()) {
            $parameter = Input::all();
            if (Input::hasFile('imagefile')) {
                $file = Input::file('imagefile');
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                if (!File::exists(ABS_PATH . 'Temp/Thumb/')) {
                    File::makeDirectory(ABS_PATH . 'Temp/Thumb/', 0777, true);
                }
                $savepath = ABS_PATH . 'Temp/';
                $file->move($savepath, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    ImageHelper::resize_crop_image(150, 150, $savepath . $filename, $savepath . 'Thumb/' . $filename, 100);
                    echo "<div title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename[]'  id='imagename' ><input type='hidden' value='" . $Orgfilename . "' name='orgimagename[]'  id='orgimagename' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<img id='galimg$imgname' src='" . env("APP_URL") . $savepath . 'Thumb/' . $filename . "'  class='profile-picImg'>"
                        . "</div>";
                } else {
                    $default = Assets . 'images/attachment.png';
                    echo "<div  title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename[]'  id='imagename' >
                                             <input type='hidden' value='" . $Orgfilename . "' name='orgimagename[]'  id='orgimagename' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "'><img id='galimg$imgname' src='" . $default . "'  class='profile-picImg' style='height:150px;'></a>"
                        . "</div>";
                }
                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }
    public function uploadimage()
    {
        if (Input::all()) {
            $parameter = Input::all();

            if (Input::hasFile('imagefile')) {
                $file = Input::file('imagefile');
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                

                $savepath = ABS_PATH.'Temp/';
                if (!File::exists($savepath)) {
                    File::makeDirectory($savepath, 0777, true);
                    File::makeDirectory($savepath.'/Thumb', 0777, true);
                }

                $savepath = ABS_PATH . 'Temp/';
                $file->move($savepath, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    ImageHelper::resize_crop_image(225, 150, $savepath . $filename, $savepath . 'Thumb/' . $filename, 80);
                    echo "<div title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename[]'  id='imagename' ><input type='hidden' value='" . $Orgfilename . "' name='orgimagename[]'  id='orgimagename' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<img id='galimg$imgname' src='" . env("APP_URL") . $savepath . 'Thumb/' . $filename . "'  class='profile-picImg'>"
                        . "</div>";
                } else {
                    $default = Assets . 'images/attachment.png';
                    echo "<div  title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename[]'  id='imagename' >
                                             <input type='hidden' value='" . $Orgfilename . "' name='orgimagename[]'  id='orgimagename' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "'><img id='galimg$imgname' src='" . $default . "'  class='profile-picImg' style='height:150px;'></a>"
                        . "</div>";
                }
                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }

    public function uploadimageReturnfile()
    {
        if (Input::all()) {
            $parameter = Input::all();
            $id = $parameter['id'];    
            if (Input::hasFile('imagefile')) {
                $file = Input::file('imagefile');
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                
                // if (!File::exists(UsersAbsPath .$id.'/Thumb/')){
                //     File::makeDirectory(UsersAbsPath.$id.'/Thumb/', 0777, true);
                // }
                $event_id = $id;   
                $savepath = ABS_PATH.'Users/';
                if (!File::exists($savepath.$event_id)) {
                    File::makeDirectory($savepath.$event_id, 0777, true);
                    File::makeDirectory($savepath.$event_id.'/Thumb', 0777, true);
                }
               
                $file->move($savepath.$event_id, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    ImageHelper::resize_crop_image(112, 112, $savepath .$event_id.'/'. $filename, $savepath .$event_id. '/Thumb/' . $filename, 80);
                    echo env("APP_URL") . $savepath .$event_id. '/Thumb/' . $filename; 
                    User::where('id',$id)->update(['profile_pic'=>$filename]);   
                }else{
                    echo "";
                }  
                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }
    public function readableBytes($bytes)
    {
        $i = floor(log($bytes) / log(1024));

        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
    }
    public function imgUploadAutoHeight()
    {
        if (Input::all()) {
            $parameter = Input::all();
            $inputfilename = $parameter['inputFileName'];
            $ismeta = $parameter['ismeta'];
            if (Input::hasFile($inputfilename)) {
                $file = Input::file($inputfilename);
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                if (!File::exists(ABS_PATH . 'Temp/Thumb/')) {
                    File::makeDirectory(ABS_PATH . 'Temp/Thumb/', 0777, true);
                }

                $Orgfilename = $file->getClientOriginalName();

                $item['size'] = $size = $this->readableBytes($file->getSize());
                $item['mime_type'] = $mime_type = $file->getMimeType();
                $item['extention'] = $extention = $file->getClientOriginalExtension();
                $item['filename'] = $Orgfilename;
                if ($ismeta == 'false') {
                    $item = [];
                }
                $item_meta = json_encode($item);
                $savepath = ABS_PATH . 'Temp/';
                $file->move($savepath, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    $imagedetails =    getimagesize($savepath . $filename);
                    $iheight = $parameter['iheight'];
                    $iwidth = $parameter['iwidth'];


                    $width = $imagedetails[0];
                    $height = $imagedetails[1];
                    if ($iheight == 'auto' && $iwidth == 'auto') {
                        $iheight = 200;
                        $iwidth = 200;
                    } elseif ($iwidth == 'auto') {
                        $aspration = $iheight / $height;
                        $width = round($width * $aspration);
                        $height = $iheight;
                    } elseif ($iheight == 'auto') {
                        $aspration = $iwidth / $width;
                        $height = round($height * $aspration);
                        $width = $iwidth;
                    } else {
                        $width = $iwidth;
                        $height =  $iheight;
                    }

                    ImageHelper::resize_crop_image($width, $height, $savepath . $filename, $savepath . 'Thumb/' . $filename, 100);
                    echo "<div title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname' style='display: table;max-width: 1px;word-wrap: anywhere;'>"
                        . "<input type='hidden' value='" . $filename . "' name='" . $inputfilename . "[]'  id='" . $inputfilename . "' >
                            <input type='hidden' value='" . $item_meta . "' name='meta_" . $inputfilename . "[]'  id='org" . $inputfilename . "' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "' target='_blank'><img id='galimg$imgname' src='" . env("APP_URL") . $savepath . 'Thumb/' . $filename . "'  class='profile-picImg'></a>";
                    if ($ismeta == 'true') {
                        echo "<div class='clearfix'></div><b style='font-size:10px'>$size ( $extention )</b><div class='clearfix'></div><i style='font-size:10px'>$Orgfilename</i>";
                    }
                    echo "</div>";
                } else {
                    $default = Assets . 'images/attachment.png';
                    echo "<div  title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='" . $inputfilename . "[]'  id='" . $inputfilename . "' >
                           <input type='hidden' value='" . $item_meta . "' name='meta_" . $inputfilename . "[]'  id='org" . $inputfilename . "' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "'><img id='galimg$imgname' src='" . $default . "'  class='profile-picImg' style='height:150px;'></a>";
                    if ($ismeta == 'true') {
                        echo "<div class='clearfix'></div><b style='font-size:10px'>$size ( $extention )</b><div class='clearfix'></div><i style='font-size:10px'>$Orgfilename</i></div>";
                    }
                    echo "</div>";
                }
                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }
    public function uploadimage2()
    {
        if (Input::all()) {
            $parameter = Input::all();
            if (Input::hasFile('imagefile1')) {
                $project_id = $parameter['project_id_new'];
                $savepath = ABS_PATH . 'Project/';

                if (!File::exists($savepath . $project_id)) {
                    File::makeDirectory($savepath . $project_id, 0755, true);
                    File::makeDirectory($savepath . $project_id . '/Thumb', 0755, true);
                }


                $file = Input::file('imagefile1');
                $imgname = 'Document' . time() . '_' . rand(000, 999);

                $filename  = $imgname . '.' . $file->getClientOriginalExtension();

                $Orgfilename = $file->getClientOriginalName();
                $item['size'] = $size = $this->readableBytes($file->getSize());
                $item['mime_type'] = $mime_type = $file->getMimeType();
                $item['extention'] = $extention = $file->getClientOriginalExtension();
                $item['filename'] = $Orgfilename;


                $savepath = ABS_PATH . "Project/$project_id/";
                $file->move($savepath, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    ImageHelper::resize_crop_image(225, 150, $savepath . $filename, ABS_PATH . "Project/$project_id/Thumb/" . $filename, 80);
                    echo "<div title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname' style='display: table;max-width: 1px;word-wrap: anywhere;'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename1[]'  id='imagename1' >
                                                     <input type='hidden' value='" . $filename . "' name='orgimagename1[]'  id='orgimagename1' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$filename\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "' target='_blank'><img id='galimg$imgname' src='" . env("APP_URL") . $savepath . 'Thumb/' . $filename . "'  class='profile-picImg'></a>"
                        . "<div class='clearfix'></div><b>$size ($extention)</b><div class='clearfix'></div><i>$Orgfilename</i></div>";
                    $type = 'img';
                } else {
                    $default = Assets . 'images/attachment.png';
                    echo "<div  title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname' style='display: table;max-width: 1px;word-wrap: anywhere;'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename1[]'  id='imagename1' >
                                                <input type='hidden' value='" . $filename . "' name='orgimagename1[]'  id='orgimagename1' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$filename\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "'><img id='galimg$imgname' src='" . $default . "'  class='profile-picImg' style='height:150px;'></a>"
                        . "<div class='clearfix'></div><b>$size ($extention)</b><div class='clearfix'></div><i>$Orgfilename</i></div>";
                    $type = 'file';
                }

                $addteam = new ProjectDocuments();
                $addteam->project_id = $project_id;

                $addteam->file = $filename;
                $addteam->file_name = $Orgfilename;
                $addteam->meta_data = json_encode($item);
                $addteam->type = $type;
                $addteam->save();

                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }
    public function uploadimage1()
    {
        if (Input::all()) {
            $parameter = Input::all();
            if (Input::hasFile('imagefile1')) {
                $file = Input::file('imagefile1');
                $imgname = 'Document' . time() . '_' . rand(000, 999);
                $filename  = $imgname . '.' . $file->getClientOriginalExtension();
                $Orgfilename = $file->getClientOriginalName();
                if (!File::exists(ABS_PATH . 'Temp/Thumb/')) {
                    File::makeDirectory(ABS_PATH . 'Temp/Thumb/', 0777, true);
                }
                $savepath = ABS_PATH . 'Temp/';
                $file->move($savepath, $filename);
                if (in_array(strtolower($file->getClientOriginalExtension()), ['png', 'jpg', 'jpeg', 'bmp', 'gif'])) {
                    ImageHelper::resize_crop_image(225, 150, $savepath . $filename, $savepath . 'Thumb/' . $filename, 80);
                    echo "<div title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename1[]'  id='imagename1' >
                                                   <input type='hidden' value='" . $Orgfilename . "' name='orgimagename1[]'  id='orgimagename1' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<img id='galimg$imgname' src='" . env("APP_URL") . $savepath . 'Thumb/' . $filename . "'  class='profile-picImg'>"
                        . "</div>";
                } else {
                    $default = Assets . 'images/attachment.png';
                    echo "<div  title='" . $Orgfilename . "' class='profile-picImg GalleryBox clearimx' id='GalleryBox$imgname'>"
                        . "<input type='hidden' value='" . $filename . "' name='imagename1[]'  id='imagename1' >
                                             <input type='hidden' value='" . $Orgfilename . "' name='orgimagename1[]'  id='orgimagename1' >"
                        . "<div class='gclose' onclick='deletegalleryimage(\"$imgname\");' title='Remove Image'></div>"
                        . "<a href='" . env("APP_URL") . $savepath . $filename . "'><img id='galimg$imgname' src='" . $default . "'  class='profile-picImg' style='height:150px;'></a>"
                        . "</div>";
                }
                //echo   <div class='imageuploadify-container' style='margin-left: 0px;'><button type='button' class='btn btn-danger glyphicon glyphicon-remove'></button><div class='imageuploadify-details' style="opacity: 0;"><span>cute_baby_santa_hat-3840x2160.jpg</span><span>image/jpeg</span><span>823885</span></div>
                //<img src=""></div>';
            }
        }
    }
}
