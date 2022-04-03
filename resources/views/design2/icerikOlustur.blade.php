@extends('layouts.app')

@section('content')
<head>
@section('title','Margravials / İçerik oluştur')

  <meta name="_token" content="{{ csrf_token() }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
</head>



<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css" integrity="sha512-jO9KUHlvIF4MH/OTiio0aaueQrD38zlvFde9JoEA+AQaCNxIJoX4Kjse3sO2kqly84wc6aCtdm9BIUpYdvFYoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css" integrity="sha512-NCJ1O5tCMq4DK670CblvRiob3bb5PAxJ7MALAz2cV40T9RgNMrJSAwJKy0oz20Wu7TDn9Z2WnveirOeHmpaIlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


    <div class="container" style="margin-top:3rem;margin-bottom:3rem;">
        
          
        <div class="row">
          <!-- left column -->
          
            

          <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">

              <!-- edit form column -->
                <div class="col-md-12 personal-info">

                  @if ($errors->any())
                            <div class="alert alert-danger" >
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <strong><li style="list-style:none;"> {{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif
                  
                  
                  
                  <form class="form-horizontal" method="POST" action="{{route('icerik_olusturPost')}}" enctype="multipart/form-data" id="form" >

                    @csrf
                    
                    <div class="col-lg-12">
                    <div class="file-upload">
                      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Kapak Fotoğrafı Ekle</button>
                    
                      <div class="image-upload-wrap">
                        <input class="file-upload-input" name="first_photo" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                          <h3>FOTOĞRAFI YÜKLE</h3>
                        </div>
                      </div>
                      <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                          <button type="button" onclick="removeUpload()" class="remove-image">Fotoğrafı sil</button>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <input class="form-control"  maxlength="128" name='title' onkeyup="countChar(this)" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')" placeholder="Başlık giriniz" required="" autofocus="">
                        <small><div id="titleNum"></div></small>
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-lg-12">
                          <textarea class="form-control" onkeyup="countChar2(this)" maxlength="256"  rows="2" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')" required="" name="short_content" placeholder="Kısa açıklama giriniz"></textarea>
                          <small><div id="shortContentNum"></div></small>
                        </div>
                        
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                          <!-- <textarea class="form-control" rows="16" name="content" placeholder="İçerik giriniz"></textarea> -->
                          <textarea name="content" id="editor" required="">
                            
                          </textarea>

                      </div>
                    </div>



                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-12">
                        <input type="submit" class="site-btn" value="Paylaş">
                        <span></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>


    <script src="https://cdn.tiny.cloud/1/35uw9n3x3plm4r0bhen6trh8bik4aykkprnfa0hg38fkwk3b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
   
   <script>

function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

var form = $('#form'),
  original = form.serialize()

form.submit(function(){
  window.onbeforeunload = null
})

window.onbeforeunload = function(){
  if (form.serialize() != original)
    return 'Are you sure you want to leave?'
}


      var editor_config = {
        language : 'tr',
        resize: false,
        selector: '#editor',
        height: 500,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic image media | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat  | help',
        image_advtab: false,
        image_description: false,
        media_dimensions: false,
        image_dimensions:false,
        media_poster: false,
        relative_urls:false,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{route("contentImageUpload")}}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
          
      };

      tinymce.init(editor_config);
		
	

      function countChar(val) {
        var len = val.value.length;
        if (len >= 129) {
          val.value = val.value.substring(0, 129);
        } else {
          $('#titleNum').text(128 - len);
        }
      };
      function countChar2(val) {
        var len = val.value.length;
        if (len >= 256) {
          val.value = val.value.substring(0, 256);
        } else {
          $('#shortContentNum').text(256 - len);
        }
      };
      function countChar3(val) {
        var len = val.value.length;
        if (len >= 256) {
          val.value = val.value.substring(0, 256);
        } else {
          $('#contentNum').text(256 - len);
        }
      };



      
    </script>
    


    <style>

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
 
 textarea{
  resize:none;
}

      body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #304238;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #304238;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #000000;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #304238;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #f9f9f9;
  border: 4px dashed #000000;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #304238;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
      .alert-danger{
          color: black;
          border-color:#fbccd5;
          background-color: #fbccd5;
  
      }
  </style>
    


@endsection