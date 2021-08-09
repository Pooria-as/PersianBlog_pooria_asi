@extends("Dashbord.layout.master")


@section("title","users")


@section("Content")


<div class="col-md-12">
    <br>
    @include("inc.success")
    <br>
    <div class="card">
        <div class="card-header">
            <h5 class="float-right">
                اطلاعات کاربر

            </h5>
        </div>
        <div class="card-body">
            <form action="{{route("User.update",Auth::user()->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name" class="float-right">نام</label>
                    <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="float-right">ایمیل</label>

                    <input type="text" name="email" id="email" value="{{Auth::user()->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about" class="float-right">درباره ی کابر</label>

                    <textarea name="about" id="about" cols="10" rows="10" class="form-control">
                    {{Auth::user()->about}}
                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success btn-block" type="submit">
                        ثبت
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection