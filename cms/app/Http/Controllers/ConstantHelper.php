<?php

$appUrl = config('app.url');

if(!defined("SITE_URL")) define("SITE_URL", $appUrl);

if(!defined("love")) define("love", SITE_URL);
if(!defined("Assets")) define("Assets", SITE_URL . 'public/assets/');
if(!defined("FrontAssets")) define("FrontAssets", SITE_URL . 'public/front/');


if(!defined("CampaignImagePath")) define("CampaignImagePath", SITE_URL . 'public/assets/Campaign/');
if(!defined("BlogImagePath")) define("BlogImagePath", SITE_URL . 'public/assets/Blog/');
if(!defined("BlogStoryImagePath")) define("BlogStoryImagePath", SITE_URL . 'public/assets/BlogStory/');
if(!defined("TeamImagePath")) define("TeamImagePath", SITE_URL . 'public/assets/Users/');
if(!defined("UserPath")) define("UserPath", SITE_URL . 'public/assets/Users/');
if(!defined("GroupPath")) define("GroupPath", SITE_URL . 'public/assets/Group/');
if(!defined("EventImagePath")) define("EventImagePath", SITE_URL . 'public/assets/Event/');
if(!defined("BeneficiaryPath")) define("BeneficiaryPath", SITE_URL . 'public/assets/Beneficiary/');


if(!defined("ABSBase")) define("ABSBase", '../');
if(!defined("ABS_PATH")) define("ABS_PATH", 'public/assets/');
if(!defined("EventAbsPath")) define("EventAbsPath", ABSBase . 'public/assets/Event/');
if(!defined("CampaignAbsPath")) define("CampaignAbsPath", ABSBase . 'public/assets/Campaign/');
if(!defined("UsersAbsPath")) define("UsersAbsPath", ABSBase . 'public/assets/Users/');
if(!defined("BeneficiaryAbsPath")) define("BeneficiaryAbsPath", ABSBase . 'public/assets/Beneficiary/');
if(!defined("ProjectAbsPath")) define("ProjectAbsPath", ABSBase . 'public/assets/Project/');
if(!defined("BlogAbsPath")) define("BlogAbsPath", ABSBase . 'public/assets/Blog/');
if(!defined("BlogStoryAbsPath")) define("BlogStoryAbsPath", ABSBase . 'public/assets/BlogStory/');
if(!defined("TaskAbsPath")) define("TaskAbsPath", ABSBase . 'public/assets/Task/');
if(!defined("ActiveSMS")) define("ActiveSMS", TRUE);

/* default message */
if(!defined("BlogOwnerMsg")) define("BlogOwnerMsg", "User is a regular writer for the Vestige Museum blog. She loves to write more about the animal species and have so much faith in the nature's doing.");







if(!defined("FromMail")) define("FromMail", "info@innereye.com");
if(!defined("CONTACT_MAIL_ADMIN")) define("CONTACT_MAIL_ADMIN", 'innereyefoundation@gmail.com');
if(!defined("FromMailTitle")) define("FromMailTitle", "iNNER-EYE");
if(!defined("TESTMAILActive")) define("TESTMAILActive", true);
if(!defined("TESTMAIL")) define("TESTMAIL", "manoj.infoways@gmail.com");
if (!function_exists('errormsg'))   {
function pr($input)
{
    echo "<pre>";
    print_r($input->toArray());
    echo "</pre>";
}
}
if (!function_exists('errormsg'))   {
function errormsg($e)
{
    return "Line=>" . $e->getLine() . ' Error=>' . $e->getMessage() . ' File=>' . $e;
}
}
if (!function_exists('getPriority'))   {
function getPriority()
{
    $item = [];
    $item[0]['name'] = "Low";
    $item[0]['value'] = "Low";
    $item[1]['name'] = "Medium";
    $item[1]['value'] = "Medium";
    $item[2]['name'] = "High";
    $item[2]['value'] = "High";
    return  $item;
}
}
if (!function_exists('getCountry'))   {
function getCountry()
{
    $item = [];
    $item[0]['name'] = "India";
    $item[1]['name'] = "USA";
    $item[2]['name'] = "Australia";
    return  $item;
}
}
if (!function_exists('getStage'))   {
function getStage()
{
    $item = [];
    $item[0]['name'] = "Plan";
    $item[0]['value'] = "Plan";
    $item[1]['name'] = "Design";
    $item[1]['value'] = "Design";
    $item[2]['name'] = "Development";
    $item[2]['value'] = "Development";
    $item[3]['name'] = "Complete";
    $item[3]['value'] = "Complete";
    return  $item;
}
}
if (!function_exists('getOrganizationSize'))   {
function getOrganizationSize()
{
    $item = [];
    $item[0]['name'] = "Less than 50";
    $item[0]['value'] = "Less than 50";
    $item[1]['name'] = "More than 50";
    $item[1]['value'] = "More than 50";
    $item[2]['name'] = "More than 100";
    $item[2]['value'] = "More than 100";
    $item[3]['name'] = "Above 200";
    $item[3]['value'] = "200+";
    return  $item;
}
}

if (!function_exists('getFamilySize'))   {
function getFamilySize()
{
    $item = [];
    $ind = 0;
    $item[$ind]['name'] = "1";
    $item[$ind]['value'] = "1";
    $ind++;
    $item[$ind]['name'] = "2";
    $item[$ind]['value'] = "2";
    $ind++;
    $item[$ind]['name'] = "3";
    $item[$ind]['value'] = "3";
    $ind++;
    $item[$ind]['name'] = "4";
    $item[$ind]['value'] = "4";
    $ind++;
    $item[$ind]['name'] = "5";
    $item[$ind]['value'] = "5";
    $ind++;
    $item[$ind]['name'] = "6";
    $item[$ind]['value'] = "6";
    $ind++;
    $item[$ind]['name'] = "7";
    $item[$ind]['value'] = "7";
    $ind++;
    $item[$ind]['name'] = "More then 7";
    $item[$ind]['value'] = "More then 7";
    $ind++;

    return  $item;
}
}
if (!function_exists('getFamilyIncome'))   {
function getFamilyIncome()
{
    $item = [];
    $ind = 0;
    $item[$ind]['name'] = "Less Than 5000";
    $item[$ind]['value'] = "Less Than 5000";
    $ind++;
    $item[$ind]['name'] = "More Than 5000";
    $item[$ind]['value'] = "More Than 5000";
    $ind++;
    return  $item;
}
}
if (!function_exists('getGender'))   {
function getGender()
{
    $item = [];
    $ind = 0;
    $item[$ind]['name'] = "Male";
    $item[$ind]['value'] = "Male";
    $ind++;
    $item[$ind]['name'] = "Female";
    $item[$ind]['value'] = "Female";
    $ind++;
    $item[$ind]['name'] = "Transgender";
    $item[$ind]['value'] = "Transgender";
    $ind++;
    return  $item;
}
}
if (!function_exists('getMeritalStatus'))   {
function getMeritalStatus()
{
    $item = [];
    $ind = 0;
    $item[$ind]['name'] = "Single";
    $item[$ind]['value'] = "Single";
    $ind++;
    $item[$ind]['name'] = "Married";
    $item[$ind]['value'] = "Married";
    $ind++;
    $item[$ind]['name'] = "Widow";
    $item[$ind]['value'] = "Widow";
    $ind++;
    $item[$ind]['name'] = "Widow Man";
    $item[$ind]['value'] = "Widow Man";
    $ind++;
    return  $item;
}
}
if (!function_exists('getPosition'))   {
function getPosition()
{
    $item = [];
    $item[0]['name'] = "Board of Directors";
    $item[0]['value'] = "Board of Directors";
    $item[1]['name'] = "Honorary Member";
    $item[1]['value'] = "Honorary Member";
    $item[2]['name'] = "Executive";
    $item[2]['value'] = "Executive";
    $item[3]['name'] = "Co-ordinator";
    $item[3]['value'] = "Co-ordinator";
    $item[4]['name'] = "Volunteers";
    $item[4]['value'] = "Volunteers";
    return  $item;
}
}
if (!function_exists('getReference'))   {
function getReference()
{
    $item = [];
    $item[0]['name'] = "Website";
    $item[0]['value'] = 1;
    $item[1]['name'] = "Facebook";
    $item[1]['value'] = 2;
    $item[2]['name'] = "Family/Friends";
    $item[2]['value'] = 3;
    $item[3]['name'] = "Search Engine";
    $item[3]['value'] = 4;
    $item[4]['name'] = "Other";
    $item[4]['value'] = 5;
    return  $item;
}
}
if (!function_exists('getTimeslot'))   {
function getTimeslot()
{
    $item = [];
    $index = 0;
    $item[$index]['name'] = "";
    $item[$index]['value'] = "";
    $item[$index]['name'] = "12:00 AM";
    $item[$index]['value'] = "00:00:00";
    $index = $index + 1;
    $item[$index]['name'] = "12:15 AM";
    $item[$index]['value'] = "00:15:00";
    $index = $index + 1;
    $item[$index]['name'] = "12:45 AM";
    $item[$index]['value'] = "00:45:00";
    $index = $index + 1;

    for ($h = 1; $h < 12; $h++) {
        for ($m = 00; $m <= 45; $m = $m + 15) {
            $h =  str_pad($h, 2, '0', STR_PAD_LEFT);
            $updatedH =  str_pad($h, 2, '0', STR_PAD_LEFT);
            $m =  str_pad($m, 2, '0', STR_PAD_LEFT);
            $item[$index]['name'] = $h . ":" . $m . ' AM';
            $item[$index]['value'] = $updatedH . ":" . $m . ':00';
            $index++;
        }
    }

    $item[$index]['name'] = "12:00 PM";
    $item[$index]['value'] = "12:00:00";
    $index = $index + 1;
    $item[$index]['name'] = "12:15 PM";
    $item[$index]['value'] = "12:15:00";
    $index = $index + 1;
    $item[$index]['name'] = "12:45 PM";
    $item[$index]['value'] = "12:45:00";
    $index = $index + 1;

    for ($h = 1; $h < 12; $h++) {
        for ($m = 00; $m <= 45; $m = $m + 15) {
            $h =  str_pad($h, 2, '0', STR_PAD_LEFT);

            $updatedH =  str_pad($h + 12, 2, '0', STR_PAD_LEFT);
            $m =  str_pad($m, 2, '0', STR_PAD_LEFT);
            $item[$index]['name'] = $h . ":" . $m . ' PM';
            $item[$index]['value'] = $updatedH . ":" . $m . ':00';
            $index++;
        }
    }

    return  $item;
}
}
