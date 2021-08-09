@if(session("success"))


<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>
        <h6 class="text text-right text-bold text-dark">
    {{session("success")}}    

        </h6>
    </strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


@endif