<!DOCTYPE html>
<html>
<head>
    <title>{{ $recipe->Title }}</title>
</head>
<body>
    <div class="container">
        <h1>{{ $recipe->Title }} <span class="badge" style="background: {{ $recipe->Difficulty === 'Easy' ? '#28a745' : ($recipe->Difficulty === 'Medium' ? '#ffc107' : '#e92020') }};">
                {{ $recipe->Difficulty }}
            </span></h1>
        <span style="color: black; font-size: 1rem;">&nbsp;Prep: {{ $recipe->Prep_Time }} &nbsp;|&nbsp; Cook: {{ $recipe->Cook_Time }}</span>
        @if(!empty($recipe->Image))
        <div class="img-wrap">
            @php
            // If the image is in storage/app/public/images
            $storagePath = storage_path('app/public/' . $recipe->Image);
            // If the image is in public/images
            $publicPath = public_path('images/' . $recipe->Image);
            @endphp

            @if(file_exists($storagePath))
            <img src="{{ $storagePath }}" alt="{{ $recipe->Title }}">
            @elseif(file_exists($publicPath))
            <img src="{{ $publicPath }}" alt="{{ $recipe->Title }}">
            @endif
        </div>
        @endif
        <div class="desc">{{ $recipe->Description }}</div>
        <h3>Ingredients</h3>
        <ul>
            @foreach (explode(',', $recipe->Ingredients) as $ingredient)
            <li>{{ trim($ingredient) }}</li>
            @endforeach
        </ul>
        <h3>Instructions</h3>
        <ol>
            @foreach (preg_split('/\d+\.\s*/', $recipe->Instructions, -1, PREG_SPLIT_NO_EMPTY) as $step)
            <li>{{ trim($step) }}</li>
            @endforeach
        </ol>
    </div>
</body>


<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        background: #fff;
        color: #222;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 650px;
        margin: 16px auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(233, 32, 32, 0.07);
        padding: 18px 18px 12px 18px;
    }

    h1 {
        color: #e92020;
        font-family: 'Kaushan Script', cursive;
        font-size: 1.7rem;
        margin-bottom: 0.3em;
    }

    h3 {
        color: #e92020;
        font-family: 'Kaushan Script', cursive, DejaVu Sans, sans-serif;
        margin-top: 1.2em;
        margin-bottom: 0.3em;
        font-size: 1.1rem;
    }

    .desc {
        font-size: 0.95rem;
        margin-bottom: 1em;
    }

    ul,
    ol {
        margin-left: 1em;
        margin-bottom: 1em;
        font-size: 0.95rem;
        page-break-inside: avoid;
    }

    li {
        font-size: 0.95rem;
        margin-bottom: 0.2em;
    }

    .meta {
        margin-bottom: 1em;
        font-size: 0.9rem;
        color: #888;
    }

    .badge {
        display: inline-block;
        padding: 0.2em 0.7em;
        border-radius: 999px;
        font-size: 0.95rem;
        font-weight: bold;
        color: #fff;

    }

    .img-wrap {
        text-align: center;
        margin-bottom: 1em;
    }

    .img-wrap img {
        max-width: 95%;
        max-height: 150px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(233, 32, 32, 0.10);
    }

</style>
</html>
