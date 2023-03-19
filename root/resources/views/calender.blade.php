<html>

<head>
    <meta charset='utf-8' />
</head>

<body>
    {{-- フォーム --}}
    <form method="POST">
        @csrf
        <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
        @error('sentence')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">ChatGPT</button>
    </form>

    {{-- 結果 --}}
    {{ isset($chatResponse) ? $chatResponse : '' }}

        @if (isset($futureSchedule))
            @foreach($futureSchedule as $schedule)
                <ul>
                    <li>{{ $schedule['name'] }}</li>
                    <li>{{ $schedule['startDateTime'] }}〜{{ $schedule['endDateTime'] }}</li>
                    <li>{{ $schedule['description'] }}</li>
                </ul>
            @endforeach
        @endif

    @if (isset($chatResponseObj))
    <strong>{{ $result }}</strong>
        <ul>
            <li>{{ $chatResponseObj->title }}</li>
            <li>{{ $chatResponseObj->date }}</li>
            <li>{{ $chatResponseObj->description }}</li>
        </ul>
    @endif

    @if (isset($e))
        <strong>{{ $e }}</strong>
    @endif
</body>

</html>
