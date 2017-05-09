@if(!empty($images) && $images->isNotEmpty())
    <div class="row image-gallery">
        @foreach($images as $image)
            <?php $imageTranslation = $image->translation($lang->code); ?>
            <?php $thumbId = isset($thumb) ? $thumb->id : null;    ?>
            @if($image->id !== $thumbId)
                <div class="col-xs-6 col-md-3 image">
                    <a href="{{croppaUrl($image->getFullPath())}}" class="colorbox thumbnail"
                       rel="gallery" title="{{($imageTranslation)? $imageTranslation->title : ''}}">
                        <img class="img-responsive"
                             title="{{($imageTranslation)? $imageTranslation->title : ''}}"
                             src="{{croppaUrl($image->getFullPath(), 180, 180)}}"
                             alt="{{($imageTranslation)? $imageTranslation->title : ''}}">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endif