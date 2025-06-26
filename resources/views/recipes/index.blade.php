<!DOCTYPE html>
@php use Illuminate\Support\Str; @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layout>
    <!-- HERO -->
    <section id="hero">
        <h1>Welcome to <span>Easy Meals</span></h1>
        <p>Your go-to place for quick and delicious recipes!</p>
        <a href="/recipes" class="btn btn">Browse Recipes</a>
    </section>

    <div class="featured-recipes">
        <h2>Featured <span class="text-5xl">Meals</span></h2>
        <p>Check out our top picks for this week!</p>

        <div class="recipe-cards d-flex flex-row justify-content-center">
            @foreach ($recipes as $recipe)
            <a href="{{ route('recipes.instructions', ['id' => $recipe->id]) }}">
                <div id="large-card" class="card position-relative">
                    <span class="badge rounded-pill position-absolute top-0 end-0 m-2 px-3 py-2 fs-6 {{ $recipe['Difficulty'] === 'Easy' ? 'bg-success' : ($recipe['Difficulty'] === 'Medium' ? 'bg-warning text-dark' :'bg-danger') }}">{{ $recipe->Difficulty }}</span>
                    @php
                    $imagePath = Str::startsWith($recipe->Image, 'images/')
                    ? asset('storage/' . $recipe->Image)
                    : asset('images/' . $recipe->Image);
                    @endphp
                    <img src="{{ $imagePath }}" alt="{{ $recipe->Title }}" class="card-img-top{{ $recipe->Image === 'pexels-valeriya-580612.jpg' ? ' burger-img' : '' }}" style="width: 100%; height: 220px; object-fit: cover;" />
                    <h3>{{ $recipe->Title }}</h3>
                    <p>{{ $recipe->Description }}</p>
                    <p class="mb-0 text-muted" style="font-size: 0.95rem">
                        Prep: {{ $recipe->Prep_Time }} | Cook: {{ $recipe->Cook_Time }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        </section>

        <!-- reviews -->
        <section class="reviews d-flex flex-column align-items-center py-4">
            <h2>What Our Users Say</h2>
            <p>Real feedback from real users!</p>

            <div id="carouselExampleIndicators" class="carousel slide py-3" data-bs-ride="carousel" data-bs-interval="3700">
                <div class="carousel-indicators mb-0">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "Easy Meals has made dinner time so much simpler! The recipes
                                are quick and delicious."
                            </p>
                            <small class="text-muted d-block text-center">- Jamie L.</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "I love the variety and how easy it is to follow the
                                instructions. Highly recommend!"
                            </p>
                            <small class="text-muted d-block text-center">- Alex P.</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "The featured recipes are always a hit with my family. Thank
                                you, Easy Meals!"
                            </p>
                            <small class="text-muted d-block text-center">- Morgan S.</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "As a college student, I appreciate the quick and affordable
                                meal ideas."
                            </p>
                            <small class="text-muted d-block text-center">- Priya R.</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "The step-by-step instructions make cooking so much less
                                intimidating!"
                            </p>
                            <small class="text-muted d-block text-center">- Chris T.</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="review-card card shadow-sm border-0 mx-auto my-4 p-4" style="max-width: 500px">
                            <p class="fs-4 text-center mb-2">
                                "I tried the vegan recipes and they were a hit at my dinner
                                party!"
                            </p>
                            <small class="text-muted d-block text-center">- Taylor M.</small>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</x-layout>
