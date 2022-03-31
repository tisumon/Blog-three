
@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Category Info</h4>
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category ID</th>
                                <th>Main Title</th>
                                <th>Sub Title</th>
                                <th>Short Description</th>
                                <th>Long Description</th>
                                <th>Image</th>
                                <th>Author ID</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$blog->category_id}}</td>
                                    <td>{{$blog->main_title}}</td>
                                    <td>{{$blog->sub_title}}</td>
                                    <td>{!! $blog->short_description  !!}</td>
                                    <td>{!! $blog->long_description  !!}</td>
                                    <td>
                                        <img src="{{asset($blog->image)}}" alt="" width="50" height="50"/>
                                    </td>
                                    <td>{{$blog->author_id}}</td>
                                    <td>{{$blog->status== 1? 'published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('blog.edit', ['id'=>$blog->id])}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('blog.delete', ['id'=>$blog->id])}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


