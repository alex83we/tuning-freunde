@if (count($breadcrumbs))
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">@yield('breadcrumb-title')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    </div>
</div>
@endif
