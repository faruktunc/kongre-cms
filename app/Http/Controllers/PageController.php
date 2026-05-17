<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class PageController 
{
    
    private $apiUrl = 'http://localhost:3001'; 

    private function getPages()
    {
        try {
            $response = Http::get("{$this->apiUrl}/pages");
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return [];
        } catch (\Exception $e) {
            \Log::error('API Error: ' . $e->getMessage());
            return [];
        }
    }

    public function show($slug)
    {
        $pages = $this->getPages();
        
        $page = collect($pages)->firstWhere('slug', $slug);

        if (!$page) {
            abort(404, 'Sayfa bulunamadı');
        }

        return Inertia::render('DynamicPage', [
            'page' => $page,
        ]);
    }
}