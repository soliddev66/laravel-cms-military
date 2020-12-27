@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 height-card box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('content.for_frontend') }}</h4>
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#frontend1" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#frontend2" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 2
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  show active" id="frontend1">
                            @if (isset($frontend_one_group_keyword))
                                <form action="{{ route('frontend-one-group-keyword.update_frontend_one_group_keyword', $frontend_one_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home">Home <span class="text-red">*</span></label>
                                                <input type="text" name="home" class="form-control" id="home" value="{{ $frontend_one_group_keyword->home }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="back_to_home">Back To Home <span class="text-red">*</span></label>
                                                <input type="text" name="back_to_home" class="form-control" id="back_to_home" value="{{ $frontend_one_group_keyword->back_to_home }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" value="{{ $frontend_one_group_keyword->about }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about_us">About Us <span class="text-red">*</span></label>
                                                <input type="text" name="about_us" class="form-control" id="about_us" value="{{ $frontend_one_group_keyword->about_us }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" value="{{ $frontend_one_group_keyword->services }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="service_details">Service Details <span class="text-red">*</span></label>
                                                <input type="text" name="service_details" class="form-control" id="service_details" value="{{ $frontend_one_group_keyword->service_details }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pricing">Pricing <span class="text-red">*</span></label>
                                                <input type="text" name="pricing" class="form-control" id="pricing" value="{{ $frontend_one_group_keyword->pricing }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="portfolio">Portfolio <span class="text-red">*</span></label>
                                                <input type="text" name="portfolio" class="form-control" id="portfolio" value="{{ $frontend_one_group_keyword->portfolio }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="work_details">Work Details <span class="text-red">*</span></label>
                                                <input type="text" name="work_details" class="form-control" id="work_details" value="{{ $frontend_one_group_keyword->work_details }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blog">Blog <span class="text-red">*</span></label>
                                                <input type="text" name="blog" class="form-control" id="blog" value="{{ $frontend_one_group_keyword->blog }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blogs">Blogs <span class="text-red">*</span></label>
                                                <input type="text" name="blogs" class="form-control" id="blogs" value="{{ $frontend_one_group_keyword->blogs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" value="{{ $frontend_one_group_keyword->contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="monthly">Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="monthly" class="form-control" id="monthly" value="{{ $frontend_one_group_keyword->monthly }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="yearly">Yearly <span class="text-red">*</span></label>
                                                <input type="text" name="yearly" class="form-control" id="yearly" value="{{ $frontend_one_group_keyword->yearly }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="annualy">Annualy <span class="text-red">*</span></label>
                                                <input type="text" name="annualy" class="form-control" id="annualy" value="{{ $frontend_one_group_keyword->annualy }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin">Admin <span class="text-red">*</span></label>
                                                <input type="text" name="admin" class="form-control" id="admin" value="{{ $frontend_one_group_keyword->admin }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_more">Read More <span class="text-red">*</span></label>
                                                <input type="text" name="read_more" class="form-control" id="read_more" value="{{ $frontend_one_group_keyword->read_more }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_fill_required_fields">Please Fill Required Fields <span class="text-red">*</span></label>
                                                <input type="text" name="please_fill_required_fields" class="form-control" id="please_fill_required_fields" value="{{ $frontend_one_group_keyword->please_fill_required_fields }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email_is_invalid">Email is invalid <span class="text-red">*</span></label>
                                                <input type="text" name="email_is_invalid" class="form-control" id="email_is_invalid" value="{{ $frontend_one_group_keyword->email_is_invalid }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="send_message">Send Message <span class="text-red">*</span></label>
                                                <input type="text" name="send_message" class="form-control" id="send_message" value="{{ $frontend_one_group_keyword->send_message }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_name">Your Name * <span class="text-red">*</span></label>
                                                <input type="text" name="your_name" class="form-control" id="your_name" value="{{ $frontend_one_group_keyword->your_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_email">Your Email * <span class="text-red">*</span></label>
                                                <input type="text" name="your_email" class="form-control" id="your_email" value="{{ $frontend_one_group_keyword->your_email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="text-red">*</span></label>
                                                <input type="text" name="subject" class="form-control" id="subject" value="{{ $frontend_one_group_keyword->subject }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_message">Your Message * <span class="text-red">*</span></label>
                                                <input type="text" name="your_message" class="form-control" id="your_message" value="{{ $frontend_one_group_keyword->your_message }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment">Your Comment * <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment" class="form-control" id="your_comment" value="{{ $frontend_one_group_keyword->your_comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_message_has_been_delivered">Your message has been delivered. <span class="text-red">*</span></label>
                                                <input type="text" name="your_message_has_been_delivered" class="form-control" id="your_message_has_been_delivered" value="{{ $frontend_one_group_keyword->your_message_has_been_delivered }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment_is_pending_approval">Your comment is pending approval. <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment_is_pending_approval" class="form-control" id="your_comment_is_pending_approval" value="{{ $frontend_one_group_keyword->your_comment_is_pending_approval }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="help">Help <span class="text-red">*</span></label>
                                                <input type="text" name="help" class="form-control" id="help" value="{{ $frontend_one_group_keyword->help }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_info">Contact Info <span class="text-red">*</span></label>
                                                <input type="text" name="contact_info" class="form-control" id="contact_info" value="{{ $frontend_one_group_keyword->contact_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="copyright">Copyright <span class="text-red">*</span></label>
                                                <input type="text" name="copyright" class="form-control" id="copyright" value="{{ $frontend_one_group_keyword->copyright }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updating">Updating... <span class="text-red">*</span></label>
                                                <input type="text" name="updating" class="form-control" id="updating" value="{{ $frontend_one_group_keyword->updating }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all">All <span class="text-red">*</span></label>
                                                <input type="text" name="all" class="form-control" id="all" value="{{ $frontend_one_group_keyword->all }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('frontend-one-group-keyword.store_frontend_one_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home">Home <span class="text-red">*</span></label>
                                                <input type="text" name="home" class="form-control" id="home" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="back_to_home">Back To Home <span class="text-red">*</span></label>
                                                <input type="text" name="back_to_home" class="form-control" id="back_to_home" required>
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
                                                <label for="about_us">About Us <span class="text-red">*</span></label>
                                                <input type="text" name="about_us" class="form-control" id="about_us" required>
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
                                                <label for="service_details">Service Details <span class="text-red">*</span></label>
                                                <input type="text" name="service_details" class="form-control" id="service_details" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pricing">Pricing <span class="text-red">*</span></label>
                                                <input type="text" name="pricing" class="form-control" id="pricing" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="portfolio">Portfolio <span class="text-red">*</span></label>
                                                <input type="text" name="portfolio" class="form-control" id="portfolio" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="work_details">Work Details <span class="text-red">*</span></label>
                                                <input type="text" name="work_details" class="form-control" id="work_details" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blog">Blog <span class="text-red">*</span></label>
                                                <input type="text" name="blog" class="form-control" id="blog" required>
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
                                                <label for="annualy">Annualy <span class="text-red">*</span></label>
                                                <input type="text" name="annualy" class="form-control" id="annualy" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin">Admin <span class="text-red">*</span></label>
                                                <input type="text" name="admin" class="form-control" id="admin" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_more">Read More <span class="text-red">*</span></label>
                                                <input type="text" name="read_more" class="form-control" id="read_more" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="please_fill_required_fields">Please Fill Required Fields <span class="text-red">*</span></label>
                                                <input type="text" name="please_fill_required_fields" class="form-control" id="please_fill_required_fields" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email_is_invalid">Email is invalid <span class="text-red">*</span></label>
                                                <input type="text" name="email_is_invalid" class="form-control" id="email_is_invalid"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="send_message">Send Message <span class="text-red">*</span></label>
                                                <input type="text" name="send_message" class="form-control" id="send_message" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_name">Your Name * <span class="text-red">*</span></label>
                                                <input type="text" name="your_name" class="form-control" id="your_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_email">Your Email * <span class="text-red">*</span></label>
                                                <input type="text" name="your_email" class="form-control" id="your_email" required>
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
                                                <label for="your_message">Your Message * <span class="text-red">*</span></label>
                                                <input type="text" name="your_message" class="form-control" id="your_message" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment">Your Comment * <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment" class="form-control" id="your_comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_message_has_been_delivered">Your message has been delivered. <span class="text-red">*</span></label>
                                                <input type="text" name="your_message_has_been_delivered" class="form-control" id="your_message_has_been_delivered" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment_is_pending_approval">Your comment is pending approval. <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment_is_pending_approval" class="form-control" id="your_comment_is_pending_approval" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="help">Help <span class="text-red">*</span></label>
                                                <input type="text" name="help" class="form-control" id="help" required>
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
                                                <label for="copyright">Copyright <span class="text-red">*</span></label>
                                                <input type="text" name="copyright" class="form-control" id="copyright" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updating">Updating... <span class="text-red">*</span></label>
                                                <input type="text" name="updating" class="form-control" id="updating" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all">All <span class="text-red">*</span></label>
                                                <input type="text" name="all" class="form-control" id="all"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="frontend2">
                            @if (isset($frontend_two_group_keyword))
                                <form action="{{ route('frontend-two-group-keyword.update_frontend_two_group_keyword', $frontend_two_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recent_posts">Recent Posts <span class="text-red">*</span></label>
                                                <input type="text" name="recent_posts" class="form-control" id="recent_posts" value="{{ $frontend_two_group_keyword->recent_posts }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="by">by <span class="text-red">*</span></label>
                                                <input type="text" name="by" class="form-control" id="by" value="{{ $frontend_two_group_keyword->by }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" value="{{ $frontend_two_group_keyword->pages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" value="{{ $frontend_two_group_keyword->comments }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="reply">Reply <span class="text-red">*</span></label>
                                                <input type="text" name="reply" class="form-control" id="reply" value="{{ $frontend_two_group_keyword->reply }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="leave_a_comment">Leave A Comment <span class="text-red">*</span></label>
                                                <input type="text" name="leave_a_comment" class="form-control" id="leave_a_comment" value="{{ $frontend_two_group_keyword->leave_a_comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search">Search <span class="text-red">*</span></label>
                                                <input type="text" name="search" class="form-control" id="search" value="{{ $frontend_two_group_keyword->search }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_results">Search Results <span class="text-red">*</span></label>
                                                <input type="text" name="search_results" class="form-control" id="search_results" value="{{ $frontend_two_group_keyword->search_results }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_here">Search Here <span class="text-red">*</span></label>
                                                <input type="text" name="search_here" class="form-control" id="search_here" value="{{ $frontend_two_group_keyword->search_here }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nothing_found">Nothing Found <span class="text-red">*</span></label>
                                                <input type="text" name="nothing_found" class="form-control" id="nothing_found" value="{{ $frontend_two_group_keyword->nothing_found }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" value="{{ $frontend_two_group_keyword->categories }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="links">Links <span class="text-red">*</span></label>
                                                <input type="text" name="links" class="form-control" id="links" value="{{ $frontend_two_group_keyword->links }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_us">Contact Us <span class="text-red">*</span></label>
                                                <input type="text" name="contact_us" class="form-control" id="contact_us" value="{{ $frontend_two_group_keyword->contact_us }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view_more">View More <span class="text-red">*</span></label>
                                                <input type="text" name="view_more" class="form-control" id="view_more" value="{{ $frontend_two_group_keyword->view_more }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" value="{{ $frontend_two_group_keyword->galleries }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('frontend-two-group-keyword.store_frontend_two_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recent_posts">Recent Posts <span class="text-red">*</span></label>
                                                <input type="text" name="recent_posts" class="form-control" id="recent_posts" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="by">by <span class="text-red">*</span></label>
                                                <input type="text" name="by" class="form-control" id="by"  required>
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
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="reply">Reply <span class="text-red">*</span></label>
                                                <input type="text" name="reply" class="form-control" id="reply" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="leave_a_comment">Leave A Comment <span class="text-red">*</span></label>
                                                <input type="text" name="leave_a_comment" class="form-control" id="leave_a_comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search">Search <span class="text-red">*</span></label>
                                                <input type="text" name="search" class="form-control" id="search" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_results">Search Results <span class="text-red">*</span></label>
                                                <input type="text" name="search_results" class="form-control" id="search_results" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_here">Search Here <span class="text-red">*</span></label>
                                                <input type="text" name="search_here" class="form-control" id="search_here" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nothing_found">Nothing Found <span class="text-red">*</span></label>
                                                <input type="text" name="nothing_found" class="form-control" id="nothing_found" required>
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
                                                <label for="links">Links <span class="text-red">*</span></label>
                                                <input type="text" name="links" class="form-control" id="links" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_us">Contact Us <span class="text-red">*</span></label>
                                                <input type="text" name="contact_us" class="form-control" id="contact_us" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view_more">View More <span class="text-red">*</span></label>
                                                <input type="text" name="view_more" class="form-control" id="view_more" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" required>
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