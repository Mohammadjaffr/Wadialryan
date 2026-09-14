<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Industries
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('slug')->unique();
            $table->json('description')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });

        // 2. Equipment Categories
        Schema::create('equipment_categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 3. Equipment
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('equipment_categories')->nullOnDelete();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('capacity')->nullable();
            $table->json('specifications')->nullable();
            $table->json('description')->nullable();
            $table->string('availability_status')->default('available');
            $table->string('main_image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });

        // 4. Clients
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('type')->nullable(); // Partner, Client
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 5. Certifications
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('issuer')->nullable();
            $table->string('certificate_number')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->json('description')->nullable();
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 6. Careers
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('department')->nullable();
            $table->json('location')->nullable();
            $table->string('employment_type')->nullable(); // Full-time, Contract, etc.
            $table->json('description')->nullable();
            $table->json('requirements')->nullable();
            $table->date('closing_date')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        // 7. Job Applications
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('cv_path')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('New'); // New, Reviewing, Shortlisted, Rejected, Hired
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 8. Quote Requests
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('location')->nullable();
            $table->string('requested_service')->nullable();
            $table->string('project_location')->nullable();
            $table->text('project_description')->nullable();
            $table->string('estimated_timeline')->nullable();
            $table->string('attachment')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('New'); // New, In Review, Contacted, Closed
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 9. Update Contact Messages
        Schema::table('contact_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_messages', 'company')) {
                $table->string('company')->nullable()->after('name');
                $table->string('subject')->nullable()->after('phone');
                $table->string('service')->nullable()->after('subject');
                $table->string('status')->default('New')->after('message');
                $table->text('admin_notes')->nullable()->after('status');
            }
        });

        // 10. Update Services
        Schema::table('services', function (Blueprint $table) {
            $table->json('title')->change();
            // Drop old description if it conflicts with json type, or just change it if supported.
            $table->json('description')->change(); 
            
            $table->json('short_description')->nullable()->after('slug');
            $table->json('full_description')->nullable()->after('short_description');
            $table->json('capabilities')->nullable()->after('full_description');
            $table->json('scope_of_work')->nullable()->after('capabilities');
            $table->json('applications')->nullable()->after('scope_of_work');
            $table->string('main_image')->nullable()->after('icon');
            $table->json('gallery')->nullable()->after('main_image');
            $table->boolean('is_featured')->default(false)->after('gallery');
            $table->boolean('is_active')->default(true)->after('is_featured');
            $table->integer('sort_order')->default(0)->after('is_active');
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('og_image')->nullable();
        });

        // 11. Update Projects
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('industry_id')->nullable()->constrained('industries')->nullOnDelete();
            
            $table->string('project_status')->nullable()->after('location');
            $table->date('start_date')->nullable()->after('project_status');
            
            $table->json('short_description')->nullable()->after('description');
            $table->json('full_description')->nullable()->after('short_description');
            $table->json('scope_of_work')->nullable()->after('full_description');
            $table->json('challenges')->nullable()->after('scope_of_work');
            $table->json('solutions')->nullable()->after('challenges');
            $table->json('results')->nullable()->after('solutions');
            
            $table->string('main_image')->nullable()->after('images');
            $table->json('gallery')->nullable()->after('main_image');
            $table->json('before_gallery')->nullable()->after('gallery');
            $table->json('after_gallery')->nullable()->after('before_gallery');
            
            $table->boolean('is_featured')->default(false)->after('after_gallery');
            $table->boolean('is_active')->default(true)->after('is_featured');
            $table->integer('sort_order')->default(0)->after('is_active');
            
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('og_image')->nullable();
        });

        // 12. Project-Service Many-to-Many
        Schema::create('project_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        // Simplified down method, mostly dropping tables
        Schema::dropIfExists('project_service');
        Schema::dropIfExists('quote_requests');
        Schema::dropIfExists('job_applications');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('equipment_categories');
        
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['industry_id']);
        });
        
        Schema::dropIfExists('industries');
        Schema::dropIfExists('clients');
    }
};
