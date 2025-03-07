<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use OpenAI;

class SiteSettingController extends Controller
{
    public function SiteSetting(){

    	$setting = SiteSetting::find(1);
    	return view('admin.Backend.Setting.setting_update',compact('setting'));
    }

    public function SiteSettingUpdate(Request $request){

    	$setting_id = $request->id;

    	if ($request->file('logo')) {

    	$image = $request->file('logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/logo/'.$name_gen);
    	$save_url = 'upload/logo/'.$name_gen;

	SiteSetting::findOrFail($setting_id)->update([
		'phone_one' => $request->phone_one,
		'phone_two' => $request->phone_two,
		'email' => $request->email,
		'company_name' => $request->company_name,
		'company_address' => $request->company_address,
		'facebook' => $request->facebook,
		'twitter' => $request->twitter,
		'linkedin' => $request->linkedin,
		'youtube' => $request->youtube,
		'logo' => $save_url,

    	]);

	    $notification = array(
			'message' => 'Setting Updated with Image Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    	}else{

    	SiteSetting::findOrFail($setting_id)->update([
		'phone_one' => $request->phone_one,
		'phone_two' => $request->phone_two,
		'email' => $request->email,
		'company_name' => $request->company_name,
		'company_address' => $request->company_address,
		'facebook' => $request->facebook,
		'twitter' => $request->twitter,
		'linkedin' => $request->linkedin,
		'youtube' => $request->youtube,


    	]);

	    $notification = array(
			'message' => 'Setting Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    	} // end else 
    } // end method 

	public function SeoSetting(){

    	$seo = Seo::find(1);
    	return view('admin.Backend.Setting.seo_update',compact('seo'));

    }

	public function SeoSettingUpdate(Request $request){

    	$seo_id = $request->id;

    	Seo::findOrFail($seo_id)->update([
		'meta_title' => $request->meta_title,
		'meta_author' => $request->meta_author,
		'meta_keyword' => $request->meta_keyword,
		'meta_description' => $request->meta_description,
		'google_analytics' => $request->google_analytics,		 

    	]);

	    $notification = array(
			'message' => 'Seo Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end mehtod 




	// app/Http/Controllers/ArticleGenerator.php

	public function openaigenerate(Request $input)
	{
		if ($input->title == null) {
			return;
		}
	
		$title = $input->title;
	
		$client = OpenAI::client(config('app.openai_api_key'));
	
	
		$result = $client->completions()->create([
			"model" => "gpt-3.5-turbo-instruct",
			"temperature" => 0.7,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0,
			'max_tokens' => 100,
			'prompt' => sprintf('Write article about: %s', $title),
		]);
	
		$content = trim($result['choices'][0]['text']);
	
	
		return view('admin.Backend.Site.writer', compact('title', 'content'));
	}
	

}
