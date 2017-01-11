@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Vị trí ghế ngồi xe {{ $car->getName() }} - {{ $car->getSeat() }} chỗ
                <a href="{{ route('admin.car.index') }}" class="btn btn-xs btn-default pull-right"><i class="fa fa-plus"></i> Quay lại</a>
            </h4>
        </header>
        <div class="panel-body">

            <table>
                <?php
                for($x = 1; $x <= 6; $x ++) {
                    echo '<tr>';
                    for($y = 1; $y <= 10; $y ++) {
                        $selectedSeat = false;
                        if(isset($seats[$x.'_'.$y])) {
                            $selectedSeat = true;
                        }

                        if($selectedSeat) {
                            if($seats[$x.'_'.$y] == 1) {
                                $src = '/img/steering-wheel.svg';
                            } else {
                                $src = '/img/seat-green.svg';
                            }
                        } else {
                            $src = '/img/seat-white.svg';
                        }
                        echo '<td>
                            <img height="40" data-x="'. $x .'" data-y="'. $y .'" class="seat" src="'. $src .'" style="display:inline-block; margin: 5px; cursor: pointer" />
                        </td>';
                    }
                    echo '</tr>';
                }
                ?>
                </table>
        </div>

    </div>

    <form id="form-choice-seat-type">
        <div id="modal-choice-seat-type" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Loại ghế</h4>
                    </div>
                    <div class="modal-body">
                        <div class="checkbox">
                            <label class="checkbox-inline">
                                <input type="radio" value="1" class="seat_type" name="seat_type"> Ghế tài xế
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" value="0" class="seat_type" name="seat_type"> Ghế khách
                            </label>
                        </div>
                        <div class="checkbox">
                            <span>Thao tác</span>
                            <select class="form-control input-sm" name="action">
                                <option value="update">Cập nhật</option>
                                <option value="cancel">Bỏ chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
@stop

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('.seat').click(function() {
            $('.seat').removeClass('active');
            $(this).addClass('active');
            $('#modal-choice-seat-type').modal('show');
        });

        $('#form-choice-seat-type').on('submit', function(e) {
            $('#modal-choice-seat-type').modal('hide');
            e.preventDefault();
            var $this = $(this);
            var $seat = $('.seat.active');
            var x = $seat.data('x');
            var y = $seat.data('y');
            var type = $('input[name="seat_type"]:checked').val();
            var action = $('select[name="action"]').val();
            if(action == 'update') {
                if(type == undefined) {
                    alert('Vui lòng chọn loại ghế');
                    return;
                }
            }

            $.ajax({
                url : '{{ route('admin.car.position_seat.update', $car->getId()) }}',
                type : 'POST',
                dataType : 'json',
                data : {
                    type : type,
                    x : x,
                    y: y,
                    action: action,
                    _token: "{{ csrf_token() }}"
                },
                success : function(response) {
                    if(response.code == 1) {
                        if(type == 1) {
                            $('.seat.active').attr('src', '/img/steering-wheel.svg');
                        } else {
                            $('.seat.active').attr('src', '/img/seat-green.svg');
                        }

                    } else if(response.code == 2) {
                        $('.seat.active').attr('src', '/img/seat-white.svg');
                    }
                }
            });
        });
    });
</script>
@stop