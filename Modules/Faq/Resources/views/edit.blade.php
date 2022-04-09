@extends('layouts.backend.admin')
@section('title') {{ __('edit_faq') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_faq') }}</h3>
                        <a href="{{ route('module.faq.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.faq.update', $faq->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-15">
                                    <label class="col-sm-3 form-label">{{ __('select_category') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select name="faq_category_id" class="form-control @error('faq_category_id') is-invalid @enderror"
                                            style="width: 100%;">
                                            @foreach ($faq_categories as $faq_category)
                                               <option {{ $faq_category->id == $faq->faq_category_id ? 'selected' : '' }} value="{{ $faq_category->id }}"> {{ $faq_category->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('faq_category_id') <span class="invalid-feedback"
                                            role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ __('question') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('question', $faq->question) }}" name="question" type="text"
                                            class="form-control @error('question') is-invalid @enderror"
                                            placeholder="{{ __('enter_a_question') }}">
                                        @error('question') <span class="invalid-feedback"
                                            role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ __('answer') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <textarea id="editor2" type="text" class="form-control" name="answer"
                                            placeholder="{{ __('write_the_answer') }}">{{ old('answer', $faq->answer) }}</textarea>
                                        @error('answer') <span class="text-danger"
                                            style="font-size: 13px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-sync"></i>&nbsp; {{ __('update_faq') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 170px;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
