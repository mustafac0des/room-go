<html>
    <body>
        <p>Hello {{ $user->name }},</p>
        <p>We noticed that you haven't uploaded a profile picture yet. Please upload one to complete your profile.</p>
        <p><a href="{{ url('/profile/edit') }}">Click here</a> to upload your picture now.</p>
        <p>Best regards,</p>
        <p>Your Team</p>
    </body>
</html>
