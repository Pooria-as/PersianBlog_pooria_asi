@extends("Dashbord.layout.master")
@section("title","Tag")


@section("Content")

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text text-right">
                    @if (isset($Tag))
                           ویرایش تگ 
                           @else
                           افزودن تگ

                    @endif
                </h5>
                </div>
            <div class="card-body">
                <form action="{{ isset($Tag) ? route("Tag.update",$Tag->id) : route("Tag.store")}}" method="POST">
                    @csrf
                    @if(isset($Tag))

                    @method("PUT")

                    @endif
            <div class="form-group">
                <label for="name" class="float-right">تگ</label>
                <input type="text" name="name" id="name" class="form-control" value="{{isset($Tag) ? $Tag->name : ""}}">
            </div>
            @error("name")
            <div class="form-group">
                <alert class="alert alert-danger float-right">
                    {{$message}}
                </alert>
            </div>
                
            @enderror
            <div class="form-group">
                @if(isset($Tag))
                <button class="btn btn-primary btn-block" type="submit">
                    ویرایش
                </button>

                @else
                <button class="btn btn-success btn-block" type="submit">
                    افزودن
                </button>

                @endif
            </div>
        </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <br>
        @include("inc.success")
   
   @if($tags->count() >0)
   <table class="table table-striped table-bordered table-dark text-right">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                تگ    
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
        @foreach ($tags as $tag)
        <?php $id=1; ?>
        <tr>
            <td>
                <?= $id++; ?>
            </td>
            <td>
                {{$tag->name}}
            </td>
            <td>
                <a href="{{route("Tag.edit",$tag->id)}}">
                    <i class="fas fa-edit fa-lg text-success mr-2"></i>
                </a>
            </td>
            <td>
                <form action="{{route("Tag.destroy",$tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"
                        onclick="return confirm('آیا میخواهید تگ  حذف شود؟');"
                        >
                            حذف
                        </button>
                </form>
            </td>
        </tr>
    
       
       
    
        @endforeach
       
    </tbody>
</table>

        @else
        <div class="alert alert-danger text-right">
   
            <h5>
               ! !تگ وجود ندارد دسته بندی جدید بسازید
            </h5>
        </div>
    </div> 
            

   @endif
 
    
   


@endsection