<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Models\Grade;
use App\Models\OnlineClass;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\MeetingZoomTrait;

class OnlineZoomClassesController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClass::where('created_by',auth()->user()->email)->get();
        return view('pages.Teachers.dashboard.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.indirect', compact('Grades'));
    }



    public function store(Request $request)
    {
        $meeting = $this->createMeeting($request);

        OnlineClass::create([
            'integration' => true,
            'Grade_id' => $request->Grade_id,
            'Classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'created_by' => auth()->user()->email,
            'meeting_id' => $meeting->id,
            'topic' => $request->topic,
            'start_at' => $request->start_time,
            'duration' => $meeting->duration,
            'password' => $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url,
        ]);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('online_zoom_classes.index')->with($notification);
    }


    public function storeIndirect(Request $request)
    {
        OnlineClass::create([
            'integration' => false,
            'Grade_id' => $request->Grade_id,
            'Classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'created_by' => auth()->user()->email,
            'meeting_id' => $request->meeting_id,
            'topic' => $request->topic,
            'start_at' => $request->start_time,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_url' => $request->start_url,
            'join_url' => $request->join_url,
        ]);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('online_zoom_classes.index')->with($notification);


    }
    public function studentOnlineClasses(){
        $online_classes = OnlineClass::where('Grade_id',Auth::guard('student')->user()->Grade_id)->where('Classroom_id',Auth::guard('student')->user()->Classroom_id )->where('section_id',Auth::guard('student')->user()->section_id)->get();
        return view('pages.Students.dashboard.online_classes.index', compact('online_classes'));
    }


    public function destroy(Request $request,$id)
    {

        $info = OnlineClass::find($id);

        if($info->integration == true){
            $meeting = Zoom::meeting()->find($request->meeting_id);
            $meeting->delete();
            OnlineClass::destroy($id);
        }
        else{

            OnlineClass::destroy($id);
        }

        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'danger'
        );
        return redirect()->route('online_zoom_classes.index')->with($notification);

    }
}
