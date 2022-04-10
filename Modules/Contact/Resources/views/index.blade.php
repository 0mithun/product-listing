@extends('admin.layouts.app')
@section('title') {{ __('contact_list') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('contact_list') }}</h3>
                        @if (userCan('contact.delete'))
                            @if ($contacts->count() > 0)
                                <button onclick="return confirm('Are you sure you want to delete selected items?');" id="selected_item_delete" class="btn btn-danger mr-3 float-right">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                        @endif
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            @if ($contacts->count() > 0)
                                <thead>
                                    <tr>
                                        <th width="3%" style="position:unset; padding-right:10px;">
                                            <input id="category_checkall" name="multiple_category" type="checkbox">
                                        </th>
                                        <th width="5%">{{ __('sl') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('date') }}</th>
                                        @if (userCan('contact.delete') || userCan('contact.view'))
                                            <th width="10%">{{ __('actions') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                            @endif
                            <tbody>
                                @forelse ($contacts as $contact)
                                <tr id="item_id{{ $contact->id }}">
                                    <td><input onchange="checked_count()" id="single_checkbox_category"
                                        name="single_category_checkbox" value="{{ $contact->id }}"
                                        type="checkbox"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                                    @if (userCan('contact.delete') || userCan('contact.view'))
                                        <td class="d-flex justify-content-center align-items-center">
                                            @if (userCan('contact.view'))
                                            <button contact_id="{{ $contact->id }}" type="submit" onclick="contactDetail({{ json_encode($contact) }})" title="{{ __('view_message') }}" class="btn btn-sm bg-info mr-1 msgBtn"><i class="far fa-envelope-open"></i></button>
                                            @endif
                                            @if (userCan('contact.delete'))
                                            <form action="{{ route('module.contact.destroy', $contact->id) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button title="{{ __('delete_contact') }}" onclick="return confirm('{{ __('Are you sure want to delete this item?') }}');" class="btn btn-sm bg-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <x-admin.not-found word="Contact" route="" />
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($contacts->count() > 0)
                        <div class="card-footer ">
                            <div class="d-flex justify-content-center">
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Message Modal --}}
    <div class="modal fade" id="contactModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Contact Details</h5>
              <button type="button" class="close close-btn" data-bs-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input class="form-control" id="contact-modal-name" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="contact-modal-email" readonly>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" rows="3" id="contact-modal-message" readonly></textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.close-btn').click(function(){
                $('#contactModal').modal('hide');
            })
        })
        function contactDetail(contact){
            console.log(contact)
            $('#contact-modal-name').val(contact.name);
            $('#contact-modal-email').val(contact.email);
            $('#contact-modal-message').val(contact.message);
            $('#contactModal').modal('show');
        }

        $("#selected_item_delete").attr("disabled", true);
        $("#category_checkall").on("click", function() {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", true);
                $("#selected_item_delete").attr("disabled", false);
            } else {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", false);
                $("#selected_item_delete").attr("disabled", true);
            }
        });
        function checked_count() {
            var checked_length = $(":checkbox:checked").length
            if (checked_length != 0) {
                $("#selected_item_delete").attr("disabled", false);
                $('#selected_item_delete').click(function(e) {
                    e.preventDefault();
                    var ids = [];
                    $('input:checked[name="single_category_checkbox"]:checked').each(function() {
                        ids.push($(this).val());
                    });
                    $.ajax({
                        url: "{{ route('module.contact.multiple.destroy') }}",
                        type: 'DELETE',
                        data: {
                            id: ids,
                        },
                        success: function(response) {
                            $.each(ids, function(key, val) {
                                $('#item_id' + val).remove();
                            })
                            toastr.success(response.message, 'Success');
                        }
                    })
                });
            } else {
                $("#selected_item_delete").attr("disabled", true);
            }
        }
    </script>
@endsection
