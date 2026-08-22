<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function services()
    {
        return view('services');
    }

    public function projects()
    {
        $projects = Project::all();
        
        if ($projects->isEmpty()) {
            $projects = collect([
                (object)['title' => 'برج التجارية', 'category' => 'تجاري', 'description' => 'مشروع بناء برج تجاري متكامل المرافق.', 'image_path' => 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=600&auto=format&fit=crop'],
                (object)['title' => 'مجمع السكني', 'category' => 'سكني', 'description' => 'مجمع سكني فاخر يضم 50 فيلا.', 'image_path' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=600&auto=format&fit=crop'],
                (object)['title' => 'تطوير البنية التحتية', 'category' => 'بنية تحتية', 'description' => 'مشروع تطوير طرق وشبكات المياه.', 'image_path' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=600&auto=format&fit=crop'],
                (object)['title' => 'مول التسوق', 'category' => 'تجاري', 'description' => 'أكبر مول تسوق في المنطقة.', 'image_path' => 'https://images.unsplash.com/photo-1555636222-cae831e670b3?q=80&w=600&auto=format&fit=crop'],
            ]);
        }
        
        return view('projects', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'service_requested' => 'nullable|string',
            'message' => 'required|min:10',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
    }
}
