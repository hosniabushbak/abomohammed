@extends('layouts.admin')
@section('content')
@can('head_section_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.head-sections.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.headSection.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.headSection.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HeadSection">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.welcome_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.head_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.sup_head_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.sent_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.place_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.name_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.name_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.email_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.email_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.mobile_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.headSection.fields.mobile_text_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.note_ar') }}
                        </th>

                        <th>
                            {{ trans('cruds.headSection.fields.button_ar') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($headSections as $key => $headSection)
                        <tr data-entry-id="{{ $headSection->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $headSection->id ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->welcome_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->head_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->sup_head_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->sent_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->place_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->name_ar ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->name_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->email_ar ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->email_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->mobile_ar ?? '' }}
                            </td>
                            <td>
                                {{ $headSection->mobile_text_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->note_ar ?? '' }}
                            </td>

                            <td>
                                {{ $headSection->button_ar ?? '' }}
                            </td>

                            <td>

                                @can('head_section_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.head-sections.edit', $headSection->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-HeadSection:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
