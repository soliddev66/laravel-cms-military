@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.quick_access_buttons') }}</h4>
                @if (isset($quick_access))
                    <form action="{{ route('quick-access.update', $quick_access->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="social_media" id="social_media" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fab fa-facebook-f" {{ $quick_access->social_media === "fab fa-facebook-f" ? 'selected' : '' }}>Facebook</option>
                                        <option value="fab fa-twitter" {{ $quick_access->social_media === "fab fa-twitter" ? 'selected' : '' }}>Twitter</option>
                                        <option value="fab fa-google-plus-g" {{ $quick_access->social_media === "fab fa-google-plus-g" ? 'selected' : '' }}>Google Plus</option>
                                        <option value="fab fa-youtube" {{ $quick_access->social_media === "fab fa-youtube" ? 'selected' : '' }}>Youtube</option>
                                        <option value="fab fa-instagram" {{ $quick_access->social_media === "fab fa-instagram" ? 'selected' : '' }}>Instagram</option>
                                        <option value="fab fa-vk" {{ $quick_access->social_media === "fab fa-vk" ? 'selected' : '' }}>VK</option>
                                        <option value="fab fa-weibo" {{ $quick_access->social_media === "fab fa-weibo" ? 'selected' : '' }}>Weibo</option>
                                        <option value="fab fa-weixin" {{ $quick_access->social_media === "fab fa-weixin" ? 'selected' : '' }}>WeChat</option>
                                        <option value="fab fa-meetup" {{ $quick_access->social_media === "fab fa-meetup" ? 'selected' : '' }}>Meetup</option>
                                        <option value="fab fa-wikipedia-w" {{ $quick_access->social_media === "fab fa-wikipedia-w" ? 'selected' : '' }}>Wikipedia</option>
                                        <option value="fab fa-quora" {{ $quick_access->social_media === "fab fa-quora" ? 'selected' : '' }}>Quora</option>
                                        <option value="fab fa-pinterest" {{ $quick_access->social_media === "fab fa-pinterest" ? 'selected' : '' }}>Pinterest</option>
                                        <option value="fab fa-dribbble" {{ $quick_access->social_media === "fab fa-dribbble" ? 'selected' : '' }}>Dribbble</option>
                                        <option value="fab fa-linkedin-in" {{ $quick_access->social_media === "fab fa-linkedin-in" ? 'selected' : '' }}>Linkedin</option>
                                        <option value="fab fa-behance-square" {{ $quick_access->social_media === "fab fa-behance-square" ? 'selected' : '' }}>Behance</option>
                                        <option value="fab fa-wordpress" {{ $quick_access->social_media === "fab fa-wordpress" ? 'selected' : '' }}>WordPress</option>
                                        <option value="fab fa-blogger-b" {{ $quick_access->social_media === "fab fa-blogger-b" ? 'selected' : '' }}>Blogger</option>
                                        <option value="fab fa-whatsapp" {{ $quick_access->social_media === "fab fa-whatsapp" ? 'selected' : '' }}>Whatsapp</option>
                                        <option value="fab fa-telegram" {{ $quick_access->social_media === "fab fa-telegram" ? 'selected' : '' }}>Telegram</option>
                                        <option value="fab fa-skype" {{ $quick_access->social_media === "fab fa-skype" ? 'selected' : '' }}>Skype</option>
                                        <option value="fab fa-amazon" {{ $quick_access->social_media === "fab fa-amazon" ? 'selected' : '' }}>Amazon</option>
                                        <option value="fab fa-stack-overflow" {{ $quick_access->social_media === "fab fa-stack-overflow" ? 'selected' : '' }}>Stack Overflow</option>
                                        <option value="fab fa-stack-exchange" {{ $quick_access->social_media === "fab fa-stack-exchange" ? 'selected' : '' }}>Stack Exchange</option>
                                        <option value="fab fa-github" {{ $quick_access->social_media === "fab fa-github" ? 'selected' : '' }}>Github</option>
                                        <option value="fab fa-android" {{ $quick_access->social_media === "fab fa-android" ? 'selected' : '' }}>Android</option>
                                        <option value="fab fa-vimeo-v" {{ $quick_access->social_media === "fab fa-vimeo-v" ? 'selected' : '' }}>Vimeo</option>
                                        <option value="fab fa-tumblr" {{ $quick_access->social_media === "fab fa-tumblr" ? 'selected' : '' }}>Tumblr</option>
                                        <option value="fab fa-vine" {{ $quick_access->social_media === "fab fa-vine" ? 'selected' : '' }}>Vine</option>
                                        <option value="fab fa-twitch" {{ $quick_access->social_media === "fab fa-twitch" ? 'selected' : '' }}>Twitch</option>
                                        <option value="fab fa-flickr" {{ $quick_access->social_media === "fab fa-flickr" ? 'selected' : '' }}>Flickr</option>
                                        <option value="fab fa-yahoo" {{ $quick_access->social_media === "fab fa-yahoo" ? 'selected' : '' }}>Yahoo</option>
                                        <option value="fab fa-reddit" {{ $quick_access->social_media === "fab fa-reddit" ? 'selected' : '' }}>Reddit</option>
                                        <option value="fas fa-rss" {{ $quick_access->social_media === "fas fa-rs" ? 'selected' : '' }}>Rss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }}</label>
                                    <input id="link" type="text" name="link" value="{{ $quick_access->link }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $quick_access->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $quick_access->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="contact" id="contact" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fas fa-envelope" {{ $quick_access->contact === "fas fa-envelope" ? 'selected' : '' }}>Email</option>
                                        <option value="fas fa-phone" {{ $quick_access->contact === "fas fa-phone" ? 'selected' : '' }}>Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone">{{ __('content.email_or_phone') }}</label>
                                    <input id="email_or_phone" type="text" name="email_or_phone" value="{{ $quick_access->email_or_phone }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status_phone" id="status_phone">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $quick_access->status_phone === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $quick_access->status_phone === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('quick-access.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="social_media" id="social_media" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fab fa-facebook-f">Facebook</option>
                                        <option value="fab fa-twitter">Twitter</option>
                                        <option value="fab fa-google-plus-g">Google Plus</option>
                                        <option value="fab fa-youtube">Youtube</option>
                                        <option value="fab fa-instagram">Instagram</option>
                                        <option value="fab fa-vk">VK</option>
                                        <option value="fab fa-weibo">Weibo</option>
                                        <option value="fab fa-weixin">WeChat</option>
                                        <option value="fab fa-meetup">Meetup</option>
                                        <option value="fab fa-wikipedia-w">Wikipedia</option>
                                        <option value="fab fa-quora">Quora</option>
                                        <option value="fab fa-pinterest">Pinterest</option>
                                        <option value="fab fa-dribbble">Dribbble</option>
                                        <option value="fab fa-linkedin-in">Linkedin</option>
                                        <option value="fab fa-behance-square">Behance</option>
                                        <option value="fab fa-wordpress">WordPress</option>
                                        <option value="fab fa-blogger-b">Blogger</option>
                                        <option value="fab fa-whatsapp">Whatsapp</option>
                                        <option value="fab fa-telegram">Telegram</option>
                                        <option value="fab fa-skype">Skype</option>
                                        <option value="fab fa-amazon">Amazon</option>
                                        <option value="fab fa-stack-overflow">Stack Overflow</option>
                                        <option value="fab fa-stack-exchange">Stack Exchange</option>
                                        <option value="fab fa-github">Github</option>
                                        <option value="fab fa-android">Android</option>
                                        <option value="fab fa-vimeo-v">Vimeo</option>
                                        <option value="fab fa-tumblr">Tumblr</option>
                                        <option value="fab fa-vine">Vine</option>
                                        <option value="fab fa-twitch">Twitch</option>
                                        <option value="fab fa-flickr">Flickr</option>
                                        <option value="fab fa-yahoo">Yahoo</option>
                                        <option value="fab fa-reddit">Reddit</option>
                                        <option value="fas fa-rss">Rss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }} <span class="text-red">*</span></label>
                                    <input type="text" name="link" class="form-control" id="link" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    <select class="form-control" name="contact" id="contact" required>
                                        <option value="" disabled selected>{{ __('content.select_your_option') }}</option>
                                        <option value="fas fa-envelope">Email</option>
                                        <option value="fas fa-phone">Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone">{{ __('content.email_or_phone') }} <span class="text-red">*</span></label>
                                    <input type="text" name="email_or_phone" class="form-control" id="email_or_phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status_phone" class="form-control" id="status_phone">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
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
    <!-- end row -->

@endsection