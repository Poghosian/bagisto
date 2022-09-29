@extends('admin::layouts.master')

@section('page_title')
    Package PageSpeed
@stop

@section('content-wrapper')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Package PageSpeed</h1>
            </div>

            <div class="page-action">

            </div>
        </div>

        <div class="page-content">
            <p style="color: white;">Write site link</p>
            @if(!empty($errorMessage))
                <p class="error alert-danger">{{$errorMessage}}</p>
            @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{route('admin.pagespeed.getSiteInfo')}}" method="GET">
                <div class="control-group has-error">
                    <input style="" class="control" type="text" name="link">
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
            {{--                @dd($res['lighthouseResult']);--}}
            @if(!empty($res))
                <textarea style="display: none" id="json-input" autocomplete="off"> {{json_encode($res)}}</textarea>
                <pre id="json-renderer"></pre>
            @endif
        </div>
    </div>

    <script>
        function renderJson() {
            try {
                var input = eval('(' + $('#json-input').val() + ')');
            } catch (error) {
                return alert("Cannot eval JSON: " + error);
            }
            var options = {};
            console.log(options)
            $('#json-renderer').jsonViewer(input, options);
        }

        // Generate on click
        $('#btn-json-viewer').click(renderJson);

        // Generate on option change
        $('p.options input[type=checkbox]').click(renderJson);

        // Display JSON sample on page load
        // renderJson();
        renderJson()
    </script>
@stop