@extends('admin.layouts.app')
@section('title') {{ __('faq_category_list') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('faq_category_list') }}</h3>
                        @if (userCan('faq.category.create'))
                        <a href="{{ route('module.faq.category.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus"></i>&nbsp; {{ __('create') }}
                        </a>
                        @endif
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                              <tr>
                                <th width="5%">{{ __('sl') }}</th>
                                <th>{{ __('name') }}</th>
                                @if (userCan('faq.category.delete') || userCan('faq.category.edit'))
                                <th width="10%">{{ __('actions') }}</th>
                                @endif
                              </tr>
                            </thead>
                            <tbody id="sortable">
                                @forelse ($faqCategories as $faqCategory)
                                <tr data-id="{{ $faqCategory->id }}">
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $faqCategory->name }}</th>
                                    @if (userCan('faq.category.delete') || userCan('faq.category.edit'))
                                    <td >
                                        <div class="handle btn btn-success mt-0"><i class="fas fa-hand-rock"></i></div>
                                        @if (userCan('faq.category.edit'))
                                            <a data-toggle="tooltip" data-placement="top" title="{{ __('edit_category') }}"
                                                href="{{ route('module.faq.category.edit', $faqCategory->id) }}"
                                                class="btn bg-info"><i class="fas fa-edit"></i></a>
                                        @endif

                                        @if (userCan('faq.category.delete'))
                                            <form
                                                action="{{ route('module.faq.category.destroy', $faqCategory->id) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete_category') }}"
                                                    onclick="return confirm('{{ __('Are you sure want to delete this item?') }}');"
                                                    class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <x-admin.not-found word="Faq Category" route="module.faq.category.create" />
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#sortable").sortable({
                items: 'tr',
                cursor: 'move',
                opacity: 0.4,
                scroll: false,
                dropOnEmpty: false,
                update: function() {
                    sendTaskOrderToServer('#sortable tr');
                },
                classes: {
                    "ui-sortable": "highlight"
                },
            });
            $("#sortable").disableSelection();

            function sendTaskOrderToServer(selector) {
                var order = [];
                $(selector).each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('module.faq.category.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    }
                });
            }
        });
    </script>
@endsection
