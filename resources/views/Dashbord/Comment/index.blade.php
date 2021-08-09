@extends("Dashbord.layout.master")
@section("title","all Comment")


@section("Content")


<div class="col-md-12">
@if($comments->count())
<table class="table table-striped table-dark text-right">
    <thead>
        <tr>
            <th>#</th>
            <th>نام</th>
            <th>
                عنوان
            </th>
            <th>
                متن
            </th>
            <th>
                وضعیت
            </th>
            <th>
                حذف
            </th>
        </tr>
    </thead>

    <tbody>
        <?php $id=1; ?>
        @foreach ($comments as $item)
        <tr>
            <td>
                <?= $id++; ?>
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->title}}
            </td>
            <td>
                {{$item->content}}
            </td>
            <td>
                @if($item->status=="Disable")
                <form action="{{route("EnableComment",$item->id)}}" method="POST">
                    @csrf
                    @method("put")
                    <button class="btn btn-danger" type="submit">
                        غیر فعال
                    </button>
                </form>
                @else
                <form action="{{route("DisableComment",$item->id)}}" method="POST">
                    @csrf
                    @method("put")
                    <button class="btn btn-success" type="submit">
                        فعال
                        
                        
                    </button>
                </form>
                @endif
            </td>
            <td>

                <form action="{{route("Comment.destroy",$item->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" onclick="return confirm('آیا میخواهید پست حذف شود؟');">حذف</button>
                </form>

            </td>
        </tr>    
        @endforeach
    </tbody>

</table>
@else
<div class="alert alert-danger" role="alert">
    <h4 class="text text-right">
        !بدون نظر است    

    </h4>
</div>
@endif
</div>
















@endsection