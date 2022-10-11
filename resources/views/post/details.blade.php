@extends('backend.layouts.master')

@section('title')
    Dashboard-page
@endsection

@section('admin-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('backend.layouts.partials.message')

                    <div class="card-body">
                        <a class="float-right btn btn-success" href="" data-toggle="modal"
                            data-target="#exampleModal">EDIT</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{ $post->name }}"
                                                    class="form-control" id="name" aria-describedby="emailHelp">

                                            </div>
                                            <div class="form-group">
                                                <label for="name">Details</label>
                                                <textarea name="details" class="form-control" id="details" cols="30" rows="5">{{ $post->details }} </textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <h2>{{ $post->name }}</h2>
                        <p>{{ $post->details }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Add A Comment</h4>
                    </div>
                    <div class="card-body">
                        <form id="comment_form">
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="" class="form-control" id="comment_name"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="form-group">
                                <label for="name">Comment</label>
                                <textarea name="comment" class="form-control" id="comment" cols="30" rows="5"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
               <div class="card"  id="comment_section">
               
               </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $("#comment_form").submit(function(e){
            e.preventDefault();
            var user_id = $("#user_id").val();
            var name = $("#comment_name").val();
            var comment = $("#comment").val();
            submit_comment();
        });
        function submit_comment() {
            var user_id = $("#user_id").val();
            var name = $("#comment_name").val();
            var comment = $("#comment").val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var APP_URL = "{{ route('get_all_comment') }}";
            $.ajax({
                type: "GET",
                url: APP_URL,
                dataType: "JSON",
                data: {
                    user_id : user_id,
                    name : name,
                    comment : comment,
                },
                success: function(data) {
                   
                    op = `<div class="card_body">
                             <h1>${data.name}</h1>
                             <p>${data.comment}</p>
                        </div>`;
                   
                    $("#comment_section").push(op);
                },
                error: function(err) {
                  console.log(err);
                }
            });
        }
    </script>
@endpush
