@extends("Dashbord.layout.master")
@section("title","Category")


@section("Content")

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text text-right">
                    @if (isset($Category))
                           ویرایش دسته بندی 
                           @else
                           افزودن دسته بندی

                    @endif
                </h5>
                </div>
            <div class="card-body">
                <form action="{{ isset($Category) ? route("Category.update",$Category->id) : route("Category.store")}}" method="POST">
                    @csrf
                    @if(isset($Category))

                    @method("PUT")

                    @endif
            <div class="form-group">
                <label for="name" class="float-right">دسته بندی</label>
                <input type="text" name="name" id="name" class="form-control" value="{{isset($Category) ? $Category->name : ""}}">
            </div>
            @error("name")
            <div class="form-group">
                <alert class="alert alert-danger float-right">
                    {{$message}}
                </alert>
            </div>
                
            @enderror
            <div class="form-group">
                @if(isset($Category))
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
   
   @if($categories->count() >0)
   <table class="table table-striped table-bordered table-dark text-right">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                دسته بندی
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
        @foreach ($categories as $category)
        <?php $id=1; ?>
        <tr>
            <td>
                <?= $id++; ?>
            </td>
            <td>
                {{$category->name}}
            </td>
            <td>
                <a href="{{route("Category.edit",$category->id)}}">
                    <i class="fas fa-edit fa-lg text-success mr-2"></i>
                </a>
            </td>
            <td>
                <form action="{{route("Category.destroy",$category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"
                        onclick="return confirm('آیا میخواهید دسته بندی حذف شود؟');"
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
               ! !دسته بندی وجود ندارد دسته بندی جدید بسازید
            </h5>
        </div>
    </div> 
            

   @endif
 
    
   


@endsection