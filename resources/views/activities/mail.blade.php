<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <p>Dear {{ $data['recipient'] }},</p>
    <p>An activity has been assigned to you on the Business Tracker application.</p>
    <p>Kindly click on the link below to view the activity.</p>
    <p><a href="{{ route('activities.show', $data['activity']) }}">Business Tracker Activity</a></p>
    <p>Best regards,<br>Office of the Chief Executive</p>
</body>
</html>