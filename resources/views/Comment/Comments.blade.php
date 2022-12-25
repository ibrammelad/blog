<!DOCTYPE html>
<html lang="en" dir="ltr">

<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
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
            <h4>comments</h4>
        </div>
        <div class="page-list">
            <div class="action-row">
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            author
                        </th>
                        <th>
                            post title
                        </th>
                        <th>
                            comment
                        </th>
                        <th>
                            Date
                        </th>

                        <th class="th-actions">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                <span class="td-data">{{$comment->user->name}}</span>
                            </td>
                            <td>
                                <span class="td-data">{{$comment->post->title}}</span>
                            </td>
                            <td>
                                <span class="td-data">{{$comment->comment}}</span>
                            </td>
                            <td>
                                <span class="td-data">{{$comment->created_at->todatestring()}}</span>
                            </td>


                            <td class="td-actions-group">
                                <div class="actions">

                                    <form method="POST" action="{{route('deletecomment',$comment)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit"> <a class="table-action-btn text-danger" title="Remove">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$comments->links()}}
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
