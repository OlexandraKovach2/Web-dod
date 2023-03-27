
@if(isset($student[0]->id))
    <form method="post" enctype="application/x-www-form-urlencoded" action="{{ route('students.update', $student[0]) }}">
        @csrf
        {{ method_field('PUT') }}
        <input value="{{$student[0]->name}}" type="text" name="name"> <br>
        <input value="{{$student[0]->course}}" type="number" name="course"> <br>
        <input value="{{$student[0]->specialty}}" type="text" name="specialty"> <br>
        <input type="submit" value="редагувати">
    </form>
@else
    <p>User with id: {{$id}} is not found</p>
@endif
