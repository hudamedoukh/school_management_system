<?php

namespace App\Http\Controllers\Students;

use App\Models\Grade;
use App\Models\OnlineClass;
use Illuminate\Http\Request;
use App\Http\Traits\MeetingZoomTrait;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('pages.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add', compact('Grades'));
    }


    public function store(Request $request)
    {
        $meeting = $this->createMeeting($request);
        OnlineClass::create([
            'integration' => true,
            'Grade_id' => $request->Grade_id,
            'Classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
            'meeting_id' => $meeting->id,
            'topic' => $request->topic,
            'start_at' => $request->start_time,
            'duration' => $meeting->duration,
            'password' => $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url,
        ]);
        $notification = array(
            'message' => 'تم حفظ البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('online_classes.index')->with($notification);
    }


    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.indirect', compact('Grades'));
    }

    public function storeIndirect(Request $request)
    {

            OnlineClass::create([
                'integration' => false,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            $notification = array(
                'message' => 'تم حفظ البيانات بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('online_classes.index')->with($notification);


    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {


        $info = OnlineClass::find($request->id);

        if($info->integration == true){
            $meeting = Zoom::meeting()->find($request->meeting_id);
            $meeting->delete();
           // online_classe::where('meeting_id', $request->id)->delete();
           OnlineClass::destroy($request->id);
        }
        else{
           // online_classe::where('meeting_id', $request->id)->delete();
           OnlineClass::destroy($request->id);
        }
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->route('online_classes.index')->with($notification);
    }
}
