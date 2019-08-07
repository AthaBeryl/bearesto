@extends('layouts.app')
@section('content')
<a type="submit" class="btn btn-success" href="{{route('salary.pdf')}}">Download Excel</a>
<a type="submit" class="btn btn-danger" href="{{route('salary.pdf')}}">Download PDF</a>
<hr>
<br>
    <div class="container">
    @include('report.pdxcl.salary')
    </div>
@endsection
