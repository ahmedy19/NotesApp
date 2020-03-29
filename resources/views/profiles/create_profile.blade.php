@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">


        <div class="col col-md-6 col-sm-12">

            <div class="card card-color">
                <div class="card-body">
                  <h5 class="card-title">Profile</h5>
                  
                  <form action="{{route('new.profile')}}" method="POST">

                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->guard('web')->user()->id }}">

                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" class="form-control" name="job" value="{{old('job')}}" placeholder="Job Title">
                    </div>

                    <div class="form-group">
                        <label>Biography</label>
                        <textarea class="form-control" id="content" name="biography" rows="3">{{old('biography')}}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary btn-green">Save</button>
                </form>

                </div>
            </div>

        </div>

        <!--Profiles-->
        <div class="col col-md-6 col-sm-12">

            @foreach ($profiles as $profile)
                @if ($profile->users()->first()->id === auth()->user()->id)
                <div class="card card-color  mb-4">
                    <div class="card-body">
                    <h5 class="card-title">{{$profile->users()->first()->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$profile->job}}</h6>
                    <p class="card-text">{!! $profile->biography !!}</p>
                    <a type="button" class="btn btn-outline-primary btn-edit"><i class="fas fa-user-edit"></i></a>
                    
                    <button data-toggle="modal" data-target="#showModal" data-profile_id="{{$profile->id}}" data-job="{{$profile->job}}" data-biography="{{$profile->biography}}" type="button" class="btn btn-outline-primary btn-show"><i class="fas fa-eye"></i></button>

                    </div>
                </div>
                @endif
            @endforeach
            
        <!--Profiles/-->

        </div>



          
<!--Edit Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form>
                @csrf    <!--To protect entered data-->

                <input type="hidden" id="profile_id" name="id">
    
                <div class="form-group">
                  <label for="Job">Job</label>
                  <input type="text" id="job" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Biography</label>
                    <textarea class="form-control" id="biography" rows="3"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close <i class="far fa-times-circle"></i></button>
        </div>

    </form>

      </div>
    </div>
  </div>
<!--Edit Modal /-->

    </div>
    </div>

@endsection
