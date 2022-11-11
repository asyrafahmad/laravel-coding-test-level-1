<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Event;

class EventViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::paginate(5);

        return view('events', ['eventsList'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $event = new Event;
        $event->id = Str::uuid()->toString();                   //retrieving user inputs
        $event->name = $request->name;                          //retrieving user inputs
        $event->slug = $request->slug;                          //retrieving user inputs
        $event->startAt = $request->startAt;                    //retrieving user inputs
        $event->endAt = $request->endAt;                        //retrieving user inputs
        $event->save();  

        return redirect('events');
        // return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventData = Event::findorFail($id);                    //searches for the object in the database using its id and returns it.
        return view('editEvent', ['eventData'=>$eventData]);
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
        $event->startAt = $request->input('startAt');           // retrieves user input
        $event->endAt = $request->input('endAt');               // retrieves user input
        $event->save();                                         // saves the values in the database. The existing data is overwritten.
       
        return redirect('events');                              // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findorFail($id);                        //searching for object in database using ID
        if($event->delete()){                                   //deletes the object
            return redirect('events');                          //shows a message when the delete operation was successful.
        }
    }

    // public function search(Request $request)
    // {
    //     $name = $request->input('name');                 // retrieves user input
    //     $slug = $request->input('slug');

    //     // $search_data = Event::get();
    //     $search_data = Event::where("name",$name);

    //     return view('events', ['eventsList'=>$search_data]);
    // }

    public function autocomplete(Request $request)
    {
        $res = Event::select("name")
                ->where("name","LIKE","%{$request->term}%")
                ->get();
    
        return response()->json($res);
    }
}
