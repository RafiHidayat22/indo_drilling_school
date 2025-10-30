<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProgramController extends Controller
{
    // Data program untuk setiap kategori
    private $programData = [
        'drilling' => [
            'title' => 'Drilling Program',
            'description' => 'Comprehensive drilling training programs for professional development',
            'slug' => 'drilling',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 5L20 35M15 10L20 5L25 10M8 15H32M8 25H32" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'courses' => [
                [
                    'title' => 'Basic Drilling Operations',
                    'slug' => 'basic-drilling',
                    'description' => 'Learn fundamental drilling techniques and equipment operation. Perfect for beginners entering the drilling industry.',
                    'level' => 'Beginner',
                    'duration' => '4 Weeks',
                    'certification' => 'Certificate',
                    'price' => 'Rp 5,000,000',
                    'popular' => true,
                    'company' => 'AOSH', // <-- Tambahkan company
                    'features' => [
                        'Introduction to drilling equipment',
                        'Safety protocols and procedures',
                        'Drilling fluid basics',
                        'Hands-on rig operations',
                        'Industry best practices'
                    ]
                ],
                [
                    'title' => 'Advanced Drilling Techniques',
                    'slug' => 'advanced-drilling',
                    'description' => 'Master complex drilling operations including directional drilling and well control.',
                    'level' => 'Advanced',
                    'duration' => '6 Weeks',
                    'certification' => 'Advanced Certificate',
                    'price' => 'Rp 8,500,000',
                    'company' => 'PT Global Drilling', // <-- Tambahkan company
                    'features' => [
                        'Directional drilling methods',
                        'Well control procedures',
                        'Advanced mud engineering',
                        'Drilling optimization',
                        'Problem solving techniques'
                    ]
                ],
                [
                    'title' => 'Drilling Supervisor Training',
                    'slug' => 'drilling-supervisor',
                    'description' => 'Leadership and management skills for drilling supervisors and team leaders.',
                    'level' => 'Professional',
                    'duration' => '8 Weeks',
                    'certification' => 'Professional Certificate',
                    'price' => 'Rp 12,000,000',
                    'company' => 'AOSH', // <-- Tambahkan company
                    'features' => [
                        'Team management and leadership',
                        'Operation planning and execution',
                        'Risk assessment and mitigation',
                        'Budget and resource management',
                        'Regulatory compliance'
                    ]
                ]
            ]
        ],
        'safety' => [
            'title' => 'Safety Program',
            'description' => 'Essential safety training for oil and gas operations',
            'slug' => 'safety',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 5L8 11V18C8 25.5 13 32 20 35C27 32 32 25.5 32 18V11L20 5Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 20L18.5 22.5L24 17" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'courses' => [
                [
                    'title' => 'Basic Safety Induction',
                    'slug' => 'basic-safety',
                    'description' => 'Fundamental safety training for all personnel working in drilling operations.',
                    'level' => 'Beginner',
                    'duration' => '2 Weeks',
                    'certification' => 'Safety Certificate',
                    'price' => 'Rp 3,000,000',
                    'popular' => true,
                    'company' => 'AOSH',
                    'features' => [
                        'HSE fundamentals',
                        'Personal protective equipment',
                        'Emergency response procedures',
                        'Hazard identification',
                        'Incident reporting'
                    ]
                ],
                [
                    'title' => 'Fire Fighting & Emergency Response',
                    'slug' => 'fire-fighting',
                    'description' => 'Comprehensive training in fire prevention and emergency response procedures.',
                    'level' => 'Intermediate',
                    'duration' => '3 Weeks',
                    'certification' => 'Fire Safety Certificate',
                    'price' => 'Rp 4,500,000',
                    'company' => 'PT Safety Pro',
                    'features' => [
                        'Fire prevention strategies',
                        'Fire fighting equipment',
                        'Emergency evacuation',
                        'First aid basics',
                        'Crisis management'
                    ]
                ],
                [
                    'title' => 'Safety Officer Certification',
                    'slug' => 'safety-officer',
                    'description' => 'Professional certification for safety officers and HSE managers.',
                    'level' => 'Professional',
                    'duration' => '6 Weeks',
                    'certification' => 'Professional Safety Officer',
                    'price' => 'Rp 9,000,000',
                    'company' => 'AOSH',
                    'features' => [
                        'Safety management systems',
                        'Risk assessment methodologies',
                        'Audit and inspection techniques',
                        'Safety culture development',
                        'Regulatory compliance'
                    ]
                ]
            ]
        ],
        'ids-drilling' => [
            'title' => 'IDS Drilling Program',
            'description' => 'Specialized drilling programs with Indonesia Drilling School methodology',
            'slug' => 'ids-drilling',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 35C28.2843 35 35 28.2843 35 20C35 11.7157 28.2843 5 20 5C11.7157 5 5 11.7157 5 20C5 28.2843 11.7157 35 20 35Z" stroke="currentColor" stroke-width="2.5"/><path d="M20 13V20L25 25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'courses' => [
                [
                    'title' => 'IDS Drilling Fundamentals',
                    'slug' => 'ids-fundamentals',
                    'description' => 'Comprehensive introduction to IDS drilling methodology and techniques.',
                    'level' => 'Intermediate',
                    'duration' => '5 Weeks',
                    'certification' => 'IDS Certificate',
                    'price' => 'Rp 7,000,000',
                    'popular' => true,
                    'company' => 'Indonesia Drilling School', // <-- Perusahaan resmi
                    'features' => [
                        'IDS drilling principles',
                        'Equipment specifications',
                        'Operational procedures',
                        'Quality control',
                        'Performance optimization'
                    ]
                ],
                [
                    'title' => 'IDS Well Planning',
                    'slug' => 'ids-well-planning',
                    'description' => 'Advanced well planning and design using IDS standards and practices.',
                    'level' => 'Advanced',
                    'duration' => '4 Weeks',
                    'certification' => 'IDS Planning Certificate',
                    'price' => 'Rp 8,000,000',
                    'company' => 'Indonesia Drilling School',
                    'features' => [
                        'Well design fundamentals',
                        'Trajectory planning',
                        'Formation evaluation',
                        'Cost estimation',
                        'Risk management'
                    ]
                ]
            ]
        ],
        // Lanjutkan untuk program lainnya...
        'ids-safety' => [
            'title' => 'IDS Safety Program',
            'description' => 'Comprehensive safety training for IDS drilling operations',
            'slug' => 'ids-safety',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 5L8 11V18C8 25.5 13 32 20 35C27 32 32 25.5 32 18V11L20 5Z" stroke="currentColor" stroke-width="2.5"/><circle cx="20" cy="20" r="5" stroke="currentColor" stroke-width="2.5"/></svg>',
            'courses' => [
                [
                    'title' => 'IDS Safety Management',
                    'slug' => 'ids-safety-management',
                    'description' => 'Safety management specific to IDS drilling operations and environments.',
                    'level' => 'Intermediate',
                    'duration' => '4 Weeks',
                    'certification' => 'IDS Safety Certificate',
                    'price' => 'Rp 6,000,000',
                    'company' => 'Indonesia Drilling School',
                    'features' => [
                        'IDS safety protocols',
                        'Equipment safety',
                        'Environmental protection',
                        'Emergency procedures',
                        'Safety auditing'
                    ]
                ],
                [
                    'title' => 'IDS HSE Leadership',
                    'slug' => 'ids-hse-leadership',
                    'description' => 'Leadership training for HSE managers in IDS operations.',
                    'level' => 'Professional',
                    'duration' => '5 Weeks',
                    'certification' => 'IDS HSE Leader Certificate',
                    'price' => 'Rp 9,500,000',
                    'popular' => true,
                    'company' => 'Indonesia Drilling School',
                    'features' => [
                        'HSE strategy development',
                        'Leadership in safety',
                        'Performance metrics',
                        'Continuous improvement',
                        'Stakeholder engagement'
                    ]
                ]
            ]
        ],
        'international' => [
            'title' => 'International Training Program',
            'description' => 'Global standard training programs for international projects',
            'slug' => 'international',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="15" stroke="currentColor" stroke-width="2.5"/><path d="M5 20H35M20 5C23 10 23 30 20 35M20 5C17 10 17 30 20 35" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>',
            'courses' => [
                [
                    'title' => 'International Drilling Standards',
                    'slug' => 'international-standards',
                    'description' => 'Training on international drilling standards and best practices.',
                    'level' => 'Advanced',
                    'duration' => '6 Weeks',
                    'certification' => 'International Certificate',
                    'price' => 'Rp 10,000,000',
                    'popular' => true,
                    'company' => 'Global Drilling Academy',
                    'features' => [
                        'API standards',
                        'ISO compliance',
                        'International regulations',
                        'Cross-cultural communication',
                        'Global best practices'
                    ]
                ],
                [
                    'title' => 'Offshore Operations Training',
                    'slug' => 'offshore-operations',
                    'description' => 'Specialized training for offshore drilling and production operations.',
                    'level' => 'Advanced',
                    'duration' => '8 Weeks',
                    'certification' => 'Offshore Operations Certificate',
                    'price' => 'Rp 15,000,000',
                    'company' => 'Global Drilling Academy',
                    'features' => [
                        'Offshore safety',
                        'Marine operations',
                        'Platform operations',
                        'Subsea systems',
                        'Emergency response'
                    ]
                ]
            ]
        ],
        'certification' => [
            'title' => 'Local Certification Program',
            'description' => 'Certification programs for local regulatory compliance',
            'slug' => 'certification',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M30 15H10C8.34315 15 7 16.3431 7 18V32C7 33.6569 8.34315 35 10 35H30C31.6569 35 33 33.6569 33 32V18C33 16.3431 31.6569 15 30 15Z" stroke="currentColor" stroke-width="2.5"/><path d="M27 15V10C27 8.67392 26.4732 7.40215 25.5355 6.46447C24.5979 5.52678 23.3261 5 22 5H18C16.6739 5 15.4021 5.52678 14.4645 6.46447C13.5268 7.40215 13 8.67392 13 10V15" stroke="currentColor" stroke-width="2.5"/><circle cx="20" cy="25" r="2" fill="currentColor"/></svg>',
            'courses' => [
                [
                    'title' => 'MIGAS Certification Preparation',
                    'slug' => 'migas-certification',
                    'description' => 'Preparation course for MIGAS (Indonesian oil and gas) certification.',
                    'level' => 'Professional',
                    'duration' => '6 Weeks',
                    'certification' => 'MIGAS Certificate',
                    'price' => 'Rp 8,000,000',
                    'popular' => true,
                    'company' => 'Indonesia Drilling School',
                    'features' => [
                        'MIGAS regulations',
                        'Local compliance',
                        'Documentation requirements',
                        'Exam preparation',
                        'Practical assessments'
                    ]
                ],
                [
                    'title' => 'Competency Certification',
                    'slug' => 'competency-certification',
                    'description' => 'Competency-based certification for drilling professionals.',
                    'level' => 'All Levels',
                    'duration' => '4 Weeks',
                    'certification' => 'Competency Certificate',
                    'price' => 'Rp 6,500,000',
                    'company' => 'Indonesia Drilling School',
                    'features' => [
                        'Skills assessment',
                        'Competency evaluation',
                        'Portfolio development',
                        'Practical examination',
                        'Certification maintenance'
                    ]
                ]
            ]
        ]
    ];

    public function index()
    {
        return view('program');
    }

    public function show($category)
    {
        if (!isset($this->programData[$category])) {
            abort(404, 'Program not found');
        }

        $program = $this->programData[$category];

        // Kelompokkan courses berdasarkan 'company'
        $companies = collect($program['courses'])
            ->groupBy('company')
            ->map(function ($courses) {
                // Hanya ambil data yang dibutuhkan: title dan slug
                return $courses->map(function ($course) {
                    return [
                        'title' => $course['title'],
                        'slug' => $course['slug']
                    ];
                })->values()->all();
            })
            ->toArray();

        return view('programDetail', [
            'programTitle' => $program['title'],
            'programDescription' => $program['description'],
            'programSlug' => $program['slug'],
            'programIcon' => $program['icon'],
            'companies' => $companies // <-- Kirim $companies, bukan $courses
        ]);
    }

    public function enroll($category, $courseSlug)
    {
        if (!isset($this->programData[$category])) {
            abort(404, 'Program not found');
        }

        $program = $this->programData[$category];
        $course = collect($program['courses'])->firstWhere('slug', $courseSlug);

        if (!$course) {
            abort(404, 'Course not found');
        }

        return view('enroll', [
            'programTitle' => $program['title'],
            'programSlug' => $program['slug'],
            'course' => $course
        ]);
    }
}