<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Sync Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; padding: 40px; }
        pre { background: #fff; border-radius: 6px; padding: 15px; max-height: 400px; overflow: auto; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4 text-center">HikCentral Attendance Dashboard</h2>

    <div class="card shadow-sm p-4">
        <p><strong>Server Time:</strong> {{ now() }}</p>
        <button id="fetchBtn" class="btn btn-primary mb-3">Fetch Today's Attendance</button>
        <div id="status" class="text-muted">Click the button to load attendance data.</div>
        <pre id="output" class="mt-3"></pre>
    </div>
</div>

<script>
document.getElementById('fetchBtn').addEventListener('click', async () => {
    const btn = document.getElementById('fetchBtn');
    const status = document.getElementById('status');
    const output = document.getElementById('output');

    btn.disabled = true;
    status.textContent = '⏳ Fetching attendance data...';
    output.textContent = '';

    try {
        const res = await fetch('{{ route('attendance.fetch') }}');
        const data = await res.json();

        status.textContent = '✅ Data fetched successfully!';
        output.textContent = JSON.stringify(data, null, 2);
    } catch (err) {
        status.textContent = '❌ Failed to fetch data: ' + err.message;
    } finally {
        btn.disabled = false;
    }
});
</script>

</body>
</html>
