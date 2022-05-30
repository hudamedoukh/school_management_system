<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use AttachFilesTrait;
    public function index(){

        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('pages.setting.index', $setting);
    }

    public function update(Request $request){
            $info = $request->except('_token', '_method', 'logo');
            $old_logo=  Setting::where('key', 'logo')->pluck('value')->first();
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

            if($request->hasFile('logo')) {
                $exists = Storage::disk('upload_attachments')->exists('attachments/logo/'.$old_logo);
                if( $exists){
                    Storage::disk('upload_attachments')->delete('attachments/logo/'.$old_logo);
                }
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo');

            }
            $notification = array(
                'message' => 'تم حفظ البيانات بنجاح',
                'alert-type' => 'success'
            );
            return back()->with($notification);



    }
}
