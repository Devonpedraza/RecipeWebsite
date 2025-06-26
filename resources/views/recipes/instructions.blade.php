@php use Illuminate\Support\Str; @endphp
<x-layout>

    <main class="container my-5">
        <div class="instruction-grid bg-white rounded shadow p-4">
            <!-- Top Left: Dish Name & Description -->
            <div class="dish-info mb-4">
                <h1 class="mb-2" style="color: #e92020; font-family: 'Kaushan Script', cursive; font-size: 3.4rem;">
                    {{ $recipe['Title'] }}
                </h1>
                <p style="font-size: 1.5rem; color: #333">
                    {{ $recipe['Description'] }}
                </p>
                <a href="{{ route('recipes.pdf', $recipe->id) }}" class="btn btn-outline-danger mb-3" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                </a>
            </div>

            <!-- Top Right: Dish Image -->
            <div class="dish-image d-flex align-items-center justify-content-center mb-4">
                @if(isset($recipe->Image))
                <div class="mt-4">
                    @if(Str::startsWith($recipe->Image, 'images/'))
                    <img src="{{ asset('storage/' . $recipe->Image) }}" alt="{{ $recipe->Title }}" class="img-fluid rounded" style="max-width: 500px; width: 100%; height: 375px; object-fit: cover;" />
                    @else
                    <img src="{{ asset('images/' . $recipe->Image) }}" alt="{{ $recipe->Title }}" class="img-fluid rounded" style="max-width: 500px; width: 100%; height: 375px; object-fit: cover;" />
                    @endif
                </div>
                @endif
            </div>
            <!-- Bottom Left: Ingredients -->
            <div class="ingredients p-4 rounded shadow-sm bg-light mb-3">
                <h2 class="mb-3" style="color: #e92020; font-size: 2.4rem; font-family: 'Kaushan Script', cursive;">
                    Ingredients
                </h2>
                <ul class="mb-0" style="font-size: 1.05rem; padding-left: 1.2em;">
                    @foreach (explode(',', $recipe['Ingredients']) as $ingredient)
                    <li style="margin-bottom: 0.3em;">{{ trim($ingredient) }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- Divider for desktop -->
            <div class="d-none d-md-block" style="grid-column: 1 / span 2; height: 1px; background: #eee; margin: 2rem 0;"></div>
            <!-- Bottom Right: Instructions -->
            <div class="instructions p-4 rounded shadow-sm bg-light mb-3">
                <h2 class="mb-3" style="color: #e92020; font-size: 2.4rem; font-family: 'Kaushan Script', cursive;">
                    Instructions
                </h2>
                <ol style="font-size: 1.05rem; padding-left: 1.2em;">
                    @foreach (preg_split('/\d+\.\s*/', $recipe['Instructions'], -1, PREG_SPLIT_NO_EMPTY) as $step)
                    <li style="margin-bottom: 0.5em;">{{ trim($step) }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </main>

    <style>
        .instruction-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 2rem 2.5rem;
            grid-template-areas:
                "dish-info dish-image"
                "ingredients instructions";
        }

        .dish-info {
            grid-area: dish-info;
        }

        .dish-image {
            grid-area: dish-image;
        }

        .ingredients {
            grid-area: ingredients;
        }

        .instructions {
            grid-area: instructions;
        }

        @media (max-width: 900px) {
            .instruction-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto auto auto;
                grid-template-areas:
                    "dish-info"
                    "dish-image"
                    "ingredients"
                    "instructions";
            }

            .dish-image {
                justify-content: flex-start !important;
            }
        }

        @media (max-width: 600px) {
            .instruction-grid {
                gap: 1.2rem 0.5rem;
                padding: 1rem !important;
            }

            .dish-info h1 {
                font-size: 1.2rem !important;
            }

            .ingredients h2,
            .instructions h2 {
                font-size: 1.1rem !important;
            }
        }

    </style>

</x-layout>
