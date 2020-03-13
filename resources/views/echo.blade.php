@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">广播</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    这里是私有广播
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
  <script>
    userId = "{{Auth::user()->id}}"
    Echo.private('App.User.' + userId)
    .listen('PrivateMessageEvent', (e) => {
        alert(e.message);
    });
  </script>
@endsection
