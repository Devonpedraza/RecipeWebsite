@php
use Illuminate\Support\Str;
@endphp
<x-layout>
    <section class="container d-flex flex-column align-items-center">
        <h2 class="my-5" style="font-size: 4rem; font-family: 'Kaushan Script', cursive;">
            Latest Recipes
        </h2>
        <div class="recipe-cards d-flex flex-row justify-content-center flex-wrap">
            @foreach ($recipes as $recipe)
            <a href="{{ route('recipes.instructions', ['id' => $recipe->id]) }}">
                <div class="card small-card position-relative">
                    <span class="badge rounded-pill position-absolute top-0 end-0 m-2 px-3 py-2 fs-6 {{ $recipe['Difficulty'] === 'Easy' ? 'bg-success' : ($recipe['Difficulty'] === 'Medium' ? 'bg-warning text-dark' : 'bg-danger') }}">{{ $recipe->Difficulty }}</span>
                    @php
                    $imagePath = Str::startsWith($recipe->Image, 'images/')
                    ? asset('storage/' . $recipe->Image)
                    : asset('images/' . $recipe->Image);
                    @endphp
                    <img src="{{ $imagePath }}" alt="{{ $recipe->Title }}" style="width: 100%" />
                    <h3>{{ $recipe->Title }}</h3>
                    <p>
                        {{ $recipe->Description }}
                    </p>
                    <p class="mb-0 text-muted" style="font-size: 0.95rem">
                        Prep: {{ $recipe->Prep_Time }} | Cook: {{ $recipe->Cook_Time }}
                    </p>
                    @auth
                    <form method="POST" action="{{ route('recipes.favorite', $recipe->id) }}" style="position: absolute; top: 10px; left: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-s py-1 px-2 d-flex align-items-center favorite-btn" title="Favorite" style="line-height: 1;">
                            <i class="bi bi-heart" style="font-size: .8rem;"></i>
                            <span class="favorite-text ms-1" style="font-size: 0.85rem; padding-right: 3px;"> Favorite</span>
                        </button>
                    </form>
                    @endauth
                </div>
            </a>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $recipes->links('pagination::bootstrap-5') }}
        </div>
    </section>

    <style>
        .favorite-btn .favorite-text {
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-width 0.3s, opacity 0.3s;
            white-space: nowrap;
            display: inline-block;
        }

        .favorite-btn:hover .favorite-text,
        .favorite-btn:focus .favorite-text {
            max-width: 90px;
            opacity: 1;
        }

        .pagination {
            --bs-pagination-padding-x: 1rem;
            --bs-pagination-padding-y: 0.5rem;
            --bs-pagination-border-radius: 12px;
            --bs-pagination-bg: #fff;
            --bs-pagination-border-width: 0;
            --bs-pagination-color: #e92020;
        }

        .pagination .page-link {
            color: #e92020;
            border-radius: 12px !important;
            font-family: 'Kaushan Script', cursive;
            font-size: 1.1rem;
            margin: 0 0.15rem;
            background: #fff;
            border: none;
            box-shadow: 0 2px 8px rgba(233, 32, 32, 0.07);
            transition: background 0.2s, color 0.2s;
        }

        .pagination .page-link:hover,
        .pagination .page-link:focus {
            background-color: #ffeaea;
            color: #b81a1a;
        }

        .pagination .page-item.active .page-link {
            background-color: #e92020;
            border-color: #e92020;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(233, 32, 32, 0.15);
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
            background: #f8f9fa;
            border: none;
            cursor: not-allowed;
        }

    </style>
</x-layout>
