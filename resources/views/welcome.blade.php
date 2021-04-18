@extends('adminlte::page')

@section('title', 'Daily News')

@section('content_header')
    <h1>Daily News</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <!-- Main node for this component -->

    <div class="timeline " >

      <div class="dropdown" style="float: right; margin: 0px 25px ;">
        <a href="#" class="btn btn-info dropdown-toggle">Sort</a>
        <ul class="d-menu" data-role="dropdown">
            <li>
                <a href="#" class="dropdown-toggle">DateTime</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="{{ url('/datetime/asc') }}">Asc</a></li>
                    <li><a href="{{ url('/datetime/desc') }}">Desc</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Rate</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="{{ url('/rating/asc') }}">Asc</a></li>
                    <li><a href="{{ url('/rating/desc') }}">Desc</a></li>
                </ul>
            </li>
        </ul>
      </div>

      @foreach ($news as $key => $value)
        <!-- Timeline time label -->
        @if ($key == 0 || ($key != 0 && (date('Y-m-d', strtotime($value->datetime)) != date('Y-m-d', strtotime($news[$key-1]->datetime)))))
          <div class="time-label">
            <span class="bg-green">{{ date('Y-m-d', strtotime($value->datetime)) }}</span>
          </div>
        @endif

        <div>
        <!-- Before each timeline item corresponds to one icon on the left scale -->
          <i class="fas fa-envelope bg-blue"></i>
          <!-- Timeline item -->
          <div class="timeline-item">
          <!-- Time -->
            <span class="time"><i class="fas fa-clock"></i> {{ date('H:i:s', strtotime($value->datetime)) }}</span>
            <!-- Header. Optional -->
            <h3 class="timeline-header">{{ $value->title }}</h3>
            <!-- Body -->
            <div class="timeline-body">
              {{ $value->Content }}
            </div>
            <!-- Placement of additional controls. Optional -->
            <div class="timeline-footer">
              {{-- Rate : {{ $value->rating }} \10 --}}
              Rate : <input data-role="rating" data-stars="10" data-stared-color="orange" data-value={{ $value->rating }} data-static="true">
              <br>
              Source : {{ $value->source }}
            </div>
          </div>
        </div>
      @endforeach
      <!-- The last icon means the story is complete -->
      <div>
        <i class="fas fa-clock bg-gray"></i>
      </div>
    </div>

</div>
</div>
@stop

@section('css')
  <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">


@stop

@section('js')
  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>

@stop
