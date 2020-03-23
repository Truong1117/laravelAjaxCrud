@extends('layouts.app')

@section('title', 'Author')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Simple Laravel CRUD Ajax</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th width="150px">No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Create At</th>
                    <th class="text-center" width="150px">
                        <a href="#" id="#create-modal" class="create-modal btn btn-success" btn-sm>
                            <i class="fas fa-plus"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            <tbody>
                @foreach($post as $value)
                <tr class="post{{$value->id}}">
                    <td>
                        {{$no++}}
                    </td>
                    <td>
                        {{$value->title}}
                    </td>
                    <td>
                        {{$value->body}}
                    </td>
                    <td>
                        {{$value->created_at}}
                    </td>
                    <td class="row">
                        <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="mx-2 edit-modal btn btn-info btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="delete-modal btn btn-info btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--  form Create Post -->
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h4 class="modal-title"></h4>
                <button type="button" class="close text-center" data-dismiss="modal">
                    <span>&times</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group row add">
                        <label for="title" class="control-label col-sm-2">Title :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form control w-100" id="title" name="title" placeholder="Your title here" required>
                            <!-- <p class="error text-center alert alert-danger hidden"></p> -->
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label for="body" class="control-label col-sm-2">Body :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form control w-100" id="body" name="body" placeholder="Your body here" required>
                            <!-- <p class="error text-center alert alert-danger hidden"></p> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" type="submit" id="add">
                    <span class="fas fa-plus">Save post</span>
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="fas fa-remobe">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- form Show Post -->
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID :</label>
                    <b id="i" />
                </div>
                <div class="form-group">
                    <label for="">Title :</label>
                    <b id="ti" />
                </div>
                <div class="form-group">
                    <label for="">Body :</label>
                    <b id="by" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form Edit and Delete Post -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="modal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="t">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="body">Body</label>
                        <div class="col-sm-10">
                            <textarea type="name" class="form-control" id="b"></textarea>
                        </div>
                    </div>
                </form>
                {{-- Form Delete Post --}}
                <div class="deleteContent">
                    Are You sure want to delete <span class="title"></span>?
                    <span class="hidden id"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn actionBtn" type="button" data-dismiss="modal">
                    <span id="footer_action_button" class="glyphicon"></span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class="glyphicon glyphicon"></span>close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection