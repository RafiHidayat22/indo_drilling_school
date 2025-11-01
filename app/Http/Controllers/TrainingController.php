<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        // === DATA DUMMY (10 PROVIDER) ===
        $dummyTrainings = [
            [
                'id' => 1,
                'category' => 'Keselamatan Kerja',
                'provider' => 'AOSH',
                'trainings' => [
                    ['id' => 101, 'name' => 'Basic Safety Induction'],
                    ['id' => 102, 'name' => 'Safety Officer Certification']
                ],
                'created_at' => '2025-10-15'
            ],
            [
                'id' => 2,
                'category' => 'Keselamatan Kerja',
                'provider' => 'PT Safety Pro',
                'trainings' => [
                    ['id' => 201, 'name' => 'Fire Fighting Certificate']
                ],
                'created_at' => '2025-10-20'
            ],
            [
                'id' => 3,
                'category' => 'Teknik & Operasional',
                'provider' => 'Global Training Hub',
                'trainings' => [
                    ['id' => 301, 'name' => 'H2S Awareness'],
                    ['id' => 302, 'name' => 'Confined Space Entry'],
                    ['id' => 303, 'name' => 'First Aid & CPR']
                ],
                'created_at' => '2025-10-25'
            ],
            [
                'id' => 4,
                'category' => 'Manajemen & Leadership',
                'provider' => 'EduSafe Academy',
                'trainings' => [
                    ['id' => 401, 'name' => 'Working at Heights'],
                    ['id' => 402, 'name' => 'Electrical Safety']
                ],
                'created_at' => '2025-10-18'
            ],
            [
                'id' => 5,
                'category' => 'Sertifikasi Profesional',
                'provider' => 'NexGen Training Center',
                'trainings' => [
                    ['id' => 501, 'name' => 'Risk Assessment & JSA']
                ],
                'created_at' => '2025-10-22'
            ],
            [
                'id' => 6,
                'category' => 'Keselamatan Kerja',
                'provider' => 'SafeWork Institute',
                'trainings' => [
                    ['id' => 601, 'name' => 'Lifting & Rigging Operations'],
                    ['id' => 602, 'name' => 'Permit to Work System']
                ],
                'created_at' => '2025-10-10'
            ],
            [
                'id' => 7,
                'category' => 'Manajemen & Leadership',
                'provider' => 'ProTrain Solutions',
                'trainings' => [
                    ['id' => 701, 'name' => 'Incident Investigation'],
                    ['id' => 702, 'name' => 'Emergency Response Planning']
                ],
                'created_at' => '2025-10-28'
            ],
            [
                'id' => 8,
                'category' => 'Teknik & Operasional',
                'provider' => 'SkillSafe International',
                'trainings' => [
                    ['id' => 801, 'name' => 'Manual Handling Safety']
                ],
                'created_at' => '2025-10-05'
            ],
            [
                'id' => 9,
                'category' => 'Sertifikasi Profesional',
                'provider' => 'CertifyMe Training',
                'trainings' => [
                    ['id' => 901, 'name' => 'LOTO (Lockout/Tagout)'],
                    ['id' => 902, 'name' => 'Machine Guarding'],
                    ['id' => 903, 'name' => 'Hazard Communication']
                ],
                'created_at' => '2025-10-12'
            ],
            [
                'id' => 10,
                'category' => 'Manajemen & Leadership',
                'provider' => 'SafeOps Academy',
                'trainings' => [
                    ['id' => 1001, 'name' => 'Behavior-Based Safety'],
                    ['id' => 1002, 'name' => 'Environmental Compliance']
                ],
                'created_at' => '2025-10-30'
            ],
        ];

        // === PAGINASI MANUAL ===
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $currentItems = array_slice($dummyTrainings, ($currentPage - 1) * $perPage, $perPage);
        $trainings = new LengthAwarePaginator(
            $currentItems,
            count($dummyTrainings),
            $perPage,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        // Kirim sebagai `$trainings` (SESUAI NAMA DI VIEW)
        return view('training', compact('trainings'));
    }
}
