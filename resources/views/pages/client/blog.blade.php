<x-client::layout title="halaman blog">

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">
          
          <div class="col-lg-8">

            <div class="row gy-4 posts-list">
              
              @foreach ($news as $item)
                  
              <div class="col-lg-6">
                <article class="d-flex flex-column">

                  <div class="post-img">
                    <img src="{{ asset('storage/' .$item->image) }}" alt="" class="img-fluid">
                  </div>
                  
                  <h2 class="title">
                    <a href="{{ route('blog.detail', $item->slug) }}">{{ $item->title }}</a>
                  </h2>
                  
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/blog">{{ $item->user->name }}</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="/blog"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('D, d M Y') }}</time></a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
                    </ul>
                  </div>

                  <div class="content">
                    <p>
                      {{ $item->excerpt }}
                    </p>
                  </div>
                  
                  <div class="read-more mt-auto align-self-end">
                    <a href="{{ route('blog.detail', $item->slug) }}">Read More</a>
                  </div>
                  
                </article>
              </div><!-- End post list item -->
              @endforeach
            </div>

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div><!-- End blog pagination -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  @foreach ($categories as $item)
                      
                  <li><a href="#">{{ $item->name }} <span>(25)</span></a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  @foreach ($news as $item)
                      
                  <div class="post-item mt-3">
                    <img src="{{ asset('storage/' .$item->image) }}" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="{{ route('blog.detail', $item->slug) }}">{{ $item->title }}</a></h4>
                      <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('D, d M Y') }}</time>
                    </div>
                  </div><!-- End recent post item-->
                  @endforeach

                </div>

              </div><!-- End sidebar recent posts-->

              <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End Blog Sidebar -->

          </div>

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

</x-client::layout>