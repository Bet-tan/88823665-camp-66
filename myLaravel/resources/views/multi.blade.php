<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Multiplication Table</h1>

        <!-- Form input number -->
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="number" class="form-label">Enter a number (1-12):</label>
                <input type="number" id="number" name="number" class="form-control" value="{{ old('number') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Table</button>
        </form>

        <!-- Display but Refined again -->
        @isset($multiplicationTable)
            @if($number)
                <h2 class="mt-5">Multiplication Table of {{ $number }}</h2>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Multiplier</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($multiplicationTable as $key => $result)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $result }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endisset
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>