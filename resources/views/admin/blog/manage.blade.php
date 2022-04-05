

@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Blog Info</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Blog Title</th>
                            <th>Author Name</th>
                            <th>Feature Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blog->category->name}}</td>
                                <td>{{$blog->main_title}}</td>
                                {{--                                <td>{{\App\Models\User::find($blog->author_id)->name}}</td>--}}
                                <td>{{$blog->author->name}}</td>
                                <td><img src="{{asset($blog->image)}}" alt="" height="50" width="60"/></td>
                                <td>{{$blog->status == 1? 'Published': 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('blog.detail', ['id'=> $blog->id])}}" class="btn btn-info btn-sm" title="View Blog Detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('blog.status', ['id'=> $blog->id])}}" class="btn btn-primary btn-sm" title="Published Blog">
                                        <i class="fa fa-arrow-up"></i>
                                    </a>
                                    <a href="{{route('blog.edit', ['id'=> $blog->id])}}" class="btn btn-success btn-sm" title="Edit Blog">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('blog.delete', ['id'=> $blog->id])}}" class="btn btn-danger btn-sm" title="Delete Blog">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

