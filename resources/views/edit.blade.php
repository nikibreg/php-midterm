@extends('home')
@section('main-section')
<form method="post" enctype="multipart/form-data" action="{{route('employees.update', $employee->id)}}">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="box-body">
        <div class="form-group">
            <label class="text-gray-500" for="exampleInputEmail1">Employee name</label>
            <br>
            <input type="text" class="form-control" value="{{ $employee->name }}" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label class="text-gray-500" for="exampleInputEmail1">Employee surname</label>
            <br>
            <input type="text" class="form-control" value="{{ $employee->surname }}" placeholder="Surname" name="surname">
        </div>
        <div class="form-group">
            <label class="text-gray-500" for="exampleInputEmail1">Employee position</label>
            <br>
            <input type="text" class="form-control" value="{{ $employee->position }}" placeholder="Position" name="position">
        </div>
        <div class="form-group">
            <label class="text-gray-500" for="exampleInputEmail1">Employee phone</label>
            <br>
            <input type="text" required minlength="9" class="form-control" value="{{ $employee->phone }}" placeholder="Phone" name="phone">
        </div>
        <div class="form-group">
            <label class="text-gray-500" for="exampleInputEmail1">Is hired</label>
            <br>
            <input type="checkbox" {{ $employee->is_hired ? 'checked="checked"' : '' }} class="form-control" value="{{ $employee->is_hired }}" name="is_hired">
        </div>
    </div>
    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</form>
@endsection