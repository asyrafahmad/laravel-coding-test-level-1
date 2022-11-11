<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::orderBy('createdAt', 'asc')->get();       //returns values in ascending order
    }

    public function activeEvent(Request $request)
    {
        $CurrentDateAndTime = date('Y-m-d h:i:s', time());  

        $inBetweenEvent = DB::table('events')
                    ->where('startAt','<=',  $CurrentDateAndTime)
                    ->where('endAt','>=',  $CurrentDateAndTime)
                    ->get();

        return $inBetweenEvent;
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
        $this->validate($request, [                             //inputs are not empty or null
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        $event = new Event;
        $event->id = Str::uuid()->toString();                   //retrieving user inputs
        $event->name = $request->input('name');                 //retrieving user inputs
        $event->slug = $request->input('slug');                 //retrieving user inputs
        $event->startAt = $request->input('startAt');           //retrieving user inputs
        $event->endAt = $request->input('endAt');               //retrieving user inputs
        $event->createdAt = date('Y-m-d h:i:s', time());        //retrieving user inputs
        $event->save();                                         //storing values as an object
        
        return $event;                                          //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::findorFail($id);                          //searches for the object in the database using its id and returns it.
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
        $this->validate($request, [                             // the new values should not be null
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        $event = Event::findorFail($id);                        // uses the id to search values that need to be updated.
        $event->name = $request->input('name');                 // retrieves user input
        $event->slug = $request->input('slug');                 // retrieves user input
        $event->save();                                         // saves the values in the database. The existing data is overwritten.
        return $event;                                          // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findorFail($id);                         //searching for object in database using ID
        if($event->delete()){                                   //deletes the object
            return 'Successfully delete this UUID';                      //shows a message when the delete operation was successful.
        }
    }
}
