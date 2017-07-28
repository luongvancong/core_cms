<div class="row-fluid">
	<div class="span6">
		<div class="dataTables_info">{!! trans('table.count_record', ['perPage' => ($data->perPage() > $data->total() ? $data->total() : $data->perPage()), 'total' => $data->total()]) !!}</div>
	</div>
	<div class="span6">{!! with(new \App\Hocs\Core\NhtPagination($data->appends($appended)))->render()  !!}</div>
</div>
