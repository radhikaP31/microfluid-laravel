<x-app-layout>
  <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
    {{ __('Blogs | Microfluid Process Equipment') }}
  </x-slot>

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block container mb-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  {{ Breadcrumbs::render('blogs') }}
  <main id="main">
    <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
    <!-- ======= Blog Section ======= -->
    <section class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            @if($blogData->count() > 0)
            @foreach($blogData as $blog)
            <article class="entry">

              <div class="entry-img">
                <img src="{{ url($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid" style="height: 200px;width: auto;">
              </div>

              <h2 class="entry-title">
                <a href="<?php echo config('app.base_url') . '/blog/' . $blog->slug; ?>">{{ $blog->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time>{{ date_format(date_create($blog->created_at),'M j, Y')}}</time></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {{ substr($blog->description, 0, 100) . ' ...' }}
                </p>
                <div class="read-more">
                  <a href="<?php echo config('app.base_url') . '/blog/' . $blog->slug; ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
            <div class="d-flex justify-content-center">
              {!! $blogData->links() !!}
            </div>
            @endif

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <!-- <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div> -->
              <!-- End sidebar search form-->

              <!-- <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>

              </div> --><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">

                @forelse($recentBlogData as $blog)
                <div class="post-item clearfix">
                  <img src="{{ url($blog->image) }}" alt="{{ $blog->title }}">
                  <h4><a href="<?php echo config('app.base_url') . '/blog/' . $blog->slug; ?>">{{ $blog->title }}</a></h4>
                  <time>{{ date_format(date_create($blog->created_at),'M j, Y')}}</time>
                </div>
                @empty
                <h2>No recent blogs!!</h2>
                @endforelse

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach($tagsData as $key => $tags)
                  <li><a href="#">{{ $tags->name }}</a></li>
                  @endforeach
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->
  </main><!-- End #main -->
</x-app-layout>