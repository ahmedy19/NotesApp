@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">


        <div class="col col-md-6 col-sm-12">

            <div class="card card-color">
                <div class="card-body">
                  <h5 class="card-title">Note</h5>
                  
                  <form action="{{route('new.note')}}" method="POST">

                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->guard('web')->user()->id }}">

                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Note Title" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" value="{{old('subtitle')}}" placeholder="Subtitle" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="content" name="details" rows="3">{{old('details')}}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary btn-green">Save</button>
                </form>

                </div>
            </div>

        </div>



        <!--Notes-->
        <div class="col col-md-6 col-sm-12">
            <h5 class="card-title">Notes</h5>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Subtitle</th>
                                <th scope="col">Show</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($notes as $note)
                                @if ($note->user_id === auth()->user()->id)
                                    <tr>
                                        <td>{{$note->title}}</td>
                                        <td>{{$note->subtitle}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#showNoteModal" data-note_id="{{$note->id}}" data-title="{{$note->title}}" data-subtitle="{{$note->subtitle}}" data-details="{{$note->details}}" type="button" class="btn btn-outline-primary btn-show"><i class="fas fa-eye"></i></button>
                                        </td>

                                        <td>
                                            <button data-toggle="modal" data-target="#editNoteModal" data-note_id="{{$note->id}}" data-title="{{$note->title}}" data-subtitle="{{$note->subtitle}}" data-details="{{$note->details}}" type="button" class="btn btn-outline-primary btn-edit"><i class="fas fa-edit"></i></button>
                                        </td>

                                        <td>
                                            <a href="{{route('notes.delete',['id' => $note->id])}}" type="button" class="btn btn-outline-primary btn-delete"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{$notes->links()}}
        <!--Notes/-->
        </div>


<!--Show Modal -->
  <div class="modal fade" id="showNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card card-color">
                <div class="card-body">
                  
                    <form>
                        @csrf    <!--To protect entered data-->
        
                        <input type="hidden" id="note_id" name="id">

                        <h5 id="title" class="card-title"></h5>

                        <h6 id="subtitle" class="card-subtitle mb-2 text-muted"></h6>
                        
                        <p id="details" class="card-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close <i class="far fa-times-circle"></i></button>
                </div>
        
            </form>

                </div>
            </div>

      </div>
    </div>
  </div>
<!--Show Modal /-->


<!--Edit Modal -->
<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form action="{{route('note.update','note_id')}}" method="POST">
                @csrf    <!--To protect entered data-->

                <input type="hidden" id="note_id" name="id">
    
                <div class="form-group">
                  <label for="first_name">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                </div>
    
                <div class="form-group">
                    <label for="last_name">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Subtitle" name="subtitle">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control contentdetails" id="details" name="details" rows="3"></textarea>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close <i class="far fa-times-circle"></i></button>

            <button type="submit" class="btn btn-primary btn-green">Update <i class="fa fa-sync-alt"></i></button>
        </div>

    </form>

      </div>
    </div>
  </div>
<!--Edit Modal /-->

    </div>
</div>


@endsection
