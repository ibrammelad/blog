<!DOCTYPE html>
<html lang="en" dir="ltr">

<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/asset/css/style.css')}}">
</header>

<body>

    <div class="page-content">
        <div class="content">
            <div class="page-title">
                <h4>Posts</h4>
            </div>
            <div class="page-list">
                <div class="action-row">
                    <a class="btn btn-primary" href="/addPost" ><i class="fas fa-plus"></i> Add New</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    author
                                </th>
                                <th>
                                    title
                                </th>
                                <th>
                                    content
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    image
                                </th>

                                <th class="th-actions">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <span class="td-data">{{$post->user->name}}</span>
                                </td>
                                <td>
                                    <span class="td-data">{{$post->title}}</span>
                                </td>
                                <td>
                                    <span class="td-data">{{$post->content}}</span>
                                </td>
                                <td>
                                    <span class="td-data">{{$post->created_at->todatestring()}}</span>
                                </td>
                                <td>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to('/') }}/images/blog/{{ $post->image!=null ? $post->image : "download.jpg"}}">
                                        <img src="{{ \Illuminate\Support\Facades\URL::to('/') }}/images/blog/{{ $post->image!=null ? $post->image : "download.jpg"}}"alt="category" width="100" height="100">
                                    </a>
                                </td>


                                <td class="td-actions-group">
                                    <div class="actions">
                                        <a class="table-action-btn" title="Edit" href="{{route('updatePage' ,$post)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{route('deletePost',$post)}}">
                                            @csrf
                                            @method('DELETE')
                                       <button  type="submit"> <a class="table-action-btn text-danger" title="Remove">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                       </button>
                                        </form>
                                        <a class="table-action-btn" title="comment" href="{{route("allcommentsPost" , $post->id)}}">
                                            <i class="fas fa-comment"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/asset/js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('/asset/js/propper.min.js')}}"></script>
    <script src="{{asset('/asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/asset/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/asset/js/select2.min.js')}}"></script>
    <script src="{{asset('/asset/js/script.js')}}"></script>
</body>

</html>
