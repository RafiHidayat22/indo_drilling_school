<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Advanced Well Control Training Program - PT Pertamina',
                'description' => 'Comprehensive well control training program delivered to 120 drilling personnel from PT Pertamina. The program included both theoretical knowledge and hands-on simulator training, ensuring participants gained practical experience in managing well control situations.',
                'client' => 'PT Pertamina',
                'location' => 'Balikpapan, East Kalimantan',
                'start_date' => '2024-01-15',
                'end_date' => '2024-03-30',
                'status' => 'completed',
                'category' => 'drilling',
                'challenges' => 'The main challenge was coordinating training schedules with operational personnel who had limited availability. Additionally, the simulator needed to be calibrated to match the specific drilling equipment used in Indonesian operations.',
                'solutions' => 'We implemented a flexible scheduling system with multiple training batches. Our technical team worked closely with equipment manufacturers to customize the simulator settings, ensuring realistic training scenarios that matched actual field conditions.',
                'results' => '120 personnel successfully certified with IWCF Level 4 certification. Post-training assessments showed a 95% improvement in emergency response times. Zero well control incidents reported in the following 6 months from trained personnel.',
                'is_featured' => true,
                'is_published' => true,
                'order' => 10,
            ],
            [
                'title' => 'Offshore Safety Training - Chevron Indonesia',
                'description' => 'Delivered comprehensive offshore safety training including HUET, firefighting, and emergency response procedures for Chevron Indonesia offshore operations. The training covered all critical safety aspects required for offshore platform operations.',
                'client' => 'Chevron Indonesia',
                'location' => 'Jakarta & Offshore Facilities',
                'start_date' => '2024-02-01',
                'end_date' => '2024-05-15',
                'status' => 'completed',
                'category' => 'safety',
                'challenges' => 'Coordinating offshore training logistics and ensuring all safety equipment met international standards while adapting to Indonesian regulatory requirements.',
                'solutions' => 'Established a mobile training unit that could be deployed to various offshore locations. Partnered with international safety equipment providers to ensure compliance with both OPITO and Indonesian standards.',
                'results' => '200+ offshore workers trained and certified. Achieved 100% first-time pass rate on OPITO assessments. Significant improvement in emergency response drill performance.',
                'is_featured' => true,
                'is_published' => true,
                'order' => 9,
            ],
            [
                'title' => 'Rig Supervisor Certification Program',
                'description' => 'Intensive certification program for rig supervisors focusing on leadership, technical competence, and safety management. The program combined classroom instruction with field exercises and real-world case studies.',
                'client' => 'Multiple Oil & Gas Companies',
                'location' => 'Purwokerto, Central Java',
                'start_date' => '2024-03-10',
                'end_date' => '2024-06-20',
                'status' => 'completed',
                'category' => 'certification',
                'challenges' => 'Participants came from diverse operational backgrounds and experience levels, requiring personalized training approaches.',
                'solutions' => 'Implemented a modular training system allowing participants to focus on areas needing improvement while maintaining high standards for all core competencies.',
                'results' => '45 rig supervisors certified with international recognition. 90% of graduates promoted to senior positions within 6 months. Outstanding feedback scores averaging 4.8/5.0.',
                'is_featured' => true,
                'is_published' => true,
                'order' => 8,
            ],
            [
                'title' => 'Drilling Operations Upskilling - Medco Energi',
                'description' => 'Comprehensive upskilling program for drilling operations personnel, focusing on latest industry technologies and best practices.',
                'client' => 'Medco Energi',
                'location' => 'South Sumatra',
                'start_date' => '2024-04-01',
                'end_date' => '2024-07-31',
                'status' => 'completed',
                'category' => 'drilling',
                'is_published' => true,
                'order' => 7,
            ],
            [
                'title' => 'H2S Safety Awareness Training',
                'description' => 'Critical safety training program focusing on hydrogen sulfide detection, prevention, and emergency response procedures.',
                'client' => 'Various Operators',
                'location' => 'Multiple Locations',
                'start_date' => '2024-05-15',
                'end_date' => '2024-08-30',
                'status' => 'completed',
                'category' => 'safety',
                'is_published' => true,
                'order' => 6,
            ],
            [
                'title' => 'Advanced Directional Drilling Training',
                'description' => 'Specialized training in directional drilling techniques, including trajectory planning and real-time monitoring.',
                'client' => 'Confidential',
                'location' => 'East Kalimantan',
                'start_date' => '2024-08-01',
                'end_date' => null,
                'status' => 'ongoing',
                'category' => 'drilling',
                'is_published' => true,
                'order' => 5,
            ],
        ];

        foreach ($projects as $projectData) {
            $projectData['slug'] = Str::slug($projectData['title']);
            Project::create($projectData);
        }
    }
}