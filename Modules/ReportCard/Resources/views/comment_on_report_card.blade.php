@extends('template')

@section('content')

    @livewire('report-card-comments',['student_id'=>$student_id,'term'=>$term])
    
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
                <div class="card-body pb-2">
                <form action="/reportcard/save" method="get">
                    @csrf
                    <input type="hidden" name="pupils_id" value="{{ $student_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                Pupils Name <span class="font-weight-bold text-info">{{$student_name}}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" name="position" placeholder="Position">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Next Term Begins</label>
                                <input type="text" class="form-control" name="next_term_begins" value="{{$start_date}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                    <label class="form-label">Term</label>
                                    <input type="text" class="form-control" name="term"  value="{{$term}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Teachers Comment</label>
                            <input type="text" class="form-control" name="teachers_comment" placeholder="Write comment Here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body pb-2">
                    <form action="/reportcard/create-headteachers-comment/{{$student_id}}" mehtod="get">
                         @csrf
                         <div class="font-weight-bold">Class Teachers Comment: <span class="text-info">{{$class_teeachers_name}}</span></div><br>
                        <span class="font-weight-bold">Class Teachers Comment:</span><span class="text-info">{{$teachers_comment}}</span><br><br>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">Heatechers' Comment</label>
                            <input type="text" class="form-control" name="headteachers_comment" placeholder="Write comment Here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment
                    </form> 
                </div>
            </div>
            </div>
        </div>
@endsection