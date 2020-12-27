@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 height-card box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('content.for_admin_panel') }}</h4>
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#menu" data-toggle="tab" aria-expanded="true" class="nav-link active mb-3">
                                {{ __('content.menu') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content1" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content2" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content3" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content4" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 4
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content5" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 5
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#content6" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 6
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  show active" id="menu">
                            @if (isset($menu_keyword))
                                <form action="{{ route('menu-keyword.update_menu_keyword', $menu_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="banner">Banner <span class="text-red">*</span></label>
                                                <input type="text" name="banner" class="form-control" id="banner" value="{{ $menu_keyword->banner }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fixed_content">Fixed Content <span class="text-red">*</span></label>
                                                <input type="text" name="fixed_content" class="form-control" id="fixed_content" value="{{ $menu_keyword->fixed_content }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="background_image">Background Image <span class="text-red">*</span></label>
                                                <input type="text" name="background_image" class="form-control" id="background_image" value="{{ $menu_keyword->background_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sliders">Sliders <span class="text-red">*</span></label>
                                                <input type="text" name="sliders" class="form-control" id="sliders" value="{{ $menu_keyword->sliders }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video">Video <span class="text-red">*</span></label>
                                                <input type="text" name="video" class="form-control" id="video" value="{{ $menu_keyword->video }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" value="{{ $menu_keyword->about }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" value="{{ $menu_keyword->services }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="features">Features <span class="text-red">*</span></label>
                                                <input type="text" name="features" class="form-control" id="features" value="{{ $menu_keyword->features }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="counters">Counters <span class="text-red">*</span></label>
                                                <input type="text" name="counters" class="form-control" id="counters" value="{{ $menu_keyword->counters }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="how_to_install">How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="how_to_install" class="form-control" id="how_to_install" value="{{ $menu_keyword->how_to_install }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="screenshots">Screenshots <span class="text-red">*</span></label>
                                                <input type="text" name="screenshots" class="form-control" id="screenshots" value="{{ $menu_keyword->screenshots }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="prices">Prices <span class="text-red">*</span></label>
                                                <input type="text" name="prices" class="form-control" id="prices" value="{{ $menu_keyword->prices }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" value="{{ $menu_keyword->teams }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs" value="{{ $menu_keyword->faqs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_info">Site Info <span class="text-red">*</span></label>
                                                <input type="text" name="site_info" class="form-control" id="site_info" value="{{ $menu_keyword->site_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_images">Site Images <span class="text-red">*</span></label>
                                                <input type="text" name="site_images" class="form-control" id="site_images" value="{{ $menu_keyword->site_images }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="homepage_versions">Homepage Versions <span class="text-red">*</span></label>
                                                <input type="text" name="homepage_versions" class="form-control" id="homepage_versions" value="{{ $menu_keyword->homepage_versions }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="google_analytic">Google Analytic <span class="text-red">*</span></label>
                                                <input type="text" name="google_analytic" class="form-control" id="google_analytic" value="{{ $menu_keyword->google_analytic }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sections">Sections <span class="text-red">*</span></label>
                                                <input type="text" name="sections" class="form-control" id="sections" value="{{ $menu_keyword->sections }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color">Color <span class="text-red">*</span></label>
                                                <input type="text" name="color" class="form-control" id="color" value="{{ $menu_keyword->color }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seo">Seo <span class="text-red">*</span></label>
                                                <input type="text" name="seo" class="form-control" id="seo" value="{{ $menu_keyword->seo }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" value="{{ $menu_keyword->categories }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blogs">Blogs <span class="text-red">*</span></label>
                                                <input type="text" name="blogs" class="form-control" id="blogs" value="{{ $menu_keyword->blogs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" value="{{ $menu_keyword->contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_info">Contact Info <span class="text-red">*</span></label>
                                                <input type="text" name="contact_info" class="form-control" id="contact_info" value="{{ $menu_keyword->contact_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="apps">Apps <span class="text-red">*</span></label>
                                                <input type="text" name="apps" class="form-control" id="apps" value="{{ $menu_keyword->apps }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="settings">Settings <span class="text-red">*</span></label>
                                                <input type="text" name="settings" class="form-control" id="settings" value="{{ $menu_keyword->settings }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="themes">Themes <span class="text-red">*</span></label>
                                                <input type="text" name="themes" class="form-control" id="themes" value="{{ $menu_keyword->themes }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="languages">Languages <span class="text-red">*</span></label>
                                                <input type="text" name="languages" class="form-control" id="languages" value="{{ $menu_keyword->languages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="logout">Logout <span class="text-red">*</span></label>
                                                <input type="text" name="logout" class="form-control" id="logout" value="{{ $menu_keyword->logout }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" value="{{ $menu_keyword->skills }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="works">Works <span class="text-red">*</span></label>
                                                <input type="text" name="works" class="form-control" id="works" value="{{ $menu_keyword->works }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_to_action">Call To Action <span class="text-red">*</span></label>
                                                <input type="text" name="call_to_action" class="form-control" id="call_to_action" value="{{ $menu_keyword->call_to_action }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" value="{{ $menu_keyword->galleries }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="external_url">External Url <span class="text-red">*</span></label>
                                                <input type="text" name="external_url" class="form-control" id="external_url" value="{{ $menu_keyword->external_url }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="socials">Socials <span class="text-red">*</span></label>
                                                <input type="text" name="socials" class="form-control" id="socials" value="{{ $menu_keyword->socials }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quick_access_buttons">Quick Access Buttons <span class="text-red">*</span></label>
                                                <input type="text" name="quick_access_buttons" class="form-control" id="quick_access_buttons" value="{{ $menu_keyword->quick_access_buttons }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="breadcrumb">Breadcrumb <span class="text-red">*</span></label>
                                                <input type="text" name="breadcrumb" class="form-control" id="breadcrumb" value="{{ $menu_keyword->breadcrumb }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" value="{{ $menu_keyword->pages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="messages">Messages <span class="text-red">*</span></label>
                                                <input type="text" name="messages" class="form-control" id="messages" value="{{ $menu_keyword->messages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" value="{{ $menu_keyword->testimonials }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="notifications">Notifications <span class="text-red">*</span></label>
                                                <input type="text" name="notifications" class="form-control" id="notifications" value="{{ $menu_keyword->notifications }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="profile">Profile <span class="text-red">*</span></label>
                                                <input type="text" name="profile" class="form-control" id="profile" value="{{ $menu_keyword->profile }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="change_password">Change Password <span class="text-red">*</span></label>
                                                <input type="text" name="change_password" class="form-control" id="change_password" value="{{ $menu_keyword->change_password }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="data_language">Data Language <span class="text-red">*</span></label>
                                                <input type="text" name="data_language" class="form-control" id="data_language" value="{{ $menu_keyword->data_language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dashboard">Dashboard <span class="text-red">*</span></label>
                                                <input type="text" name="dashboard" class="form-control" id="dashboard" value="{{ $menu_keyword->dashboard }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="optimizer">Optimizer <span class="text-red">*</span></label>
                                                <input type="text" name="optimizer" class="form-control" id="optimizer" value="{{ $menu_keyword->optimizer }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('menu-keyword.store_menu_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="banner">Banner <span class="text-red">*</span></label>
                                                <input type="text" name="banner" class="form-control" id="banner" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fixed_content">Fixed Content <span class="text-red">*</span></label>
                                                <input type="text" name="fixed_content" class="form-control" id="fixed_content" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="background_image">Background Image <span class="text-red">*</span></label>
                                                <input type="text" name="background_image" class="form-control" id="background_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sliders">Sliders <span class="text-red">*</span></label>
                                                <input type="text" name="sliders" class="form-control" id="sliders" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video">Video <span class="text-red">*</span></label>
                                                <input type="text" name="video" class="form-control" id="video" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="features">Features <span class="text-red">*</span></label>
                                                <input type="text" name="features" class="form-control" id="features" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="counters">Counters <span class="text-red">*</span></label>
                                                <input type="text" name="counters" class="form-control" id="counters" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="how_to_install">How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="how_to_install" class="form-control" id="how_to_install" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="screenshots">Screenshots <span class="text-red">*</span></label>
                                                <input type="text" name="screenshots" class="form-control" id="screenshots" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="prices">Prices <span class="text-red">*</span></label>
                                                <input type="text" name="prices" class="form-control" id="prices" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_info">Site Info <span class="text-red">*</span></label>
                                                <input type="text" name="site_info" class="form-control" id="site_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_images">Site Images <span class="text-red">*</span></label>
                                                <input type="text" name="site_images" class="form-control" id="site_images"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="homepage_versions">Homepage Versions <span class="text-red">*</span></label>
                                                <input type="text" name="homepage_versions" class="form-control" id="homepage_versions" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="google_analytic">Google Analytic <span class="text-red">*</span></label>
                                                <input type="text" name="google_analytic" class="form-control" id="google_analytic" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sections">Sections <span class="text-red">*</span></label>
                                                <input type="text" name="sections" class="form-control" id="sections" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color">Color <span class="text-red">*</span></label>
                                                <input type="text" name="color" class="form-control" id="color" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seo">Seo <span class="text-red">*</span></label>
                                                <input type="text" name="seo" class="form-control" id="seo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blogs">Blogs <span class="text-red">*</span></label>
                                                <input type="text" name="blogs" class="form-control" id="blogs" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_info">Contact Info <span class="text-red">*</span></label>
                                                <input type="text" name="contact_info" class="form-control" id="contact_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="apps">Apps <span class="text-red">*</span></label>
                                                <input type="text" name="apps" class="form-control" id="apps" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="settings">Settings <span class="text-red">*</span></label>
                                                <input type="text" name="settings" class="form-control" id="settings" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="themes">Themes <span class="text-red">*</span></label>
                                                <input type="text" name="themes" class="form-control" id="themes" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="languages">Languages <span class="text-red">*</span></label>
                                                <input type="text" name="languages" class="form-control" id="languages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="logout">Logout <span class="text-red">*</span></label>
                                                <input type="text" name="logout" class="form-control" id="logout" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="works">Works <span class="text-red">*</span></label>
                                                <input type="text" name="works" class="form-control" id="works" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_to_action">Call To Action <span class="text-red">*</span></label>
                                                <input type="text" name="call_to_action" class="form-control" id="call_to_action" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="external_url">External Url <span class="text-red">*</span></label>
                                                <input type="text" name="external_url" class="form-control" id="external_url" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="socials">Socials <span class="text-red">*</span></label>
                                                <input type="text" name="socials" class="form-control" id="socials" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quick_access_buttons">Quick Access Buttons <span class="text-red">*</span></label>
                                                <input type="text" name="quick_access_buttons" class="form-control" id="quick_access_buttons" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="breadcrumb">Breadcrumb <span class="text-red">*</span></label>
                                                <input type="text" name="breadcrumb" class="form-control" id="breadcrumb" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="messages">Messages <span class="text-red">*</span></label>
                                                <input type="text" name="messages" class="form-control" id="messages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="notifications">Notifications <span class="text-red">*</span></label>
                                                <input type="text" name="notifications" class="form-control" id="notifications" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="profile">Profile <span class="text-red">*</span></label>
                                                <input type="text" name="profile" class="form-control" id="profile" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="change_password">Change Password <span class="text-red">*</span></label>
                                                <input type="text" name="change_password" class="form-control" id="change_password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="data_language">Data Language <span class="text-red">*</span></label>
                                                <input type="text" name="data_language" class="form-control" id="data_language" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dashboard">Dashboard <span class="text-red">*</span></label>
                                                <input type="text" name="dashboard" class="form-control" id="dashboard" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="optimizer">Optimizer <span class="text-red">*</span></label>
                                                <input type="text" name="optimizer" class="form-control" id="optimizer" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content1">
                            @if (isset($content_one_group_keyword))
                                <form action="{{ route('content-one-group-keyword.update_content_one_group_keyword', $content_one_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fixed_content">Fixed Content <span class="text-red">*</span></label>
                                                <input type="text" name="fixed_content" class="form-control" id="fixed_content" value="{{ $content_one_group_keyword->fixed_content }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-red">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title" value="{{ $content_one_group_keyword->title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="desc">Description <span class="text-red">*</span></label>
                                                <input type="text" name="desc" class="form-control" id="desc" value="{{ $content_one_group_keyword->desc }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="btn_name">Button Name <span class="text-red">*</span></label>
                                                <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $content_one_group_keyword->btn_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="btn_link">Button Link <span class="text-red">*</span></label>
                                                <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $content_one_group_keyword->btn_link }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="thumbnail">Thumbnail <span class="text-red">*</span></label>
                                                <input type="text" name="thumbnail" class="form-control" id="thumbnail" value="{{ $content_one_group_keyword->thumbnail }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="size">Size <span class="text-red">*</span></label>
                                                <input type="text" name="size" class="form-control" id="size" value="{{ $content_one_group_keyword->size }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recommended_size">Recommended Size <span class="text-red">*</span></label>
                                                <input type="text" name="recommended_size" class="form-control" id="recommended_size" value="{{ $content_one_group_keyword->recommended_size }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="submit">Submit <span class="text-red">*</span></label>
                                                <input type="text" name="submit" class="form-control" id="submit" value="{{ $content_one_group_keyword->submit }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="created_successfully">Created Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="created_successfully" class="form-control" id="created_successfully" value="{{ $content_one_group_keyword->created_successfully }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updated_successfully">Updated Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="updated_successfully" class="form-control" id="updated_successfully" value="{{ $content_one_group_keyword->updated_successfully }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="deleted_successfully">Deleted Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="deleted_successfully" class="form-control" id="deleted_successfully" value="{{ $content_one_group_keyword->deleted_successfully }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="current_image">Current Image <span class="text-red">*</span></label>
                                                <input type="text" name="current_image" class="form-control" id="current_image" value="{{ $content_one_group_keyword->current_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="not_yet_created">Not Yet Created <span class="text-red">*</span></label>
                                                <input type="text" name="not_yet_created" class="form-control" id="not_yet_created" value="{{ $content_one_group_keyword->not_yet_created }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="background_image">Background Image <span class="text-red">*</span></label>
                                                <input type="text" name="background_image" class="form-control" id="background_image" value="{{ $content_one_group_keyword->background_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="image">Image <span class="text-red">*</span></label>
                                                <input type="text" name="image" class="form-control" id="image" value="{{ $content_one_group_keyword->image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sliders">Sliders <span class="text-red">*</span></label>
                                                <input type="text" name="sliders" class="form-control" id="sliders" value="{{ $content_one_group_keyword->sliders }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_slider">Add Slider <span class="text-red">*</span></label>
                                                <input type="text" name="add_slider" class="form-control" id="add_slider" value="{{ $content_one_group_keyword->add_slider }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_slider">Edit Slider <span class="text-red">*</span></label>
                                                <input type="text" name="edit_slider" class="form-control" id="edit_slider" value="{{ $content_one_group_keyword->edit_slider }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="delete">Delete <span class="text-red">*</span></label>
                                                <input type="text" name="delete" class="form-control" id="delete" value="{{ $content_one_group_keyword->delete }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="close">Close <span class="text-red">*</span></label>
                                                <input type="text" name="close" class="form-control" id="close" value="{{ $content_one_group_keyword->close }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="you_wont_be_able_to_revert_this">You wont be able to revert this! <span class="text-red">*</span></label>
                                                <input type="text" name="you_wont_be_able_to_revert_this" class="form-control" id="you_wont_be_able_to_revert_this" value="{{ $content_one_group_keyword->you_wont_be_able_to_revert_this }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cancel">Cancel <span class="text-red">*</span></label>
                                                <input type="text" name="cancel" class="form-control" id="cancel" value="{{ $content_one_group_keyword->cancel }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yes_delete_it">Yes, delete it! <span class="text-red">*</span></label>
                                                <input type="text" name="yes_delete_it" class="form-control" id="yes_delete_it" value="{{ $content_one_group_keyword->yes_delete_it }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="order">Order <span class="text-red">*</span></label>
                                                <input type="text" name="order" class="form-control" id="order" value="{{ $content_one_group_keyword->order }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video">Video <span class="text-red">*</span></label>
                                                <input type="text" name="video" class="form-control" id="video" value="{{ $content_one_group_keyword->video }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" value="{{ $content_one_group_keyword->about }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="information_list">Information List <span class="text-red">*</span></label>
                                                <input type="text" name="information_list" class="form-control" id="information_list" value="{{ $content_one_group_keyword->information_list }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_info">Add Info <span class="text-red">*</span></label>
                                                <input type="text" name="add_info" class="form-control" id="add_info" value="{{ $content_one_group_keyword->add_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_new">Add New <span class="text-red">*</span></label>
                                                <input type="text" name="add_new" class="form-control" id="add_new" value="{{ $content_one_group_keyword->add_new }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_info">Edit Info <span class="text-red">*</span></label>
                                                <input type="text" name="edit_info" class="form-control" id="edit_info" value="{{ $content_one_group_keyword->edit_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="action">Action <span class="text-red">*</span></label>
                                                <input type="text" name="action" class="form-control" id="action" value="{{ $content_one_group_keyword->action }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-one-group-keyword.store_content_one_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fixed_content">Fixed Content <span class="text-red">*</span></label>
                                                <input type="text" name="fixed_content" class="form-control" id="fixed_content" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-red">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="desc">Description <span class="text-red">*</span></label>
                                                <input type="text" name="desc" class="form-control" id="desc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="btn_name">Button Name <span class="text-red">*</span></label>
                                                <input type="text" name="btn_name" class="form-control" id="btn_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="btn_link">Button Link <span class="text-red">*</span></label>
                                                <input type="text" name="btn_link" class="form-control" id="btn_link" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="thumbnail">Thumbnail <span class="text-red">*</span></label>
                                                <input type="text" name="thumbnail" class="form-control" id="thumbnail" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="size">Size <span class="text-red">*</span></label>
                                                <input type="text" name="size" class="form-control" id="size" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recommended_size">Recommended Size <span class="text-red">*</span></label>
                                                <input type="text" name="recommended_size" class="form-control" id="recommended_size" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="submit">Submit <span class="text-red">*</span></label>
                                                <input type="text" name="submit" class="form-control" id="submit" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="created_successfully">Created Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="created_successfully" class="form-control" id="created_successfully" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updated_successfully">Updated Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="updated_successfully" class="form-control" id="updated_successfully" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="deleted_successfully">Deleted Successfully <span class="text-red">*</span></label>
                                                <input type="text" name="deleted_successfully" class="form-control" id="deleted_successfully" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="current_image">Current Image <span class="text-red">*</span></label>
                                                <input type="text" name="current_image" class="form-control" id="current_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="not_yet_created">Not Yet Created <span class="text-red">*</span></label>
                                                <input type="text" name="not_yet_created" class="form-control" id="not_yet_created" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="background_image">Background Image <span class="text-red">*</span></label>
                                                <input type="text" name="background_image" class="form-control" id="background_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="image">Image <span class="text-red">*</span></label>
                                                <input type="text" name="image" class="form-control" id="image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sliders">Sliders <span class="text-red">*</span></label>
                                                <input type="text" name="sliders" class="form-control" id="sliders" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_slider">Add Slider <span class="text-red">*</span></label>
                                                <input type="text" name="add_slider" class="form-control" id="add_slider" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_slider">Edit Slider <span class="text-red">*</span></label>
                                                <input type="text" name="edit_slider" class="form-control" id="edit_slider" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="delete">Delete <span class="text-red">*</span></label>
                                                <input type="text" name="delete" class="form-control" id="delete" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="close">Close <span class="text-red">*</span></label>
                                                <input type="text" name="close" class="form-control" id="close" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="you_wont_be_able_to_revert_this">You wont be able to revert this! <span class="text-red">*</span></label>
                                                <input type="text" name="you_wont_be_able_to_revert_this" class="form-control" id="you_wont_be_able_to_revert_this" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cancel">Cancel <span class="text-red">*</span></label>
                                                <input type="text" name="cancel" class="form-control" id="cancel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yes_delete_it">Yes, delete it! <span class="text-red">*</span></label>
                                                <input type="text" name="yes_delete_it" class="form-control" id="yes_delete_it" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="order">Order <span class="text-red">*</span></label>
                                                <input type="text" name="order" class="form-control" id="order" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video">Video <span class="text-red">*</span></label>
                                                <input type="text" name="video" class="form-control" id="video" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="information_list">Information List <span class="text-red">*</span></label>
                                                <input type="text" name="information_list" class="form-control" id="information_list" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_info">Add Info <span class="text-red">*</span></label>
                                                <input type="text" name="add_info" class="form-control" id="add_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_new">Add New <span class="text-red">*</span></label>
                                                <input type="text" name="add_new" class="form-control" id="add_new" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_info">Edit Info <span class="text-red">*</span></label>
                                                <input type="text" name="edit_info" class="form-control" id="edit_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="action">Action <span class="text-red">*</span></label>
                                                <input type="text" name="action" class="form-control" id="action" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content2">
                            @if (isset($content_two_group_keyword))
                                <form action="{{ route('content-two-group-keyword.update_content_two_group_keyword', $content_two_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" value="{{ $content_two_group_keyword->services }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_service">Add Service <span class="text-red">*</span></label>
                                                <input type="text" name="add_service" class="form-control" id="add_service" value="{{ $content_two_group_keyword->add_service }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_service">Edit Service <span class="text-red">*</span></label>
                                                <input type="text" name="edit_service" class="form-control" id="edit_service" value="{{ $content_two_group_keyword->edit_service }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="icon">Icon <span class="text-red">*</span></label>
                                                <input type="text" name="icon" class="form-control" id="icon" value="{{ $content_two_group_keyword->icon }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_title_and_desc">Section Title/Description <span class="text-red">*</span></label>
                                                <input type="text" name="section_title_and_desc" class="form-control" id="section_title_and_desc" value="{{ $content_two_group_keyword->section_title_and_desc }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="features">Features <span class="text-red">*</span></label>
                                                <input type="text" name="features" class="form-control" id="features" value="{{ $content_two_group_keyword->features }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_feature">Add Feature <span class="text-red">*</span></label>
                                                <input type="text" name="add_feature" class="form-control" id="add_feature" value="{{ $content_two_group_keyword->add_feature }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_feature">Edit Feature <span class="text-red">*</span></label>
                                                <input type="text" name="edit_feature" class="form-control" id="edit_feature" value="{{ $content_two_group_keyword->edit_feature }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_counter">Add Counter <span class="text-red">*</span></label>
                                                <input type="text" name="add_counter" class="form-control" id="add_counter" value="{{ $content_two_group_keyword->add_counter }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_counter">Edit Counter <span class="text-red">*</span></label>
                                                <input type="text" name="edit_counter" class="form-control" id="edit_counter" value="{{ $content_two_group_keyword->edit_counter }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="timer">Timer <span class="text-red">*</span></label>
                                                <input type="text" name="timer" class="form-control" id="timer" value="{{ $content_two_group_keyword->timer }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="counters">Counters <span class="text-red">*</span></label>
                                                <input type="text" name="counters" class="form-control" id="counters" value="{{ $content_two_group_keyword->counters }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="how_to_install">How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="how_to_install" class="form-control" id="how_to_install" value="{{ $content_two_group_keyword->how_to_install }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_how_to_install">Add How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="add_how_to_install" class="form-control" id="add_how_to_install" value="{{ $content_two_group_keyword->add_how_to_install }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video_link">Video Link <span class="text-red">*</span></label>
                                                <input type="text" name="video_link" class="form-control" id="video_link" value="{{ $content_two_group_keyword->video_link }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_how_to_install">Edit How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="edit_how_to_install" class="form-control" id="edit_how_to_install" value="{{ $content_two_group_keyword->edit_how_to_install }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="screenshots">Screenshots <span class="text-red">*</span></label>
                                                <input type="text" name="screenshots" class="form-control" id="screenshots" value="{{ $content_two_group_keyword->screenshots }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_screenshot">Add Screenshot <span class="text-red">*</span></label>
                                                <input type="text" name="add_screenshot" class="form-control" id="add_screenshot" value="{{ $content_two_group_keyword->add_screenshot }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_screenshot">Edit Screenshot <span class="text-red">*</span></label>
                                                <input type="text" name="edit_screenshot" class="form-control" id="edit_screenshot" value="{{ $content_two_group_keyword->edit_screenshot }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="prices">Prices <span class="text-red">*</span></label>
                                                <input type="text" name="prices" class="form-control" id="prices" value="{{ $content_two_group_keyword->prices }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_price">Add Price <span class="text-red">*</span></label>
                                                <input type="text" name="add_price" class="form-control" id="add_price" value="{{ $content_two_group_keyword->add_price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_price">Edit Price <span class="text-red">*</span></label>
                                                <input type="text" name="edit_price" class="form-control" id="edit_price" value="{{ $content_two_group_keyword->edit_price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="currency">Currency <span class="text-red">*</span></label>
                                                <input type="text" name="currency" class="form-control" id="currency" value="{{ $content_two_group_keyword->currency }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price">Price <span class="text-red">*</span></label>
                                                <input type="text" name="price" class="form-control" id="price" value="{{ $content_two_group_keyword->price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="time">Time <span class="text-red">*</span></label>
                                                <input type="text" name="time" class="form-control" id="time" value="{{ $content_two_group_keyword->time }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="badge">Description <span class="text-red">*</span></label>
                                                <input type="text" name="badge" class="form-control" id="badge" value="{{ $content_two_group_keyword->badge }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_take_with_features_semicolon">Please take with features semicolon(;). <span class="text-red">*</span></label>
                                                <input type="text" name="please_take_with_features_semicolon" class="form-control" id="please_take_with_features_semicolon" value="{{ $content_two_group_keyword->please_take_with_features_semicolon }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" value="{{ $content_two_group_keyword->teams }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_team">Add Team <span class="text-red">*</span></label>
                                                <input type="text" name="add_team" class="form-control" id="add_team" value="{{ $content_two_group_keyword->add_team }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_team">Edit Team <span class="text-red">*</span></label>
                                                <input type="text" name="edit_team" class="form-control" id="edit_team" value="{{ $content_two_group_keyword->edit_team }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-red">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ $content_two_group_keyword->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="job">Job <span class="text-red">*</span></label>
                                                <input type="text" name="job" class="form-control" id="job" value="{{ $content_two_group_keyword->job }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-two-group-keyword.store_content_two_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_service">Add Service <span class="text-red">*</span></label>
                                                <input type="text" name="add_service" class="form-control" id="add_service" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_service">Edit Service <span class="text-red">*</span></label>
                                                <input type="text" name="edit_service" class="form-control" id="edit_service" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="icon">Icon <span class="text-red">*</span></label>
                                                <input type="text" name="icon" class="form-control" id="icon" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_title_and_desc">Section Title/Description <span class="text-red">*</span></label>
                                                <input type="text" name="section_title_and_desc" class="form-control" id="section_title_and_desc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="features">Features <span class="text-red">*</span></label>
                                                <input type="text" name="features" class="form-control" id="features" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_feature">Add Feature <span class="text-red">*</span></label>
                                                <input type="text" name="add_feature" class="form-control" id="add_feature" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_feature">Edit Feature <span class="text-red">*</span></label>
                                                <input type="text" name="edit_feature" class="form-control" id="edit_feature" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_counter">Add Counter <span class="text-red">*</span></label>
                                                <input type="text" name="add_counter" class="form-control" id="add_counter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_counter">Edit Counter <span class="text-red">*</span></label>
                                                <input type="text" name="edit_counter" class="form-control" id="edit_counter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="timer">Timer <span class="text-red">*</span></label>
                                                <input type="text" name="timer" class="form-control" id="timer" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="counters">Counters <span class="text-red">*</span></label>
                                                <input type="text" name="counters" class="form-control" id="counters" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="how_to_install">How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="how_to_install" class="form-control" id="how_to_install" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_how_to_install">Add How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="add_how_to_install" class="form-control" id="add_how_to_install" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="video_link">Video Link <span class="text-red">*</span></label>
                                                <input type="text" name="video_link" class="form-control" id="video_link" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_how_to_install">Edit How To Install <span class="text-red">*</span></label>
                                                <input type="text" name="edit_how_to_install" class="form-control" id="edit_how_to_install" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="screenshots">Screenshots <span class="text-red">*</span></label>
                                                <input type="text" name="screenshots" class="form-control" id="screenshots" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_screenshot">Add Screenshot <span class="text-red">*</span></label>
                                                <input type="text" name="add_screenshot" class="form-control" id="add_screenshot" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_screenshot">Edit Screenshot <span class="text-red">*</span></label>
                                                <input type="text" name="edit_screenshot" class="form-control" id="edit_screenshot" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="prices">Prices <span class="text-red">*</span></label>
                                                <input type="text" name="prices" class="form-control" id="prices" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_price">Add Price <span class="text-red">*</span></label>
                                                <input type="text" name="add_price" class="form-control" id="add_price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_price">Edit Price <span class="text-red">*</span></label>
                                                <input type="text" name="edit_price" class="form-control" id="edit_price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="currency">Currency <span class="text-red">*</span></label>
                                                <input type="text" name="currency" class="form-control" id="currency" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price">Price <span class="text-red">*</span></label>
                                                <input type="text" name="price" class="form-control" id="price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="time">Time <span class="text-red">*</span></label>
                                                <input type="text" name="time" class="form-control" id="time" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="badge">Badge <span class="text-red">*</span></label>
                                                <input type="text" name="badge" class="form-control" id="badge" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_take_with_features_semicolon">Please take with features semicolon(;). <span class="text-red">*</span></label>
                                                <input type="text" name="please_take_with_features_semicolon" class="form-control" id="please_take_with_features_semicolon" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_team">Add Team <span class="text-red">*</span></label>
                                                <input type="text" name="add_team" class="form-control" id="add_team" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_team">Edit Team <span class="text-red">*</span></label>
                                                <input type="text" name="edit_team" class="form-control" id="edit_team" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-red">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="job">Job <span class="text-red">*</span></label>
                                                <input type="text" name="job" class="form-control" id="job" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content3">
                            @if (isset($content_three_group_keyword))
                                <form action="{{ route('content-three-group-keyword.update_content_three_group_keyword', $content_three_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="link">Link <span class="text-red">*</span></label>
                                                <input type="text" name="link" class="form-control" id="link" value="{{ $content_three_group_keyword->link }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs" value="{{ $content_three_group_keyword->faqs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_faq">Add Faq <span class="text-red">*</span></label>
                                                <input type="text" name="add_faq" class="form-control" id="add_faq" value="{{ $content_three_group_keyword->add_faq }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_faq">Edit Faq <span class="text-red">*</span></label>
                                                <input type="text" name="edit_faq" class="form-control" id="edit_faq" value="{{ $content_three_group_keyword->edit_faq }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="question">Question <span class="text-red">*</span></label>
                                                <input type="text" name="question" class="form-control" id="question" value="{{ $content_three_group_keyword->question }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="answer">Answer <span class="text-red">*</span></label>
                                                <input type="text" name="answer" class="form-control" id="answer" value="{{ $content_three_group_keyword->answer }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_info">Site Info <span class="text-red">*</span></label>
                                                <input type="text" name="site_info" class="form-control" id="site_info" value="{{ $content_three_group_keyword->site_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="copyright">Copyright <span class="text-red">*</span></label>
                                                <input type="text" name="copyright" class="form-control" id="copyright" value="{{ $content_three_group_keyword->copyright }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="favicon_image">Favicon <span class="text-red">*</span></label>
                                                <input type="text" name="favicon_image" class="form-control" id="favicon_image" value="{{ $content_three_group_keyword->favicon_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin_logo_image">Admin Logo <span class="text-red">*</span></label>
                                                <input type="text" name="admin_logo_image" class="form-control" id="admin_logo_image" value="{{ $content_three_group_keyword->admin_logo_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin_small_logo_image">Admin Small Logo <span class="text-red">*</span></label>
                                                <input type="text" name="admin_small_logo_image" class="form-control" id="admin_small_logo_image" value="{{ $content_three_group_keyword->admin_small_logo_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_white_logo_image">Site White Logo <span class="text-red">*</span></label>
                                                <input type="text" name="site_white_logo_image" class="form-control" id="site_white_logo_image" value="{{ $content_three_group_keyword->site_white_logo_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_colored_logo_image">Site Colored Logo <span class="text-red">*</span></label>
                                                <input type="text" name="site_colored_logo_image" class="form-control" id="site_colored_logo_image" value="{{ $content_three_group_keyword->site_colored_logo_image }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="google_analytic">Google Analytic <span class="text-red">*</span></label>
                                                <input type="text" name="google_analytic" class="form-control" id="google_analytic" value="{{ $content_three_group_keyword->google_analytic }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seo">Seo <span class="text-red">*</span></label>
                                                <input type="text" name="seo" class="form-control" id="seo" value="{{ $content_three_group_keyword->seo }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_name">Site Name <span class="text-red">*</span></label>
                                                <input type="text" name="site_name" class="form-control" id="site_name" value="{{ $content_three_group_keyword->site_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_desc">Site Description <span class="text-red">*</span></label>
                                                <input type="text" name="site_desc" class="form-control" id="site_desc" value="{{ $content_three_group_keyword->site_desc }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_keywords">Site Keywords <span class="text-red">*</span></label>
                                                <input type="text" name="site_keywords" class="form-control" id="site_keywords" value="{{ $content_three_group_keyword->site_keywords }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seperate_with_commas">Seperate with commas <span class="text-red">*</span></label>
                                                <input type="text" name="seperate_with_commas" class="form-control" id="seperate_with_commas" value="{{ $content_three_group_keyword->seperate_with_commas }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" value="{{ $content_three_group_keyword->categories }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_category">Add Category <span class="text-red">*</span></label>
                                                <input type="text" name="add_category" class="form-control" id="add_category" value="{{ $content_three_group_keyword->add_category }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_category">Edit Category <span class="text-red">*</span></label>
                                                <input type="text" name="edit_category" class="form-control" id="edit_category" value="{{ $content_three_group_keyword->edit_category }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category_name">Category Name <span class="text-red">*</span></label>
                                                <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $content_three_group_keyword->category_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="status">Status <span class="text-red">*</span></label>
                                                <input type="text" name="status" class="form-control" id="status" value="{{ $content_three_group_keyword->status }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="select_your_option">Select Your Option <span class="text-red">*</span></label>
                                                <input type="text" name="select_your_option" class="form-control" id="select_your_option" value="{{ $content_three_group_keyword->select_your_option }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="enable">Enable <span class="text-red">*</span></label>
                                                <input type="text" name="enable" class="form-control" id="enable" value="{{ $content_three_group_keyword->enable }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="disable">Disable <span class="text-red">*</span></label>
                                                <input type="text" name="disable" class="form-control" id="disable" value="{{ $content_three_group_keyword->disable }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_create_a_category">Please create a category. <span class="text-red">*</span></label>
                                                <input type="text" name="please_create_a_category" class="form-control" id="please_create_a_category" value="{{ $content_three_group_keyword->please_create_a_category }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blogs">Blogs <span class="text-red">*</span></label>
                                                <input type="text" name="blogs" class="form-control" id="blogs" value="{{ $content_three_group_keyword->blogs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_blog">Add Blog <span class="text-red">*</span></label>
                                                <input type="text" name="add_blog" class="form-control" id="add_blog" value="{{ $content_three_group_keyword->add_blog }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_blog">Edit Blog <span class="text-red">*</span></label>
                                                <input type="text" name="edit_blog" class="form-control" id="edit_blog" value="{{ $content_three_group_keyword->edit_blog }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="short_desc">Short Description <span class="text-red">*</span></label>
                                                <input type="text" name="short_desc" class="form-control" id="short_desc" value="{{ $content_three_group_keyword->short_desc }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-three-group-keyword.store_content_three_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="link">Link <span class="text-red">*</span></label>
                                                <input type="text" name="link" class="form-control" id="link" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_faq">Add Faq <span class="text-red">*</span></label>
                                                <input type="text" name="add_faq" class="form-control" id="add_faq" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_faq">Edit Faq <span class="text-red">*</span></label>
                                                <input type="text" name="edit_faq" class="form-control" id="edit_faq" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="question">Question <span class="text-red">*</span></label>
                                                <input type="text" name="question" class="form-control" id="question" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="answer">Answer <span class="text-red">*</span></label>
                                                <input type="text" name="answer" class="form-control" id="answer" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_info">Site Info <span class="text-red">*</span></label>
                                                <input type="text" name="site_info" class="form-control" id="site_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="copyright">Copyright <span class="text-red">*</span></label>
                                                <input type="text" name="copyright" class="form-control" id="copyright" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="favicon_image">Favicon <span class="text-red">*</span></label>
                                                <input type="text" name="favicon_image" class="form-control" id="favicon_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin_logo_image">Admin Logo <span class="text-red">*</span></label>
                                                <input type="text" name="admin_logo_image" class="form-control" id="admin_logo_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin_small_logo_image">Admin Small Logo <span class="text-red">*</span></label>
                                                <input type="text" name="admin_small_logo_image" class="form-control" id="admin_small_logo_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_white_logo_image">Site White Logo <span class="text-red">*</span></label>
                                                <input type="text" name="site_white_logo_image" class="form-control" id="site_white_logo_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_colored_logo_image">Site Colored Logo <span class="text-red">*</span></label>
                                                <input type="text" name="site_colored_logo_image" class="form-control" id="site_colored_logo_image" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="google_analytic">Google Analytic <span class="text-red">*</span></label>
                                                <input type="text" name="google_analytic" class="form-control" id="google_analytic" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seo">Seo <span class="text-red">*</span></label>
                                                <input type="text" name="seo" class="form-control" id="seo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_name">Site Name <span class="text-red">*</span></label>
                                                <input type="text" name="site_name" class="form-control" id="site_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_desc">Site Description <span class="text-red">*</span></label>
                                                <input type="text" name="site_desc" class="form-control" id="site_desc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_keywords">Site Keywords <span class="text-red">*</span></label>
                                                <input type="text" name="site_keywords" class="form-control" id="site_keywords" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seperate_with_commas">Seperate with commas <span class="text-red">*</span></label>
                                                <input type="text" name="seperate_with_commas" class="form-control" id="seperate_with_commas" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_category">Add Category <span class="text-red">*</span></label>
                                                <input type="text" name="add_category" class="form-control" id="add_category" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_category">Edit Category <span class="text-red">*</span></label>
                                                <input type="text" name="edit_category" class="form-control" id="edit_category" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category_name">Category Name <span class="text-red">*</span></label>
                                                <input type="text" name="category_name" class="form-control" id="category_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="status">Status <span class="text-red">*</span></label>
                                                <input type="text" name="status" class="form-control" id="status" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="select_your_option">Select Your Option <span class="text-red">*</span></label>
                                                <input type="text" name="select_your_option" class="form-control" id="select_your_option" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="enable">Enable <span class="text-red">*</span></label>
                                                <input type="text" name="enable" class="form-control" id="enable" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="disable">Disable <span class="text-red">*</span></label>
                                                <input type="text" name="disable" class="form-control" id="disable" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_create_a_category">Please create a category. <span class="text-red">*</span></label>
                                                <input type="text" name="please_create_a_category" class="form-control" id="please_create_a_category" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blogs">Blogs <span class="text-red">*</span></label>
                                                <input type="text" name="blogs" class="form-control" id="blogs" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_blog">Add Blog <span class="text-red">*</span></label>
                                                <input type="text" name="add_blog" class="form-control" id="add_blog" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_blog">Edit Blog <span class="text-red">*</span></label>
                                                <input type="text" name="edit_blog" class="form-control" id="edit_blog" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="short_desc">Short Description <span class="text-red">*</span></label>
                                                <input type="text" name="short_desc" class="form-control" id="short_desc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content4">
                            @if (isset($content_four_group_keyword))
                                <form action="{{ route('content-four-group-keyword.update_content_four_group_keyword', $content_four_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tag">Tag <span class="text-red">*</span></label>
                                                <input type="text" name="tag" class="form-control" id="tag" value="{{ $content_four_group_keyword->tag }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="author">Author <span class="text-red">*</span></label>
                                                <input type="text" name="author" class="form-control" id="author" value="{{ $content_four_group_keyword->author }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category">Category <span class="text-red">*</span></label>
                                                <input type="text" name="category" class="form-control" id="category" value="{{ $content_four_group_keyword->category }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="post_date">Post Date <span class="text-red">*</span></label>
                                                <input type="text" name="post_date" class="form-control" id="post_date" value="{{ $content_four_group_keyword->post_date }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view">View <span class="text-red">*</span></label>
                                                <input type="text" name="view" class="form-control" id="view" value="{{ $content_four_group_keyword->view }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="homepage_versions">Homepage Versions <span class="text-red">*</span></label>
                                                <input type="text" name="homepage_versions" class="form-control" id="homepage_versions" value="{{ $content_four_group_keyword->homepage_versions }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="choose_version">Choose Version <span class="text-red">*</span></label>
                                                <input type="text" name="choose_version" class="form-control" id="choose_version" value="{{ $content_four_group_keyword->choose_version }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="map_iframe">Map Iframe (link in src) <span class="text-red">*</span></label>
                                                <input type="text" name="map_iframe" class="form-control" id="map_iframe" value="{{ $content_four_group_keyword->map_iframe }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="map_iframe_desc_placeholder">Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside. <span class="text-red">*</span></label>
                                                <input type="text" name="map_iframe_desc_placeholder" class="form-control" id="map_iframe_desc_placeholder" value="{{ $content_four_group_keyword->map_iframe_desc_placeholder }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" value="{{ $content_four_group_keyword->contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_contact">Add Contact <span class="text-red">*</span></label>
                                                <input type="text" name="add_contact" class="form-control" id="add_contact" value="{{ $content_four_group_keyword->add_contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_contact">Edit Contact <span class="text-red">*</span></label>
                                                <input type="text" name="edit_contact" class="form-control" id="edit_contact" value="{{ $content_four_group_keyword->edit_contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="apps">Apps <span class="text-red">*</span></label>
                                                <input type="text" name="apps" class="form-control" id="apps" value="{{ $content_four_group_keyword->apps }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_app">Add App <span class="text-red">*</span></label>
                                                <input type="text" name="add_app" class="form-control" id="add_app" value="{{ $content_four_group_keyword->add_app }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_app">Edit App <span class="text-red">*</span></label>
                                                <input type="text" name="edit_app" class="form-control" id="edit_app" value="{{ $content_four_group_keyword->edit_app }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_images">Site Images <span class="text-red">*</span></label>
                                                <input type="text" name="site_images" class="form-control" id="site_images" value="{{ $content_four_group_keyword->site_images }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="themes">Themes <span class="text-red">*</span></label>
                                                <input type="text" name="themes" class="form-control" id="themes" value="{{ $content_four_group_keyword->themes }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="choose_theme">Choose Theme <span class="text-red">*</span></label>
                                                <input type="text" name="choose_theme" class="form-control" id="choose_theme" value="{{ $content_four_group_keyword->choose_theme }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="animated_desc">Animated Description <span class="text-red">*</span></label>
                                                <input type="text" name="animated_desc" class="form-control" id="animated_desc" value="{{ $content_four_group_keyword->animated_desc }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="top_title">Top Title <span class="text-red">*</span></label>
                                                <input type="text" name="top_title" class="form-control" id="top_title" value="{{ $content_four_group_keyword->top_title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" value="{{ $content_four_group_keyword->skills }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_skill">Add Skill <span class="text-red">*</span></label>
                                                <input type="text" name="add_skill" class="form-control" id="add_skill" value="{{ $content_four_group_keyword->add_skill }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_skill">Edit Skill <span class="text-red">*</span></label>
                                                <input type="text" name="edit_skill" class="form-control" id="edit_skill" value="{{ $content_four_group_keyword->edit_skill }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_title">Section Title <span class="text-red">*</span></label>
                                                <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $content_four_group_keyword->section_title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="percent_rate">Percent Rate <span class="text-red">*</span></label>
                                                <input type="text" name="percent_rate" class="form-control" id="percent_rate" value="{{ $content_four_group_keyword->percent_rate }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_service_item">Add Service Item <span class="text-red">*</span></label>
                                                <input type="text" name="add_service_item" class="form-control" id="add_service_item" value="{{ $content_four_group_keyword->add_service_item }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_service_item">Edit Service Item <span class="text-red">*</span></label>
                                                <input type="text" name="edit_service_item" class="form-control" id="edit_service_item" value="{{ $content_four_group_keyword->edit_service_item }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="item">Item <span class="text-red">*</span></label>
                                                <input type="text" name="item" class="form-control" id="item" value="{{ $content_four_group_keyword->item }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="works">Works <span class="text-red">*</span></label>
                                                <input type="text" name="works" class="form-control" id="works" value="{{ $content_four_group_keyword->works }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_work">Add Work <span class="text-red">*</span></label>
                                                <input type="text" name="add_work" class="form-control" id="add_work" value="{{ $content_four_group_keyword->add_work }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_work">Edit Work <span class="text-red">*</span></label>
                                                <input type="text" name="edit_work" class="form-control" id="edit_work" value="{{ $content_four_group_keyword->edit_work }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="likes">Likes <span class="text-red">*</span></label>
                                                <input type="text" name="likes" class="form-control" id="likes" value="{{ $content_four_group_keyword->likes }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-four-group-keyword.store_content_four_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tag">Tag <span class="text-red">*</span></label>
                                                <input type="text" name="tag" class="form-control" id="tag" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="author">Author <span class="text-red">*</span></label>
                                                <input type="text" name="author" class="form-control" id="author" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category">Category <span class="text-red">*</span></label>
                                                <input type="text" name="category" class="form-control" id="category" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="post_date">Post Date <span class="text-red">*</span></label>
                                                <input type="text" name="post_date" class="form-control" id="post_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view">View <span class="text-red">*</span></label>
                                                <input type="text" name="view" class="form-control" id="view" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="homepage_versions">Homepage Versions <span class="text-red">*</span></label>
                                                <input type="text" name="homepage_versions" class="form-control" id="homepage_versions" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="choose_version">Choose Version <span class="text-red">*</span></label>
                                                <input type="text" name="choose_version" class="form-control" id="choose_version"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="map_iframe">Map Iframe (link in src) <span class="text-red">*</span></label>
                                                <input type="text" name="map_iframe" class="form-control" id="map_iframe" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="map_iframe_desc_placeholder">Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside. <span class="text-red">*</span></label>
                                                <input type="text" name="map_iframe_desc_placeholder" class="form-control" id="map_iframe_desc_placeholder" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_contact">Add Contact <span class="text-red">*</span></label>
                                                <input type="text" name="add_contact" class="form-control" id="add_contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_contact">Edit Contact <span class="text-red">*</span></label>
                                                <input type="text" name="edit_contact" class="form-control" id="edit_contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="apps">Apps <span class="text-red">*</span></label>
                                                <input type="text" name="apps" class="form-control" id="apps" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_app">Add App <span class="text-red">*</span></label>
                                                <input type="text" name="add_app" class="form-control" id="add_app" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_app">Edit App <span class="text-red">*</span></label>
                                                <input type="text" name="edit_app" class="form-control" id="edit_app" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="site_images">Site Images <span class="text-red">*</span></label>
                                                <input type="text" name="site_images" class="form-control" id="site_images" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="themes">Themes <span class="text-red">*</span></label>
                                                <input type="text" name="themes" class="form-control" id="themes" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="choose_theme">Choose Theme <span class="text-red">*</span></label>
                                                <input type="text" name="choose_theme" class="form-control" id="choose_theme" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="animated_desc">Animated Description <span class="text-red">*</span></label>
                                                <input type="text" name="animated_desc" class="form-control" id="animated_desc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="top_title">Top Title <span class="text-red">*</span></label>
                                                <input type="text" name="top_title" class="form-control" id="top_title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_skill">Add Skill <span class="text-red">*</span></label>
                                                <input type="text" name="add_skill" class="form-control" id="add_skill" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_skill">Edit Skill <span class="text-red">*</span></label>
                                                <input type="text" name="edit_skill" class="form-control" id="edit_skill" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_title">Section Title <span class="text-red">*</span></label>
                                                <input type="text" name="section_title" class="form-control" id="section_title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="percent_rate">Percent Rate <span class="text-red">*</span></label>
                                                <input type="text" name="percent_rate" class="form-control" id="percent_rate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_service_item">Add Service Item <span class="text-red">*</span></label>
                                                <input type="text" name="add_service_item" class="form-control" id="add_service_item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_service_item">Edit Service Item <span class="text-red">*</span></label>
                                                <input type="text" name="edit_service_item" class="form-control" id="edit_service_item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="item">Item <span class="text-red">*</span></label>
                                                <input type="text" name="item" class="form-control" id="item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="works">Works <span class="text-red">*</span></label>
                                                <input type="text" name="works" class="form-control" id="works" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_work">Add Work <span class="text-red">*</span></label>
                                                <input type="text" name="add_work" class="form-control" id="add_work" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_work">Edit Work <span class="text-red">*</span></label>
                                                <input type="text" name="edit_work" class="form-control" id="edit_work" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="likes">Likes <span class="text-red">*</span></label>
                                                <input type="text" name="likes" class="form-control" id="likes" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content5">
                            @if (isset($content_five_group_keyword))
                                <form action="{{ route('content-five-group-keyword.update_content_five_group_keyword', $content_five_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_work_item">Add Work Item <span class="text-red">*</span></label>
                                                <input type="text" name="add_work_item" class="form-control" id="add_work_item" value="{{ $content_five_group_keyword->add_work_item }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_work_item">Edit Work Item <span class="text-red">*</span></label>
                                                <input type="text" name="edit_work_item" class="form-control" id="edit_work_item" value="{{ $content_five_group_keyword->edit_work_item }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="work_items">Work Items <span class="text-red">*</span></label>
                                                <input type="text" name="work_items" class="form-control" id="work_items" value="{{ $content_five_group_keyword->work_items }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_to_action">Call To Action <span class="text-red">*</span></label>
                                                <input type="text" name="call_to_action" class="form-control" id="call_to_action" value="{{ $content_five_group_keyword->call_to_action }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" value="{{ $content_five_group_keyword->galleries }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_gallery">Add Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="add_gallery" class="form-control" id="add_gallery" value="{{ $content_five_group_keyword->add_gallery }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_gallery">Edit Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="edit_gallery" class="form-control" id="edit_gallery" value="{{ $content_five_group_keyword->edit_gallery }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="monthly">Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="monthly" class="form-control" id="monthly" value="{{ $content_five_group_keyword->monthly }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yearly">Yearly <span class="text-red">*</span></label>
                                                <input type="text" name="yearly" class="form-control" id="yearly" value="{{ $content_five_group_keyword->yearly }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="languages">Languages <span class="text-red">*</span></label>
                                                <input type="text" name="languages" class="form-control" id="languages" value="{{ $content_five_group_keyword->languages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_language">Add Language <span class="text-red">*</span></label>
                                                <input type="text" name="add_language" class="form-control" id="add_language" value="{{ $content_five_group_keyword->add_language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_language">Edit Language <span class="text-red">*</span></label>
                                                <input type="text" name="edit_language" class="form-control" id="edit_language" value="{{ $content_five_group_keyword->edit_language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="language_name">Language Name <span class="text-red">*</span></label>
                                                <input type="text" name="language_name" class="form-control" id="language_name" value="{{ $content_five_group_keyword->language_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="language_code">Language Code <span class="text-red">*</span></label>
                                                <input type="text" name="language_code" class="form-control" id="language_code" value="{{ $content_five_group_keyword->language_code }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="direction">Direction <span class="text-red">*</span></label>
                                                <input type="text" name="direction" class="form-control" id="direction" value="{{ $content_five_group_keyword->direction }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="keywords">Keywords <span class="text-red">*</span></label>
                                                <input type="text" name="keywords" class="form-control" id="keywords" value="{{ $content_five_group_keyword->keywords }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="for_admin_panel">For Admin Panel <span class="text-red">*</span></label>
                                                <input type="text" name="for_admin_panel" class="form-control" id="for_admin_panel" value="{{ $content_five_group_keyword->for_admin_panel }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="for_frontend">For Frontend <span class="text-red">*</span></label>
                                                <input type="text" name="for_frontend" class="form-control" id="for_frontend" value="{{ $content_five_group_keyword->for_frontend }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="content_group">Content Group <span class="text-red">*</span></label>
                                                <input type="text" name="content_group" class="form-control" id="content_group" value="{{ $content_five_group_keyword->content_group }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="menu">Menu <span class="text-red">*</span></label>
                                                <input type="text" name="menu" class="form-control" id="menu" value="{{ $content_five_group_keyword->menu }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="service_items">Service Items <span class="text-red">*</span></label>
                                                <input type="text" name="service_items" class="form-control" id="service_items" value="{{ $content_five_group_keyword->service_items }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="external_url">External Url <span class="text-red">*</span></label>
                                                <input type="text" name="external_url" class="form-control" id="external_url" value="{{ $content_five_group_keyword->external_url }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="socials">Socials <span class="text-red">*</span></label>
                                                <input type="text" name="socials" class="form-control" id="socials" value="{{ $content_five_group_keyword->socials }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_social">Add Social <span class="text-red">*</span></label>
                                                <input type="text" name="add_social" class="form-control" id="add_social" value="{{ $content_five_group_keyword->add_social }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_social">Edit Social <span class="text-red">*</span></label>
                                                <input type="text" name="edit_social" class="form-control" id="edit_social" value="{{ $content_five_group_keyword->edit_social }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quick_access_buttons">Quick Access Buttons <span class="text-red">*</span></label>
                                                <input type="text" name="quick_access_buttons" class="form-control" id="quick_access_buttons" value="{{ $content_five_group_keyword->quick_access_buttons }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email_or_phone">Email Or Phone Number <span class="text-red">*</span></label>
                                                <input type="text" name="email_or_phone" class="form-control" id="email_or_phone" value="{{ $content_five_group_keyword->email_or_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="breadcrumb">Breadcrumb <span class="text-red">*</span></label>
                                                <input type="text" name="breadcrumb" class="form-control" id="breadcrumb" value="{{ $content_five_group_keyword->breadcrumb }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color">Color <span class="text-red">*</span></label>
                                                <input type="text" name="color" class="form-control" id="color" value="{{ $content_five_group_keyword->color }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color_code">Color Code <span class="text-red">*</span></label>
                                                <input type="text" name="color_code" class="form-control" id="color_code" value="{{ $content_five_group_keyword->color_code }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ready_color_option">Ready Color Option <span class="text-red">*</span></label>
                                                <input type="text" name="ready_color_option" class="form-control" id="ready_color_option" value="{{ $content_five_group_keyword->ready_color_option }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="this_color_option_will_be_deleted">This Color Option Will Be Deleted! <span class="text-red">*</span></label>
                                                <input type="text" name="this_color_option_will_be_deleted" class="form-control" id="this_color_option_will_be_deleted" value="{{ $content_five_group_keyword->this_color_option_will_be_deleted }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-five-group-keyword.store_content_five_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_work_item">Add Work Item <span class="text-red">*</span></label>
                                                <input type="text" name="add_work_item" class="form-control" id="add_work_item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_work_item">Edit Work Item <span class="text-red">*</span></label>
                                                <input type="text" name="edit_work_item" class="form-control" id="edit_work_item" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="work_items">Work Items <span class="text-red">*</span></label>
                                                <input type="text" name="work_items" class="form-control" id="work_items" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_to_action">Call To Action <span class="text-red">*</span></label>
                                                <input type="text" name="call_to_action" class="form-control" id="call_to_action" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_gallery">Add Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="add_gallery" class="form-control" id="add_gallery" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_gallery">Edit Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="edit_gallery" class="form-control" id="edit_gallery" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="monthly">Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="monthly" class="form-control" id="monthly" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yearly">Yearly <span class="text-red">*</span></label>
                                                <input type="text" name="yearly" class="form-control" id="yearly" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="languages">Languages <span class="text-red">*</span></label>
                                                <input type="text" name="languages" class="form-control" id="languages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_language">Add Language <span class="text-red">*</span></label>
                                                <input type="text" name="add_language" class="form-control" id="add_language" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_language">Edit Language <span class="text-red">*</span></label>
                                                <input type="text" name="edit_language" class="form-control" id="edit_language" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="language_name">Language Name <span class="text-red">*</span></label>
                                                <input type="text" name="language_name" class="form-control" id="language_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="language_code">Language Code <span class="text-red">*</span></label>
                                                <input type="text" name="language_code" class="form-control" id="language_code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="direction">Direction <span class="text-red">*</span></label>
                                                <input type="text" name="direction" class="form-control" id="direction" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="keywords">Keywords <span class="text-red">*</span></label>
                                                <input type="text" name="keywords" class="form-control" id="keywords" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="for_admin_panel">For Admin Panel <span class="text-red">*</span></label>
                                                <input type="text" name="for_admin_panel" class="form-control" id="for_admin_panel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="for_frontend">For Frontend <span class="text-red">*</span></label>
                                                <input type="text" name="for_frontend" class="form-control" id="for_frontend" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="content_group">Content Group <span class="text-red">*</span></label>
                                                <input type="text" name="content_group" class="form-control" id="content_group" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="menu">Menu <span class="text-red">*</span></label>
                                                <input type="text" name="menu" class="form-control" id="menu" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="service_items">Service Items <span class="text-red">*</span></label>
                                                <input type="text" name="service_items" class="form-control" id="service_items" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="external_url">External Url <span class="text-red">*</span></label>
                                                <input type="text" name="external_url" class="form-control" id="external_url" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="socials">Socials <span class="text-red">*</span></label>
                                                <input type="text" name="socials" class="form-control" id="socials" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_social">Add Social <span class="text-red">*</span></label>
                                                <input type="text" name="add_social" class="form-control" id="add_social" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_social">Edit Social <span class="text-red">*</span></label>
                                                <input type="text" name="edit_social" class="form-control" id="edit_social" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quick_access_buttons">Quick Access Buttons <span class="text-red">*</span></label>
                                                <input type="text" name="quick_access_buttons" class="form-control" id="quick_access_buttons" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email_or_phone">Email Or Phone Number <span class="text-red">*</span></label>
                                                <input type="text" name="email_or_phone" class="form-control" id="email_or_phone" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="breadcrumb">Breadcrumb <span class="text-red">*</span></label>
                                                <input type="text" name="breadcrumb" class="form-control" id="breadcrumb" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color">Color <span class="text-red">*</span></label>
                                                <input type="text" name="color" class="form-control" id="color" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="color_code">Color Code <span class="text-red">*</span></label>
                                                <input type="text" name="color_code" class="form-control" id="color_code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ready_color_option">Ready Color Option <span class="text-red">*</span></label>
                                                <input type="text" name="ready_color_option" class="form-control" id="ready_color_option" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="this_color_option_will_be_deleted">This Color Option Will Be Deleted! <span class="text-red">*</span></label>
                                                <input type="text" name="this_color_option_will_be_deleted" class="form-control" id="this_color_option_will_be_deleted" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="content6">
                            @if (isset($content_six_group_keyword))
                                <form action="{{ route('content-six-group-keyword.update_content_six_group_keyword', $content_six_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sections">Sections <span class="text-red">*</span></label>
                                                <input type="text" name="sections" class="form-control" id="sections" value="{{ $content_six_group_keyword->sections }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="hide">Hide <span class="text-red">*</span></label>
                                                <input type="text" name="hide" class="form-control" id="hide" value="{{ $content_six_group_keyword->hide }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="show">Show <span class="text-red">*</span></label>
                                                <input type="text" name="show" class="form-control" id="show" value="{{ $content_six_group_keyword->show }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" value="{{ $content_six_group_keyword->pages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_page">Add Page <span class="text-red">*</span></label>
                                                <input type="text" name="add_page" class="form-control" id="add_page" value="{{ $content_six_group_keyword->add_page }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_page">Edit Page <span class="text-red">*</span></label>
                                                <input type="text" name="edit_page" class="form-control" id="edit_page" value="{{ $content_six_group_keyword->edit_page }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yes">Yes <span class="text-red">*</span></label>
                                                <input type="text" name="yes" class="form-control" id="yes" value="{{ $content_six_group_keyword->yes }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="no">Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="no" class="form-control" id="no" value="{{ $content_six_group_keyword->no }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="display_footer_menu">Display Footer Menu? <span class="text-red">*</span></label>
                                                <input type="text" name="display_footer_menu" class="form-control" id="display_footer_menu" value="{{ $content_six_group_keyword->display_footer_menu }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="display_dropdown">Display Dropdown? <span class="text-red">*</span></label>
                                                <input type="text" name="display_dropdown" class="form-control" id="display_dropdown" value="{{ $content_six_group_keyword->display_dropdown }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="default_site_language">Default Site Language <span class="text-red">*</span></label>
                                                <input type="text" name="default_site_language" class="form-control" id="default_site_language" value="{{ $content_six_group_keyword->default_site_language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_try_again">Please try again! <span class="text-red">*</span></label>
                                                <input type="text" name="please_try_again" class="form-control" id="please_try_again" value="{{ $content_six_group_keyword->please_try_again }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="you_are_not_authorized">You are not authorized to delete this operation. <span class="text-red">*</span></label>
                                                <input type="text" name="you_are_not_authorized" class="form-control" id="you_are_not_authorized" value="{{ $content_six_group_keyword->you_are_not_authorized }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="which_language">Which language do you want to create the data? <span class="text-red">*</span></label>
                                                <input type="text" name="which_language" class="form-control" id="which_language" value="{{ $content_six_group_keyword->which_language }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="reminding">Please note that all the entries you create will be based on your chosen language. <span class="text-red">*</span></label>
                                                <input type="text" name="reminding" class="form-control" id="reminding" value="{{ $content_six_group_keyword->reminding }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-red">*</span></label>
                                                <input type="text" name="email" class="form-control" id="email" value="{{ $content_six_group_keyword->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="text-red">*</span></label>
                                                <input type="text" name="subject" class="form-control" id="subject" value="{{ $content_six_group_keyword->subject }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="message">Message <span class="text-red">*</span></label>
                                                <input type="text" name="message" class="form-control" id="message" value="{{ $content_six_group_keyword->message }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_status">Read Status <span class="text-red">*</span></label>
                                                <input type="text" name="read_status" class="form-control" id="read_status" value="{{ $content_six_group_keyword->read_status }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark_all_as_read">Mark All As Read <span class="text-red">*</span></label>
                                                <input type="text" name="mark_all_as_read" class="form-control" id="mark_all_as_read" value="{{ $content_six_group_keyword->mark_all_as_read }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark">Mark <span class="text-red">*</span></label>
                                                <input type="text" name="mark" class="form-control" id="mark" value="{{ $content_six_group_keyword->mark }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="messages">Messages <span class="text-red">*</span></label>
                                                <input type="text" name="messages" class="form-control" id="messages" value="{{ $content_six_group_keyword->messages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" value="{{ $content_six_group_keyword->testimonials }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_testimonial">Add Testimonial <span class="text-red">*</span></label>
                                                <input type="text" name="add_testimonial" class="form-control" id="add_testimonial" value="{{ $content_six_group_keyword->add_testimonial }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_testimonial">Edit Testimonial <span class="text-red">*</span></label>
                                                <input type="text" name="edit_testimonial" class="form-control" id="edit_testimonial" value="{{ $content_six_group_keyword->edit_testimonial }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comment">Comment <span class="text-red">*</span></label>
                                                <input type="text" name="comment" class="form-control" id="comment" value="{{ $content_six_group_keyword->comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" value="{{ $content_six_group_keyword->comments }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="approval_status">Approval Status <span class="text-red">*</span></label>
                                                <input type="text" name="approval_status" class="form-control" id="approval_status" value="{{ $content_six_group_keyword->approval_status }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark_all_as_approval">Mark All As Approval <span class="text-red">*</span></label>
                                                <input type="text" name="mark_all_as_approval" class="form-control" id="mark_all_as_approval" value="{{ $content_six_group_keyword->mark_all_as_approval }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read">Read <span class="text-red">*</span></label>
                                                <input type="text" name="read" class="form-control" id="read" value="{{ $content_six_group_keyword->read }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="unread">Unread <span class="text-red">*</span></label>
                                                <input type="text" name="unread" class="form-control" id="unread" value="{{ $content_six_group_keyword->unread }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="profile">Profile <span class="text-red">*</span></label>
                                                <input type="text" name="profile" class="form-control" id="profile" value="{{ $content_six_group_keyword->profile }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="change_password">Change Password <span class="text-red">*</span></label>
                                                <input type="text" name="change_password" class="form-control" id="change_password" value="{{ $content_six_group_keyword->change_password }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="current_password">Current Password <span class="text-red">*</span></label>
                                                <input type="text" name="current_password" class="form-control" id="current_password" value="{{ $content_six_group_keyword->current_password }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="new_password">New Password <span class="text-red">*</span></label>
                                                <input type="text" name="new_password" class="form-control" id="new_password" value="{{ $content_six_group_keyword->new_password }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password <span class="text-red">*</span></label>
                                                <input type="text" name="confirm_password" class="form-control" id="confirm_password" value="{{ $content_six_group_keyword->confirm_password }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="star">Star <span class="text-red">*</span></label>
                                                <input type="text" name="star" class="form-control" id="star" value="{{ $content_six_group_keyword->star }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('content-six-group-keyword.store_content_six_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sections">Sections <span class="text-red">*</span></label>
                                                <input type="text" name="sections" class="form-control" id="sections" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="hide">Hide <span class="text-red">*</span></label>
                                                <input type="text" name="hide" class="form-control" id="hide" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="show">Show <span class="text-red">*</span></label>
                                                <input type="text" name="show" class="form-control" id="show" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_page">Add Page <span class="text-red">*</span></label>
                                                <input type="text" name="add_page" class="form-control" id="add_page" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_page">Edit Page <span class="text-red">*</span></label>
                                                <input type="text" name="edit_page" class="form-control" id="edit_page" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yes">Yes <span class="text-red">*</span></label>
                                                <input type="text" name="yes" class="form-control" id="yes" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="no">Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="no" class="form-control" id="no" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="display_footer_menu">Display Footer Menu? <span class="text-red">*</span></label>
                                                <input type="text" name="display_footer_menu" class="form-control" id="display_footer_menu" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="display_dropdown">Display Dropdown? <span class="text-red">*</span></label>
                                                <input type="text" name="display_dropdown" class="form-control" id="display_dropdown" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="default_site_language">Default Site Language <span class="text-red">*</span></label>
                                                <input type="text" name="default_site_language" class="form-control" id="default_site_language" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_try_again">Please try again! <span class="text-red">*</span></label>
                                                <input type="text" name="please_try_again" class="form-control" id="please_try_again" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="you_are_not_authorized">You are not authorized to delete this operation. <span class="text-red">*</span></label>
                                                <input type="text" name="you_are_not_authorized" class="form-control" id="you_are_not_authorized" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="which_language">Which language do you want to create the data? <span class="text-red">*</span></label>
                                                <input type="text" name="which_language" class="form-control" id="which_language" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="reminding">Please note that all the entries you create will be based on your chosen language. <span class="text-red">*</span></label>
                                                <input type="text" name="reminding" class="form-control" id="reminding" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-red">*</span></label>
                                                <input type="text" name="email" class="form-control" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="text-red">*</span></label>
                                                <input type="text" name="subject" class="form-control" id="subject" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="message">Message <span class="text-red">*</span></label>
                                                <input type="text" name="message" class="form-control" id="message" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_status">Read Status <span class="text-red">*</span></label>
                                                <input type="text" name="read_status" class="form-control" id="read_status" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark_all_as_read">Mark All As Read <span class="text-red">*</span></label>
                                                <input type="text" name="mark_all_as_read" class="form-control" id="mark_all_as_read" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark">Mark <span class="text-red">*</span></label>
                                                <input type="text" name="mark" class="form-control" id="mark" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="messages">Messages <span class="text-red">*</span></label>
                                                <input type="text" name="messages" class="form-control" id="messages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="add_testimonial">Add Testimonial <span class="text-red">*</span></label>
                                                <input type="text" name="add_testimonial" class="form-control" id="add_testimonial" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="edit_testimonial">Edit Testimonial <span class="text-red">*</span></label>
                                                <input type="text" name="edit_testimonial" class="form-control" id="edit_testimonial" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comment">Comment <span class="text-red">*</span></label>
                                                <input type="text" name="comment" class="form-control" id="comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="approval_status">Approval Status <span class="text-red">*</span></label>
                                                <input type="text" name="approval_status" class="form-control" id="approval_status" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mark_all_as_approval">Mark All As Approval <span class="text-red">*</span></label>
                                                <input type="text" name="mark_all_as_approval" class="form-control" id="mark_all_as_approval" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read">Read <span class="text-red">*</span></label>
                                                <input type="text" name="read" class="form-control" id="read" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="unread">Unread <span class="text-red">*</span></label>
                                                <input type="text" name="unread" class="form-control" id="unread"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="profile">Profile <span class="text-red">*</span></label>
                                                <input type="text" name="profile" class="form-control" id="profile" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="change_password">Change Password <span class="text-red">*</span></label>
                                                <input type="text" name="change_password" class="form-control" id="change_password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="current_password">Current Password <span class="text-red">*</span></label>
                                                <input type="text" name="current_password" class="form-control" id="current_password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="new_password">New Password <span class="text-red">*</span></label>
                                                <input type="text" name="new_password" class="form-control" id="new_password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password <span class="text-red">*</span></label>
                                                <input type="text" name="confirm_password" class="form-control" id="confirm_password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="star">Star <span class="text-red">*</span></label>
                                                <input type="text" name="star" class="form-control" id="star" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@endsection