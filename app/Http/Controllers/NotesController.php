<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;

class NotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::paginate(10);
        return view('notes.create_note')->with('notes',$notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create_note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'title' =>  ['required','string', 'max:255'],
            'subtitle' => ['required','string', 'max:255'],
            'details' => ['required','string' ],
            'user_id' => 'required'
        ]);

        $note = new Note();

        $note->title = $request->title;
        $note->subtitle = $request->subtitle;
        $note->details = $request->details;
        $note->user_id = $request->user_id;
        $note->save();

        return redirect()->back();
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
        //Validation
        $request->validate([
            'title' =>  ['required','string', 'max:255'],
            'subtitle' => ['required','string', 'max:255'],
            'details' => ['required','string' ]
        ]);

        $note = array(

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'details' => $request->details
        );

        Note::find($request->id)->update($note);

        return redirect()->route('notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Note::find($id);
        $del->destroy($id);

        return redirect()->back();
    }
}
