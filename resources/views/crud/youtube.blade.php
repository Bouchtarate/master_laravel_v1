@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
  <div class="title m-b-md">
    Video Viewer ({{$videos->view}})
  </div>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/yUswlXktxjY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

</div>

@endsection
