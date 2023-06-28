<x-admin::layout title="Edit" header="Edit">

<div class="row">
    <div class="col-12">
      <div class="card p-3">
        <form method="POST" action="{{ route('admin.news.update', $news->slug) }}" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control  @error('title') is-invalid @enderror" id="title">
              @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $news->slug) }}" disabled readonly>

                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
              <label for="content">Content</label>
                <input id="content" type="hidden" name="content" class="form-control  @error('content') is-invalid @enderror" value="{{ old('content', $news->content) }}">
                <trix-editor input="content"></trix-editor>

                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">Category</label>
              <select name="category_id" id="inputState" class="form-select">
                <option value="none" disabled>Choose...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($news->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12">
              <label for="image" class="form-label">Post Image</label>
              @if ($news->image)
              <img src="{{ asset('storage/' .$news->image) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
              @else                 
              <img class="img-preview img-fluid mb-3 col-sm-3">
              @endif
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
              @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      fetch('/news/checkSlug?title=' + title.value)
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

   /*
   function previewImage(){
    frame.src=URL.createObjectURL(event.taget.files[0]);
   }
   */

  </script>

</x-admin>