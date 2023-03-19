<html>

<head>
    <meta charset='utf-8' />
</head>

<body>
    <ul>
        @if (isset($futureSchedule))
            @foreach($futureSchedule as $schedule)
                <li>{{ $schedule['name'] }}<br>{{ $schedule['description'] }}<br>{{ $schedule['startDateTime'] }}〜<br>{{ $schedule['endDateTime'] }}</li>
            @endforeach
        @endif
    </ul>

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
    {{ isset($chat_response) ? $chat_response : '' }}
</body>

</html>
