<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\JobWork;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan statistik dasar
        $totalUsers = User::role('user')->count();
        $totalCompanies = User::role('company')->count();
        $totalJobWorks = JobWork::count();

        // Menghitung persentase perubahan (contoh: dibandingkan dengan bulan lalu)
        $lastMonthUsers = User::role('user')
            ->where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->count();
        
        $lastMonthCompanies = User::role('company')
            ->where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->count();
        
        $lastMonthJobWorks = JobWork::where('created_at', '<', Carbon::now()->startOfMonth())
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->count();
        
        // Menghitung persentase perubahan
        $userPercentageChange = $lastMonthUsers > 0 
            ? round((($totalUsers - $lastMonthUsers) / $lastMonthUsers) * 100) 
            : 100;
        
        $companyPercentageChange = $lastMonthCompanies > 0 
            ? round((($totalCompanies - $lastMonthCompanies) / $lastMonthCompanies) * 100) 
            : 100;
        
        $jobWorkPercentageChange = $lastMonthJobWorks > 0 
            ? round((($totalJobWorks - $lastMonthJobWorks) / $lastMonthJobWorks) * 100) 
            : 100;

        // Menyiapkan data bulanan untuk chart
        $currentYear = Carbon::now()->year;
        $months = [];
        $chartMonths = [];
        $monthlyUserData = [];
        $monthlyCompanyData = [];
        $monthlyJobWorkData = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->translatedFormat('F');
            $monthYear = $date->format('Y-m');
            $chartDate = $date->format('Y-m-d\TH:i:s.000\Z');
            
            // Tambahkan ke array untuk chart
            array_unshift($months, $monthYear);
            array_unshift($chartMonths, $chartDate);
        }

        // Mendapatkan data bulanan untuk users, companies, dan job works
        foreach ($months as $month) {
            $startDate = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
            $endDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth();
            
            $usersCount = User::role('user')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
            
            $companiesCount = User::role('company')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
            
            $jobWorksCount = JobWork::whereBetween('created_at', [$startDate, $endDate])
                ->count();
            
            $monthlyUserData[] = $usersCount;
            $monthlyCompanyData[] = $companiesCount;
            $monthlyJobWorkData[] = $jobWorksCount;
        }

        // Mendapatkan job work terbaru
        $recentJobWorks = JobWork::with(['company.user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Mendapatkan job work dengan pelamar terbanyak
        $topJobWorks = JobWork::withCount('candidates')
            ->with(['company.user', 'company.gallery'])
            ->orderBy('candidates_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'totalUsers',
            'totalCompanies',
            'totalJobWorks',
            'userPercentageChange',
            'companyPercentageChange',
            'jobWorkPercentageChange',
            'chartMonths',
            'monthlyUserData',
            'monthlyCompanyData',
            'monthlyJobWorkData',
            'recentJobWorks',
            'topJobWorks'
        ));
    }
}