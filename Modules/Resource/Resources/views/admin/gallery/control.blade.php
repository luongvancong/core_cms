<div class="gallery-control">
    <div class="thumnail-container mg-bt-10">
        <img src="{{ old($controlName) ? parse_image_url('md_' . old($controlName)) : '' }}" class="{{ !old($controlName) ? 'hide' : '' }} img-thumnail" id="{{ $imgId }}">
    </div>
    <input type="hidden" name="{{ $controlName }}" value="{{ old($controlName) }}">
    <span class="act-show-gallery btn btn-xs btn-danger">Chọn ảnh từ gallery</span>
</div>
<script type="text/javascript">
    $(function() {
        $('.act-show-gallery').fancybox({
            type: 'iframe',
            href: '/admin/resource/gallery/index?control_name={{ $controlName }}&srcSelectorId={{ $imgId }}'
        });
    });
</script>