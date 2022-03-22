<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('status', 1)->get();
          if($events){
            return response([
              'message'=> 'Active Event List',
              'event' => $events,
            ]);
          }else{
            return response([
              'message'=> 'data not found',
              'status' => 404,
            ]);
          }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
          'title'=>' string |required | max:30 | min:2 ',
          'description'=>'required',
          'price'=>'required',
      ]);

      if($validated){
          try{
              DB::beginTransaction();
              $event = Event::create([
                  'title' => $request->title,
                  'description' => $request->description,
                  'price' => $request->price,
                  'image'=>"not image",
              ]);

              if (!empty($event)) {
                  DB::commit();
                return response()->json([
                  'message'=> 'event Create Successfully',
                  'events' => $event,
                  'status' => 200,
                ]);
              }
              throw new \Exception('Invalid About Information');
          }catch(\Exception $ex){
              DB::rollBack();
              return response()->json([
                'message'=> $ex,
              ]);
          }
      }
    }

}
