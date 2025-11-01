<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingCategory;
use App\Models\TrainingSubcategory;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Drilling Program
        $drilling = TrainingCategory::create([
            'title' => 'Drilling Program',
            'slug' => 'drilling',
            'description' => 'Comprehensive drilling training programs for professional development',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 5L20 35M15 10L20 5L25 10M8 15H32M8 25H32" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'order' => 1,
            'status' => 'Active'
        ]);

        $drillingBasic = TrainingSubcategory::create([
            'category_id' => $drilling->id,
            'title' => 'Basic Drilling',
            'slug' => 'basic-drilling',
            'description' => 'Fundamental drilling operations and safety',
            'order' => 1,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $drillingBasic->id,
            'title' => 'Introduction to Drilling Operations',
            'slug' => 'intro-drilling-operations',
            'description' => 'Learn fundamental drilling techniques and equipment operation for beginners.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $drillingBasic->id,
            'title' => 'Drilling Safety Fundamentals',
            'slug' => 'drilling-safety-fundamentals',
            'description' => 'Essential safety protocols and procedures for drilling operations.',
            'status' => 'Active'
        ]);

        $drillingAdvanced = TrainingSubcategory::create([
            'category_id' => $drilling->id,
            'title' => 'Advanced Drilling',
            'slug' => 'advanced-drilling',
            'description' => 'Advanced techniques and specialized operations',
            'order' => 2,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $drillingAdvanced->id,
            'title' => 'Directional Drilling Techniques',
            'slug' => 'directional-drilling',
            'description' => 'Master complex directional drilling and well control operations.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $drillingAdvanced->id,
            'title' => 'Well Control and Blowout Prevention',
            'slug' => 'well-control-bop',
            'description' => 'Advanced well control procedures and blowout prevention systems.',
            'status' => 'Active'
        ]);

        // 2. Safety Program
        $safety = TrainingCategory::create([
            'title' => 'Safety Program',
            'slug' => 'safety',
            'description' => 'Essential safety training for oil and gas operations',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 5L8 11V18C8 25.5 13 32 20 35C27 32 32 25.5 32 18V11L20 5Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 20L18.5 22.5L24 17" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'order' => 2,
            'status' => 'Active'
        ]);

        $safetyBasic = TrainingSubcategory::create([
            'category_id' => $safety->id,
            'title' => 'HSE Fundamentals',
            'slug' => 'hse-fundamentals',
            'description' => 'Basic health, safety, and environment training',
            'order' => 1,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $safetyBasic->id,
            'title' => 'Basic Safety Induction',
            'slug' => 'basic-safety-induction',
            'description' => 'Fundamental safety training for all personnel working in drilling operations.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $safetyBasic->id,
            'title' => 'Hazard Identification and Risk Assessment',
            'slug' => 'hira-training',
            'description' => 'Learn to identify workplace hazards and assess operational risks.',
            'status' => 'Active'
        ]);

        $safetyEmergency = TrainingSubcategory::create([
            'category_id' => $safety->id,
            'title' => 'Emergency Response',
            'slug' => 'emergency-response',
            'description' => 'Emergency procedures and crisis management',
            'order' => 2,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $safetyEmergency->id,
            'title' => 'Fire Fighting and Prevention',
            'slug' => 'fire-fighting',
            'description' => 'Comprehensive training in fire prevention and emergency response procedures.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $safetyEmergency->id,
            'title' => 'Emergency Evacuation Procedures',
            'slug' => 'emergency-evacuation',
            'description' => 'Emergency evacuation planning and execution for drilling sites.',
            'status' => 'Active'
        ]);

        // 3. IDS Drilling Program
        $idsDrilling = TrainingCategory::create([
            'title' => 'IDS Drilling Program',
            'slug' => 'ids-drilling',
            'description' => 'Specialized drilling programs with Indonesia Drilling School methodology',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M20 35C28.2843 35 35 28.2843 35 20C35 11.7157 28.2843 5 20 5C11.7157 5 5 11.7157 5 20C5 28.2843 11.7157 35 20 35Z" stroke="currentColor" stroke-width="2.5"/><path d="M20 13V20L25 25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'order' => 3,
            'status' => 'Active'
        ]);

        $idsFundamental = TrainingSubcategory::create([
            'category_id' => $idsDrilling->id,
            'title' => 'IDS Core Training',
            'slug' => 'ids-core',
            'description' => 'Core drilling training with IDS methodology',
            'order' => 1,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $idsFundamental->id,
            'title' => 'IDS Drilling Fundamentals',
            'slug' => 'ids-fundamentals',
            'description' => 'Comprehensive introduction to IDS drilling methodology and techniques.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $idsFundamental->id,
            'title' => 'IDS Well Planning and Design',
            'slug' => 'ids-well-planning',
            'description' => 'Advanced well planning and design using IDS standards and practices.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $idsFundamental->id,
            'title' => 'IDS Drilling Optimization',
            'slug' => 'ids-optimization',
            'description' => 'Optimize drilling performance using IDS best practices and techniques.',
            'status' => 'Active'
        ]);

        // 4. International Program
        $international = TrainingCategory::create([
            'title' => 'International Training Program',
            'slug' => 'international',
            'description' => 'Global standard training programs for international projects',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="15" stroke="currentColor" stroke-width="2.5"/><path d="M5 20H35M20 5C23 10 23 30 20 35M20 5C17 10 17 30 20 35" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>',
            'order' => 4,
            'status' => 'Active'
        ]);

        $intlStandards = TrainingSubcategory::create([
            'category_id' => $international->id,
            'title' => 'Global Standards',
            'slug' => 'global-standards',
            'description' => 'International drilling and safety standards',
            'order' => 1,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $intlStandards->id,
            'title' => 'API Standards and Specifications',
            'slug' => 'api-standards',
            'description' => 'Training on American Petroleum Institute standards and best practices.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $intlStandards->id,
            'title' => 'ISO Compliance for Drilling Operations',
            'slug' => 'iso-compliance',
            'description' => 'ISO compliance and quality management for international drilling operations.',
            'status' => 'Active'
        ]);

        $offshore = TrainingSubcategory::create([
            'category_id' => $international->id,
            'title' => 'Offshore Operations',
            'slug' => 'offshore-operations',
            'description' => 'Specialized offshore drilling training',
            'order' => 2,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $offshore->id,
            'title' => 'Offshore Drilling Fundamentals',
            'slug' => 'offshore-fundamentals',
            'description' => 'Essential training for offshore drilling platform operations.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $offshore->id,
            'title' => 'Subsea Systems and Equipment',
            'slug' => 'subsea-systems',
            'description' => 'Comprehensive training on subsea drilling systems and equipment.',
            'status' => 'Active'
        ]);

        // 5. Certification Program
        $certification = TrainingCategory::create([
            'title' => 'Local Certification Program',
            'slug' => 'certification',
            'description' => 'Certification programs for local regulatory compliance',
            'icon' => '<svg width="60" height="60" viewBox="0 0 40 40" fill="none"><path d="M30 15H10C8.34315 15 7 16.3431 7 18V32C7 33.6569 8.34315 35 10 35H30C31.6569 35 33 33.6569 33 32V18C33 16.3431 31.6569 15 30 15Z" stroke="currentColor" stroke-width="2.5"/><path d="M27 15V10C27 8.67392 26.4732 7.40215 25.5355 6.46447C24.5979 5.52678 23.3261 5 22 5H18C16.6739 5 15.4021 5.52678 14.4645 6.46447C13.5268 7.40215 13 8.67392 13 10V15" stroke="currentColor" stroke-width="2.5"/><circle cx="20" cy="25" r="2" fill="currentColor"/></svg>',
            'order' => 5,
            'status' => 'Active'
        ]);

        $migas = TrainingSubcategory::create([
            'category_id' => $certification->id,
            'title' => 'MIGAS Certification',
            'slug' => 'migas-certification',
            'description' => 'Indonesian oil and gas industry certification',
            'order' => 1,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $migas->id,
            'title' => 'MIGAS Drilling Certification',
            'slug' => 'migas-drilling-cert',
            'description' => 'Preparation course for MIGAS drilling certification and compliance.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $migas->id,
            'title' => 'MIGAS Safety Certification',
            'slug' => 'migas-safety-cert',
            'description' => 'MIGAS safety certification for drilling and production operations.',
            'status' => 'Active'
        ]);

        $competency = TrainingSubcategory::create([
            'category_id' => $certification->id,
            'title' => 'Competency Assessment',
            'slug' => 'competency-assessment',
            'description' => 'Skills and competency certification programs',
            'order' => 2,
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $competency->id,
            'title' => 'Drilling Supervisor Competency',
            'slug' => 'supervisor-competency',
            'description' => 'Competency assessment and certification for drilling supervisors.',
            'status' => 'Active'
        ]);

        Training::create([
            'subcategory_id' => $competency->id,
            'title' => 'Rig Operator Competency',
            'slug' => 'rig-operator-competency',
            'description' => 'Skills assessment and certification for rig operators.',
            'status' => 'Active'
        ]);
    }
}