<x-admin::layout title="Create" header="Create">

<div class="row">
    <div class="col-12">
      <div class="card p-3">
        <form action="{{ route('admin.tiket.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" disabled readonly>

                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="content">Content</label>
                <input id="content" type="hidden" name="content" class="form-control  @error('content') is-invalid @enderror" value="{{ old('content') }}">
                <trix-editor input="content"></trix-editor>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">

                @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="image" class="form-label">Post Image</label>
              <img class="img-preview img-fluid mb-3 col-sm-3">
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
              @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="col-md-12 mt-2">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const name = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      fetch('/tiket/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display= 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>

  

</x-admin>