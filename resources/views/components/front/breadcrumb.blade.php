@props([ 'img_link'])

<div>
    <div class="container-fluid bg-breadcrumb" style="background: linear-gradient(rgba(193, 119, 23, 0.215),rgb(32, 20, 5)), url({{ asset($img_link) }});">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">{{ $slot}}</h1>

        </div>
    </div>
</div>
