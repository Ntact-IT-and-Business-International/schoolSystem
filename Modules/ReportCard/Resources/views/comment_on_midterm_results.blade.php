@extends('template')

@section('content')

    @livewire('midterm-comments',['student_id'=>$student_id,'term'=>$term])
    
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
                <div class="card-body pb-2">
                <form action="/reportcard/save-teachers-comment" method="get">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                Pupils Name <span class="font-weight-bold text-info">{{$student_name}}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" name="class_position" placeholder="Position">
                            </div>
                            <div class="form-group col-md-6">
                                    <label class="form-label">Term</label>
                                    <input type="text" class="form-control" name="term"  value="{{$term}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Teachers Comment</label>
                            <input type="text" class="form-control" name="teacher_comment" placeholder="Write comment Here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body pb-2">
                    <form action="/reportcard/save-headteachers-comment/{{$student_id}}" mehtod="get">
                         @csrf
                         <div class="font-weight-bold">Class Teachers Name: <span class="text-info">{{$class_teeachers_name}}</span></div><br>
                        <span class="font-weight-bold">Class Teachers Comment:</span><span class="text-info">{{$teacher_comment}}</span><br><br>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Heatechers' Comment</label>
                            <input type="text" class="form-control" name="headteacher_comment" placeholder="Write comment Here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment
                    </form> 
                </div>
            </div>
            </div>
        </div>
@endsection