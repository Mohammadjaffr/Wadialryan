<!DOCTYPE html>
<html>
<head>
    <title>New Quote Request</title>
</head>
<body>
    <h2>New Quote Request Received</h2>
    <p><strong>Name:</strong> {{ $rfq->name }}</p>
    <p><strong>Company:</strong> {{ $rfq->company ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $rfq->email }}</p>
    <p><strong>Phone:</strong> {{ $rfq->phone }}</p>
    <p><strong>Location:</strong> {{ $rfq->location ?? 'N/A' }}</p>
    <p><strong>Requested Service:</strong> {{ $rfq->requested_service ?? 'N/A' }}</p>
    <p><strong>Project Location:</strong> {{ $rfq->project_location ?? 'N/A' }}</p>
    <p><strong>Estimated Timeline:</strong> {{ $rfq->estimated_timeline ?? 'N/A' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $rfq->message }}</p>
    @if($rfq->attachment)
        <p><em>An attachment has been securely saved and can be accessed from the admin panel.</em></p>
    @endif
</body>
</html>
