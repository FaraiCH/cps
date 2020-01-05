@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success float-right">Create Tags</a>
    </div>

    <div class="card card-default">
        <div class="card-header text-white" style="background-color: rebeccapurple;">
            Tags
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Post Count</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>

                            {{$tag->name}}
                        </td>

                        <td>
                          {{$tag->posts->count()}}
                        </td>
                        <td>
                            <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})" style="color: white">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteCat">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this file? Once deleted, you ain't getting it back, kid.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {

            var form = document.getElementById('deleteCat');
            form.action = '/tags/' + id;
            $('#deleteModal').modal('show');

        }
    </script>
@endsection