@extends("Dashbord.layout.master")
@section("title","user")

@section("Content")

<div class="col-md-12">
    <table class="table table-dark table-condensed table-bordered text-right">
        <thead>
            <tr>
                <td>#</td>
                <td>
                    نام 
                </td>
                <td>
                    ایمیل
                </td>
                <td>
                    درباره ی کاربر
                </td>
                <td>
                    نقش
                </td>
            </tr>
        </thead>
        <tbody>
            <?php $id=1;  ?>
            @foreach ($Users as $user)
                <tr>
                    <th>
                        <?= $id++; ?>
                    </th>
                    <th>
                        {{$user->name}}
                    </th>
                    <th>
                        {{$user->email}}
                    </th>
                    <th>
                        {{$user->about}}
                    </th>
                    <th>
                      @if($user->role=="user")
                        <form action="{{route("admin",$user->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <button class="btn btn-danger" type="submit">
                                کاربر عادی
                            </button>
                        </form>
                      @else
                      
                      <form action="{{route("user",$user->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <button class="btn btn-success" type="submit">
                            ادمین
                        </button>
                    </form>
                      @endif
                    </th>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>












@endsection