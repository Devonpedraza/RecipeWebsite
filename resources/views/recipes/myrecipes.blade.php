@php
use Illuminate\Support\Str;
@endphp
<x-layout>
    <div class="container d-flex flex-column align-items-center">
        <h2 class="my-5" style="font-size: 4rem; font-family: 'Kaushan Script', cursive;">
            My Recipes
        </h2>
        <p class="lead">Start adding your favorite recipes here!</p>
    </div>
    <section class="container my-5 p-4 rounded shadow bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="font-family: 'Kaushan Script', cursive; color: #e92020;">My Recipes</h2>
            <a href="{{ url('/myrecipes/create') }}" class="btn btn-primary px-4 py-2" style="background-color: #e92020; border: none; border-radius: 8px; font-size: 1.1rem;">
                Create Recipe <i class="bi bi-plus-circle ms-2"></i>
            </a>
        </div>
        @if($myRecipes->isEmpty())
        <div class="text-center my-5">
            <img src="{{ asset('images/no-recipes.png') }}" alt="" class="img-fluid" style="max-width: 300px;">
            <h3 class="mb-3 mt-4" style="font-family: 'Kaushan Script', cursive;">You haven't created any recipes yet!</h3>
            <p>Start by creating your first recipe now.</p>
        </div>
        @else
        <div class="row g-4">
            @foreach ($myRecipes as $recipe)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <a href="{{ route('recipes.instructions', ['id' => $recipe->id]) }}" class="text-decoration-none text-dark flex-fill">
                    <div class="card small-card shadow-sm h-100 w-100 position-relative">
                        <span class="badge rounded-pill position-absolute top-0 end-0 m-2 px-3 py-2 fs-6
                                    {{ $recipe->Difficulty === 'Easy' ? 'bg-success' : ($recipe->Difficulty === 'Medium' ? 'bg-warning text-dark' : 'bg-danger') }}">
                            {{ $recipe->Difficulty }}
                        </span>
                        @php
                        $imagePath = Str::startsWith($recipe->Image, 'images/')
                        ? asset('storage/' . $recipe->Image)
                        : asset('images/' . $recipe->Image);
                        @endphp
                        <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $recipe->Title }}" style="width: 100%; height: 220px; object-fit: cover;" />
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Kaushan Script', cursive;">{{ $recipe->Title }}</h5>
                            <p class="card-text">{{ $recipe->Description }}</p>
                            <p class="mb-0 text-muted" style="font-size: 0.95rem">
                                Prep: {{ $recipe->Prep_Time }} | Cook: {{ $recipe->Cook_Time }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Favorited Recipes --}}
        <h2 class="fw-bold mt-5" style="font-family: 'Kaushan Script', cursive; color: #e92020;">Favorited Recipes</h2>
        @if($favoriteRecipes->isEmpty())
        <div class="text-center my-5">
            <p>You haven't favorited any recipes yet.</p>
        </div>
        @else
        <div class="row g-4">
            @foreach ($favoriteRecipes as $recipe)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <a href="{{ route('recipes.instructions', ['id' => $recipe->id]) }}" class="text-decoration-none text-dark flex-fill">
                    <div class="card small-card shadow-sm h-100 w-100 position-relative">
                        <span class="badge rounded-pill position-absolute top-0 end-0 m-2 px-3 py-2 fs-6
                                        {{ $recipe->Difficulty === 'Easy' ? 'bg-success' : ($recipe->Difficulty === 'Medium' ? 'bg-warning text-dark' : 'bg-danger') }}">
                            {{ $recipe->Difficulty }}
                        </span>
                        <form method="POST" action="{{ route('recipes.unfavorite', $recipe->id) }}" style="position: absolute; top: 10px; left: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm d-flex align-items-center unfavorite-btn" title="Unfavorite" style="font-size: 0.85rem; line-height: 1;">
                                <i class="bi bi-heart-fill"></i>
                                <span class="unfavorite-text ms-1" style="font-size: 0.85rem; padding-right: 3px;">Unfavorite</span>
                            </button>
                        </form>
                        @php
                        $imagePath = Str::startsWith($recipe->Image, 'images/')
                        ? asset('storage/' . $recipe->Image)
                        : asset('images/' . $recipe->Image);
                        @endphp
                        <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $recipe->Title }}" style="width: 100%; height: 220px; object-fit: cover;" />
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Kaushan Script', cursive;">{{ $recipe->Title }}</h5>
                            <p class="card-text">{{ $recipe->Description }}</p>
                            <p class="mb-0 text-muted" style="font-size: 0.95rem">
                                Prep: {{ $recipe->Prep_Time }} | Cook: {{ $recipe->Cook_Time }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </section>
</x-layout>

<style>
    .unfavorite-btn .unfavorite-text {
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-width 0.3s, opacity 0.3s;
        white-space: nowrap;
        display: inline-block;
    }

    .unfavorite-btn:hover .unfavorite-text,
    .unfavorite-btn:focus .unfavorite-text {
        max-width: 120px;
        opacity: 1;
    }

</style>
