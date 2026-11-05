
  @props([
    'imgLink'
  ])

  <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
      <div class="gallery-item h-100">
          <img src="{{ asset('front/assets/img/gallery/'.$imgLink) }}" class="img-fluid w-100 h-100 rounded"
              alt="Image">
          <div class="gallery-content">

          </div>
          <div class="gallery-plus-icon">
              <a href="{{ asset('front/assets/img/gallery/'.$imgLink) }}" data-lightbox="gallery-1"
                  class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
          </div>
      </div>
  </div>
