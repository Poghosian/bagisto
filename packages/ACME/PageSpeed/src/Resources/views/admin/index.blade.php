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
            @if(!empty($errorMessage))
                <p class="error alert-danger" >{{$errorMessage}}</p>
            @endif
            <form action="{{route('admin.pagespeed.getSiteInfo')}}"  method="GET">
                <p style="color: white;">Write site link</p>
                <input type="text" name="link">
                <button  type="submit">Submit</button>
            </form>
            {{--                @dd($res['lighthouseResult']);--}}
            @if(!empty($res))
                    <textarea style="display: none" id="json-input" autocomplete="off"> {{json_encode($res)}}</textarea>
                    <pre id="json-renderer"></pre>
            @endif








        </div>
    </div>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--    <script src="{{asset('themes/default/assets/js/json-viewer.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/admin.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/json-viewer.css') }}">--}}
    <script>
        function renderJson() {
            try {
                var input = eval('(' + $('#json-input').val() + ')');
            }
            catch (error) {
                return alert("Cannot eval JSON: " + error);
            }
            var options = {};
            console.log(options)
            $('#json-renderer').jsonViewer(input, options);
            $(document).find('a').attr('href','javascript:void(0)')

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