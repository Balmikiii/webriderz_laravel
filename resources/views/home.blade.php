@extends('links')
@section('app')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search..." id="search">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        {{-- user list area --}}
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="{{ Auth::user()->file == null ? asset('image/unknown/user.png') : Auth::user()->file}}" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">{{Auth::user()->name." (You)"}} </h6>
                                    <small><i class="fa fa-circle online"></i> Online</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                        class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                        class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                        class="fa fa-question"></i></a>
                                <form action="{{route('users.update', Auth::id())}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Log out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0">
                            {{-- chat history --}}
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        {{-- message write area --}}
                        <form action="{{url('message/write')}}" method="post">
                            @csrf
                            <input type="text" name="receiver" id="receiver" value="{{Auth::id()}}" hidden>
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <label for="files" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></label>
                                    <input type="file" id="files" name="resource" class="d-none" multiple />
                                </div>
                                <input type="text" class="form-control" name="content"
                                    placeholder="Enter text here..." autocomplete="off">
                                <button class="input-group-text" type="submit"><i class="fa fa-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('newjs')
    <script src="{{ asset('js/new.js') }}"></script>
@endpush
