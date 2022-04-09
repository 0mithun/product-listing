@extends('layouts.app')

@section('content')
    <section class="page">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <select name="" id="" class="form-control">
                        @foreach ($categories as $category)
                            {{ nestedCategories(0, $category, 34, '___') }}
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
@endsection
