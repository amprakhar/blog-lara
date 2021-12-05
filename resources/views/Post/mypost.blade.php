@extends('layouts.default')

@section('content')
<div class="wrapper">
    <div class="col-md-8 mx-auto">
        <div class="card-header border mb-3 rounded">
            <div class="card-title mb-0">{{ __('My Posts') }}</div>
        </div>
        @if(Session::get('error'))
          <div class="alert alert-danger alert-dismissible fade show" onclick="this.classList.add('d-none');" role="alert">
            {{Session::get('error')}}
          </div>
        @elseif(Session::get('msg'))
          <div class="alert alert-success alert-dismissible fade show" onclick="this.classList.add('d-none');" role="alert">
            {{Session::get('msg')}}
          </div>
        @endif

        @if(!empty($posts))
        <div class="row">
            @foreach($posts as $post)
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0">
                            <h6 class="mb-0">{{ $post['title'] }}</h6>
                        </div>
                        @if(Session::get('user.id') == $post['user_id'])
                        <div class="card-tools">
                            <a href="/edit/{{$post['id']}}" class="text-primary"><i class="fa fa-edit"></i></a>
                            <a href="/delete-post/{{$post['id']}}" onclick="return confirm('Are you sure want to delete this post?')" class="text-danger ms-2"><i class="fa fa-trash"></i></a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body p-0">
                        @if($post['image'])
                        <div class="img">
                            <img class="w-100" src="{{ asset('images/' . $post['image'] ) }}"> 
                        </div>
                        @endif
                        <div class="card-data p-3">
                            <p class="mb-2">{{ $post['description'] }}</p>
                            <small>- {{ date('d M Y, h:i a', strtotime($post['updated_at'])) }}</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="card">
            <div class="card-body text-center py-2">
                No Posts Found
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
