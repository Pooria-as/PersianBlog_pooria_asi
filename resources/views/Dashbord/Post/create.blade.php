@extends("Dashbord.layout.master")
@section("title","Post")

@section("Content")

<div class="col-md-12">
    
<div class="card">
    <div class="card-header">
    @if(isset($Post))
    <h4 class="text text-right">
        ویرایش پست
    </h4>
    @else
    <h4 class="text text-right">
        افزودن پست
    </h4>
    @endif
    </div>
    <div class="card-body">
        <form action="{{isset($Post) ? route("Post.update",$Post->id) : route("Post.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($Post))
           
                @method("PUT")

            @endif
            <div class="form-group">
                <label for="title" class="float-right">عنوان</label>
                <input type="text" name="title" id="title" class="form-control" value="{{isset($Post) ? $Post->title : ""}}">
            </div>
            @error("title")
                <div class="form-group">
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                </div>
            @enderror
            <div class="form-group">
                <label for="description" class="float-right">توضیحات</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control">
                   {{isset($Post) ? $Post->description : ""}}
               </textarea>
            </div>
            @error("description")
            <div class="form-group">
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            </div>
        @enderror


        @if(isset($Post))

        <input type="hidden" name="old_image" value="{{$Post->image}}" id="">

        @endif



            <div class="form-group">
                <label for="category" class="float-right">
                    دسته بندی
                </label>
                <select name="category" id="category" class="form-control">
                   @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            @if(isset($Post))
                            @if($category->id == $Post->category_id)
                            selected
                            @endif
                            @endif
                            >
                            {{$category->name}}
                        </option>
                   @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="tag" class="float-right">تگ</label>
                <select name="tags[]" id="tag" class="form-control tag-selector"  multiple="multiple">
                    @foreach ($tags as $tag)
                             <option value="{{$tag->id}}"
                                @if(isset($Post))
                                @if ($Post->hasTag($tag->id))
                                    selected
                                @endif
                                @endif
                                
                                >
                            {{$tag->name}}
                                </option>
                    @endforeach 
                </select>
            </div>
            


        <div class="form-group">
            <label for="content" class="float-right">متن</label>
            <input id="content" type="hidden" name="content" value="{{isset($Post) ? $Post->content : ""}}">
            <trix-editor input="content"></trix-editor>
        </div>

        <div class="form-group">
            <label for="image" class="float-right">عکس</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        @if(isset($Post))

        <img src="/{{$Post->image}}" width="100%" class=" img-thumbnail float-right m-1" alt="">
        @endif

      
        @error("description")
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        </div>
    @enderror
    <div class="form-group">
        <button class="btn btn-success btn-block" type="submit">افزودن پست</button>
    </div>
        </form>
    </div>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('.tag-selector').select2();
});
</script>

@endsection