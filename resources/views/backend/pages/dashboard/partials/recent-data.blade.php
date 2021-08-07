<!-- ============================================================== -->
<!-- Recent datas -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    @if (Auth::user()->can('page.view'))
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body border-bottom">
                    <h4 class="card-title">Recent Pages</h4>
                </div>
                <div class="comment-widgets scrollable" style="height:430px;">
                    @foreach ($recent_pages as $page)
                        <!-- Page Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{ asset(App\Helpers\ReturnPathHelper::getAdminImage($page->created_by)) }}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">
                                    <a class="text-secondary" href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->title }}</a>
                                </h6>
                                <span class="m-b-15 d-block">
                                    {{ App\Helpers\StringHelper::stripTags($page->description, 0, 100) .'...' }}
                                </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">{{ $page->updated_at->diffForHumans() }}</span>

                                    <span class="label label-rounded {{ $page->status === 1 ? 'label-primary' : 'label-warning' }}">
                                        {{ $page->status === 1 ? 'Published' : 'Pending' }}
                                    </span>
                                    <span class="action-icons">
                                        <a href="{{ route('admin.pages.edit', $page->id) }}">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center border-top">
                        <a class="btn btn-rounded btn-primary mt-2 " href="{{ route('admin.pages.index') }}">View More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @if (Auth::user()->can('blog.view'))
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Recent Blog Articles</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:430px;">
                @foreach ($recent_blogs as $blog)
                    <!-- Page Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2">
                            <img src="{{ asset(App\Helpers\ReturnPathHelper::getAdminImage($blog->created_by)) }}" alt="user" width="50" class="rounded-circle">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">
                                <a class="text-secondary" href="{{ route('admin.pages.edit', $blog->id) }}">{{ $blog->title }}</a>
                            </h6>
                            <span class="m-b-15 d-block">
                                {{ App\Helpers\StringHelper::stripTags($blog->description, 0, 100) .'...' }}
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">{{ $blog->updated_at->diffForHumans() }}</span>

                                <span class="label label-rounded {{ $blog->status === 1 ? 'label-primary' : 'label-warning' }}">
                                    {{ $blog->status === 1 ? 'Published' : 'Pending' }}
                                </span>
                                <span class="action-icons">
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center border-top">
                    <a class="btn btn-rounded btn-primary mt-2 " href="{{ route('admin.blogs.index') }}">View More <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- ============================================================== -->
<!-- Recent datas -->
<!-- ============================================================== -->
