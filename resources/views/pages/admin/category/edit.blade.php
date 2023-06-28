<x-admin::layout title="Update" header="Update">

<div class="row">
    <div class="col-12">
      <div class="card p-3">
        <form method="POST" action="{{ route('admin.category.update', $category->slug) }}" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-12">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control  @error('name') is-invalid @enderror" id="name">
            </div>
            <div class="col-md-12">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" slug="slug" id="slug" value="{{ old('slug', $category->slug) }}" disabled readonly>

                @error('slug')
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
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
      fetch('/category/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });
  </script>


</x-admin>