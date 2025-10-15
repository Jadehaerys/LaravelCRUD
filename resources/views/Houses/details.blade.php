<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thumb { width:120px; height:160px; object-fit:cover; border-radius:8px; }
        .big-btn { padding:12px 0; font-weight:600; }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">House Details</h1>

        <div class="card p-4">
            <h4 class="mb-3">Address: {{ $house->address }}</h4>
            <p class="mb-2">Price: ${{ number_format($house->price, 2) }}</p>
            <p class="mb-3">Bedrooms: {{ $house->bedrooms }}</p>

            <div class="d-flex gap-3 mb-3">
                @for($i=1; $i<=($house->bedrooms ?? 0); $i++)
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" class="thumb" alt="Bedroom {{ $i }}">
                        <div class="mt-2">Bedroom {{ $i }}</div>
                    </div>
                @endfor
            </div>

            <p class="mb-3">Bathrooms: {{ $house->bathrooms }}</p>
            <div class="d-flex gap-3 mb-4">
                @for($i=1; $i<=($house->bathrooms ?? 0); $i++)
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" class="thumb" alt="Bathroom {{ $i }}">
                        <div class="mt-2">Bathroom {{ $i }}</div>
                    </div>
                @endfor
            </div>

            <div class="mt-4">
                <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning w-100 big-btn">Edit House</a>
                <a href="{{ route('houses.index') }}" class="btn btn-primary w-100 big-btn">Back to Listings</a>
            </div>
        </div>
    </div>
</body>
</html>
                    