<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\SiteSetting;
use Illuminate\Support\Carbon;

class NoticeController extends Controller
{
    public function NoticeView(){

    	$notices = Notice::orderBy('id','DESC')->get();
    	return view('admin.Backend.Notice.notice',compact('notices'));

    } // end method 


	public function NoticeAdd(Request $request){


		$status=0;
		$checkstatus=$request->status;
		if($checkstatus=='1')
			{
				$status=1;
			}
      Notice::insertGetId([
      	'assign_date' => $request->assign_date,
      	'description' => $request->description,
      	'deadline' => $request->deadline,

		
      	'status' => $status,
      	'created_at' => Carbon::now(),   

      ]);


       $notification = array(
			'message' => 'Notice Inserted Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method


	// SITE SETTINGS
	public function SiteView(){

    	$site = SiteSetting::first();
    	return view('admin.Backend.Site.siteSetting',compact('site'));

    } // end method 
}
