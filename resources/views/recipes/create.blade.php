<x-layout>
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 rounded shadow bg-white">
                    <h2 class="mb-4" style="color: #e92020; font-family: 'Kaushan Script', cursive;">
                        Create a New Recipe
                    </h2>
                    <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Recipe Title" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Difficulty</label>
                                <select class="form-select" name="difficulty" required>
                                    <option value="">Select</option>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Prep Time</label>
                                <input type="text" class="form-control" name="prep_time" placeholder="e.g. 20 mins" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Cook Time</label>
                                <input type="text" class="form-control" name="cook_time" placeholder="e.g. 30 mins" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Description</label>
                                <textarea class="form-control" name="description" rows="2" placeholder="Short description" required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Ingredients <span class="fw-normal text-muted">(comma separated)</span></label>
                                <input type="text" class="form-control" name="ingredients" placeholder="e.g. Flour, Eggs, Milk, Sugar" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Instructions <span class="fw-normal text-muted">(numbered steps)</span></label>
                                <textarea class="form-control" name="instructions" rows="4" placeholder="1. Do this. 2. Do that." required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Recipe Photo</label>
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                                <div class="form-text">Upload a jpg/png photo to display on your recipe card.</div>
                            </div>
                        </div>
                        <button type="submit" class="btn mt-4 px-4 py-2" style="background-color: #e92020; color: #fff; border-radius: 8px;">
                            Create Recipe
                        </button>
                    </form>
                    @if(isset($recipe->Image))
                    <div class="mt-4">
                        <h4 class="fw-bold">Uploaded Recipe Photo:</h4>
                        @if(Str::startsWith($recipe->Image, 'images/'))
                        <img src="{{ asset('storage/' . $recipe->Image) }}" alt="{{ $recipe->Title }}" class="img-fluid rounded">
                        @else
                        <img src="{{ asset('images/' . $recipe->Image) }}" alt="{{ $recipe->Title }}" class="img-fluid rounded">
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-layout>
