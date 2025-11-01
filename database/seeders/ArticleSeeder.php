<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\User;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Training',
                'slug' => 'training',
                'color' => 'red',
                'icon' => 'fa-graduation-cap',
                'description' => 'Training programs and educational content',
                'order' => 1,
            ],
            [
                'name' => 'Safety',
                'slug' => 'safety',
                'color' => 'orange',
                'icon' => 'fa-shield-halved',
                'description' => 'Health, Safety, and Environment protocols',
                'order' => 2,
            ],
            [
                'name' => 'Certification',
                'slug' => 'certification',
                'color' => 'green',
                'icon' => 'fa-certificate',
                'description' => 'Professional certifications and qualifications',
                'order' => 3,
            ],
            [
                'name' => 'Career',
                'slug' => 'career',
                'color' => 'purple',
                'icon' => 'fa-briefcase',
                'description' => 'Career development and opportunities',
                'order' => 4,
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'color' => 'blue',
                'icon' => 'fa-newspaper',
                'description' => 'Industry news and updates',
                'order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            ArticleCategory::create($category);
        }

        // Create Tags
        $tags = ['drilling', 'offshore', 'safety', 'technology', 'automation', 'certification', 'hse', 'career'];
        foreach ($tags as $tag) {
            ArticleTag::create([
                'name' => ucfirst($tag),
                'slug' => $tag,
            ]);
        }

        // Get first user as author
        $author = User::first();

        // Create Articles
        $articles = [
            [
                'category' => 'training',
                'title' => 'Advanced Drilling Techniques for Deepwater Exploration',
                'excerpt' => 'Explore the latest methodologies and technologies pushing the boundaries of deepwater drilling operations.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=800&q=80',
                'tags' => ['drilling', 'offshore', 'technology'],
                'views' => rand(100, 500),
            ],
            [
                'category' => 'safety',
                'title' => 'Enhancing On-Site Safety: A Comprehensive HSE Guide',
                'excerpt' => 'A detailed guide on essential health, safety, and environmental protocols that minimize risk on the rig.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80',
                'tags' => ['safety', 'hse'],
                'views' => rand(100, 500),
            ],
            [
                'category' => 'news',
                'title' => 'The Future of Oil & Gas: Automation and Digitalization',
                'excerpt' => 'How AI and automation are revolutionizing efficiency and safety across the oil and gas sector.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                'tags' => ['automation', 'technology'],
                'views' => rand(100, 500),
            ],
            [
                'category' => 'certification',
                'title' => 'Achieving IADC Certification: Your Career Roadmap',
                'excerpt' => 'Complete guidance on preparing for and obtaining your crucial IADC certification for career advancement.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80',
                'tags' => ['certification', 'career'],
                'views' => rand(100, 500),
            ],
            [
                'category' => 'training',
                'title' => 'Understanding Well Control Principles for Safer Operations',
                'excerpt' => 'A foundational review of the principles and practices required to prevent and manage well control incidents effectively.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=800&q=80',
                'tags' => ['drilling', 'safety'],
                'views' => rand(100, 500),
            ],
            [
                'category' => 'career',
                'title' => 'Career Pathways in the Modern Oil and Gas Industry',
                'excerpt' => 'From engineering to data analysts, discover the diverse and exciting career opportunities available in oil and gas today.',
                'content' => $this->generateArticleContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80',
                'tags' => ['career'],
                'views' => rand(100, 500),
            ],
        ];

        foreach ($articles as $articleData) {
            $category = ArticleCategory::where('slug', $articleData['category'])->first();
            $tags = $articleData['tags'];
            unset($articleData['category'], $articleData['tags']);

            $article = Article::create([
                'category_id' => $category->id,
                'author_id' => $author->id,
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'excerpt' => $articleData['excerpt'],
                'content' => $articleData['content'],
                'featured_image' => $articleData['featured_image'],
                'status' => 'published',
                'published_at' => now()->subDays(rand(1, 30)),
                'views_count' => $articleData['views'],
                'read_time' => rand(5, 15),
            ]);

            // Attach tags
            $tagIds = ArticleTag::whereIn('slug', $tags)->pluck('id');
            $article->tags()->attach($tagIds);
        }

        $this->command->info('Articles seeded successfully!');
    }

    private function generateArticleContent()
    {
        return '<p>The oil and gas industry has witnessed remarkable technological advancement in recent years. These innovations have transformed offshore drilling operations, making them safer, more efficient, and environmentally responsible.</p>

<p>Automated drilling systems reduce human error and increase precision through advanced robotics and AI-powered controls. These systems can handle repetitive tasks with remarkable consistency, allowing human operators to focus on critical decision-making and oversight.</p>

<h2>The Impact on Industry Standards</h2>

<p>Advanced sensor networks and data analytics platforms allow engineers to detect anomalies before they become critical. Real-time monitoring provides unprecedented visibility into drilling operations, enabling proactive maintenance and risk mitigation.</p>

<p>Modern blowout preventers (BOPs) feature redundant control systems and fail-safe mechanisms. These advanced safety systems protect both personnel and the environment, representing the industry\'s commitment to responsible operations.</p>

<h2>Training for Tomorrow\'s Challenges</h2>

<p>As the industry continues to evolve, staying current with these technologies and best practices is essential for professionals at all levels of the drilling operation. Comprehensive training programs must address both technical competencies and safety awareness.</p>

<p>Our curriculum is continuously updated to reflect the latest industry developments, ensuring that our graduates possess the knowledge and skills demanded by today\'s offshore operators.</p>';
    }
}