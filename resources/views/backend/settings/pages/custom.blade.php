@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('custom-setting')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Custom CSS & JS</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('setting', 'custom') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="role_name">
                                    Header custom style (before head end) 
                                    <code> [Write style with without tag] </code>
                                </label>
                                <textarea name="header_css" id="headerCss" class="form-control @error('name') is-invalid @enderror"rows="5">{{ $setting->header_css }}</textarea>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_name">
                                    Header custom script (before head end) 
                                    <code> [Write script without script tag] </code>
                                </label>
                                <textarea name="header_script" id="headerScript" class="form-control @error('name') is-invalid @enderror"rows="5">{{ $setting->header_script }}</textarea>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_name">
                                    Footer custom script (before body end) 
                                    <code> [Write script without script tag] </code>
                                </label>
                                <textarea name="body_script" id="bodyScript" class="form-control @error('name') is-invalid @enderror"rows="5">{{ $setting->body_script }}</textarea>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
<!-- Create a simple CodeMirror instance -->
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/codemirror/addon/foldgutter.css"">
@endsection
@section('script')
<!-- Create a simple CodeMirror instance -->
<script src="{{ asset('backend') }}/plugins/codemirror/codemirror.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/mode/javascript/javascript.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/mode/css/css.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/addon/active-line.js"></script>
{{-- <script src="{{ asset('backend') }}/plugins/codemirror/addon/foldcode.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/addon/foldgutter.js"></script> --}}
<script src="{{ asset('backend') }}/plugins/codemirror/addon/closebrackets.js"></script>
<script>
    let headerCss = document.getElementById('headerCss');
    let headerScript = document.getElementById('headerScript');
    let bodyScript = document.getElementById('bodyScript');

    var editor = CodeMirror.fromTextArea(headerCss, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "css",
    });
    var editor = CodeMirror.fromTextArea(headerScript, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "javascript",
    });
    var editor = CodeMirror.fromTextArea(bodyScript, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "javascript",
    });
  </script>
@endsection
