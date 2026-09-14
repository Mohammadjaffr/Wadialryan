<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message Received</h2>
    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Phone:</strong> {{ $contactMessage->phone ?? 'N/A' }}</p>
    <p><strong>Subject:</strong> {{ $contactMessage->subject ?? 'N/A' }}</p>
    <p><strong>Company:</strong> {{ $contactMessage->company ?? 'N/A' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contactMessage->message }}</p>
</body>
</html>
