@extends("Dashbord.layout.master")
@section("title","Post")

@section("Content")
<br>
<a href="{{route("Post.create")}}" class="btn btn-success float-right m-2">افزودن پست</a>
<br>
<div class="col-md-12">
  
    @if($posts->count()>0)

    <table class="table table-striped table-bordered table-dark text-right">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    عنوان
                </th>
                <th>
                    عکس
                </th>
                <th>
                    توضیح مختصر
                </th>
                <th>
                    نویسنده
                </th>
                <th>
                    دسته بندی
                </th>
                <th>
                    تعداد لایک
                </th>
                <th>
                    تعداد دیسلایک
                </th>
                <th>
                   تعداد بازدید
                </th>
                <th>
                    تعداد کامنت
                </th>
                <th>
                    تاریخ انتشار
                </th>
                <th>
                    ویرایش
                </th>
                    <th>
                        حذف
                    </th>
            </tr>
        </thead>
        <tbody>
            <?php $id=1; ?>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        <?= $id++;?>
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                       <img src="/{{$post->image}}" width="50" alt="">
                    </td>
                    <td>
                        {{$post->description}}
                    </td>
                    <td>
                        {{$post->user->name}}
                    </td>
                    <td>
                        {{$post->category->name}}
                    </td>
                    <td>
                        {{$post->like}}
                    </td>
                    <td>
                        {{$post->Disslike}}
                    </td>
                    <td>
                        {{$post->view}}
                    </td>
                    <td>
                       کامنت
                    </td>
                    <td>
                        {{$post->created_at->diffForHumans()}}
                    </td>
                    <td>
                        <a href="{{route("Post.edit",$post->id)}}" class="btn btn-primary btn-block">
                        ویرایش
                    </a>
                    </td>
                    <td>
                        <form action="{{route("Post.destroy",$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block"
                        
                        onclick="return confirm('آیا میخواهید پست حذف شود؟');">
                            حذف
                        </button>
                    </form>
                    </td>

                </tr>
            @endforeach
          
        </tbody>
    </table>
    @else
    <div class="alert alert-danger">
        <h5 class="text text-right">
            لطفا پست جدید بسازید
        </h5>
    </div>
</div>

@endif


@endsection