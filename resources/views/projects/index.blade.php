@extends('layouts.app')

@section('title', 'Our Projects | Indonesia Drilling School')

@section('content')
<div class="page-projects">
    <!-- ================= HERO SECTION ================= -->
    <section class="relative min-h-[60vh] bg-gray-900 text-white overflow-hidden">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-red-900/30 z-[1]"></div>

        <!-- Background -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/imgHero.jpg') }}" 
                alt="Projects Background" 
                class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex flex-col justify-center items-center text-center min-h-[60vh] py-20">
                <div class="space-y-6 max-w-4xl">
                    <!-- Badge -->
                    <div class="home-animate-fadeInUp">
                        <span class="inline-block bg-red-600/20 border border-red-500/50 text-red-400 px-5 py-2.5 rounded-full text-sm font-semibold backdrop-blur-sm shadow-lg">
                            Our Success Stories
                        </span>
                    </div>

                    <!-- Heading -->
                    <h1 class="home-animate-fadeInUp delay-100 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight tracking-tight">
                        <span class="block bg-gradient-to-r from-white via-blue-100 to-red-100 bg-clip-text text-transparent drop-shadow-lg">
                            Our Projects
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="home-animate-fadeInUp delay-200 text-gray-300 text-lg sm:text-xl md:text-2xl leading-relaxed font-light">
                        Delivering Excellence in Oil & Gas Training and Operations
                    </p>
                </div>
            </div>
        </div>

        <!-- Decorative Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-16 sm:h-20 md:h-24" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z" fill="#F9FAFB"/>
            </svg>
        </div>
    </section>

    <!-- ================= FEATURED PROJECTS ================= -->
    @if($featuredProjects->count() > 0)
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <span class="text-red-600 font-semibold text-sm uppercase tracking-wider">Featured Works</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6 home-animate-fadeInUp">
                    Highlighted Projects
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Showcasing our most impactful training programs and field operations</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                <div class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="relative h-64 overflow-hidden">
                        @if($project->featured_image)
                        <img src="{{ asset('storage/' . $project->featured_image) }}" 
                            alt="{{ $project->title }}" 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                        <img src="{{ asset('images/default-project.jpg') }}" 
                            alt="{{ $project->title }}" 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        


                        <!-- Status Badge -->
                        <div class="absolute bottom-4 right-4">
                            <span class="{{ $project->status_badge_color }} px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-sm">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">
                            {{ $project->title }}
                        </h3>
                        
                        @if($project->location)
                        <div class="flex items-center gap-2 text-gray-500 mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-sm">{{ $project->location }}</span>
                        </div>
                        @endif

                        <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3">
                            {{ $project->description }}
                        </p>

                        <a href="{{ route('projects.show', $project->slug) }}" 
                            class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all group">
                            View Details
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ================= FILTER SECTION ================= -->
    <section class="py-12 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('projects.index') }}" class="flex flex-wrap gap-4 items-center justify-center">

                <!-- Status Filter -->
                <div class="flex items-center gap-3">
                    <label class="text-gray-700 font-medium text-sm">Status:</label>
                    <select name="status" onchange="this.form.submit()" 
                        class="px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
            </form>
        </div>
    </section>

    <!-- ================= ALL PROJECTS SECTION ================= -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-100 rounded-full filter blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    All Projects
                </h2>
                <p class="text-gray-600 text-lg">Browse through our complete portfolio of successful projects</p>
            </div>

            @if($projects->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($projects as $project)
                <div class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="relative h-56 overflow-hidden">
                        @if($project->featured_image)
                        <img src="{{ asset('storage/' . $project->featured_image) }}" 
                            alt="{{ $project->title }}" 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                        <img src="{{ asset('images/default-project.jpg') }}" 
                            alt="{{ $project->title }}" 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        

                        <!-- Status Badge -->
                        <div class="absolute bottom-4 right-4">
                            <span class="{{ $project->status_badge_color }} px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-sm">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors line-clamp-2">
                            {{ $project->title }}
                        </h3>
                        
                        @if($project->location)
                        <div class="flex items-center gap-2 text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-sm">{{ $project->location }}</span>
                        </div>
                        @endif

                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-2 text-sm">
                            {{ $project->description }}
                        </p>

                        <a href="{{ route('projects.show', $project->slug) }}" 
                            class="inline-flex items-center gap-2 text-red-600 font-semibold text-sm hover:gap-3 transition-all group">
                            View Details
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $projects->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg">No projects found matching your criteria.</p>
                <p class="text-gray-400 text-sm mt-2">Try adjusting your filters or check back later.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- ================= CTA SECTION ================= -->
    <section class="py-20 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full filter blur-3xl"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Start Your Project?
            </h2>
            <p class="text-xl text-red-100 mb-8 leading-relaxed">
                Let's discuss how we can help you achieve excellence in training and operations
            </p>
            <a href="/contact" 
                class="inline-flex items-center gap-2 bg-white text-red-600 font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                Contact Us Today
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>
</div>
@endsection