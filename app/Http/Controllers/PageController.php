<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Equipment;
use App\Models\Industry;
use App\Models\Career;
use App\Models\Certification;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Settings\CompanySettings;
use App\Settings\HomepageSettings;
use App\Mail\ContactMessageReceived;
use App\Mail\RfqReceived;

class PageController extends Controller
{
    public function home(HomepageSettings $homepageSettings)
    {
        $projects = Project::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->take(6)->get();
        $services = Service::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->take(6)->get();
        $industries = Industry::where('active', true)->where('featured', true)->orderBy('sort_order')->take(6)->get();
        $equipment = Equipment::where('active', true)->where('featured', true)->orderBy('sort_order')->take(6)->get();
        $clients = \App\Models\Client::where('active', true)->where('featured', true)->orderBy('sort_order')->get();
        $certifications = Certification::where('active', true)->orderBy('sort_order')->take(4)->get();
        
        return view('welcome', compact('projects', 'services', 'industries', 'equipment', 'clients', 'certifications', 'homepageSettings'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->paginate(12);
        return view('services.index', compact('services'));
    }

    public function serviceShow(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }
        return view('services.show', compact('service'));
    }

    public function equipment()
    {
        $equipment = Equipment::with('category')->where('active', true)->orderBy('sort_order')->paginate(12);
        return view('equipment.index', compact('equipment'));
    }

    public function equipmentShow(Equipment $equipment)
    {
        if (!$equipment->active) {
            abort(404);
        }
        return view('equipment.show', compact('equipment'));
    }

    public function projects()
    {
        $projects = Project::where('is_active', true)->orderBy('sort_order')->paginate(12);
        return view('projects.index', compact('projects'));
    }

    public function projectShow($identifier)
    {
        // Try slug first
        $project = Project::where('slug', $identifier)->where('is_active', true)->first();
        
        if (!$project && is_numeric($identifier)) {
            // Fallback to ID
            $project = Project::where('id', $identifier)->where('is_active', true)->first();
            if ($project && $project->slug) {
                return redirect()->route('projects.show', ['project' => $project->slug], 301);
            }
        }
        
        if (!$project) {
            abort(404);
        }
        
        return view('projects.show', compact('project'));
    }

    public function products()
    {
        $products = \App\Models\Product::where('active', true)->orderBy('sort_order')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function productShow(\App\Models\Product $product)
    {
        if (!$product->active) {
            abort(404);
        }
        return view('products.show', compact('product'));
    }

    public function clients()
    {
        $clients = \App\Models\Client::where('active', true)->orderBy('sort_order')->paginate(16);
        return view('clients.index', compact('clients'));
    }

    public function industries()
    {
        $industries = Industry::where('active', true)->orderBy('sort_order')->get();
        return view('industries.index', compact('industries'));
    }

    public function industryShow(Industry $industry)
    {
        if (!$industry->active) {
            abort(404);
        }
        return view('industries.show', compact('industry'));
    }

    public function careers()
    {
        $careers = Career::where('active', true)->latest()->paginate(10);
        return view('careers.index', compact('careers'));
    }

    public function careerShow(Career $career)
    {
        if (!$career->active) {
            abort(404);
        }
        return view('careers.show', compact('career'));
    }

    public function submitApplication(Request $request, Career $career)
    {
        if (!$career->active) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'nullable|string',
            'cv_path' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $validated['career_id'] = $career->id;
        $validated['status'] = 'New';
        
        if ($request->hasFile('cv_path')) {
            $validated['cv_path'] = $request->file('cv_path')->store('cvs', 'local');
        }

        \App\Models\JobApplication::create($validated);

        return back()->with('success', __('تم تقديم طلب التوظيف بنجاح!'));
    }

    public function certifications()
    {
        $certifications = Certification::where('active', true)->orderBy('sort_order')->get();
        return view('certifications', compact('certifications'));
    }

    public function hse()
    {
        return view('hse');
    }

    public function quality()
    {
        return view('quality');
    }

    public function rfq()
    {
        return view('rfq');
    }

    public function submitRfq(Request $request, CompanySettings $settings)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'company' => 'nullable|string|max:255',
            'requested_service' => 'nullable|string|max:255',
            'message' => 'required|min:10',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('rfq_attachments', 'local');
        }

        $rfq = \App\Models\QuoteRequest::create($validated);

        try {
            $to = $settings->sales_email ?: ($settings->general_email ?: config('mail.from.address'));
            if ($to) {
                Mail::to($to)->send(new RfqReceived($rfq));
            }
        } catch (\Exception $e) {
            Log::warning('Failed to send RFQ email: ' . $e->getMessage());
        }

        return back()->with('success', __('تم إرسال طلب التسعيرة بنجاح! سنتواصل معك قريباً.'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request, CompanySettings $settings)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|min:10',
        ]);

        $contact = ContactMessage::create($validated);

        try {
            $to = $settings->general_email ?: ($settings->sales_email ?: config('mail.from.address'));
            if ($to) {
                Mail::to($to)->send(new ContactMessageReceived($contact));
            }
        } catch (\Exception $e) {
            Log::warning('Failed to send Contact email: ' . $e->getMessage());
        }

        return back()->with('success', __('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.'));
    }
}
