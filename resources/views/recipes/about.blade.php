<x-layout>
    <section class="container my-5">
        <div class="row justify-content-center align-items-stretch">
            <!-- About Us Section -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="p-4 rounded shadow h-100" style="background: #fff6ee;">
                    <h2 class="mb-3" style="color: #e92020; font-family: 'Kaushan Script', cursive; font-size: 2.5rem;">
                        About Us
                    </h2>
                    <p style="font-size: 1.2rem; color: #333">
                        Welcome to Easy Meals! Our mission is to make home cooking simple, fun,
                        and accessible for everyone. Whether you're a beginner or a seasoned
                        chef, you'll find recipes that fit your lifestyle and taste.
                    </p>
                    <div class="row mt-4">
                        <div class="col-12 mb-4">
                            <h3 style="color: #e92020; font-size: 1.5rem">Our Story</h3>
                            <p style="font-size: 1.05rem">
                                Founded in 2025, Easy Meals was created by a group of food lovers
                                who wanted to share their favorite recipes and inspire others to
                                cook at home. We believe that great meals bring people together and
                                that anyone can cook delicious food with the right guidance.
                            </p>
                        </div>
                        <div class="col-12">
                            <h3 style="color: #e92020; font-size: 1.5rem">What We Offer</h3>
                            <ul style="font-size: 1.05rem; padding-left: 1.2rem">
                                <li>Step-by-step recipes for all skill levels</li>
                                <li>Quick and easy meal ideas</li>
                                <li>Healthy and budget-friendly options</li>
                                <li>Personal recipe collections</li>
                                <li>Community reviews and tips</li>
                            </ul>
                        </div>
                        <div class="col-12 mt-4">
                            <h3 style="color: #e92020; font-size: 1.5rem">Our Values</h3>
                            <ul style="font-size: 1.05rem; padding-left: 1.2rem">
                                <li>Inclusivity: Recipes for all diets and backgrounds</li>
                                <li>Quality: Only the best-tested recipes</li>
                                <li>Community: Sharing and learning together</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Section -->
            <div class="col-md-6">
                <div class="p-4 rounded shadow" style="background: #fff9f4;">
                    <h2 class="mb-3" style="color: #e92020; font-family: 'Kaushan Script', cursive; font-size: 2rem;">
                        Contact Us
                    </h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@freemeals.com" />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Leave a message...."></textarea>
                        </div>
                        <button type="submit" class="btn" style="background-color: #e92020; color: #fff; border-radius: 8px">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
