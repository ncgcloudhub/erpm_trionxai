<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\SiteSetting;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as Image;

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

	public function SiteStore(Request $request){

		SiteSetting::findOrFail(1)->update([
			'title' => $request->title,	  
			'footer' => $request->footer,
			'link' => $request->link,
			'updated_at' => Carbon::now(),   
	  ]);
		
		if ($request->file('logo')) {

			$image = $request->file('logo');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(200,200)->save('upload/products/'.$name_gen);
			$save_url = 'upload/products/'.$name_gen;

			SiteSetting::findOrFail(1)->update([
				'logo' => $save_url,
				'updated_at' => Carbon::now(),   
		  ]);

		}

		if ($request->file('favicon')) {

			$image = $request->file('favicon');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(200,200)->save('upload/products/'.$name_gen);
			$save_url = 'upload/products/'.$name_gen;

			SiteSetting::findOrFail(1)->update([
				'favicon' => $save_url,
				'updated_at' => Carbon::now(),   
		  ]);

		}

		if ($request->file('login_img')) {

			$image = $request->file('login_img');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(200,200)->save('upload/products/'.$name_gen);
			$save_url = 'upload/products/'.$name_gen;

			SiteSetting::findOrFail(1)->update([
				'login_img' => $save_url,
				'updated_at' => Carbon::now(),   
		  ]);

		}
	
          $notification = array(
			'message' => 'Site Settings Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

	} // end method 
}
