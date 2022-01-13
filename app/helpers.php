<?php 

use Carbon\Carbon;

if(!function_exists('formatTime'))
{
    function formatTime($time, $opt = "12")
    {
        if(!$time) {
            return '';
        }

        if($opt == "12") {
            return date('h:iA', strtotime($time));
        }
    }

}

if(!function_exists('isOpen'))
{
    function isOpen($status)
    {
        
        return($status === 0) 
        ? '<span class="badge default_bg2 p-2 text-white" role="button" onclick="bookSchedule($d)">Book now<i class="fas fa-paper-plane ml-2"></i></span>' 
        : '<span class="badge secondary_bg p-2 text-white" >Fully Booked <i class="fas fa-times ml-1"></i> </span>';
    }

}

if(!function_exists('formatDate'))
{
    function formatDate($date, $opt="fulldate")
    {
       if($opt == "fulldate") 
       {
          return  date('F d,Y', strtotime($date));
       }

       if($opt == "dateTimeWithSeconds") {
          return date('Y-m-d h:i:s', strtotime($date));
       }
       
       if($opt == "dateTimeLocal") {
        return date('Y-m-d\TH:i', strtotime($date));
       }
       if($opt == "dateTime") 
       {
          return  date('M d,Y h:iA', strtotime($date));
       }


       if($opt == "time") {
        return date('H:iA', strtotime($date));
       }
    }

}

if(!function_exists('isScheduleDone'))
{
    function isScheduleDone($status)
    {
       if($status === 0) 
       {
          return 'Open';
       } else {
          return 'Closed';
       }
    }

}

if(!function_exists('isTaskDone'))
{
    function isTaskDone($status)
    {
       if($status === 0) 
       {
          return 'Pending';
       } else {
          return 'Done';
       }
    }

}

if(!function_exists('isLikedByAuthUser'))
{
    function isLikedByAuthUser($auth_user, $likers) 
    {
        $post_likers = [];// users who likes the post

        foreach($likers as $liker) {
        $post_likers[] = $liker->user_id; // get user id 
        }

        return  (in_array($auth_user, $post_likers)) ? true : false; // check if the user has already liked the post
    }
}

if(!function_exists('handleNullAvatar'))
{
    function handleNullAvatar($img)
    {
        if($img) {
            return $img;
        }

        return '/img/noimg.svg';
    }

}


if(!function_exists('handleNullImage'))
{
    function handleNullImage($img)
    {
        if($img) {
            return $img;
        }

        return '/img/noimg.svg';
    }

}


if(!function_exists('calculateElectiveDeliveryDate'))
{
    function calculateElectiveDeliveryDate($date)
    {
       return Carbon::create($date)->addWeek(39)->format('F d,Y');
    }

}



if(!function_exists('isApproved'))
{
    function isApproved($bool)
    {
        if ($bool == 0) {
            return "<span class='badge bg-info p-2'>Pending <i class='fas fa-spinner ms-2'></i></span>";
        } else if($bool == 1) {
            return "<span class='badge bg-success p-2'>Approved</span>";
        } else {
            return "<span class='badge bg-danger p-2'>Declined</span>";
        }
    }

}



if(!function_exists('getDateDiff'))
{
   
    function getDateDiff($startdate,$enddate){


        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%d');
    
            return $totalDuration;
        }

        return '';
     
    }

}



if(!function_exists('getDifferenceInHours'))
{
   
    function getDifferenceInHours($startdate,$enddate){


        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%h');
    
            return $totalDuration;
        }

        return '';
     
    }

}



if(!function_exists('differenceInHours'))
{
   
    function differenceInHours($startdate,$enddate){

        // $date1 = new DateTime($startdate);
        // $date2 = new DateTime($enddate);
        // $difference = $date1->diff($date2);
        
        // $diffInSeconds = $difference->s; //45
        // $diffInMinutes = $difference->i; //23
        // $diffInHours   = $difference->h; //8
        // $diffInDays    = $difference->d; //21
        // $diffInMonths  = $difference->m; //4
        // $diffInYears   = $difference->y; //1

        // return "$diffInHours hrs - $diffInMinutes min";

        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%h hrs -  %i')." Minutes";
    
            return $totalDuration;
        }

        return '';
     
    }

}



if(!function_exists('differenceInSeconds'))
{
    function differenceInSeconds($startdate,$enddate){

        $startTime = Carbon::parse($startdate);
        $endTime = Carbon::parse($enddate);

        return  $startTime->diffInSeconds($endTime);
    }
}

if(!function_exists('calculateTimeRendered'))
{
    function calculateTimeRendered($times){

        $collection = collect($times);

        $totals = $collection->reduce(function ($carry, $item) {
                return $carry + $item;
            });

            return convertSecondsToMinutes($totals);
    }
}

if(!function_exists('calculateTimeLoss'))
{
    function calculateTimeLoss($times){

        $collection = collect($times);

        $totals = $collection->reduce(function ($carry, $item) {
                return $carry + $item;
            });

            return convertSecondsToHours($totals);
    }
}




if(!function_exists('convertSecondsToHours'))
{
    function convertSecondsToHours($seconds){
        return floor(($seconds%86400)/3600);
    }
}

if(!function_exists('convertSecondsToMinutes'))
{
    function convertSecondsToMinutes($seconds){
        return  floor(($seconds%3600)/60);
    }
}

if(!function_exists('isLate'))
{
    function isLate($bool)
    {
        if(is_null($bool)) {
            return '';
        }
        
        return($bool === 0) 
        ? '<span class="badge bg-info p-2">No</span>' 
        : '<span class="badge bg-danger p-2" >Yes</span>';
    }

}


if(!function_exists('isAbsent'))
{
    function isAbsent($attendance)
    {
        return($attendance->schedule_id && is_null($attendance->time_in) && is_null($attendance->time_out) && is_null($attendance->is_late)) 
        ? '<span class="badge bg-danger p-2">Absent</span>' 
        : '<span class="badge bg-info p-2" >Present</span>';
    }

}







