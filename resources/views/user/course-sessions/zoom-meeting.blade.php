<!DOCTYPE html>
<html>

<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="/css/zoom/vendor/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="/css/zoom/vendor/react-select.css"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="origin-trial" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
<script src="{{asset('js/common.min.js')}}"></script>
<script src="{{asset('js/layouts.min.js')}}"></script>
<script src="/js/zoom/vendor/react.min.js"></script>
<script src="/js/zoom/vendor/react-dom.min.js"></script>
<script src="/js/zoom/vendor/redux.min.js"></script>
<script src="/js/zoom/vendor/redux-thunk.min.js"></script>
<script src="/js/zoom/vendor/lodash.min.js"></script>
<script src="/js/zoom/vendor/zoom-meeting-1.9.7.min.js"></script>
<script src="/js/zoom/tool.js"></script>
<script src="/js/zoom/vconsole.min.js"></script>
<script src="/js/zoom/meeting.js"></script>
<script>
    var sessionId = '{{request()->course_session}}'
    var courseSessionTrackerUrl = '{{route('courses.sessions.tracker.update')}}'
</script>
<script>

</script>
</body>

</html>
