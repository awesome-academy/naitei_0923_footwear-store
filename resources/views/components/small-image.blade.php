@props(['smallImages' => ''])
<div class="small-images-container">
    @foreach($smallImages as $image)
        <img src="{{ asset($image->media_link) }}" alt="small images" class="small-image">
    @endforeach
</div>
