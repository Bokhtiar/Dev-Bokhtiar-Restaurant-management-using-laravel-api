<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
