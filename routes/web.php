<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\AntrianSuratController;
use App\Http\Controllers\AdminController;

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PENDUDUK (CRUD)
    |--------------------------------------------------------------------------
    */
    Route::resource('penduduk', PendudukController::class);

    /*
    |--------------------------------------------------------------------------
    | ANTRIAN SURAT (CRUD)
    |--------------------------------------------------------------------------
    */
    Route::resource('antrian', AntrianSuratController::class);

    // Update status antrian
    Route::post('antrian/{antrian}/status', 
        [AntrianSuratController::class, 'updateStatus']
    )->name('antrian.status.update');

    // Cetak SKTM
    Route::get('antrian/{antrian}/cetak-sktm',
        [AntrianSuratController::class, 'cetakSKTM']
    )->name('antrian.cetak.sktm');

    /*
    |--------------------------------------------------------------------------
    | ROUTES TEMPLATE LAINNYA (ASLI)
    |--------------------------------------------------------------------------
    */
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');

    // E-COMMERCE
    Route::get('/ecommerce/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/ecommerce/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/ecommerce/invoices', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/ecommerce/shop', fn() => view('pages/ecommerce/shop'))->name('shop');
    Route::get('/ecommerce/shop-2', fn() => view('pages/ecommerce/shop-2'))->name('shop-2');
    Route::get('/ecommerce/product', fn() => view('pages/ecommerce/product'))->name('product');
    Route::get('/ecommerce/cart', fn() => view('pages/ecommerce/cart'))->name('cart');
    Route::get('/ecommerce/cart-2', fn() => view('pages/ecommerce/cart-2'))->name('cart-2');
    Route::get('/ecommerce/cart-3', fn() => view('pages/ecommerce/cart-3'))->name('cart-3');
    Route::get('/ecommerce/pay', fn() => view('pages/ecommerce/pay'))->name('pay');

    // CAMPAIGNS
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');

    // COMMUNITY
    Route::get('/community/users-tabs', [MemberController::class, 'indexTabs'])->name('users-tabs');
    Route::get('/community/users-tiles', [MemberController::class, 'indexTiles'])->name('users-tiles');
    Route::get('/community/profile', fn() => view('pages/community/profile'))->name('profile');
    Route::get('/community/feed', fn() => view('pages/community/feed'))->name('feed');
    Route::get('/community/forum', fn() => view('pages/community/forum'))->name('forum');
    Route::get('/community/forum-post', fn() => view('pages/community/forum-post'))->name('forum-post');
    Route::get('/community/meetups', fn() => view('pages/community/meetups'))->name('meetups');
    Route::get('/community/meetups-post', fn() => view('pages/community/meetups-post'))->name('meetups-post');

    // FINANCE
    Route::get('/finance/cards', fn() => view('pages/finance/credit-cards'))->name('credit-cards');
    Route::get('/finance/transactions', [TransactionController::class, 'index01'])->name('transactions');
    Route::get('/finance/transaction-details', [TransactionController::class, 'index02'])->name('transaction-details');

    // JOB
    Route::get('/job/job-listing', [JobController::class, 'index'])->name('job-listing');
    Route::get('/job/job-post', fn() => view('pages/job/job-post'))->name('job-post');
    Route::get('/job/company-profile', fn() => view('pages/job/company-profile'))->name('company-profile');

    // MESSAGES & TASKS
    Route::get('/messages', fn() => view('pages/messages'))->name('messages');
    Route::get('/tasks/kanban', fn() => view('pages/tasks/tasks-kanban'))->name('tasks-kanban');
    Route::get('/tasks/list', fn() => view('pages/tasks/tasks-list'))->name('tasks-list');
    Route::get('/inbox', fn() => view('pages/inbox'))->name('inbox');
    Route::get('/calendar', fn() => view('pages/calendar'))->name('calendar');

    // SETTINGS
    Route::get('/settings/account', fn() => view('pages/settings/account'))->name('account');
    Route::get('/settings/notifications', fn() => view('pages/settings/notifications'))->name('notifications');
    Route::get('/settings/apps', fn() => view('pages/settings/apps'))->name('apps');
    Route::get('/settings/plans', fn() => view('pages/settings/plans'))->name('plans');
    Route::get('/settings/billing', fn() => view('pages/settings/billing'))->name('billing');
    Route::get('/settings/feedback', fn() => view('pages/settings/feedback'))->name('feedback');

    // UTILITY
    Route::get('/utility/changelog', fn() => view('pages/utility/changelog'))->name('changelog');
    Route::get('/utility/roadmap', fn() => view('pages/utility/roadmap'))->name('roadmap');
    Route::get('/utility/faqs', fn() => view('pages/utility/faqs'))->name('faqs');
    Route::get('/utility/empty-state', fn() => view('pages/utility/empty-state'))->name('empty-state');
    Route::get('/utility/404', fn() => view('pages/utility/404'))->name('404');
    Route::get('/utility/knowledge-base', fn() => view('pages/utility/knowledge-base'))->name('knowledge-base');

    // ONBOARDING
    Route::get('/onboarding-01', fn() => view('pages/onboarding-01'))->name('onboarding-01');
    Route::get('/onboarding-02', fn() => view('pages/onboarding-02'))->name('onboarding-02');
    Route::get('/onboarding-03', fn() => view('pages/onboarding-03'))->name('onboarding-03');
    Route::get('/onboarding-04', fn() => view('pages/onboarding-04'))->name('onboarding-04');

    // COMPONENTS
    Route::get('/component/button', fn() => view('pages/component/button-page'))->name('button-page');
    Route::get('/component/form', fn() => view('pages/component/form-page'))->name('form-page');
    Route::get('/component/dropdown', fn() => view('pages/component/dropdown-page'))->name('dropdown-page');
    Route::get('/component/alert', fn() => view('pages/component/alert-page'))->name('alert-page');
    Route::get('/component/modal', fn() => view('pages/component/modal-page'))->name('modal-page');
    Route::get('/component/pagination', fn() => view('pages/component/pagination-page'))->name('pagination-page');
    Route::get('/component/tabs', fn() => view('pages/component/tabs-page'))->name('tabs-page');
    Route::get('/component/breadcrumb', fn() => view('pages/component/breadcrumb-page'))->name('breadcrumb-page');
    Route::get('/component/badge', fn() => view('pages/component/badge-page'))->name('badge-page');
    Route::get('/component/avatar', fn() => view('pages/component/avatar-page'))->name('avatar-page');
    Route::get('/component/tooltip', fn() => view('pages/component/tooltip-page'))->name('tooltip-page');
    Route::get('/component/accordion', fn() => view('pages/component/accordion-page'))->name('accordion-page');
    Route::get('/component/icons', fn() => view('pages/component/icons-page'))->name('icons-page');

    // FALLBACK 404
    Route::fallback(fn() => view('pages/utility/404'));
});
