<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses For Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Houses For Sale</h1>
        <div class="row">
            @foreach($houses as $house)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if(!empty($house->image))
                            <img src="{{ $house->image }}" class="card-img-top" alt="{{ $house->title }}">
                        @else
                            <img src="https://www.livehome3d.com/assets/img/articles/design-house/how-to-design-a-house.jpg" class="card-img-top" alt="{{ $house->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $house->title }}</h5>
                            <p class="card-text">Bedrooms: {{ $house->bedrooms }}</p>
                            <p class="card-text">Bathrooms: {{ $house->bathrooms ?? 'N/A' }}</p>
                            <p class="card-text">Price: ${{ $house->price }}</p>
                            <p class="card-text">Address: {{ $house->address }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('houses.details', $house->id) }}" class="btn btn-primary">View Details</a>
                            <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this house?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>