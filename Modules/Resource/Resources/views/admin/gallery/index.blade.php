<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
    <link href="/css/gallery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/js/fancybox-2.15/source/jquery.fancybox.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/fancybox-2.15/source/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/js/jquery-lazyload/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="/js/functions.js"></script>
</head>
<body>
    <div class="panel">
        <div class="panel-body">
            <div class="gallery-container">
                <div class="row">
                    @foreach($images as $item)
                        <div class="col-sm-3 item-colsystem mg-bt-20">
                            <div class="item">
                                <img class="img" src="{{ parse_image_url($item['name']) }}">
                                <div class="btn-group">
                                    <span data-image="{{ $item->name }}" data-image_uri="{{ parse_image_url('md_' . $item->name) }}" class="act-select-image btn btn-sm btn-primary" title="Chọn ảnh"><i class="fa fa-hand-o-up"></i></span>
                                    <span data-image="{{ $item->name }}" data-action="delete" class="btn btn-danger btn-sm act-delete-image" title="Xóa"><i class="fa fa-trash"></i></span>
                                    <a href="{{ parse_image_url($item->name) }}" class="_fancybox btn btn-sm btn-default" title="Phóng to"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-xs-12">
                        <div class="pull-right">{!! $images->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(function() {
    $('.lazy').lazyload();

    $('._fancybox').fancybox({
        helpers: {
            title : {
                type : 'float'
            }
        },
        afterLoad: function(cur, prev) {
            console.log(cur);
            // $(cur.inner).append('<button class="btn btn-xs btn-primary">Choice</button>');
        }
    });

    $('.act-select-image').click(function() {
        var fileControl = parent.document.querySelector('input[name="'+ getParamsFromURL('control_name') +'"]');
        $(fileControl).val($(this).data('image'));
        var imgSrc = parent.document.getElementById(getParamsFromURL('srcSelectorId'));
        $(imgSrc).attr('src', $(this).data('image_uri')).removeClass('hide');

        parent.jQuery.fancybox.close(true);
    });

    $('.act-delete-image').click(function() {
        if(confirm("Bạn có chắc chắn muốn xóa ảnh này")) {
            var $this = $(this);
            $.ajax({
                url : '{{ route("admin.gallery.delete") }}',
                type : 'POST',
                data : {
                    image : $this.data('image'),
                    _token: '{{ csrf_token() }}'
                },
                success : function(response) {
                    $this.parents('.item-colsystem').remove();
                }
            });
        }
    });
});
</script>
</body>
</html>

