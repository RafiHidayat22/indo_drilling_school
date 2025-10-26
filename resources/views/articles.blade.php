@extends('layouts.app')

@section('title', 'Articles & Training Insights | Indonesia Drilling School')

@section('content')

<!-- Hero Section with Dynamic Background -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-20 pb-16">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900">
        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80"
            alt="Articles Background" class="w-full h-full object-cover mix-blend-overlay opacity-40">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-800/30 to-transparent"></div>

    <!-- Subtle red accent overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/10 via-transparent to-blue-900/10"></div>

    <!-- Animated particles background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particles-container"></div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block px-4 py-2 bg-red-500/15 backdrop-blur-sm border border-red-400/20 rounded-full mb-6 animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
            <span class="text-red-300 font-semibold text-sm tracking-wider uppercase">Knowledge Hub</span>
        </div>
        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold mb-6 text-white leading-tight px-4 animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
            Latest Articles & <br>
            <span class="bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent">Training Insights</span>
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed mb-8 px-4 animate-fade-in-up" data-aos="fade-up" data-aos-delay="300">
            Stay informed with the latest updates, safety knowledge, and oil & gas training trends
        </p>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12 px-4" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="50">0</div>
                <div class="text-sm text-gray-300">Articles</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="5">0</div>
                <div class="text-sm text-gray-300">Categories</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="1000">0</div>
                <div class="text-sm text-gray-300">Readers</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1">Weekly</div>
                <div class="text-sm text-gray-300">Updates</div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="py-12 bg-gradient-to-b from-gray-50 to-white px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-4 gap-6">
            <!-- Search Bar -->
            <div class="lg:col-span-3" data-aos="fade-right">
                <div class="relative">
                    <input type="text" id="searchArticles"
                        placeholder="Search articles, topics, keywords..."
                        class="w-full px-6 py-4 pl-14 bg-white border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-4 focus:ring-red-100 transition duration-300 text-lg shadow-lg">
                    <i class="fa-solid fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 bg-red-700 text-white px-6 py-2 rounded-xl hover:bg-red-800 hover:shadow-lg transition duration-300 font-semibold">
                        Search
                    </button>
                </div>
            </div>

            <!-- Quick Filter -->
            <div class="lg:col-span-1" data-aos="fade-left">
                <select id="categoryFilter" class="w-full px-6 py-4 bg-white border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-4 focus:ring-red-100 transition duration-300 text-lg shadow-lg appearance-none cursor-pointer">
                    <option value="all">All Categories</option>
                    <option value="training">Training</option>
                    <option value="safety">Safety</option>
                    <option value="certification">Certification</option>
                    <option value="career">Career</option>
                    <option value="news">News</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Main Content: Articles Grid with Sidebar -->
<section class="py-20 bg-white px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-12">

            <!-- Articles Grid (Main Content) -->
            <div class="lg:col-span-2">
                <div class="grid md:grid-cols-2 gap-8" id="articlesGrid">

                    <!-- Article Card 1 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-category="training">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=800&q=80"
                                alt="Advanced Drilling"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">Training</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 20, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    5 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                Advanced Drilling Techniques for Deepwater Exploration
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                Explore the latest methodologies and technologies pushing the boundaries of deepwater drilling operations.
                            </p>
                            <a href="/articlespv" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Article Card 2 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-aos-delay="100" data-category="safety">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80"
                                alt="HSE Safety"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">Safety</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 18, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    7 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                Enhancing On-Site Safety: A Comprehensive HSE Guide
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                A detailed guide on essential health, safety, and environmental protocols that minimize risk on the rig.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Article Card 3 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-aos-delay="200" data-category="news">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80"
                                alt="Oil Gas Automation"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">News</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 15, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    8 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                The Future of Oil & Gas: Automation and Digitalization
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                How AI and automation are revolutionizing efficiency and safety across the oil and gas sector.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Article Card 4 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-aos-delay="300" data-category="certification">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80"
                                alt="IADC Certification"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">Certification</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 12, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    6 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                Achieving IADC Certification: Your Career Roadmap
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                Complete guidance on preparing for and obtaining your crucial IADC certification for career advancement.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Article Card 5 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-aos-delay="400" data-category="training">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=800&q=80"
                                alt="Well Control"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">Training</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 10, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    9 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                Understanding Well Control Principles for Safer Operations
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                A foundational review of the principles and practices required to prevent and manage well control incidents effectively.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Article Card 6 -->
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100" data-aos="fade-up" data-aos-delay="500" data-category="career">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80"
                                alt="Career Pathways"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-purple-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">Career</span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    Oct 8, 2025
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    10 min read
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                Career Pathways in the Modern Oil and Gas Industry
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                From engineering to data analysts, discover the diverse and exciting career opportunities available in oil and gas today.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center gap-2 mt-12" data-aos="fade-up">
                    <button class="w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-red-600 transition duration-300">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="w-10 h-10 rounded-lg bg-red-600 text-white font-bold">1</button>
                    <button class="w-10 h-10 rounded-lg border-2 border-gray-300 hover:border-red-600 hover:text-red-600 transition duration-300">2</button>
                    <button class="w-10 h-10 rounded-lg border-2 border-gray-300 hover:border-red-600 hover:text-red-600 transition duration-300">3</button>
                    <span class="px-2 text-gray-500">...</span>
                    <button class="w-10 h-10 rounded-lg border-2 border-gray-300 hover:border-red-600 hover:text-red-600 transition duration-300">10</button>
                    <button class="w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-red-600 transition duration-300">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="sticky top-36 space-y-8">

                    <!-- Categories Widget -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 shadow-xl border border-gray-100" data-aos="fade-left">
                        <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-folder-open" style="color: #b91c1c;"></i>
                            Categories
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-red-50 transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 group-hover:text-red-600 font-medium">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        Training
                                    </span>
                                    <span class="text-sm bg-red-100 text-red-600 px-3 py-1 rounded-full font-bold">12</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-orange-50 transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 group-hover:text-orange-600 font-medium">
                                        <i class="fa-solid fa-shield-halved"></i>
                                        HSE
                                    </span>
                                    <span class="text-sm bg-orange-100 text-orange-600 px-3 py-1 rounded-full font-bold">8</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-green-50 transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 group-hover:text-green-600 font-medium">
                                        <i class="fa-solid fa-certificate"></i>
                                        Certification
                                    </span>
                                    <span class="text-sm bg-green-100 text-green-600 px-3 py-1 rounded-full font-bold">15</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-purple-50 transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 group-hover:text-purple-600 font-medium">
                                        <i class="fa-solid fa-briefcase"></i>
                                        Career
                                    </span>
                                    <span class="text-sm bg-purple-100 text-purple-600 px-3 py-1 rounded-full font-bold">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl hover:bg-blue-50 transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 group-hover:text-blue-600 font-medium">
                                        <i class="fa-solid fa-newspaper"></i>
                                        News
                                    </span>
                                    <span class="text-sm bg-blue-100 text-blue-600 px-3 py-1 rounded-full font-bold">5</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Recent Articles Widget -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-xl" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-fire text-orange-400"></i>
                            Recent Articles
                        </h3>
                        <div class="space-y-4">
                            <a href="#" class="flex gap-4 group">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=100&q=80"
                                    alt="Recent"
                                    class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition duration-300">
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold mb-1 line-clamp-2 group-hover:text-red-400 transition duration-300">
                                        Innovations in Horizontal Drilling Technology
                                    </h4>
                                    <p class="text-gray-400 text-sm">Oct 22, 2025</p>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=100&q=80"
                                    alt="Recent"
                                    class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition duration-300">
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold mb-1 line-clamp-2 group-hover:text-red-400 transition duration-300">
                                        Top 5 Safety Protocols for 2024
                                    </h4>
                                    <p class="text-gray-400 text-sm">Oct 21, 2025</p>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=100&q=80"
                                    alt="Recent"
                                    class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition duration-300">
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold mb-1 line-clamp-2 group-hover:text-red-400 transition duration-300">
                                        A Day in the Life of an Offshore Driller
                                    </h4>
                                    <p class="text-gray-400 text-sm">Oct 19, 2025</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-slate-900 via-red-900 to-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
        <div class="inline-block px-4 py-2 bg-red-600/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-6">
            <span class="text-red-400 font-semibold text-sm tracking-wider uppercase">Take Action</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Interested in learning more about<br>
            our training programs?
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
            Discover comprehensive courses designed by industry experts to advance your career in oil & gas
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 text-white font-bold rounded-xl hover:shadow-2xl hover:shadow-red-600/50 transition-all duration-300 transform hover:scale-105">
                Explore Programs
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/20 transition-all duration-300">
                <i class="fa-solid fa-phone"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection