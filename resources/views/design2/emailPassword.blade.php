<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            deneme
                       </div>
                   @endif
                   <a href="{{ $link }}">Click Here</a>
               </div>
           </div>
       </div>
   </div>
</div>